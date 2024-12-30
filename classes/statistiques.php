<?php
class Statistiques {
    private $total_clients;
    private $total_reservations;
    private $reservations_approuvees;
    private $reservations_en_attente;
    private $reservations_refusees;

    public function __construct($total_clients, $total_reservations, $reservations_approuvees, $reservations_en_attente, $reservations_refusees) {
        $this->total_clients = $total_clients;
        $this->total_reservations = $total_reservations;
        $this->reservations_approuvees = $reservations_approuvees;
        $this->reservations_en_attente = $reservations_en_attente;
        $this->reservations_refusees = $reservations_refusees;
    }

    public static function getStatistiques($db) {
        $query = "SELECT * FROM statistiques";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Statistiques(
            $row['total_clients'],
            $row['total_reservations'],
            $row['reservations_approuvees'],
            $row['reservations_en_attente'],
            $row['reservations_refusees']
        );
    }
}
?>
