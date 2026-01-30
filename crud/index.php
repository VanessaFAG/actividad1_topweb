<?php
include '../header/header.php';
require_once '../conexion.php';

// Consulta para obtener los actores
$stmt = $pdo->query("SELECT * FROM actor ORDER BY last_update DESC LIMIT 20"); // Limitamos a 20 para el ejemplo
$actores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Gestión de Actores (Sakila)</h2>
        <a href="insert.php" class="btn btn-primary">Agregrar Nuevo Actor</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Última Actualización</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($actores as $actor): ?>
            <tr>
                <td><?php echo $actor['actor_id']; ?></td>
                <td><?php echo htmlspecialchars($actor['first_name']); ?></td>
                <td><?php echo htmlspecialchars($actor['last_name']); ?></td>
                <td><?php echo $actor['last_update']; ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $actor['actor_id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="eliminar.php?id=<?php echo $actor['actor_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?');">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>