<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecciona tu rol</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffffff; /* Fondo blanco */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            max-width: 400px;
            background-color: #000000; /* Fondo negro */
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }
        h2 {
            margin-top: 0;
            margin-bottom: 30px;
            text-align: center;
            color: #ffffff; /* Texto blanco */
            font-size: 24px;
            background-color: #ffffff;
        }
        .role-link {
            display: block;
            background-color: #00bcd4; /* Azul celeste */
            color: #ffffff; /* Texto blanco */
            padding: 12px 24px;
            font-size: 18px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 10px; /* Espacio entre enlaces */
            text-decoration: none; /* Elimina el subrayado del enlace */
            transition: background-color 0.3s ease;
        }
        .role-link:hover {
            background-color: #0097a7; /* Azul celeste más oscuro */
            text-decoration: none; /* Mantiene el enlace sin subrayado al pasar el cursor */
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Selecciona tu rol</h2>
        <!-- Enlaces en lugar de botones de radio -->
        <a href="?c=Roles&a=createRolAdmin" class="role-link">Administrador</a>
        <a href="?c=Roles&a=createRolVendedor" class="role-link">Vendedor</a>
        <a href="?c=Roles&a=createRolUsuario" class="role-link">Usuario</a>
    </div>
</body>
</html>

