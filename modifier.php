<?php
require_once 'db_config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM rendezvous WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $rdv = $stmt->fetch();
}
?>

<h2>Modifier le rendez-vous</h2>
<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $rdv['id']; ?>">

    <label>Nom :</label>
    <input type="text" name="nom" value="<?php echo $rdv['nom']; ?>" required><br><br>

    <label>Date :</label>
    <input type="date" name="date_rdv" value="<?php echo $rdv['date']; ?>" required><br><br>

    <label>Heure :</label>
    <input type="time" name="heure_rdv" value="<?php echo $rdv['heure']; ?>" required><br><br>

    <button type="submit">Mettre à jour</button>
</form>