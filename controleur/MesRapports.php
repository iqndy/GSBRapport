<?php 
include_once "./getRacine.php";
include_once "$racine/modele/DAO.Rapport.php";
include_once "$racine/modele/DAO.Medecin.php";
include_once "$racine/modele/DAO.Visiteur.php";


$DAOvisiteur= new DAOvisiteur();
$DAOmedecin = new DAOMedecin();
$DAOrapport= new DAORapport();

session_start();

$rapports = $DAOrapport->getRapportsByVisiteur($_SESSION["idV"]);
$nomMedecins = $DAOmedecin->getNomMedecinById($_SESSION["idV"]);
$nomVisiteurs= $DAOvisiteur->getNomVisiteurById($_SESSION["idV"]);



include_once "$racine/vue/vueVoirRapport.php";
?>


