
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soin-Rdv | Accueil</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm mb-5">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                <span class="text-info">+</span> Soin-Rdv
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Nouveau RDV</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="traitement.php">Liste des Patients</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h4 class="mb-0">Prendre un Nouveau RDV</h4>
                </div>
                <div class="card-body p-4">
                    <form action="traitement.php" method="POST">
                        <div class="mb-3">
                            <label for="nom" class="form-label fw-bold">Nom complet du Patient</label>
                            <input type="text" name="nom" id="nom" class="form-control" placeholder="Entrez le nom du patient" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="date" class="form-label fw-bold">Date du RDV</label>
                                <input type="date" name="date" id="date" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="heure" class="form-label fw-bold">Heure</label>
                                <input type="time" name="heure" id="heure" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="motif" class="form-label fw-bold">Motif du rendez-vous</label>
                            <select name="motif" id="motif" class="form-select" required>
                                <option value="">-- Sélectionnez un motif --</option>
                                <option value="Consultation">Consultation</option>
                                <option value="Urgence">Urgence</option>
                                <option value="Examen">Examen</option>
                                <option value="Suivi">Suivi</option>
                            </select>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" name="valider" class="btn btn-primary btn-lg">
                                <i class="bi bi-check-circle me-2"></i>Enregistrer le rendez-vous
                            </button>
                        </div>
                    </form>
                    </div>
            </div>
        </div>
    </div>
</main>

    <footer class="bg-dark text-white py-4 mt-auto">
        <div class="container text-center">
            <p class="mb-0">&copy; 2026 Soin-Rdv - Projet HETEC</p>
            <small class="text-info">Développé par Mireille & Roland</small>
        </div>
    </footer>
</body>
</html>

