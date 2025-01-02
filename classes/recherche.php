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
                $row['marque'],
                $row['categorie_id'],
                $row['description'],
                $row['prix'],
                $row['disponibilite'],
                $row['annee_fabrication'],
                $row['kilometrage'],
                $row['type_carburant'],
                $row['boite_vitesse'],
                $row['puissance_moteur'],
                $row['couleur'],
                $row['equipements_standards'],
                $row['options_supplementaires'],
                $row['dates_disponibles'],
                $row['lieu_prise_en_charge'],
                $row['lieu_retour'],
                $row['image_path']
                
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
                $row['marque'],
                $row['categorie_id'],
                $row['description'],
                $row['prix'],
                $row['disponibilite'],
                $row['annee_fabrication'],
                $row['kilometrage'],
                $row['type_carburant'],
                $row['boite_vitesse'],
                $row['puissance_moteur'],
                $row['couleur'],
                $row['equipements_standards'],
                $row['options_supplementaires'],
                $row['dates_disponibles'],
                $row['lieu_prise_en_charge'],
                $row['lieu_retour'],
                $row['image_path']
            );
        }
        return $vehicules;
    }
}
?>
