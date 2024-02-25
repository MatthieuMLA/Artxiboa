<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/home.css">
        <title>File Visualization</title>
    </head>
    <body>
        <?php include_header_home(); ?>
        <?php include_menubar(); ?>

        <!-- Se ramener à un array et pas des arrays dans des arrays -->
        <?php $newFile = $File['file'][0]; ?>

        <!-- Formulaire qui peut être modifié (textarea) et qui renvoi les informations pertinentes du document (hidden) -->
        <form method='post' action='gestionModificationController.php'>
            <table>
                <tr>
                    <td>Identifiant du fichier</td>
                    <td><?php print_r($newFile['Id']); ?><input type="text" id="IdFile" name="IdFile" value=<?php echo htmlspecialchars($newFile['Id']);?> hidden></td>
                </tr>
                <tr>
                    <td>Titre du fichier</td>
                    <td><?php print_r($newFile['Titre']); ?><input type="text" id="TitreFile" name="TitreFile" value=<?php echo $newFile['Titre'];?> hidden></td>
                </tr>
                <tr>
                    <td>Type de fichier</td>
                    <td><?php print_r($newFile['Type']); ?><input type="text" id="TypeFile" name="TypeFile" value=<?php echo htmlspecialchars($newFile['Type']);?> hidden></td>
                </tr>
                <tr>
                    <td>Contenu du fichier</td>
                    <td><textarea name="ContenuFile" id="ContenuFile" cols="30" rows="10" required><?php echo htmlspecialchars($newFile['Contenu']); ?></textarea></td>
                </tr>
                <tr>
                    <td>Date de création du fichier</td>
                    <td><?php echo htmlspecialchars($newFile['Date_creation']); ?></td>
                </tr>
            </table>
            <button class='enregistrerChangement'>Enregistrer les changements et envoyer à valider</button>
        </form>

        <?php include_footer(); ?>

    </body>
</html>