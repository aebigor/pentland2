<style>
    /* Estilos para el formulario de edición de usuarios */
    .form-edit-user {
        width: 400px;
        background: #243032;
        padding: 30px;
        margin: auto;
        margin-top: 50px;
        border-radius: 4px;
        font-family: 'calibri';
        color: white;
        box-shadow: 7px 13px 37px #0bcbec;
    }

    .form-edit-user h4 {
        font-size: 22px;
        margin-bottom: 20px;
    }

    /* Estilos para los controles del formulario */
    .form-edit-user input[type="text"],
    .form-edit-user input[type="email"] {
        width: 100%;
        background: #f8f8f8;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 16px;
        border: 1px solid #0bcbec;
        font-family: 'calibri';
        font-size: 18px;
        color: black; /* Color de texto */
        box-sizing: border-box;
    }

    /* Estilos para el botón de guardar cambios */
    .form-edit-user input[type="submit"] {
        display: inline-block;
        width: 100%;
        background: #0bcbec;
        border: none;
        padding: 16px;
        color: white;
        font-size: 18px;
        text-decoration: none;
        text-align: center;
        border-radius: 4px;
        cursor: pointer;
        box-sizing: border-box;
    }

    .form-edit-user input[type="submit"]:hover {
        background-color: #0a30ad; /* Cambio de color al pasar el ratón */
    }

    /* Estilos para los mensajes de error */
    .form-edit-user .error-message {
        color: red;
        font-size: 14px;
        margin-top: 8px;
    }

    /* Estilos adicionales según necesites */
</style>


<form action="?c=User&a=updateUsuario" method="post">
        <input type="hidden" name="idUsuario" value="<?php echo $Usuario->getId(); ?>">
        
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $Usuario->getnombre(); ?>" required><br><br>
        
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" value="<?php echo $Usuario->getapellidos(); ?>" required><br><br>
        
        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" value="<?php echo $Usuario->getcorreo(); ?>" required><br><br>

        <label for="rol">Rol:</label>
        <input type="text" name="rol" id="rol" value="<?php echo $Usuario->getrol(); ?>" required><br><br>
        
        <input type="submit" value="Guardar Cambios">
    </form>