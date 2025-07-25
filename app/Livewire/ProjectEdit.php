<?php

namespace App\Livewire;

use App\Mail\NewPostMail;
use App\Models\Post;
use App\Models\User;
use App\Models\PostImage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image as ResizeImage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class ProjectEdit extends Component
{
    use WithFileUploads;

    public Post $post;
    public $title;
    public $body;
    public $status;
    public $projectFiles = [];
    public $documents = [];
    public $projectDocuments = [];
    public $files = [];
    public $creating = false;
    public $categories = [];
    public $is_restricted;
    public $privacy;
    public $user_id;
    public $created_at;
    public $links = [];
    public $selectedFilters = [];
    public $selectedCategory = null;

    public function mount($user, Post $post)
    {
        $this->post = $post;
        
        if ($post->id) {
            // Get existing filters
            $this->selectedFilters = DB::table('category_post')
                ->where('post_id', $this->post->id)
                ->pluck('category_id')
                ->toArray();
            
            // Get the category of the post if it exists
            if (!empty($this->categories)) {
                $this->selectedCategory = $this->categories[0];
            }
            
            \Log::info('Mount - Loaded filters:', ['filters' => $this->selectedFilters]);

            if (auth()->id() != $post->user_id && !auth()->user()->is_admin) {
                abort(403);
            }

            $this->title = $post->title;
            $this->body = $post->body;
            $this->status = $post->status;
            $this->projectFiles = $post->images->toArray();
            $this->projectDocuments = $post->documents->toArray();
            $this->categories = $post->categories->pluck('id')->toArray();
            $this->is_restricted = $post->is_restricted;
            $this->user_id = $post->user_id;
            $this->privacy = $post->privacy;
            $this->links = $post->links;
            $this->created_at = $post->created_at ? \Carbon\Carbon::create($post->created_at)->format('Y-m-d') : now()->format('Y-m-d');
        } else {
            $this->post->user_id = auth()->id();
            $this->post->is_restricted = auth()->user()->canPublishWithoutModeration() ? 1 : 0;
            $this->created_at = now()->format('Y-m-d');
            $this->creating = true;
            $this->selectedFilters = [];
        }
    }

    public function render()
    {
        return view('livewire.project-edit', [
            'users' => User::oldest('name')->get()
        ]);
    }

    public function updatedFiles()
    {
        foreach ($this->files as $file) {
            $originalName = \Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $extension = $file->getClientOriginalExtension();
            $randomString = \Str::random(4);
            $filename = $originalName . '_' . $randomString . '.' . $extension;

            $image = ResizeImage::make($file)->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('storage/projects/' . $filename);

            $image->fit(400)->save('storage/projects/thumb_' . $filename);

            $this->projectFiles[] = [
                'name' => $originalName,
                'path' => 'projects/' . $filename,
                'thumbnail_path' => 'projects/thumb_' . $filename,
            ];
        }
    }

    public function updatedDocuments($value)
    {
        foreach ($this->documents as $document) {
            $originalName = \Str::slug(pathinfo($document->getClientOriginalName(), PATHINFO_FILENAME));
            $extension = strtolower(pathinfo($document->getClientOriginalName(), PATHINFO_EXTENSION));
            $randomString = \Str::random(4);
            $filename = $originalName . '_' . $randomString . '.' . $extension;

            $path = $document->storeAs('projects/' . $this->post->id, $filename);

            $this->projectDocuments[] = [
                'name' => $document->getClientOriginalName(),
                'path' => $path,
            ];
        }

        $this->documents = [];
    }

    public function deleteFile($index)
    {
        $projectFile = $this->projectFiles[$index];
        if (isset($projectFile['id'])) {
            PostImage::destroy($projectFile['id']);
        }

        unset($this->projectFiles[$index]);
        $this->projectFiles = array_values($this->projectFiles);
    }

    public function updatedSelectedFilters($value)
    {
        $this->selectedFilters = $value;
        $this->skipRender();
    }

    public function save()
    {
        \Log::info('Starting save with filters:', ['filters' => $this->selectedFilters]);
        
        try {
            DB::beginTransaction();

            if ($this->creating) {
                $this->post->user_id = auth()->id();
                $this->post->save();
            }

            foreach ($this->projectFiles as $file) {
                if (!isset($file['id'])) {
                    $this->post->images()->create($file);
                }
            }

            foreach ($this->projectDocuments as $document) {
                if (!isset($document['id'])) {
                    $this->post->documents()->create($document);
                } else {
                    $this->post->documents()->updateOrCreate(['id' => $document['id']], $document);
                }
            }

            $this->post->update([
                'title' => $this->title,
                'body' => $this->body,
                'status' => $this->status,
                'privacy' => $this->privacy,
                'created_at' => $this->created_at ?: \Carbon\Carbon::now()->format('Y-m-d'),
                'links' => $this->links,
            ]);

            if (auth()->user()->is_admin && !$this->creating) {
                $this->post->update([
                    'user_id' => $this->user_id
                ]);
            }

            $this->post->categories()->sync($this->categories);

            if ($this->post->id) {
                // Handle filters
                DB::table('category_post')
                    ->where('post_id', $this->post->id)
                    ->delete();
                    
                if (!empty($this->selectedFilters)) {
                    $filtersToInsert = array_map(function($filterId) {
                        return [
                            'post_id' => $this->post->id,
                            'category_id' => (int)$filterId,
                            'created_at' => now(),
                            'updated_at' => now()
                        ];
                    }, $this->selectedFilters);
                    
                    DB::table('category_post')->insert($filtersToInsert);
                    \Log::info('Inserted filters:', ['filters' => $filtersToInsert]);
                }
            }

            DB::commit();
            \Log::info('Save completed successfully');

            if ($this->creating) {
                Mail::to('info@sistemathead.org')->send(new NewPostMail($this->post, false)); 
            } else {
                Mail::to('info@sistemathead.org')->send(new NewPostMail($this->post, true));
            }
            $this->creating = false;

            session()->flash('message', __('Projecte guardat correctament!'));

            return $this->redirect(route('post.show', [$this->post]));
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Save failed:', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function removeDocument($index)
    {
        $projectDocument = $this->projectDocuments[$index];
        if (isset($projectDocument['id'])) {
            $this->post->documents()->find($projectDocument['id'])->delete();
        }

        unset($this->projectDocuments[$index]);
        $this->projectDocuments = array_values($this->projectDocuments);
    }

    public function updateImagesOrder($images)
    {
        foreach ($this->projectFiles as $file) {
            if (!isset($file['id'])) {
                $this->post->images()->create($file);
            }
        }

        foreach ($images as $image) {
            PostImage::whereId($image['value'])->update(['order' => $image['order']]);
        }

        $this->projectFiles = $this->post->images->toArray();
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            
            DB::table('category_post')->where('post_id', $id)->delete();
            
            DB::table('likes')->where('post_id', $id)->delete();
            
            Post::find($id)->delete();
            
            DB::commit();
            
            return $this->redirect('/');
            
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error deleting post:', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function addNewLink()
    {
        $this->links[] = [
            'name' => '',
            'link' => ''
        ];
    }

    public function removeLink($index)
    {
        unset($this->links[$index]);
    }

    public function toggleFilter($filterId)
    {
        if (!is_array($this->selectedFilters)) {
            $this->selectedFilters = [];
        }

        if (in_array($filterId, $this->selectedFilters)) {
            $this->selectedFilters = array_values(array_diff($this->selectedFilters, [$filterId]));
        } else {
            $this->selectedFilters[] = $filterId;
        }
        
        $this->dispatch('filterUpdated');
        $this->skipRender();
    }

    public function resetFilters()
    {
        $this->selectedFilters = [];
        if ($this->post->id) {
            DB::table('category_post')
                ->where('post_id', $this->post->id)
                ->delete();
        }
    }

    public function filterByCategory($categoryName)
    {
        $this->selectedCategory = $categoryName;
        
        $this->dispatch('showFilters', [
            'category' => $categoryName
        ]);
    }
}