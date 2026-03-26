<?php
require_once 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nom'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $date = $_POST['date'];
    $heure = $_POST['heure'];

    $sql = "INSERT INTO rendez_vous (nom, date_rdv, heure_rdv) VALUES (:nom, :date_rdv, :heure_rdv)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nom' => $nom,
        ':date_rdv' => $date,
        ':heure_rdv' => $heure
    ]);
}

// Récupérer le paramètre de recherche
$recherche = isset($_GET['recherche']) ? htmlspecialchars($_GET['recherche']) : '';

// Requête SQL avec filtre optionnel
if (!empty($recherche)) {
    $sql = "SELECT * FROM rendez_vous WHERE LOWER(nom) LIKE LOWER(:recherche) ORDER BY date_rdv ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':recherche' => '%' . $recherche . '%']);
    $tous_les_rdv = $stmt->fetchAll();
} else {
    $query = $pdo->query("SELECT * FROM rendez_vous ORDER BY date_rdv ASC");
    $tous_les_rdv = $query->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Liste Officielle des RDV</title>
</head>
<body class="bg-light">
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm mb-5">
        <div class="container">
            <a class="navbar-brand fw-bold text-info" href="#">
                <i class="bi bi-hospital me-2"></i>Soin-Rdv
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white-50" href="index.php">Nouveau RDV</a></li>
                    <li class="nav-item"><a class="nav-link active fw-bold" href="traitement.php">Liste des Patients</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary">Liste des Patients</h2>
            <div class="row mb-3">
    <div class="row mb-4">
    <div class="col-md-12">
        <form method="GET" action="traitement.php" class="input-group input-group-lg">
            <span class="input-group-text bg-primary text-white">
                <i class="bi bi-search">🔍</i> 
            </span>
            <input type="text" name="recherche" class="form-control" placeholder="Rechercher un patient par nom..." value="<?php echo htmlspecialchars($recherche); ?>">
            <button class="btn btn-primary" type="submit">Rechercher</button>
        </form>
    </div>
</div>
</div>
            <a href="index.php" class="btn btn-success">+ Nouveau RDV</a>
        </div>

        <div class="card shadow border-0">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
    <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Nom du Patient</th>
            <th>Date</th>
            <th>Heure</th>
            <th>Motif</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
   <tbody>
    <?php 
    $i = 1;
    foreach ($tous_les_rdv as $rdv): 
    ?>
    <tr>
        <td><?php echo $i; ?></td> 
        
        <td class="fw-bold"><?php echo htmlspecialchars($rdv['nom']); ?></td>
        <td><?php echo $rdv['date_rdv']; ?></td>
        <td><?php echo $rdv['heure_rdv']; ?></td>
        <td>
    <?php 
    $m = $rdv['motif'] ?? 'Non défini'; 
    
    $color = "bg-secondary"; // Gris par défaut
    if($m == "Urgence") $color = "bg-danger"; // Rouge
    if($m == "Suivi") $color = "bg-success"; // Vert
    if($m == "Examen") $color = "bg-primary"; // Bleu
    if($m == "Consultation") $color = "bg-info text-dark"; // Bleu clair
    ?>
    
    <span class="badge <?php echo $color; ?>">
        <?php echo $m; ?>
    </span>
</td>
        <td class="text-center">
            <a href="modifier.php?id=<?php echo $rdv['id']; ?>" class="btn btn-sm btn-warning">Modifier</a>
            <a href="supprimer.php?id=<?php echo $rdv['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ?')">Supprimer</a>
        </td>
    </tr>
    <?php 
    $i++; // On ajoute +1 pour la ligne suivante
    endforeach; 
    ?>
</tbody>
</table>
            </div>
        </div>
</main>

<footer class="bg-white border-top py-4 mt-5">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-6 text-md-start text-muted">
                <small>&copy; 2026 <strong>Soin-Rdv</strong>. Tous droits réservés.</small>
            </div>
            <div class="col-md-6 text-md-end">
                <span class="badge bg-info-subtle text-info px-3 py-2">Projet Gestion-Rendez-vous</span>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
