<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/home.css">
        <title>Artxiboa - Creation de facture</title>
    </head>
    <body>
        
        <!-- PHP only used to display stuff -->
        <?php include_header_home(); ?>
        <?php include_menubar(); ?>
        <?php create_devis()?>
        <?php include_footer(); ?>

        <?php 
            // if an error happened
            if (isset($something_to_say)) {
                include_error_message($something_to_say);
            }
        ?>

    </body>
</html>