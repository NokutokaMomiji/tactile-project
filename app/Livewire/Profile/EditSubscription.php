<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use App\Mail\Mailchimp;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class EditSubscription extends Component
{
    public $isSubscribed = false;
    protected $mailchimp;
    private $listId = '88b3f976e2';

    public function __construct()
    {
        $this->mailchimp = new Mailchimp();
    }

    public function mount()
    {
        $this->checkSubscriptionStatus();
    }

    public function toggleSubscription()
    {
        if ($this->isSubscribed) {
            $this->unsubscribeFromMailchimp();
        } else {
            $this->subscribeToMailchimp();
        }
    }

    public function subscribeToMailchimp()
    {
        $email = Auth::user()->email;

        $listId = '88b3f976e2';
        $apiKey = "7960058124b930bfa59c3e425854424a-us10";
        $serverPrefix = 'us10';

        $subscriberHash = md5(strtolower($email));

        $client = new Client([
            'base_uri' => "https://{$serverPrefix}.api.mailchimp.com/3.0/"
        ]);

        try {
            $response = $client->put("lists/{$listId}/members/{$subscriberHash}", [
                'auth' => ['anystring', $apiKey],
                'json' => [
                    'email_address' => $email,
                    'status' => 'subscribed',
                ]
            ]);

            $this->isSubscribed = true;
            session()->flash('message', '¡Suscripción exitosa!');
            $this->dispatch('subscriptionUpdated', isSubscribed: true);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            if ($e->getCode() === 400) {
                $this->isSubscribed = true;
                session()->flash('message', 'Ya estás suscrito.');
                $this->dispatch('subscriptionUpdated', isSubscribed: true);
            } else {
                session()->flash('error', 'Error al suscribirse: ' . $e->getMessage());
            }
        }
    }

    public function unsubscribeFromMailchimp()
    {
        $email = Auth::user()->email;

        try {
            $this->mailchimp->create_cliente()->lists->updateListMember($this->listId, md5(strtolower($email)), [
                'status' => 'unsubscribed'
            ]);

            $this->isSubscribed = false;
            session()->flash('message', 'Te has desuscrito con éxito.');
            $this->dispatch('subscriptionUpdated', isSubscribed: false);
        } catch (\Exception $e) {
            session()->flash('error', 'Error al desuscribirse: ' . $e->getMessage());
        }
    }

    public function checkSubscriptionStatus()
    {
        $email = Auth::user()->email;

        try {
            $response = $this->mailchimp->create_cliente()->lists->getListMember($this->listId, md5(strtolower($email)));

            if (isset($response->status) && $response->status == 'subscribed') {
                $this->isSubscribed = true;
            } elseif (isset($response->status) && $response->status == 'unsubscribed') {
                $this->isSubscribed = false;
            } else {
                $this->isSubscribed = false;
            }
        } catch (\Exception $e) {
            if ($e->getCode() === 404) {
                $this->isSubscribed = false;
            } else {
                $this->isSubscribed = false;
            }
        }
    }

    public function render()
    {
        return view('livewire.profile.edit-subscription');
    }
}
