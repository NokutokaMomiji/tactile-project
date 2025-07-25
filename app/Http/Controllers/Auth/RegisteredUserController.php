<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegisteredMail;
use App\Mail\Mailchimp;
use Illuminate\Support\Facades\App;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Verificar si es menor de edad
        $isMinor = $request->is_minor == '1';

        // Depuración: Verificar el valor de $isMinor
        \Log::info('is_minor value:', ['is_minor' => $request->is_minor]);
        \Log::info('$isMinor value:', ['isMinor' => $isMinor]);

        $rules = [
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
            'reason' => ['required', 'string'],
            'name' => [$isMinor ? 'nullable' : 'required', 'string', 'max:255'],
            'surnames' => [$isMinor ? 'nullable' : 'required', 'string', 'max:255'],
            'entity' => [$isMinor ? 'nullable' : 'required', 'string', 'max:255'],
            'charge' => [$isMinor ? 'nullable' : 'required', 'string', 'max:255'],
            'birthdate' => ['required', 'date', 'before:today'],
        ];

        $request->validate($rules);

        $user = User::create([
            'name' => $isMinor ? null : $request->name,
            'surnames' => $isMinor ? null : $request->surnames,
            'username' => $request->username,
            'email' => $request->email,
            'entity' => $isMinor ? null : $request->entity,
            'charge' => $isMinor ? null : $request->charge,
            'city' => $request->city,
            'country' => $request->country,
            'reason' => $request->reason,
            'password' => Hash::make($request->password),
            'is_admin' => '0',
            'is_banned' => '0',
            'is_minor' => $isMinor,
            'birthdate' => $request->birthdate,
        ]);

        event(new Registered($user));
       
        error_log("usuario registrad + $user->name", 0);
        Mail::to('info@sistemathead.org')->send(new UserRegisteredMail($user));

        if (App::getLocale() === 'ca'){
            $lang = 'Catalán';
        } else if (App::getLocale() === 'en'){
            $lang = 'Inglés';
        } else if (App::getLocale() === 'es') {
            $lang = 'Español';
        } else if (App::getLocale() === 'de') {
            $lang = 'Alemán';
        } else if (App::getLocale() === 'el') {
            $lang = 'Griego';
        } else if (App::getLocale() === 'pl') {
            $lang = 'Polaco';
        }

    $mailchimpData = [
        'email_address' => $user->email,    
        'status' => 'subscribed',          
        'merge_fields' => [                 
            'FNAME' => $user->name,         
            'LNAME' => $user->surnames,     
            'ORG' => $user->entity,      
            'POSITION' => $user->charge,    
            'CITY' => $user->city,          
            'HOWWILLUSE' => $user->reason,   
            'LANGUAGE' => $lang, 
        ]
    ];
            $mailchimp = new Mailchimp();
            $mailchimpResponse = $mailchimp->add_or_update_list_member("88b3f976e2", $user->email, $mailchimpData);
error_log("Mailchimp response: " . print_r($mailchimpResponse, true));

if (!isset($mailchimpResponse['success']) || !$mailchimpResponse['success']) {
    error_log("Error al registrar en Mailchimp: " . ($mailchimpResponse['error'] ?? 'Respuesta desconocida'));
} else {
    error_log("Usuario registrado correctamente en Mailchimp");
}


            
            Auth::login($user);

        \Log::info('User created:', $user->toArray());

        return redirect(RouteServiceProvider::HOME);
    }
}
