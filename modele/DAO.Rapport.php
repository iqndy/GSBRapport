<?php

include_once 'bd.inc.php';
include_once 'DAO.Medecin.php';
class DAORapport {

    private $conn;

    public function __construct() {
        $pdo = new Database();
        $this->conn = $pdo->getConnexion();
    }
    

    public function ajouterRapport($dates, $motif, $bilan, $medecin_id, $visiteur_id) {
        try {


            $req = $this->conn->prepare("INSERT INTO rapport (dates, motif, bilan, medecin_id, visiteur_id) 
                                         VALUES (:dates, :motif, :bilan, :medecin_id, :visiteur_id)");
            $req->bindValue(':dates', $dates, PDO::PARAM_STR);
            $req->bindValue(':motif', $motif, PDO::PARAM_STR);
            $req->bindValue(':bilan', $bilan, PDO::PARAM_STR);
            $req->bindValue(':medecin_id', $medecin_id, PDO::PARAM_INT);
            $req->bindValue(':visiteur_id', $visiteur_id, PDO::PARAM_INT);

            $resultat = $req->execute();
            return $resultat;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function getRapportsByVisiteur($visiteur_id) {
        try {
            $req = $this->conn->prepare("SELECT * FROM rapport WHERE visiteur_id = :visiteur_id");
            $req->bindValue(':visiteur_id', $visiteur_id, PDO::PARAM_INT);
            $req->execute();
            $resultats = $req->fetchAll(PDO::FETCH_ASSOC);
            return $resultats;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }


    public function getRapportsById($id) {
        try {
            $req = $this->conn->prepare("SELECT * FROM rapport WHERE id = :id");
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->execute();
            $resultats = $req->fetchAll(PDO::FETCH_ASSOC);
            return $resultats;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
    
    public function modifierRapport($id, $dates, $motif, $bilan, $medecin_id) {
        try {
            $req = $this->conn->prepare("UPDATE rapport SET dates = :dates, motif = :motif, bilan = :bilan, medecin_id = :medecin_id WHERE id = :id");
            $req->bindValue(':dates', $dates, PDO::PARAM_STR);
            $req->bindValue(':motif', $motif, PDO::PARAM_STR);
            $req->bindValue(':bilan', $bilan, PDO::PARAM_STR);
            $req->bindValue(':medecin_id', $medecin_id, PDO::PARAM_INT);
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $resultat = $req->execute();
            return $resultat;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
}


?>
