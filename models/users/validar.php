<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $username = $_POST["correo"];
    $password = $_POST["passCorreo"];

    // Aquí podrías tener una lógica más avanzada para validar el inicio de sesión,
    // como comprobar en una base de datos si el usuario y la contraseña son válidos.
    // En este ejemplo, se usa una validación simple.

    // Comprobar si el nombre de usuario y la contraseña son correctos
    if ($username === 'correo' && $passCorreo === 'passcorreo') {
        // Inicio de sesión exitoso
        session_start();
        $_SESSION['correo'] = $username;
        header("Location: menu.php"); // Redirigir a la página de inicio después del inicio de sesión
        exit;
    } else {
        // Nombre de usuario o contraseña incorrectos
        header("Location: index.php?error=1"); // Redirigir de nuevo al formulario de inicio de sesión con un mensaje de error
        exit;
    }
} else {
    // Si el formulario no ha sido enviado, redirigir al formulario de inicio de sesión
    header("Location: index.php");
    exit;
}
?>
