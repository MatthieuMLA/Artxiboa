<!-- 
    Example HTML file to showcase a simple login form which uses
        - a php controller script (logic-related aspects) that calls a php model script (data-related aspects)
        - a php view script (UI-related aspects)

* @author: w.delamare
* @date: Dec. 2023
-->


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/home.css">
        <title>Accueil</title>
    </head>
    <body>

        <?php include_header_home(); ?>
        
        <?php include_menubar(); ?>
        <?php include_accueil(); ?>
        
        <?php include_recent_files2(); ?>
        <?php include_footer(); ?>

    </body>
</html>