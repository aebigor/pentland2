<?php
session_start();

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $username = $_POST["correo"];
    $password = $_POST["passCorreo"];

    // Preparar la consulta para verificar las credenciales
    $consulta = "SELECT * FROM usuario WHERE correo = ? AND pass = ?";
    $sentencia = $conexion->prepare($consulta);
    $sentencia->bind_param("ss", $username, $password);

    // Ejecutar la consulta
    $sentencia->execute();

    // Obtener el resultado de la consulta
    $resultado = $sentencia->get_result();

    // Verificar si se encontraron filas en el resultado
    if ($resultado->num_rows == 1) {
        // Inicio de sesión exitoso
        $_SESSION['correo'] = $username;
        header("Location: menu.php"); // Redirigir a la página de inicio después del inicio de sesión
        exit;
    } else {
        // Nombre de usuario o contraseña incorrectos
        header("Location: index.php?error=1"); // Redirigir de nuevo al formulario de inicio de sesión con un mensaje de error
        exit;
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    // Si el formulario no ha sido enviado, redirigir al formulario de inicio de sesión
    header("Location: index.php");
    exit;
}
?>

