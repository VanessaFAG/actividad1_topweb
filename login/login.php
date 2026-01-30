<?php
// 1. Iniciamos sesión para poder guardar variables (aunque sean falsas por ahora)
session_start();

if (isset($_GET['accion']) && $_GET['accion'] == 'login') {
    
    // Recibimos lo que el usuario escribió (solo para guardarlo en sesión si quieres)
    $email = $_POST['email'];
    $password = $_POST['password'];

    /* =========================================================================
       SECCIÓN DE VALIDACIÓN REAL (COMENTADA TEMPORALMENTE)
       Descomentar esto cuando quieras activar la seguridad con Base de Datos
       =========================================================================
    
    require_once '../conexion.php';

    $sql = "SELECT * FROM staff WHERE email = :email AND password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email, ':password' => $password]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        $_SESSION['usuario_id'] = $usuario['staff_id'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['nombre'] = $usuario['first_name'];
        header("Location: ../crud/index.php");
        exit;
    } else {
        header("Location: index.php?error=datos_incorrectos");
        exit;
    }
    ========================================================================= */


    // =========================================================================
    // BYPASS TEMPORAL (LOGIN SIEMPRE EXITOSO)
    // =========================================================================
    
    // Creamos datos "falsos" o usamos lo que escribieron para que parezca real
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