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

$query = $pdo->query("SELECT * FROM rendez_vous ORDER BY date_rdv ASC");
$tous_les_rdv = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Liste Officielle des RDV</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary">Liste des Patients</h2>
            <div class="row mb-3">
    <div class="row mb-4">
    <div class="col-md-6">
        <div class="input-group input-group-lg"> <span class="input-group-text bg-primary text-white">
                <i class="bi bi-search">🔍</i> 
            </span>
            <input type="text" id="rechercheNom" class="form-control" placeholder="Rechercher un patient par nom...">
        </div>
    </div>
</div>
</div>
            <a href="index.php" class="btn btn-success">+ Nouveau RDV</a>
        </div>

        <div class="card shadow border-0">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <table class="table table-hover mb-0">
    <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Nom du Patient</th>
            <th>Date</th>
            <th>Heure</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
   <tbody>
    <?php 
    $i = 1; // On initialise le compteur à 1
    foreach ($tous_les_rdv as $rdv): 
    ?>
    <tr>
        <td><?php echo $i; ?></td> 
        
        <td class="fw-bold"><?php echo htmlspecialchars($rdv['nom']); ?></td>
        <td><?php echo $rdv['date_rdv']; ?></td>
        <td><?php echo $rdv['heure_rdv']; ?></td>
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
    </div>
    <script>
document.getElementById('rechercheNom').addEventListener('keyup', function() {
    let filtre = this.value.toLowerCase();
    let lignes = document.querySelectorAll('tbody tr');

    lignes.forEach(ligne => {
        // On récupère le texte de la deuxième colonne (le Nom)
        let nom = ligne.cells[1].textContent.toLowerCase();
        
        if (nom.includes(filtre)) {
            ligne.style.display = ""; // On affiche
        } else {
            ligne.style.display = "none"; // On cache
        }
    });
});
</script>
</body>
</html>
