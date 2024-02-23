<?php
    // do all necessary includes first
    // __DIR__ allows you to use relative paths explicitly
    // here, the file is in the same folder as the includes.php file (view/)
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/home.css">
        <title>Artxiboa - Gestion</title>
    </head>
    <body>
        
        <!-- Vue annexe utiliser pour construire d'autres vues - pas utilisé actuellement -->
        <?php include_header_home(); ?>
        <?php include_menubar(); ?>
        <?php 
        echo"Modification";
        print_r($FILES_MODIFICATION);
        echo"Refused";
        print_r($FILES_REFUSED);
        echo"Archive";
        print_r($FILES_ARCHIVED);
        ?>
        
        <?php 
            // Si il y a une erreur
            if (isset($something_to_say)) {
                include_error_message($something_to_say);
            }
        ?>

        <?php include_footer(); ?>

    </body>
</html>