<?php
require_once 'db.php';

// On récupère tous les rendez-vous
$query = $pdo->query("SELECT * FROM rendezvous ORDER BY date DESC");
$rdvList = $query->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mes Rendez-vous</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>Liste des Rendez-vous</h1>

    <?php if(isset($_GET['statut']) && $_GET['statut'] == 'succes'): ?>
        <p style="color: green;">✅ Rendez-vous ajouté avec succès !</p>
    <?php endif; ?>

    <table border="1">
        <tr>
            <th>Nom</th>
            <th>Date</th>
            <th>Heure</th>
        </tr>
        <?php foreach($rdvList as $rdv): ?>
        <tr>
            <td><?= htmlspecialchars($rdv['nom']) ?></td>
            <td><?= $rdv['date'] ?></td>
            <td><?= $rdv['heure'] ?></td>
            <td>
            <a href="Suppriùer.php?id=<?=$rdv['id'] ?>"
            onclick="return confirm('Supprimer ce rendez-vous ?');">Supprimer
            </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="formulaire.php">Ajouter un nouveau rendez-vous</a>
</body>
</html>