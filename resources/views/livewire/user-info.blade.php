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


    
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

    <div class="mt-4 space-y-2 form">
        <h1>Información del usuario</h1>

        <label>Nombre</label>
        <input type="text" name="user" placeholder="Nombre" value="{{ $user->name }}">
        <label>Apellidos</label>
        <input type="text" name="surnames" placeholder="Apellidos" value="{{ $user->surnames }}">
<br>
        <label>Nombre de Usuario</label>
        <input type="text" name="username" placeholder="Nombre de Usuario" value="{{ $user->username }}">
        <label>Email</label>
        <input type="email" name="email" placeholder="Email" value="{{ $user->email }}">
<br>
        <label>Organización</label>
        <input type="text" name="entity" placeholder="Organización" value="{{ $user->entity }}">
        <label>Ciudad</label>
        <input type="text" name="city" placeholder="Ciudad" value="{{ $user->city }}">
<br>
        <label>Cargo</label>
        <input type="text" name="charge" placeholder="Carrera" value="{{ $user->charge }}">
        <label>Razón</label>
        <input type="text" name="reason" placeholder="Razón" value="{{ $user->reason }}">
        <br>
        <button type="submit">Actualizar</button>
        <div class="mt-6">
            <a href="{{ route('users') }}" class="text-blue-500 hover:underline">Volver a la lista de usuarios</a>
        </div>
    </div>

    

    </form>
