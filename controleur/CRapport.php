<?php
include_once "./getRacine.php";
include_once "$racine/modele/DAO.Rapport.php";
include_once "$racine/modele/DAO.Authentification.php";
include_once "$racine/modele/DAO.Medecin.php";
$DAOrapport = new DAORapport();
$DAOauthentification = new DAOAuthentification();
$creation = false;
$DAOmedecin= new DAOMedecin();


// Si le formulaire est soumis
if (isset($_POST['action']) && $_POST['action'] === 'CRapport') {
    // Démarrer la session
    session_start();

    // Récupérer l'ID du visiteur à partir de la session
    $visiteurId = isset($_SESSION['idV']) ? $_SESSION['idV'] : null;


    // Vérifier si l'ID du visiteur est valide
    if ($visiteurId === null) {
        // Rediriger ou afficher un message d'erreur, car l'ID du visiteur n'est pas valide
        exit("Erreur: ID du visiteur non valide.");
    }

    // Récupérer les données du formulaire
    $medecinId = $_POST['medecin'];
    $dates = $_POST['dates'];
    $motif = $_POST['motif'];
    $bilan = $_POST['bilan'];



    // Ajouter le rapport à la base de données
    $ret =  $DAOrapport->ajouterRapport($dates, $motif, $bilan, $medecinId, $visiteurId);

    if ($ret) {

        $creation = true;
    }

    // Rediriger ou afficher un message de succès, etc.
}

// Récupérer la liste des médecins
$medecins = $DAOmedecin->getMedecins();
// Inclure la vue



if ($creation) {
    include "$racine/vue/vueCreationRapport.php";
} else {
    session_start();
if (!$DAOauthentification->isLoggedOn()) {

    // L'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
    header("Location: ./?action=Connexion");
    exit();
}
    include "$racine/vue/vueCreerRapport.php";
}
