<?php
class Vehicule {
    private $id;
    private $modele;
    private $prix;
    private $disponibilite;
    private $categorie_id;

    public function __construct($modele, $prix, $disponibilite, $categorie_id) {
        $this->modele = $modele;
        $this->prix = $prix;
        $this->disponibilite = $disponibilite;
        $this->categorie_id = $categorie_id;
    }

    public function getId() { return $this->id; }
    public function getModele() { return $this->modele; }
    public function getPrix() { return $this->prix; }
    public function getDisponibilite() { return $this->disponibilite; }
    public function getCategorieId() { return $this->categorie_id; }

    public function save($db) {
        $query = "INSERT INTO vehicules (modele, prix, disponibilite, categorie_id) VALUES (:modele, :prix, :disponibilite, :categorie_id)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':modele', $this->modele);
        $stmt->bindParam(':prix', $this->prix);
        $stmt->bindParam(':disponibilite', $this->disponibilite);
        $stmt->bindParam(':categorie_id', $this->categorie_id);
        $stmt->execute();
        $this->id = $db->lastInsertId();
    }
}
?>
