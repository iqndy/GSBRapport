<?php

include_once 'bd.inc.php';

class DAOVisiteur {

    private $conn;

    public function __construct() {
        $pdo = new Database();
        $this->conn = $pdo->getConnexion();
    }

    public function getVisiteurs() {
        $resultat = array();

        try {

            $req = $this->conn->prepare("select * from Visiteur");
            $req->execute();

            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function getMdp() {
        $resultat = array();

        try {

            $req = $this->conn->prepare("select MotDePasse from Visiteur");
            $req->execute();

            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function addUtilisateur($nom, $login, $prenom, $adresse, $cp, $ville, $dateEmbauche, $MotDePasse, $mail) {

        try {
            $req = $this->conn->prepare("INSERT INTO visiteur (`nom`, `login`, `prenom`, `adresse`, `cp`, `ville`, `dateEmbauche`, `MotDePasse`, `mail`) VALUES (:nom, :login, :prenom, :adresse, :cp, :ville, :dateEmbauche, :MotDePasse, :mail)");

            $req->bindValue(':nom', $nom, PDO::PARAM_STR);
            $req->bindValue(':login', $login, PDO::PARAM_STR); // Correction ici
            $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $req->bindValue(':mail', $mail, PDO::PARAM_STR);
            $hashedPassword = password_hash($MotDePasse, PASSWORD_DEFAULT); // Hashage du mot de passe
            $req->bindValue(':MotDePasse', $hashedPassword, PDO::PARAM_STR);
            $req->bindValue(':adresse', $adresse, PDO::PARAM_STR);
            $req->bindValue(':cp', $cp, PDO::PARAM_STR);
            $req->bindValue(':ville', $ville, PDO::PARAM_STR);
            $req->bindValue(':dateEmbauche', $dateEmbauche, PDO::PARAM_STR);

            $resultat = $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function getVisiteurBymail($mail) {
        try {
            $req = $this->conn->prepare("SELECT * FROM visiteur WHERE mail = :mail");
            $req->bindValue(':mail', $mail, PDO::PARAM_STR);
            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
           // var_dump($resultat); // Affiche le tableau complet récupéré depuis la base de données
        } catch (Exception $ex) {
            print "Erreur !: " . $ex->getMessage();
            die();
        }
        return $resultat;
    }

    public function getVisiteurMdp($mail) {
        try {
            $req = $this->conn->prepare("SELECT MotDePasse FROM visiteur WHERE mail = :mail");
            $req->bindValue(':mail', $mail, PDO::PARAM_STR);
            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
// Après la récupération du mot de passe
        } catch (Exception $ex) {
            print "Erreur !: " . $ex->getMessage();
            die();
        }
        return $resultat;
    }


    public function getNomVisiteurById($id) {
        try {
            $req = $this->conn->prepare("SELECT Prenom, nom FROM visiteur WHERE id = :id");
            $req->bindValue(':id', $id, PDO::PARAM_STR);
            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $ex) {
            print "Erreur !: " . $ex->getMessage();
            die();
        }
        return $resultat;
       
    }

    public function isLoginExists($login) {
        try {
            $req = $this->conn->prepare("SELECT COUNT(*) FROM visiteur WHERE login = :login");
            $req->bindValue(':login', $login, PDO::PARAM_STR);
            $req->execute();
            $count = $req->fetchColumn();
            return $count > 0;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function isMailExists($mail) {
        try {
            $req = $this->conn->prepare("SELECT COUNT(*) FROM visiteur WHERE mail = :mail");
            $req->bindValue(':mail', $mail, PDO::PARAM_STR);
            $req->execute();
            $count = $req->fetchColumn();
            return $count > 0;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }


}

