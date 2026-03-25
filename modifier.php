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

    $sql = "UPDATE rendez_vous SET nom = ?, date_rdv = ?, heure_rdv = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $date, $heure, $id]);
    header("Location: traitement.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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