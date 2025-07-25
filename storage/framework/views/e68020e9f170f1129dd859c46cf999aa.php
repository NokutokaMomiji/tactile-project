<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(__("Verificació de l'edat")); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-white" x-data="{ openModal: false }">
    <div class="min-h-screen flex flex-col items-center justify-start pt-4">
        <!-- Botó de tornar enrere -->
        <div class="self-start ml-8 mt-4">
            <a href="javascript:history.back()" class="text-gray-600 hover:text-gray-900 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                <?php echo e(__('Tornar enrere')); ?>

            </a>
        </div>

        <!-- Logo i text -->
        <div class="mb-10 text-center">
            <img src="/logo.png" alt="Logo" class="w-48 mx-auto mb-2">
            <h1 class="text-3xl font-semibold text-gray-800"><?php echo e(__('Crea el teu usuari')); ?></h1>
        </div>

        <div class="w-full max-w-7xl flex justify-between space-x-8">
            <!-- Caixa 1: Estudiants o menors d'edat -->
            <a href="<?php echo e(route('register', ['from' => 'minor', 'is_minor' => '1'])); ?>" class="w-[40%] no-underline">
                <div 
                    class="bg-white p-8 rounded-2xl shadow-2xl flex flex-col items-center text-center hover:shadow-3xl transition-shadow hover:bg-gray-50 cursor-pointer">
                    <div class="flex items-center justify-center mb-6">
                        <h2 class="text-2xl font-semibold mr-2"><?php echo e(__("Estudiants o menors d'edat")); ?></h2>
                    </div>
                    <img src="/img/menorEdad.webp" alt="Icono 1" class="w-32 h-32 mb-6">
                    <div class="flex items-center justify-center mb-4">
                        <div class="text-xl">✔️</div>
                        <p class="ml-2 text-gray-600 text-base"><?php echo e(__('Privacitat millorada')); ?></p>
                    </div>
                    <div class="relative group">
                        <button 
                            x-on:click="openModal = 'privacy'" 
                            class="text-blue-500 hover:text-blue-600">
                            <?php echo e(__('més informació')); ?>

                        </button>
                        <!-- Tooltip per a caixa 1 -->
                        <div class="absolute z-10 hidden group-hover:block bg-white p-3 rounded-lg shadow-lg text-sm text-gray-600 w-48 left-1/2 transform -translate-x-1/2 mt-2">
                            <p><?php echo e(__('No demanem dades personals.')); ?></p>
                            <p><?php echo e(__('Registre amb email i àlies.')); ?></p>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Caixa 2: Educadors o aficionats, majors d'edat -->
            <a href="<?php echo e(route('register', ['from' => 'adult'])); ?>" class="w-[40%] no-underline">
                <div 
                    class="bg-white p-8 rounded-2xl shadow-2xl flex flex-col items-center text-center hover:shadow-3xl transition-shadow cursor-pointer">
                    <div class="flex items-center justify-center mb-6">
                        <h2 class="text-2xl font-semibold mr-2"><?php echo e(__("Educadors o aficionats, majors d'edat")); ?></h2>
                    </div>
                    <img src="/img/mayorEdad.webp" alt="Icono 2" class="w-32 h-32 mb-6">
                    <div class="flex items-center justify-center mb-4">
                        <div class="text-xl">✔️</div>
                        <p class="ml-2 text-gray-600 text-base"><?php echo e(__('Requereix aprovació')); ?></p>
                    </div>
                    <div class="relative group">
                        <button 
                            type="button"
                            class="text-blue-500 hover:text-blue-600">
                            <?php echo e(__('més informació')); ?>

                        </button>
                        <!-- Tooltip per a caixa 2 -->
                        <div class="absolute z-10 hidden group-hover:block bg-white p-3 rounded-lg shadow-lg text-sm text-gray-600 w-48 left-1/2 transform -translate-x-1/2 mt-2">
                            <p><?php echo e(__('Registre amb nom i organització.')); ?></p>
                            <p><?php echo e(__("Accés a funcions d'educador (en el futur).")); ?></p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Peu de pàgina discret -->
    <div class="fixed bottom-0 left-0 right-0 bg-white/90 backdrop-blur-sm py-3 border-t border-gray-100">
        <div class="text-center text-sm text-gray-500">
            <span><?php echo e(__('Necessites més informació?')); ?></span>
            <button x-on:click="openModal = 'privacy'" class="text-blue-500 hover:text-blue-600 ml-2"><?php echo e(__('Privacitat')); ?></button>
        </div>
    </div>

    <!-- Modal -->
    <div 
        x-show="openModal" 
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
        <div 
            class="bg-white rounded-lg shadow-xl w-11/12 md:w-1/2 p-6"
            @click.away="openModal = false">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold"><?php echo e(__('Privacitat i Seguretat')); ?></h3>
                <button type="button" x-on:click="openModal = false" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="text-gray-600 space-y-4">
                <p class="font-semibold" style="color: #f59c00;"><?php echo e(__('Per què et demanem la teva edat?')); ?></p>
                <p><?php echo e(__('En la nostra plataforma, la privacitat i la seguretat dels usuaris són la nostra prioritat. Volem oferir una experiència adaptada segons la teva edat.')); ?></p>
                
                <div class="space-y-2">
                    <p><?php echo e(__('✅ Si eres mayor de edad (+18), podrás registrarte con tu nombre y acceder a todas las herramientas sin restricciones.')); ?></p>
                    <p><?php echo e(__('✅ Si eres menor de edad (-18), tu privacidad estará protegida. No mostraremos información personal sensible, pero seguirás teniendo acceso a todas las funciones de la plataforma.')); ?></p>
                </div>
                
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="font-semibold mb-2">📌 <?php echo e(__('El nostre compromís:')); ?></p>
                    <ul class="list-disc list-inside space-y-1">
                        <li><?php echo e(__('Protecció de dades: La informació dels menors d\'edat es manté privada.')); ?></li>
                        <li><?php echo e(__('Experiència segura: Volem que tots gaudin sense preocupacions.')); ?></li>
                        <li><?php echo e(__('Accés equitatiu: Independentment de la teva edat, tindràs les mateixes oportunitats dins de la plataforma.')); ?></li>
                    </ul>
                </div>
                
                <p class="text-center text-gray-500">🔒 <?php echo e(__('La teva seguretat és la nostra prioritat.')); ?></p>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH D:\dev\temp\projects\resources\views/auth/age-gate.blade.php ENDPATH**/ ?>