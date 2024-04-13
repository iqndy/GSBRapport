<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="./css/global.css">
</head>
<body>
    <h1>Inscription</h1>
    <p>Veuillez vous inscrire</p>
    
    <form method="post" action="./?action=Inscription" onsubmit="return validateForm()">
        <ul class="form-container">
            <li class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required />
            </li>
            <li class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required />
            </li>
            <li class="form-group">
                <label for="login">Login :</label>
                <input type="text" id="login" name="login" required />
                <span class="erreur"><?php echo $erreurLogin; ?></span>
            </li>
            <li class="form-group">
                <label for="mail">Mail :</label>
                <input type="email" id="mail" name="mail" required />
                <span class="erreur"><?php echo $erreurMail; ?></span>
            </li>
            <li class="form-group">
                <label for="MotDePasse">Mot de passe :</label>
                <input type="password" id="MotDePasse" name="MotDePasse" required />
            </li>
            <li class="form-group">
                <label for="ConfirmerMotDePasse">Confirmer le mot de passe :</label>
                <input type="password" id="ConfirmerMotDePasse" name="ConfirmerMotDePasse" required />
            </li>
            <li class="form-group">
                <label for="adresse">Adresse :</label>
                <input type="text" id="adresse" name="adresse" required />
            </li>
            <li class="form-group">
                <label for="cp">Code postal :</label>
                <input type="number" id="cp" name="cp" required />
            </li>
            <li class="form-group">
                <label for="ville">Ville :</label>
                <input type="text" id="ville" name="ville" required />
            </li>
            <li class="form-group">
                <label for="dateEmbauche">Date d'embauche :</label>
                <input type="date" id="dateEmbauche" name="dateEmbauche" required />
            </li>
            <li class="form-group password-section">
                <input type="checkbox" id="togglePassword" onchange="togglePasswordVisibility()">
                <label for="togglePassword">Afficher le mot de passe</label>
            </li>
            <li class="form-group button">
                <input type="submit" value='Inscription'>
            </li>
        </ul>
    </form>

    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("MotDePasse");
            var confirmPasswordField = document.getElementById("ConfirmerMotDePasse");

            passwordField.type = (passwordField.type === "password") ? "text" : "password";
            confirmPasswordField.type = (confirmPasswordField.type === "password") ? "text" : "password";
        }

        function validateForm() {
            var password = document.getElementById("MotDePasse").value;
            var confirmPassword = document.getElementById("ConfirmerMotDePasse").value;

            if (password !== confirmPassword) {
                alert("Les mots de passe ne correspondent pas");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
