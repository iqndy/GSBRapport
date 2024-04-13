<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/global.css">
    <title>Créer un Rapport</title>
</head>
<body>
    <header>
        <h1>Créer un Rapport</h1>
    </header>

    <main>
        <form class="form-container" method="post" action="./?action=CRapport">
            <div class="form-group">
                <label for="medecin">Médecin :</label>
                <select id="medecin" name="medecin" required>
                    <?php
                    // Utilisez la liste des médecins récupérée du contrôleur
                    foreach ($medecins as $medecin) {
                        echo '<option value="' . $medecin['id'] . '">' . $medecin['prenom'] . ' ' . $medecin['nom'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="dates">Date :</label>
                <input type="date" id="dates" name="dates" required />
            </div>

            <div class="form-group">
                <label for="motif">Motif :</label>
                <input type="text" id="motif" name="motif" required />
            </div>

            <div class="form-group">
                <label for="bilan">Bilan :</label>
                <textarea id="bilan" name="bilan" rows="4" required></textarea>
            </div>

            <div class="button">
                <input type="submit" name="action" value="CRapport">
            </div>
        </form>
    </main>
</body>
</html>
