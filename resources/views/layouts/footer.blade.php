<div class="bg-white py-10">
    <div class="container mx-auto px-0 text-center">
        <div class="flex justify-between">
            <div class="flex flex-col">
                <strong>Scratch Tactile</strong>
                <a class="small-link" href="{{ __('https://www.scratchjrtactile.org/ca/about') }}">{{ __('Sobre nosaltres') }}</a>                
                <a class="small-link" href="{{ __('https://www.scratchjrtactile.org/ca/pedagogical-pillars') }}">{{ __('Pílar pedagògics') }}</a>
                <a class="small-link" href="{{ __('https://www.scratchjrtactile.org/ca/faq') }}">{{ __('Preguntes freqüents') }}</a>
                <a class="small-link" href="{{ __('https://www.scratchjrtactile.org/ca/news') }}">{{ __('Notícies') }}</a>
                <a class="small-link" href="{{ __('https://www.scratchjrtactile.org/ca/donation-translation') }}">{{ __('Dona i tradueix') }}</a>
                <a class="small-link" href="{{ __('https://www.scratchjrtactile.org/ca/contact-us') }}">{{ __('Contacta') }}</a>
            </div>
            <div class="flex flex-col">
                <strong>{{ __('Comença') }}</strong>
                <a class="small-link" href="{{ __('https://www.scratchjrtactile.org/ca/start') }}">{{ __('Components del kit') }}</a>
                <a class="small-link" href="{{ __('https://www.scratchjrtactile.org/ca/blocks-guide') }}">{{ __('Guia de blocs') }}</a>
                <a class="small-link" href="{{ __('https://www.scratchjrtactile.org/ca/equity-recommendations') }}">{{ __('Consells d\'inclusió') }}</a>
            </div>
            <div class="flex flex-col">
                <strong>{{ __('Ensenya') }}</strong>
                <a class="small-link" href="{{ __('https://www.scratchjrtactile.org/ca/learn') }}">{{ __('Activitats') }}</a>
                <a class="small-link" href="{{ __('https://www.scratchjrtactile.org/ca/lesson-plans') }}">{{ __('Unitats didàctiques') }}</a>
                <a class="small-link" href="{{ __('https://www.scratchjrtactile.org/ca/what-to-do') }}">{{ __('Què pots fer?') }}</a>
                <a class="small-link" href="{{ __('https://www.scratchjrtactile.org/ca/resources') }}">{{ __('Recursos') }}</a>
            </div>
            {{-- <div class="flex flex-col">
                <strong>Crea</strong>
                <a class="small-link" href="{{ __('https://www.scratchjrtactile.org/ca/create-login') }}">Guía de Fabricación</a>
                <a class="small-link" href="{{ __('https://www.scratchjrtactile.org/ca/create') }}">Bloques y tableros</a>
                <a class="small-link" href="{{ __('https://www.scratchjrtactile.org/ca/characters') }}">Personajes</a>
                <a class="small-link" href="{{ __('https://www.scratchjrtactile.org/ca/backgrounds') }}">Fondos</a>
                <a class="small-link" href="{{ __('https://www.scratchjrtactile.org/ca/projects') }}">Proyectos</a>
            </div> --}}
            <div class="flex flex-col">
                <strong>{{ __('Legal') }}</strong>
                <a class="small-link" href="{{ __('https://www.scratchjrtactile.org/ca/terms-of-use') }}">{{ __('Condicions d\'ús') }}</a>
                <a class="small-link" href="{{ __('https://www.scratchjrtactile.org/ca/legal-notice') }}">{{ __('Avís legal') }}</a>
                <a class="small-link" href="{{ __('https://www.scratchjrtactile.org/ca/privacy-policy') }}">{{ __('Política de privacitat') }}</a>
                <a class="small-link" href="{{ __('https://scratch.mit.edu/ca/community_guidelines') }}">{{ __('Normes de la comunitat') }}</a>
                <a class="small-link" href="{{ __('https://www.scratchjrtactile.org/ca/cookies') }}">{{ __('Cookies') }}</a>
            </div>
        </div>
    </div>
