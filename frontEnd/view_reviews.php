<?php
session_start();
require_once('../database/db.php');
require_once('../classes/avis.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$db = dataBase::getInstance()->getConnection();
$avisList = Avis::getAllAvis($db);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Reviews</title>
</head>
<body>
    <h2>View Reviews</h2>
    <table border="1">
        <tr>
            <th>Reservation ID</th>
            <th>User ID</th>
            <th>Vehicule ID</th>
            <th>Note</th>
            <th>Commentaire</th>
            <th>Created At</th>
        </tr>
        <?php foreach ($avisList as $avis) { ?>
        <tr>
            <td><?php echo $avis->getReservationId(); ?></td>
            <td><?php echo $avis->getUserId(); ?></td>
            <td><?php echo $avis->getVehiculeId(); ?></td>
            <td><?php echo $avis->getNote(); ?></td>
            <td><?php echo $avis->getCommentaire(); ?></td>
            <td><?php echo $avis->getCreatedAt(); ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
