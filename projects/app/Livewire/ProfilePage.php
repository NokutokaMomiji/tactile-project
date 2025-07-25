<?php

namespace App\Livewire;

use App\Models\Collection;
use Livewire\Component;
use App\Models\User;
use PHPUnit\TestRunner\TestResult\Collector;
use GuzzleHttp\Client;

class ProfilePage extends Component
{
    public User $user;
    public $actives = [];
    public $collectionId;
    public $collectionName;
    
    #[\Livewire\Attributes\Url]
    public $filter;
    public $category;
    public $isSubscribed = false;
    
    public function mount($user, $collectionId = null)
    {
        $this->user = $user;
        $this->checkSubscriptionStatus();
        if ($this->filter)
            $this->category = \App\Models\PostCategory::whereSlug($this->filter)->firstOrFail();
    }


    public function render()
    {
        return view('livewire.profile-page');
    }

    public function getPostsProperty()
    {
        if ($this->collectionId) {
            return [];
            return $this->user->posts()->where('collection_id', $this->collectionId)->latest()->get();
        }
        
        if (auth()->check() && auth()->id() == $this->user->id){
            return $this->user->posts()
                ->when($this->filter, function($query) {
                    $query->whereHas('categories', function ($query) {
                        $query->where('post_category_id', $this->category->id);
                    });
                
            })
            ->latest()
            ->get();
        }else{
            return $this->user->posts()
                ->when($this->filter, function($query) {
                    $query->whereHas('categories', function ($query) {
                        $query->where('post_category_id', $this->category->id);
                    });
                
            })
            ->where('privacy',0)
            ->latest()
            ->get();
        }
    }

    public function deleteCollection($id)
    {
        Collection::where('id', $id)->first()->delete();
    }

    public function addCollection()
    {
        Collection::create([
            'user_id' => $this->user->id,
            'name' => $this->collectionName
        ]);

        $this->collectionName = '';
    }

    public function getViewCount($postId)
    {
        $filename = storage_path('app/' . 'views_counter.txt');

        if (!file_exists($filename)) {
            return 0;
        }

        $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            list($postIdFromFile, $counter) = explode(':', $line);
            if ($postIdFromFile == $postId) {
                return (int)$counter;
            }
        }

        return 0;
    }

    public function subscribeToMailchimp()
    {
        $email = $this->user->email;
        $listId = '88b3f976e2';
        $apiKey = "7960058124b930bfa59c3e425854424a-us10";
        $serverPrefix = 'us10';
        
        $subscriberHash = md5(strtolower($email)); 
        
        $client = new \GuzzleHttp\Client([
            'base_uri' => "https://{$serverPrefix}.api.mailchimp.com/3.0/"
        ]);
        
        try {
            sleep(2); 
    
            $response = $client->get("lists/{$listId}/members/{$subscriberHash}", [
                'auth' => ['anystring', $apiKey],
            ]);
    
            $data = json_decode($response->getBody(), true);
            
            if ($data['status'] === 'subscribed') {
                session()->flash('message', 'Ya estás suscrito.');
            } else {
                $client->put("lists/{$listId}/members/{$subscriberHash}", [
                    'auth' => ['anystring', $apiKey],
                    'json' => [
                        'status' => 'subscribed',
                    ]
                ]);
                
                $this->isSubscribed = true;
                session()->flash('message', '¡Suscripción exitosa!');
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            if ($e->getCode() === 404) {
                $response = $client->post("lists/{$listId}/members", [
                    'auth' => ['anystring', $apiKey],
                    'json' => [
                        'email_address' => $email,
                        'status' => 'subscribed',
                    ]
                ]);
    
                $this->isSubscribed = true; 
                session()->flash('message', '¡Suscripción exitosa!');
            } else {
                session()->flash('error', 'Error al suscribirse: ' . $e->getMessage());
            }
        }
    }    
    
    public function unsubscribeFromMailchimp()
{
    $email = $this->user->email;
    $listId = '88b3f976e2';
    $apiKey = "7960058124b930bfa59c3e425854424a-us10";
    $serverPrefix = 'us10';
    
    $subscriberHash = md5(strtolower($email));
    
    $client = new \GuzzleHttp\Client([
        'base_uri' => "https://{$serverPrefix}.api.mailchimp.com/3.0/"
    ]);
    
    try {
        $response = $client->patch("lists/{$listId}/members/{$subscriberHash}", [
            'auth' => ['anystring', $apiKey],
            'json' => [
                'status' => 'unsubscribed'
            ]
        ]);
    
        $this->isSubscribed = false; 
    
        $this->emit('subscriptionUpdated', false); 
        
        session()->flash('message', 'Te has desuscrito con éxito.');
    } catch (\Exception $e) {
        session()->flash('error', 'Error al intentar desuscribirse: ' . $e->getMessage());
    }
}

    
public function checkSubscriptionStatus()
{
    $email = $this->user->email;
    $listId = '88b3f976e2';
    $apiKey = "7960058124b930bfa59c3e425854424a-us10";
    $serverPrefix = 'us10';
    $subscriberHash = md5(strtolower($email));

    $client = new \GuzzleHttp\Client([
        'base_uri' => "https://{$serverPrefix}.api.mailchimp.com/3.0/"
    ]);

    try {
        $response = $client->get("lists/{$listId}/members/{$subscriberHash}", [
            'auth' => ['anystring', $apiKey],
        ]);

        $data = json_decode($response->getBody(), true);
        $this->isSubscribed = $data['status'] === 'subscribed';
    } catch (\Exception $e) {
        $this->isSubscribed = false;
    }
}

}    