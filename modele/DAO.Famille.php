<?php

include_once 'bd.inc.php';

class DAOFamille
{

    private $conn;

    public function __construct()
    {
        $pdo = new Database();
        $this->conn = $pdo->getConnexion();
    }

    public function getFamilles()
    {
        try {
            $req = $this->conn->prepare("SELECT * FROM famille");
            $req->execute();
            $resultats = $req->fetchAll(PDO::FETCH_ASSOC);
            return $resultats;
        } catch (PDOException $e) {
            var_dump("Erreur lors de la récupération des familles : " . $e->getMessage());
            die();
        }
    }
}