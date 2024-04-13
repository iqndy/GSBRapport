<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/global.css">
    <title>Mes Rapports</title>
</head>
<body>
    <h1>Mes Rapports</h1>

    <?php
    if (!empty($rapports)) {
        echo '<div class="table-container">';
        echo '<table class="custom-table">';
        echo '<tr>';
        $champs = array_keys($rapports[0]);

        // Supprimer la colonne "visiteur_id" et renommer "medecin_id" en "medecin"
        $champs = array_diff($champs, array('visiteur_id','id'));
        $champs = array_map(function($champ) {
            return ($champ === 'medecin_id') ? 'medecin' : $champ;
        }, $champs);

        foreach ($champs as $champ) {
            echo '<th>' . ucfirst($champ) . '</th>'; // ucfirst pour mettre la première lettre en majuscule
        }

        echo '<th>Actions</th>';
        echo '</tr>';

        foreach ($rapports as $rapport) {
            echo '<tr>';
            foreach ($champs as $champ) {
                echo '<td>';
                
                if ($champ === "medecin") {
                    // Traitement spécial pour le champ "medecin"
                    $nomMedecin = $DAOmedecin->getNomMedecinById($rapport['medecin_id']);
                    echo $nomMedecin["Prenom"] . " " . $nomMedecin["nom"];
                } else {
                    echo $rapport[$champ];
                }
        
                echo '</td>';
            }
            
            // Ajouter une colonne Actions avec des liens vers les pages d'édition
            echo '<td>';
            echo '<a href="./?action=ModifierRapport&id=' . $rapport['id'] . '">Modifier</a>';
            echo '</td>';
            echo '</tr>';
            
        }

        echo '</table>';
        echo '</div>';
    } else {
        echo 'Aucun rapport trouvé.';
    }
    ?>

</body>
</html>

