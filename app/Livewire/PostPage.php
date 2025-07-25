<?php

namespace App\Livewire;

use App\Models\Collection;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\App;

class PostPage extends Component
{
    public Post $post;
    public User $user;
    public $showComments = true;
    public $translatedBody = null;
    public $translatedTitle = null;

    protected $listeners = ['refreshPost' => 'translateBody'];

    public function mount(Post $post)
    {
        if ($post->is_restricted == 2 && !auth()->check()) {
            abort(404);
        }

        $this->post = $post;
        $this->incrementViewCount();
        $this->translateContent();
    }

    public function render()
    {
        return view('livewire.post-page', [
            'post' => $this->post,
            'translatedBody' => $this->translatedBody ?? $this->post->processedBody,
            'translatedTitle' => $this->translatedTitle ?? $this->post->title,
        ]);
    }

    public function translateContent()
{
    $this->translateBody();
    $this->translateTitle();
}

    public function translateBody()
    {
        $originalText = $this->post->processedBody;
        $target = App::getLocale(); 

        $filePath = '.././resources/lang/translations.json';

        $translations = $this->loadTranslations($filePath);

        if (isset($translations[$originalText][$target])) {
            $this->translatedBody = $translations[$originalText][$target];
            return;
        }

        $translatedText = $this->fetchTranslation($originalText, $target);

        if ($translatedText) {
            $translatedText = $this->restoreLineBreaks($translatedText, $originalText);
            $translations[$originalText][$target] = $translatedText;
            $this->saveTranslations($filePath, $translations);
            $this->translatedBody = $translatedText;
        }
    }

    public function translateTitle()
{
    $originalText = $this->post->title;
    $target = App::getLocale();

    $filePath = '.././resources/lang/translations.json';

    $translations = $this->loadTranslations($filePath);

    if (isset($translations[$originalText][$target])) {
        $this->translatedTitle = $translations[$originalText][$target];
        return;
    }

    $translatedText = $this->fetchTranslation($originalText, $target);

    if ($translatedText) {
        $translations[$originalText][$target] = $translatedText;
        $this->saveTranslations($filePath, $translations);
        $this->translatedTitle = $translatedText;
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
                'text' => $text,
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

    private function restoreLineBreaks($translatedText, $originalText)
    {
        $originalLines = explode("\n", $originalText);
        $translatedLines = explode("\n", $translatedText);

        if (count($originalLines) > count($translatedLines)) {
            $translatedText = implode("\n", array_map(function ($original, $translated) {
                return $translated ?: $original;
            }, $originalLines, $translatedLines));
        }

        return $translatedText;
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

    public function toggleFavorite()
    {
        if (!auth()->check()) {
            return $this->redirect('/login');
        }
        auth()->user()->favorites()->toggle([$this->post->id]);
    }

    public function toggleLike()
    {
        if (!auth()->check()) {
            return $this->redirect('/login');
        }
        auth()->user()->likes()->toggle([$this->post->id]);
    }

    public function toggleCollection($collectionId)
    {
        if (!auth()->check()) {
            return $this->redirect('/login');
        }

        Collection::findOrFail($collectionId)->posts()->toggle([$this->post->id]);
    }

    public function toggleComments()
    {
        $this->showComments = !$this->showComments;
    }

    private function incrementViewCount()
    {
        $filename = storage_path('app/' . 'views_counter.txt');
        $cookieName = 'viewed_post_' . $this->post->id;

        if (!isset($_COOKIE[$cookieName])) {
            if (file_exists($filename)) {
                $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            } else {
                $lines = [];
            }

            $updated = false;
            foreach ($lines as &$line) {
                list($postId, $counter) = explode(':', $line);
                if ($postId == $this->post->id) {
                    $line = "{$this->post->id}:" . ($counter + 1);
                    $updated = true;
                    break;
                }
            }

            if (!$updated) {
                $lines[] = "{$this->post->id}:1";
            }

            file_put_contents($filename, implode(PHP_EOL, $lines));

            setcookie($cookieName, true, strtotime('+1 year'), '/');
        }
    }

    public function getViewCount()
    {
        $filename = storage_path('app/' . 'views_counter.txt');

        if (!file_exists($filename)) {
            return 0;
        }

        $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            list($postId, $counter) = explode(':', $line);
            if ($postId == $this->post->id) {
                return (int)$counter;
            }
        }

        return 0;
    }

    public function changeLanguage($lang)
    {
        $cookie = cookie()->forever('lang', $lang);

        $this->emitSelf('refreshPost');

        return redirect()->back()->withCookie($cookie);
    }
}
