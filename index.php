<?php
require_once 'db_config.php';

try {
    $sql = "SELECT * FROM rendezvous ORDER BY date ASC, heure ASC";
    $stmt = $pdo->query($sql);
    $rdvs = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
   
    <meta charset="UTF-8">
    <title>Liste des Rendez-vous</title>
    <style>
         <link rel="stylesheet" href="css/style.css">
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h1>Liste des Rendez-vous programmés</h1>
    <a href="formulaire.php">+ Ajouter un rendez-vous</a><br><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Date</th>
            <th>Heure</th>
            <th>Action</th>
        </tr>
        <?php foreach ($rdvs as $rdv): ?>
        <tr>
            <td><?php echo $rdv['id']; ?></td>
            <td><?php echo $rdv['nom']; ?></td>
            <td><?php echo $rdv['date']; ?></td>
            <td><?php echo $rdv['heure']; ?></td>
<td>
    <a href="modifier.php?id=<?php echo $rdv['id']; ?>" style="color: blue; text-decoration: none;">Modifier</a> 
    
    | 

    <a href="supprimer.php?id=<?php echo $rdv['id']; ?>" 
       style="color: red; text-decoration: none;"
       onclick="return confirm('Supprimer ce rendez-vous ?')">Supprimer</a>
</td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>