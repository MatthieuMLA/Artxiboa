<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/home.css">
        <title>Visualisation de fichier</title>
    </head>
    <body>
        
        <!-- PHP only used to display stuff -->
        <?php include_header_home(); ?>
        
        <?php include_menubar(); ?>
        
        <?php $newFile=$File['file']; ?>

        <?php $newFile=$newFile[0]; ?>
        <form method='post' action='gestionModificationController.php'>
        <table>
            <tr>
                <td>Identifiant du fichier</td>
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
        <button class='enregistrerChangement'>Enregistrer les changements et envoyer à valider</button>
        </form>
        <?php include_footer(); ?>

    </body>
</html>