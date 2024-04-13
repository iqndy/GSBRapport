<?php
include "./getRacine.php";
include "$racine/modele/DAO.Authentification.php";

$deco = new DAOAuthentification;

$deco->logout();

header("Location: ./?action=Connexion");
print "vous avez bien été déconnecté";
exit();
