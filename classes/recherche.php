<?php
class Recherche {
    public static function rechercherVehicules($db, $critere) {
        $query = "SELECT * FROM vehicules WHERE modele LIKE :critere OR caracteristiques LIKE :critere";
        $stmt = $db->prepare($query);
        $critere = "%$critere%";
        $stmt->bindParam(':critere', $critere);
        $stmt->execute();
        $vehicules = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $vehicules[] = new Vehicule(
                $row['modele'],
                $row['prix'],
                $row['disponibilite'],
                $row['categorie_id']
            );
        }
        return $vehicules;
    }

    public static function filtrerVehiculesParCategorie($db, $categorie_id) {
        $query = "SELECT * FROM vehicules WHERE categorie_id = :categorie_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':categorie_id', $categorie_id);
        $stmt->execute();
        $vehicules = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $vehicules[] = new Vehicule(
                $row['modele'],
                $row['prix'],
                $row['disponibilite'],
                $row['categorie_id']
            );
        }
        return $vehicules;
    }
}
?>
