<?php
// On vérifie si le formulaire a été envoyé
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $date = htmlspecialchars($_POST['date']);
    $heure = htmlspecialchars($_POST['heure']);

    // Ici, ton binôme ajoutera plus tard le code SQL pour enregistrer en base de données
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Confirmation Rendez-vous</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="alert alert-success text-center shadow">
            <h4>✅ Rendez-vous enregistré avec succès !</h4>
        </div>

        <div class="card shadow-sm mt-4">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Récapitulatif de la liste</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Patient</th>
                            <th>Date</th>
                            <th>Heure</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $nom; ?></td>
                            <td><?php echo $date; ?></td>
                            <td><?php echo $heure; ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center mt-4">
                    <a href="index.php" class="btn btn-outline-primary">Ajouter un autre rendez-vous</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
} else {
    // Si quelqu'un essaie d'accéder au fichier sans remplir le formulaire
    header("Location: index.php");
}
?>