<?php
include_once "./getRacine.php";
include_once "$racine/modele/DAO.Rapport.php";
include_once "$racine/modele/DAO.Authentification.php";
include_once "$racine/modele/DAO.Medecin.php";

$DAOrapport = new DAORapport();
$DAOauthentification = new DAOAuthentification();
$Modification = false;
$DAOmedecin = new DAOMedecin();

$medecins = $DAOmedecin->getMedecins();

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id_rapport = $_GET['id'];
    $rapport = $DAOrapport->getRapportsById($id_rapport);
    if($rapport[0]){
        $dates = $rapport[0]['dates'];
        $motif = $rapport[0]['motif'];
        $bilan = $rapport[0]['bilan'];
        $medecinId = $rapport[0]['medecin_id'];
    }

}

// Vérifier si le formulaire de modification a été soumis
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'ModifierRapport') {
    // Récupérer les données du formulaire
    $medecinId = $_POST['medecin'];
    $dates = $_POST['dates'];
    $motif = $_POST['motif'];
    $bilan = $_POST['bilan'];

    // Modifier le rapport dans la base de données
    $Modification = $DAOrapport->modifierRapport($id_rapport, $dates, $motif, $bilan, $medecinId);

}

// Inclure la vue appropriée en fonction du résultat de la modification
if ($Modification) {
    include "$racine/vue/vueModificationConfirmee.php";
} else {
    session_start();
    if (!$DAOauthentification->isLoggedOn()) {
        // L'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
        header("Location: ./?action=Connexion");
        exit();
    }
    // Inclure la vue de modification de rapport avec les données récupérées
    include "$racine/vue/vueModifierRapport.php";
}
?>
