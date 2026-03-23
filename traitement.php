<?php
require_once 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $date_rdv = $_POST['date_rdv'];
    $heure_rdv = $_POST['heure_rdv'];

    try {
        $sql = "INSERT INTO rendezvous (nom, date, heure) 
                VALUES (:nom, :date, :heure)";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            ':nom'   => $nom,
            ':date'  => $date_rdv,
            ':heure' => $heure_rdv
        ]);

        echo "Félicitations ! Le rendez-vous a été enregistré avec succès.";
        echo "<br><a href='formulaire.php'>Ajouter un autre rendez-vous</a>";

    } catch (PDOException $e){
        die("Erreur SQL : " . $e->getMessage());
    }
}
?>