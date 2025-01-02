<?php
session_start();
require_once('../database/db.php');
require_once('../classes/admin.php');
require_once('../classes/vehicule.php');

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'admin') {
    header("Location: login.php");
    exit();
}

$db = dataBase::getInstance()->getConnection();
$admin = new Admin('', '', '', '', 'admin');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
    $vehicule_id = $_POST['vehicule_id'];

    if ($action == 'add') {
        $modele = $_POST['modele'];
        $prix = $_POST['prix'];
        $disponibilite = $_POST['disponibilite'];
        $categorie_id = $_POST['categorie_id'];
        $categorie_id = $_POST['image_path'];
        $vehicule = new Vehicule($modele, $prix, $disponibilite, $categorie_id, $image_path);
        $admin->ajouterVehicule($db, $vehicule);
    } elseif ($action == 'edit') {
        $modele = $_POST['modele'];
        $prix = $_POST['prix'];
        $disponibilite = $_POST['disponibilite'];
        $categorie_id = $_POST['categorie_id'];
        $categorie_id = $_POST['image_path'];
        $vehicule = new Vehicule($modele, $prix, $disponibilite, $categorie_id, $image_path);
        $vehicule->setId($vehicule_id);
        $admin->modifierVehicule($db, $vehicule);
    } elseif ($action == 'delete') {
        $admin->supprimerVehicule($db, $vehicule_id);
    }

    header("Location: manage_vehicules.php");
    exit();
}

$vehicules = Vehicule::getAllVehicules($db);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Vehicules</title>
</head>
<body>
    <h2>Manage Vehicules</h2>
    <form method="post" action="manage_vehicules.php">
        <input type="hidden" name="action" value="add">
        <label for="modele">Modele:</label>
        <input type="text" id="modele" name="modele" required><br>
        <label for="prix">Prix:</label>
        <input type="text" id="prix" name="prix" required><br>
        <label for="disponibilite">Disponibilite:</label>
        <input type="text" id="disponibilite" name="disponibilite" required><br>
        <label for="categorie_id">Categorie ID:</label>
        <input type="text" id="categorie_id" name="categorie_id" required><br>
        <button type="submit">Add Vehicule</button>
    </form>

    <h3>Existing Vehicules</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Modele</th>
            <th>Prix</th>
            <th>Disponibilite</th>
            <th>Categorie ID</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($vehicules as $vehicule) { ?>
        <tr>
            <td><?php echo $vehicule->getId(); ?></td>
            <td><?php echo $vehicule->getModele(); ?></td>
            <td><?php echo $vehicule->getPrix(); ?></td>
            <td><?php echo $vehicule->getDisponibilite(); ?></td>
            <td><?php echo $vehicule->getCategorieId(); ?></td>
            <td>
                <form method="post" action="manage_vehicules.php">
                    <input type="hidden" name="vehicule_id" value="<?php echo $vehicule->getId(); ?>">
                    <input type="hidden" name="action" value="edit">
                    <button type="submit">Edit</button>
                </form>
                <form method="post" action="manage_vehicules.php">
                    <input type="hidden" name="vehicule_id" value="<?php echo $vehicule->getId(); ?>">
                    <input type="hidden" name="action" value="delete">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>