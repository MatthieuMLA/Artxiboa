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

        <!-- Homogénéiser l'affichage des fichiers ici utilisé pour les fichiers de l'accueil et l'archivage -->
        <table>
            <tr>
                <td>Identifiant du fichier</td>
                <td><?php print_r($newFile['Id']); ?></td>
            </tr>
            <tr>
                <td>Titre du fichier</td>
                <td><?php print_r($newFile['Titre']); ?></td>
            </tr>
            <tr>
                <td>Type de fichier</td>
                <td><?php print_r($newFile['Type']); ?></td>
            </tr>
            <tr>
                <td>Contenu du fichier</td>
                <td><textarea name="ContenuFile" id="ContenuFile" cols="30" rows="10" disabled><?php print_r($newFile['Contenu']); ?></textarea></td>
            </tr>
            <tr>
                <td>Date de création du fichier</td>
                <td><?php print_r($newFile['Date_creation']); ?></td>
            </tr>
        </table>
        <?php include_footer(); ?>

    </body>
</html>