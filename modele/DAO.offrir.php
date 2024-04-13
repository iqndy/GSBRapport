<?php

include_once 'bd.inc.php';

class DAOOffrir
{

    private $conn;

    public function __construct()
    {
        $pdo = new Database();
        $this->conn = $pdo->getConnexion();
    }

    public function ajouterOffrir($medicament_id, $rapport_id, $quantite) {
        try {
            $req = $this->conn->prepare("INSERT INTO offrir (medicament_id, rapport_id, quantite) 
                                         VALUES (:medicament_id, :rapport_id, :quantite)");
            $req->bindValue(':medicament_id', $medicament_id, PDO::PARAM_INT);
            $req->bindValue(':rapport_id', $rapport_id, PDO::PARAM_INT);
            $req->bindValue(':quantite', $quantite, PDO::PARAM_INT);
            $resultat = $req->execute();
            return $resultat;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

}