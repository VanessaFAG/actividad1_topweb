<?php
// 1. Iniciamos sesión para poder guardar variables (aunque sean falsas por ahora)
session_start();

if (isset($_GET['accion']) && $_GET['accion'] == 'login') {
    
    // Recibimos lo que el usuario escribió (solo para guardarlo en sesión si quieres)
    $email = $_POST['email'];
    $password = $_POST['password'];
    // NOTA: Aquí deberías validar el email y password contra la base de datos.
    $_SESSION['usuario_id'] = 999; 
    $_SESSION['email'] = $email; 
    $_SESSION['nombre'] = "Tester (Modo Desarrollo)";

    // Redirigimos directamente al CRUD sin preguntar
    header("Location: ../crud/index.php");
    exit;

} else {
    // Si entran sin enviar el formulario
    header("Location: index.php");
    exit;
}
?>