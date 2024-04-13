<?php

include "./getRacine.php";
include "$racine/vue/vueMonProfil.php";
include "$racine/modele/DAO.Authentification.php";




$DAOauthentification = new DAOAuthentification();

if (!$DAOauthentification->isLoggedOn()) {

    // L'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
    header("Location: ./?action=Connexion");
    exit();
}
