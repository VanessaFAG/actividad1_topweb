<?php
require_once '../conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    try {
        $sql = "DELETE FROM actor WHERE actor_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    } catch (Exception $e) {
        echo "No se puede eliminar este actor porque tiene películas asociadas.";
        exit;
    }
}

header("Location: index.php");
exit;
?>