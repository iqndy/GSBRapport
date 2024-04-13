<?php

include_once "./getRacine.php";
include_once "$racine/modele/DAO.Visiteur.php";

$controleurPrincipal = new ControleurPrincipal();
$inscrit = false;

$erreurLogin = $erreurMail = "";

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    if ($action == 'Inscription') {
        $login = $_POST["login"];
        $prenom = $_POST["prenom"];
        $nom = $_POST["nom"];
        $mail = $_POST["mail"];
        $MotDePasse = $_POST["MotDePasse"];
        $adresse = $_POST["adresse"];
        $cp = $_POST["cp"];
        $ville = $_POST["ville"];
        $dateEmbauche = $_POST["dateEmbauche"];

        // Vérifier si le login existe déjà
        $visiteur = new DAOVisiteur();
        if ($visiteur->isLoginExists($login)) {
            $erreurLogin = "Le login existe déjà dans la base de données.";
        }

        // Vérifier si le mail existe déjà
        if ($visiteur->isMailExists($mail)) {
            $erreurMail = "L'adresse e-mail existe déjà dans la base de données.";
        }

        // Si aucune erreur, procéder à l'ajout de l'utilisateur
        if (empty($erreurLogin) && empty($erreurMail)) {
            $ret = $visiteur->addUtilisateur($nom, $login, $prenom, $adresse, $cp, $ville, $dateEmbauche, $MotDePasse, $mail);
            if ($ret) {
                $inscrit = true;
            } else {
                echo "L'utilisateur n'a pas été enregistré.";
            }
        }
    }
}

if ($inscrit) {
    include "$racine/vue/vueConfirmationInscription.php";
} else {
    include "$racine/vue/vueInscription.php";
}
