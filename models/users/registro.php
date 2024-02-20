<?php
require_once "models/users/db1.php";


// Verificar si los datos 'correo' y 'passCorreo' se han enviado correctamente desde el formulario
if (isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['correo']) && isset($_POST['passCorreo'])) {
    // Obtener los valores del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $passCorreo = $_POST['passCorreo'];

    // Consulta SQL para insertar los datos en la base de datos
    $consulta ='INSERT INTO USUARIO  VALUES (:Codigo,:Nombre,:Apellido,:Correo,:passCorreo)';

    // Ejecutar la consulta SQL
    if (mysqli_query($conexion, $consulta)) {
        // Redireccionar al correo a la página de inicio de sesión si el registro es exitoso
        header("location:inicio-secion.html");
        exit(); //  terminar la ejecución del script después de la redirección
    } else {
        // Mostrar un mensaje de error si hubo un problema con la consulta
        echo "Error al registrar: " .mysqli_error($conexion);
    }   
        else {
    // Si falta algún campo en el formulario, muestra un mensaje de error
    echo "Faltan campos por llenar";
}}
?>


