<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/home.css">
        <title>Visualisation de fichier</title>
    </head>
    <body>

        <?php include_header_home(); ?>
        
        <?php include_menubar(); ?>
        
        <?php $newFile=$File['file']; ?>

        <?php $newFile=$newFile[0]; ?>

        <!-- Formulaire qui peut être modifié (textarea) et qui renvoi les informations pertinentes du document (hidden) -->
        <form method='post' action='gestionValidationController.php'>
        <table>
            <tr>
                <td>Identifiant du fichier à Valider</td>
                <td><?php print_r($newFile['Id']); ?></td>
                <input type="text" id="IdFile" name="IdFile" value=<?php echo $newFile['Id'];?> hidden>
            </tr>
            <tr>
                <td>Titre du fichier</td>
                <td><?php print_r($newFile['Titre']); ?></td>
                <input type="text" id="TitreFile" name="TitreFile" value=<?php echo $newFile['Titre'];?> hidden>
            </tr>
            <tr>
                <td>Type de fichier</td>
                <td><?php print_r($newFile['Type']); ?></td>
                <input type="text" id="TypeFile" name="TypeFile" value=<?php echo $newFile['Type'];?> hidden>
            </tr>
            <tr>
                <td>Contenu du fichier</td>
                <td><textarea name="ContenuFile" id="ContenuFile" cols="30" rows="10" required><?php print_r($newFile['Contenu']); ?></textarea></td>
            </tr>
            <tr>
                <td>Date de création du fichier</td>
                <td><?php print_r($newFile['Date_creation']); ?></td>
            </tr>
        </table>
        <!-- Permet de soit Valider (et modifier) ou Refuser (et modifier) le fichier en jouant sur la valeur du bouton -->
        <button class='enregistrerChangement' id="Valider" name="Valider" value='true'>Valider et archiver le fichier</button>
        <button class='enregistrerChangement' id="Valider" name="Valider" value='false'>Refuser le fichier</button>
        </form>
        <?php include_footer(); ?>

    </body>
</html>