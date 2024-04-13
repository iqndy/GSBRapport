<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/global.css">
    <title>Modifier Rapport</title>
</head>
<body>
    <header>
        <h1>Modifier Rapport</h1>
    </header>

    <main>
    <form class="form-container" method="post" action="./?action=ModifierRapport&id=<?= $id_rapport ?>">




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
                <input type="date" id="dates" name="dates" value="<?= $dates ?>" required />
            </div>

            <div class="form-group">
                <label for="motif">Motif :</label>
                <input type="text" id="motif" name="motif" value="<?= $motif; ?>" required />
            </div>

            <div class="form-group">
    <label for="bilan">Bilan :</label>
    <textarea id="bilan" name="bilan" rows="4" required><?= $bilan ?></textarea>
</div>


            <div class="button">
                <input type="submit" value="Modifier">
            </div>
            <input type="hidden" name="id_rapport" value="<?= $id_rapport ?>">
        </form>
    </main>
</body>
</html>


