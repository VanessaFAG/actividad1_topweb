<?php
include '../header/header.php';
require_once '../conexion.php';

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = strtoupper($_POST['first_name']); // Sakila suele usar mayúsculas
    $apellido = strtoupper($_POST['last_name']);

    $sql = "INSERT INTO actor (first_name, last_name) VALUES (:nom, :ape)";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([':nom' => $nombre, ':ape' => $apellido])) {
        header("Location: index.php"); // Redirigir al listado
        exit;
    }
}
?>

<div class="container mt-5">
    <h3>Agregar Actor</h3>
    <form method="POST" class="mt-4" style="max-width: 500px;">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="first_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Apellido</label>
            <input type="text" name="last_name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>