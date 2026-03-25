
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soin-Rdv | Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm mb-5">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <span class="text-info">✚</span> Soin-Rdv
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Nouveau RDV</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liste des RDV</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <div class="container mt-5">
        <div class="card shadow border-0 mx-auto" style="max-width: 500px;">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0">Nouveau Rendez-vous</h4>
            </div>
            <div class="card-body p-4">
                <form action="traitement.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nom du Patient</label>
                        <input type="text" class="form-control" name="nom" required>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label fw-bold">Date</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label fw-bold">Heure</label>
                            <input type="time" class="form-control" name="heure" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
<?php
require_once 'db.php';
$query = $pdo->query("SELECT * FROM rendezvous ORDER BY date DESC");
$rdvList = $query->fetchAll();
?>

