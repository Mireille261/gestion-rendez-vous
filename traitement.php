<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = htmlspecialchars($_POST['nom_client']);
    $date = $_POST['date_rdv'];
    $heure = $_POST['heure_rdv'];

    try {
        $sql = "INSERT INTO rendezvous (nom, date, heure) VALUES (:nom, :date, :heure)";
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':nom' => $nom,
            ':date' => $date,
            ':heure' => $heure
        ]);

        header("Location: index.php?statut=succes");
        exit();

    } catch (PDOException $e) {
        die("Erreur lors de l'enregistrement : " . $e->getMessage());
    }
}
?>