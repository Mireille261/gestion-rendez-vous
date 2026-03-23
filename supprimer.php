<?php
require_once 'db_config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sql = "DELETE FROM rendezvous WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([':id' => $id]);

        header("Location: index.php");
        exit();

    } catch (PDOException $e) {
        die("Erreur lors de la suppression : " . $e->getMessage());
    }
} else {
    header("Location: index.php");
    exit();
}
?>