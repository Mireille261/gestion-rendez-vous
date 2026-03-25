<?php
require_once 'db.php';

// On vérifie qu'on a bien un ID dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // On prépare la suppression sécurisée
        $sql = "DELETE FROM rendez_vous WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([':id' => $id]);
        
        // Si ça marche, on retourne à la liste
        header("Location: traitement.php");
        exit();

    } catch (PDOException $e) {
        // En cas d'erreur de base de données
        die("Erreur lors de la suppression : " . $e->getMessage());
    }
} else {
    // Si pas d'ID, on retourne simplement à la liste
    header("Location: traitement.php");
    exit();
}
?>