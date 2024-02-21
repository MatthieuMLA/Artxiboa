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
        <title>Artxiboa - Creation</title>
    </head>
    <body>
        
        <!-- PHP only used to display stuff -->
        <?php include_header_home(); ?>
        <?php include_menubar(); ?>
        <?php include_creation_buttons(); ?>
        <?php 
            // if an error happened
            if (isset($something_to_say)) {
                include_error_message($something_to_say);
            }
        ?>

        <?php include_footer(); ?>

    </body>
</html>