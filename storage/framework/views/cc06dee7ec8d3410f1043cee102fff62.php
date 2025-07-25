<style>
.form {
        width: 60%;
        margin: 0 auto; 
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 8px;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

     button {
        width: 100%;
        padding: 12px;
        background-color: #007BFF;
        color: white;
        font-size: 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #0056b3;
    }

    .mt-6 a {
        text-decoration: none;
        color: #007BFF;
        font-size: 2vw;
        display: inline-block;
        margin-top: 20px;

    }

    .mt-6 a:hover {
        text-decoration: underline;
    }
    .mt-4 {
        margin-top: 20px;
    }
    h1 {
        margin-left: 25%;
        font-size: 3vw;
    }
    </style>


    
    <form action="<?php echo e(route('users.update', $user->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

    <div class="mt-4 space-y-2 form">
        <h1>Información del usuario</h1>

        <label>Nombre</label>
        <input type="text" name="user" placeholder="Nombre" value="<?php echo e($user->name); ?>">
        <label>Apellidos</label>
        <input type="text" name="surnames" placeholder="Apellidos" value="<?php echo e($user->surnames); ?>">
<br>
        <label>Nombre de Usuario</label>
        <input type="text" name="username" placeholder="Nombre de Usuario" value="<?php echo e($user->username); ?>">
        <label>Email</label>
        <input type="email" name="email" placeholder="Email" value="<?php echo e($user->email); ?>">
<br>
        <label>Organización</label>
        <input type="text" name="entity" placeholder="Organización" value="<?php echo e($user->entity); ?>">
        <label>Ciudad</label>
        <input type="text" name="city" placeholder="Ciudad" value="<?php echo e($user->city); ?>">
<br>
        <label>Cargo</label>
        <input type="text" name="charge" placeholder="Carrera" value="<?php echo e($user->charge); ?>">
        <label>Razón</label>
        <input type="text" name="reason" placeholder="Razón" value="<?php echo e($user->reason); ?>">
        <br>
        <button type="submit">Actualizar</button>
        <div class="mt-6">
            <a href="<?php echo e(route('users')); ?>" class="text-blue-500 hover:underline">Volver a la lista de usuarios</a>
        </div>
    </div>

    

    </form>
<?php /**PATH /hosting/www/tactilejr.org/projects/resources/views/livewire/user-info.blade.php ENDPATH**/ ?>