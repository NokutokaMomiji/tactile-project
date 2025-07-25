<?php

namespace App\Livewire;
use Illuminate\Support\Facades\App; 
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Post;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\Filter;

class Home extends Component
{
    use WithPagination;
    
    #[\Livewire\Attributes\Url]
    public $filter = '';
    public $category;
    public $selectedCategories = [];
    public $filters = [];
    public $selectedCategory;
    public $hasFilters = false;

    public function mount()
    {
        if ($this->filter) {
            $this->category = \App\Models\PostCategory::whereSlug($this->filter)->first();
            if (!$this->category) {
                // Si la categoría no existe, puedes redirigir o manejar el error
                $this->filter = ''; // Limpia el filtro
            }
        }
        $this->selectedCategories = request()->input('categories', []);
        $this->filters = request()->input('filters', []);
        $this->selectedCategory = request()->input('filter', null);
    }

    public function render()
    {
        $categories = Category::with('posts')->get();
        
        // Filtra los filters según la categoría seleccionada y que estén en uso
        $filtersGrouped = Filter::select('filters.title', 'filters.filter_value', 'filters.category')
            ->when($this->filter, function ($query) {
                $query->where('filters.category', $this->filter);
            })
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('category_post')
                    ->whereColumn('category_post.category_id', 'filters.id');
            })
            ->distinct()
            ->get()
            ->groupBy('title');

        // Actualiza la propiedad hasFilters
        $this->hasFilters = $filtersGrouped->isNotEmpty();

        // Filtra los posts por categoría y filtros seleccionados
        $posts = Post::when($this->filter, function ($query) {
            $query->whereHas('categories', function ($query) {
                $query->where('slug', $this->filter);
            });
        })
        ->when($this->filters, function ($query) {
            $query->whereHas('filters', function ($query) {
                $query->whereIn('filter_value', $this->filters);
            });
        })
        ->where('is_restricted', 1)
        ->orderByRaw('orden IS NULL, orden ASC')
        ->orderBy('created_at', 'desc')
        ->paginate(24);
        foreach ($posts as $post) {
            $this->translateTitle($post);  // Llamar a la función para traducir el título de cada post
        }

        return view('livewire.home', [
            'posts' => $posts,
            'categories' => $categories,
            'filtersGrouped' => $filtersGrouped,
            'hasFilters' => $this->hasFilters,
        ]);
    }

    public function getViewCount($postId)
    {
        $filename = storage_path('app/' . 'views_counter.txt');

        if (!file_exists($filename)) {
            return 0;
        }

        $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            list($id, $counter) = explode(':', $line);
            if ($id == $postId) {
                return (int)$counter;
            }
        }

        return 0;
    }

    public function updatedSelectedCategories($value)
    {
        $this->selectedCategories = $value;
    }
  
    public function changeLanguage($lang)
    {
        $cookie = cookie()->forever('lang', $lang);

        $this->emitSelf('refreshPost');

        return redirect()->back()->withCookie($cookie);
    }

    // Función para traducir el título de un post específico
    public function translateTitle($post)
    {
        $originalText = $post->title;
        $target = App::getLocale();

        $filePath = '.././resources/lang/translations.json';

        $translations = $this->loadTranslations($filePath);

        // Verifica si la traducción existe
        if (isset($translations[$originalText][$target])) {
            $post->translated_title = $translations[$originalText][$target];
            return;
        }

        // Si no existe la traducción, realiza la solicitud de traducción
        $translatedText = $this->fetchTranslation($originalText, $target);

        // Si se obtiene una traducción, guarda la traducción y actualiza el post
        if ($translatedText) {
            $translations[$originalText][$target] = $translatedText;
            $this->saveTranslations($filePath, $translations);
            $post->translated_title = $translatedText;
        }
    }

    private function fetchTranslation($text, $target)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://text-translator2.p.rapidapi.com/translate",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query([
                'source_language' => 'auto',
                'target_language' => $target,
                'text' => strip_tags($text),
            ]),
            CURLOPT_HTTPHEADER => [
                "content-type: application/x-www-form-urlencoded",
                "x-rapidapi-host: text-translator2.p.rapidapi.com",
                "x-rapidapi-key: 5f31faad5fmsh9eb9ec16aba736bp1f0b6fjsn143524fe660e"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            session()->flash('error', "Error al traducir el texto: $err");
            return null;
        }

        $responseData = json_decode($response, true);
        return $responseData['data']['translatedText'] ?? null;
    }

    private function loadTranslations($filePath)
    {
        if (!file_exists($filePath)) {
            file_put_contents($filePath, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            return [];
        }
    
        $content = file_get_contents($filePath);
        return json_decode($content, true) ?? [];
    }
    
    private function saveTranslations($filePath, $translations)
    {
        $jsonContent = json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents($filePath, $jsonContent);
    }
}
