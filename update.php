<?php
require_once 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $date = $_POST['date_rdv'];
    $heure = $_POST['heure_rdv'];

    try {
        $sql = "UPDATE rendezvous SET nom = :nom, date = :date, heure = :heure WHERE id = :id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nom' => $nom,
            ':date' => $date,
            ':heure' => $heure,
            ':id' => $id
        ]);

        header("Location: index.php");
        exit();

    } catch (PDOException $e) {
        die("Erreur de mise à jour : " . $e->getMessage());
    }
}
?>