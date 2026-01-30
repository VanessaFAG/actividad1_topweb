<?php
include '../header/header.php';
require_once '../conexion.php';

$id = $_GET['id'];

// Obtener datos actuales
$sql = "SELECT * FROM actor WHERE actor_id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$actor = $stmt->fetch(PDO::FETCH_ASSOC);

// Procesar actualización
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = strtoupper($_POST['first_name']);
    $apellido = strtoupper($_POST['last_name']);

    $updateSql = "UPDATE actor SET first_name = :nom, last_name = :ape WHERE actor_id = :id";
    $updateStmt = $pdo->prepare($updateSql);
    
    if ($updateStmt->execute([':nom' => $nombre, ':ape' => $apellido, ':id' => $id])) {
        header("Location: index.php");
        exit;
    }
}
?>

<div class="container mt-5">
    <h3>Editar Actor</h3>
    <form method="POST" class="mt-4" style="max-width: 500px;">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="first_name" class="form-control" value="<?php echo $actor['first_name']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Apellido</label>
            <input type="text" name="last_name" class="form-control" value="<?php echo $actor['last_name']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>