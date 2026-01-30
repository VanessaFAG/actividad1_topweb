<?php
session_start();

if (isset($_GET['accion']) && $_GET['accion'] == 'login') {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

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
    $_SESSION['usuario_id'] = 999; 
    $_SESSION['email'] = $email; 
    $_SESSION['nombre'] = "Tester (Modo Desarrollo)";
    header("Location: ../crud/index.php");
    exit;

} else {
    header("Location: index.php");
    exit;
}
?>