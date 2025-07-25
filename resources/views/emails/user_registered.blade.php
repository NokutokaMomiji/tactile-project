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
                        <li>Nombre: {{ $user->name }}</li>
                        <li>Email: {{ $user->email }}</li>
                        <li>Organización: {{ $user->entity }}</li>
                        <li>Cargo: {{ $user->charge }}</li>
                        <li>Ciudad: {{ $user->city }}</li>
                        <li>Motivo: {{ $user->reason }}</li>
                    </ul>
                    <a href="{{ url('/users/' . $user->id) }}">Ver Usuario</a>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>
