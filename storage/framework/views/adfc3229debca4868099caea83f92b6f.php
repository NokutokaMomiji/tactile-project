<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Registro de Usuario</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            width: 100%;
            background-color: #f0f8ff;
        }

        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            background-color: #ffffff; 
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 28px;
            color: #005f6b; 
            margin-bottom: 20px;
            text-align: center;
        }
        ul {
            list-style-type: none;
            padding-left: 0;
        }

        ul li {
            font-size: 16px;
            margin-bottom: 10px;
            color: #333;
        }

        a {
            font-size: 16px;
            color: #005f6b; 
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            text-align: center;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <table width="100%">
        <tr>
            <td align="center">
                <div class="email-container">
                    <h1>Un nuevo usuario se ha registrado</h1>
                    <ul>
                        <li>Nombre: <?php echo e($user->name); ?></li>
                        <li>Email: <?php echo e($user->email); ?></li>
                        <li>Organización: <?php echo e($user->entity); ?></li>
                        <li>Cargo: <?php echo e($user->charge); ?></li>
                        <li>Ciudad: <?php echo e($user->city); ?></li>
                        <li>Motivo: <?php echo e($user->reason); ?></li>
                    </ul>
                    <a href="<?php echo e(url('/users/' . $user->id)); ?>">Ver Usuario</a>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>
<?php /**PATH /opt/lampp/htdocs/projects/resources/views/emails/user_registered.blade.php ENDPATH**/ ?>