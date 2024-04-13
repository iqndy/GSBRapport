<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="./css/global.css">
    <style>
 
    </style>
</head>
<body>
    <header>
        <h1>Connexion</h1>
        <p>Veuillez vous connecter.</p>
        <nav>
            <ul>
                <li><a href="./?action=defaut">Accueil</a></li>
            </ul>
        </nav>
    </header>

    <form class="form-container" method="post" action="./?action=Connexion">
        <ul>
            <li>
                <label for="mail">Mail :</label>
                <input type="email" id="mail" name="mail" required />
            </li>
            <li>
                <label for="MotDePasse">Mot de passe :</label>
                <input type="password" id="MotDePasse" name="MotDePasse" required />
            </li>
        </ul>
        <div class="button">
            <input type="submit" name="action" value="Connexion">
        </div>
    </form>

    <footer>
        <!-- Pied de page -->
    </footer>
</body>
</html>
