<?php

include_once 'bd.inc.php';

class DAOMedecin
{

    private $conn;

    public function __construct()
    {
        $pdo = new Database();
        $this->conn = $pdo->getConnexion();
    }

    public function getMedecins()
    {
        try {
            $req = $this->conn->prepare("SELECT id, nom, prenom FROM medecin");
            $req->execute();
            $resultats = $req->fetchAll(PDO::FETCH_ASSOC);
            return $resultats;
        } catch (PDOException $e) {
            var_dump("Erreur lors de la récupération des médecins : " . $e->getMessage());
            die();
        }
    }


    public function getNomMedecinById($id) {
        try {
            $req = $this->conn->prepare("SELECT Prenom, nom FROM medecin WHERE id = :id");
            $req->bindValue(':id', $id, PDO::PARAM_STR);
            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
// Après la récupération du mot de passe
        } catch (Exception $ex) {
            print "Erreur !: " . $ex->getMessage();
            die();
        }
        return $resultat;
    }
  
}
