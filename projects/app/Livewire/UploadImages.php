<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadImages extends Component
{
    use WithFileUploads;

    public $files;
    public $post;

    public function render()
    {
        return view('livewire.upload-images');
    }

    public function updatedFiles()
    {
        foreach ($this->files as $file) {
            $path = $file->store('posts/' . $this->post->id . '/images');
            $this->post->images()->create([
                'path' => $path
            ]);
        }
    }

    public function updateImagesOrder($order)
    {
        foreach ($order as $o) {
            $this->post->images()->find($o['value'])->update(['order' => $o['order']]);
        }

        $this->post->load('images');
    }

    public function delete($id)
    {
	    $image = $this->post->images()->findOrFail($id);

	    // Delete the image file from storage
	    \Storage::delete($image->path);

	    // Delete the image record from the database
	    $image->delete();

	    // Reload post's images after deletion
	    $this->post->load('images');
    }
}
