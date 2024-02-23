<!-- 
    Example HTML file to showcase a simple login form which uses
        - a php controller script (logic-related aspects) that calls a php model script (data-related aspects)
        - a php view script (UI-related aspects)

* @author: w.delamare
* @date: Dec. 2023
 -->

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
        <link rel="stylesheet" href="styles/login.css">
        <title>Artxiboa - Se Connecter</title>
    </head>
    <body>

        <?php include_header(); ?>
        <?php include_connexion_form(); ?>
        <?php include_connexion_info(); ?>

        <?php 
            // si il y a une erreur
            if (isset($something_to_say)) {
                include_error_message($something_to_say);
            }
        ?>

        <?php include_footer(); ?>

    </body>
</html>