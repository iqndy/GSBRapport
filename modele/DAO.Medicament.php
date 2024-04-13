<?php

include_once 'bd.inc.php';

class DAOMedicament
{

    private $conn;

    public function __construct()
    {
        $pdo = new Database();
        $this->conn = $pdo->getConnexion();
    }

    public function getMedicaments()
    {
        try {
            $req = $this->conn->prepare("SELECT * FROM medicament");
            $req->execute();
            $resultats = $req->fetchAll(PDO::FETCH_ASSOC);
            return $resultats;
        } catch (PDOException $e) {
            var_dump("Erreur lors de la récupération des médicaments : " . $e->getMessage());
            die();
        }
    }
}
