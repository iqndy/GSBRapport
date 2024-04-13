<?php

class ControleurPrincipal {

    private $actions;

    public function __construct() {
        $this->actions = array();
        $this->actions["defaut"] = "Accueil.php";
        $this->actions["Inscription"] = "Inscription.php";
        $this->actions["Connexion"] = "Connexion.php";
        $this->actions["ConfirmationInscription"] = "ConfirmationInscription.php";
        $this->actions["Profil"] = "Profil.php";
        $this->actions["CRapport"] = "CRapport.php";
        $this->actions["logout"] = "logout.php";
        $this->actions["MesRapports"] = "MesRapports.php";
        $this->actions["ModifierRapport"] = "ModifierRapport.php";

    }

    public function executerAction($action) {
        if (array_key_exists($action, $this->actions)) {
            return $this->actions[$action];
        } else {
            return $this->actions["defaut"];
        }
    }

}
