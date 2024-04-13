<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
    <link rel="stylesheet" href="./css/global.css">
</head>
<body>
    <header>
        <h1>Mon Profil</h1>
        <nav>
            <a href="./?action=CRapport">Créer un rapport</a>
            <a href="./?action=MesRapports">Mes Rapports</a>
            <a href="./?action=logout">Déconnexion</a>
        </nav>
    </header>

    <div class="main-content">
        <?php
        session_start();

        if (isset($_SESSION["prenomV"]) && isset($_SESSION["nomV"])) {
            $prenomV = $_SESSION["prenomV"]; 
            $nomV = $_SESSION["nomV"];
            echo "<p>Bonjour $prenomV $nomV, bienvenue sur votre profil</p>";
        }
        ?>
    </div>

    <footer>
        <!-- Pied de page -->
    </footer>
</body>
</html>

