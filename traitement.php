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
$tous_les_rdv = $query->fetchAll(PDO::FETCH_ASSOC);
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
        <?php foreach ($tous_les_rdv as $rdv): ?>
        <tr>
            <td><?php echo $rdv['id']; ?></td>
            <td class="fw-bold"><?php echo htmlspecialchars($rdv['nom']); ?></td>
            <td><?php echo date('d/m/Y', strtotime($rdv['date_rdv'])); ?></td>
            <td><?php echo $rdv['heure_rdv']; ?></td>
            <td class="text-center">
                <a href="modifier.php?id=<?php echo $rdv['id']; ?>" class="btn btn-sm btn-warning">
                    Modifier
                </a>
                
                <a href="supprimer.php?id=<?php echo $rdv['id']; ?>" 
                   class="btn btn-sm btn-danger" 
                   onclick="return confirm('Voulez-vous vraiment supprimer ce rendez-vous ?')">
                    Supprimer
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
            </div>
        </div>
    </div>
</body>
</html>
