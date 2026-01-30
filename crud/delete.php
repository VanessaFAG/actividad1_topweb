<?php
require_once '../conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Nota: En Sakila real, borrar un actor puede fallar si tiene películas asociadas (Claves foráneas).
    // Para este ejercicio escolar, asumimos que borramos actores nuevos sin películas.
    try {
        $sql = "DELETE FROM actor WHERE actor_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    } catch (Exception $e) {
        // Manejo básico de error si hay claves foráneas
        echo "No se puede eliminar este actor porque tiene películas asociadas.";
        exit;
    }
}

header("Location: index.php");
exit;
?>