</div>
<div class="bg-blau">
    <div>
        <div class="container flex items-center justify-between h-48 px-4 mx-auto">
            <div class="flex items-center w-1/2">
                <img src="/logo.png" alt="logo" class="w-52" />
                <div class="w-2/3 pt-20 ml-12 border-r-2">
                    <div class="flex items-center">
                        <div class="pr-1.5">
                            <a href="https://www.instagram.com/scratchjrtactile/" target="_blank">
                                <img src="/img/instagram.webp" class="h-10">
                            </a>
                        </div>
                        <div class="pr-1.5">
                            <a href="https://twitter.com/ScratchJTactile" target="_blank">
                                <img src="/img/twitter.webp" class="h-10">
                            </a>
                        </div>
                        <div class="pr-1.5">
                            <a href='https://www.linkedin.com/company/scratch-jr-tactile' target="_blank">
                                <img src="/img/linkedin.webp" class="h-10">
                            </a>
                        </div>
                        <div class="pr-1.5">
                            <a href="https://www.facebook.com/ScratchJrTactile/" target="_blank">
                                <img src="/img/facebook.webp" class="h-10">
                            </a>
                        </div>
                    </div>
                    <div class="mt-3 text-xs text-white w-44">
                        <p><a href="https://scratch.mit.edu/community_guidelines" target="_blank">{{ __('NORMES DE LA COMUNITAT') }}</a></p>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end w-1/2">
                <img src="/img/footerimg.png" class="w-40" alt="footer" />
            </div>
        </div>
    </div>
    
    <div class="bg-gray-100 py-5">
        <div class="container mx-auto px-4">
            <div class="text-center mb-2">
                {{ __('Amb el suport de:') }}  
            </div>
            <div class="flex justify-center">
                <div class="mr-4">
                    <img src="/img/generalitat.png" class="h-10">
                </div>
                <div class="ml-4">
                    <img src="/img/social.png" class="h-10">
                </div>
            </div>
        </div>
    </div>
</div>
<style>
        /* Estilos específicos para la sección Scratch Tactile */
        .bg-white {
            background-color: #ffffff; /* Fondo blanco */
        }

        .py-10 {
            padding-top: 2.5rem; /* Espaciado superior */
            padding-bottom: 2.5rem; /* Espaciado inferior */
        }

        .text-center {
            text-align: center; /* Alinear texto al centro */
        }

        .grid {
            display: grid; /* Usar Grid Layout */
        }

        .grid-cols-2 {
            grid-template-columns: repeat(2, 1fr); /* Dos columnas */
        }

        .md\:grid-cols-5 {
            grid-template-columns: repeat(5, 1fr); /* Cinco columnas en pantallas medianas o más grandes */
        }

        .gap-4 {
            gap: 1rem; /* Espacio entre elementos de la cuadrícula */
        }

        .mb-8 {
            margin-bottom: 2rem; /* Margen inferior */
        }

        .text-sm {
            font-size: 0.875rem; /* Tamaño de fuente pequeño */
        }

        .mt-8 {
            margin-top: 2rem; /* Margen superior */
        }

        .ml-16 {
            margin-left: 4rem; /* Margen izquierdo */
        }

        /* Estilo para los enlaces de la lista */
        .small-link {
            font-size: 0.9rem; /* Tamaño de fuente aumentado para enlaces */
            color: #007BFF; /* Color del enlace */
            text-decoration: none; /* Sin subrayado */
        }

        .small-link:hover {
            text-decoration: underline; /* Subrayado al pasar el ratón */
        }

        strong {
            font-size: 1rem; /* Tamaño de fuente aumentado para encabezados */
        }


        @media (max-width: 630px) {
        .border-r-2 {
            border-right: none;
        }
    }
    
    </style>