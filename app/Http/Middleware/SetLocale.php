<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        // Primero intentamos obtener el idioma de la cookie
        $locale = request()->cookie('lang');
        
        // Si no hay cookie, intentamos obtener el idioma de la sesión
        if (!$locale) {
            $locale = session('lang', config('app.locale'));
        }
        
        // Verificamos que el idioma sea válido
        if (in_array($locale, ['ca', 'es', 'en', 'de', 'el', 'pl'])) {
            App::setLocale($locale);
        }

        return $next($request);
    }
} 