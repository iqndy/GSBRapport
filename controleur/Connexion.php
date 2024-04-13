<?php

include "./getRacine.php";
include "$racine/vue/vueConnexion.php";
include "$racine/modele/DAO.Authentification.php";

$DAOauthentification = new DAOAuthentification();

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action == 'Connexion') {
        $mail = $_POST["mail"];
        $MotDePasse = $_POST["MotDePasse"];

        // Appelle la méthode login sur l'instance d'Authentification
        $DAOauthentification->login($mail, $MotDePasse);

       
        // Redirige vers la page d'accueil ou autre après la connexion réussie
        if ($DAOauthentification->isLoggedOn()) {
            header("Location: ./?action=Profil");
            exit();
        } else {
            // Affiche un message d'erreur si la connexion échoue
            echo "Identifiants incorrects.";
        }
    }
}
?>
