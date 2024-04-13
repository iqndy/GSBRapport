<?php

include_once 'DAO.visiteur.php';

class DAOAuthentification {

    private $req;

    public function __construct() {
        $this->req = new DAOVisiteur();
    }

    public function login($mail, $MotDePasse) {
        if (session_status() == PHP_SESSION_NONE) {
   
            session_start();
          
        }
    
        $visiteur = $this->req->getVisiteurBymail($mail);
    
        if ($visiteur && is_array($visiteur)) {
            if (password_verify($MotDePasse, $visiteur["MotDePasse"])) {
                $_SESSION["idV"] = $visiteur["id"];
                $_SESSION["mailV"] = $mail;
                $_SESSION["MotDePasseV"] = $visiteur["MotDePasse"];
                $_SESSION["prenomV"] = $visiteur["prenom"];
                $_SESSION["nomV"] = $visiteur["nom"];
            } else {
                // Mot de passe incorrect
                echo "Mot de passe incorrect ou Adresse e-mail non trouvée.";
                exit();
            }
        } else {
            // Adresse e-mail non trouvée
            echo "Adresse e-mail non trouvée.";
            exit();
        }
    }
    

    public function getLoggedOn() {
        return isset($_SESSION["mailV"]);
    }

    public function isLoggedOn() {
        if (isset($_SESSION["mailV"])) {
            $visiteur = $this->req->getVisiteurBymail($_SESSION["mailV"]);

            if ($visiteur && isset($visiteur['MotDePasse']) && $visiteur['MotDePasse'] == $_SESSION["MotDePasseV"]) {
                return true;
            }
        }

        return false;
    }
    

    public function logout() {
        session_start();
        session_destroy(); // Détruit complètement la session
    }
}

?>
