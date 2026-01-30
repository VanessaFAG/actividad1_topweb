<?php
require_once 'config.class.php';

try {
    $dsn = SGBD . ":host=" . DBHOST . ";dbname=" . DBNAME . ";port=" . DBPORT . ";charset=utf8mb4";
    $pdo = new PDO($dsn, DBUSER, DBPASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>