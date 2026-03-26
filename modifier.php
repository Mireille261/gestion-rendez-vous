<?php
require_once 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM rendez_vous WHERE id = ?");
    $stmt->execute([$id]);
    $rdv = $stmt->fetch();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $date = $_POST['date_rdv'];
    $heure = $_POST['heure_rdv'];
    $motif = $_POST['motif'];

    $sql = "UPDATE rendez_vous SET nom = ?, date_rdv = ?, heure_rdv = ?, motif = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $date, $heure, $motif, $id]);
    header("Location: traitement.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Modifier le Rendez-vous</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow mx-auto" style="max-width: 500px;">
            <div class="card-header bg-warning text-dark text-center">
                <h4 class="mb-0">Modifier le Rendez-vous</h4>
            </div>
            <div class="card-body p-4">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nom du Patient</label>
                        <input type="text" class="form-control" name="nom" value="<?php echo $rdv['nom']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Date</label>
                        <input type="date" class="form-control" name="date_rdv" value="<?php echo $rdv['date_rdv']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Heure</label>
                        <input type="time" class="form-control" name="heure_rdv" value="<?php echo $rdv['heure_rdv']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Motif du rendez-vous</label>
                        <select name="motif" class="form-select" required>
                            <option value="Consultation" <?php echo ($rdv['motif'] == 'Consultation') ? 'selected' : ''; ?>>Consultation</option>
                            <option value="Urgence" <?php echo ($rdv['motif'] == 'Urgence') ? 'selected' : ''; ?>>Urgence</option>
                            <option value="Examen" <?php echo ($rdv['motif'] == 'Examen') ? 'selected' : ''; ?>>Examen</option>
                            <option value="Suivi" <?php echo ($rdv['motif'] == 'Suivi') ? 'selected' : ''; ?>>Suivi</option>
                        </select>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning fw-bold">Enregistrer les modifications</button>
                        <a href="traitement.php" class="btn btn-light border">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
