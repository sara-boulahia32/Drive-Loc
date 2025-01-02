<?php
class Vehicule {
    private $id;
    private $modele;
    private $prix;
    private $disponibilite;
    private $categorie_id;
    private $image_path;

    public function __construct($modele, $prix, $disponibilite, $categorie_id, $image_path) {
        $this->modele = $modele;
        $this->prix = $prix;
        $this->disponibilite = $disponibilite;
        $this->categorie_id = $categorie_id;
        $this->image_path = $image_path;
    }

    public function getId() { return $this->id; }
    public function getModele() { return $this->modele; }
    public function getPrix() { return $this->prix; }
    public function getDisponibilite() { return $this->disponibilite; }
    public function getCategorieId() { return $this->categorie_id; }
    public function getImage() { return $this->image_path; }

    public function setId($id) { $this->id = $id; }

    public static function getAllVehicules($db) {
        $vehicules = [];
        $query = "SELECT * FROM vehicules";
        $stmt = $db->prepare($query);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $vehicule = new Vehicule(
                $row['modele'],
                $row['prix'],
                $row['disponibilite'],
                $row['categorie_id'],
                $row['image_path']
            );
            $vehicule->setId($row['id']);
            $vehicules[] = $vehicule;
        }
        return $vehicules;
    }

    public static function getVehiculeById($db, $id) {
        $query = "SELECT * FROM vehicules WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $vehicule = new Vehicule(
                $row['modele'],
                $row['prix'],
                $row['disponibilite'],
                $row['categorie_id'],
                $row['image_path']

            );
            $vehicule->setId($row['id']);
            return $vehicule;
        }
        return null;
    }
}
?>
