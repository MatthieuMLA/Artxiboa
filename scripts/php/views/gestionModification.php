<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/home.css">
        <title>Artxiboa - Gestion</title>
    </head>
    <body>
        <?php include_header_home(); ?>
        <?php include_menubar(); ?>
        <?php 
        ?>
        <?php include_display_file_modify($FILES_MODIFICATION);?>
        
        <?php 
            // Si il y a une erreur
            if (isset($something_to_say)) {
                include_error_message($something_to_say);
            }
        ?>

        <?php include_footer(); ?>

    </body>
</html>