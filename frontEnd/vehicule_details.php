<?php
session_start();
require_once('../database/db.php');
require_once('../classes/vehicule.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$db = dataBase::getInstance()->getConnection();
$vehicule_id = $_GET['id'];
$vehicule = Vehicule::getVehiculeById($db, $vehicule_id);

if (!$vehicule) {
    echo "Vehicule not found.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vehicule Details</title>
</head>
<body>
    <h2>Vehicule Details</h2>
    <p><strong>Modele:</strong> <?php echo $vehicule->getModele(); ?></p>
    <p><strong>Prix:</strong> <?php echo $vehicule->getPrix(); ?></p>
    <p><strong>Disponibilite:</strong> <?php echo $vehicule->getDisponibilite() ? 'Available' : 'Not Available'; ?></p>
    <p><strong>Categorie ID:</strong> <?php echo $vehicule->getCategorieId(); ?></p>
</body>
</html>
