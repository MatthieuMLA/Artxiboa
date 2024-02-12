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
        <link rel="stylesheet" href="styles/example.css">
        <title>Welcome</title>
    </head>
    <body>
        
        <!-- PHP only used to display stuff -->
        <?php include_header(); ?>
        <?php include_menubar(); ?>

        <main>
            <h3>Welcome <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'] . "!!"; ?></h3>
            


            <!-- A form to logout -->
            <!-- It redirects to the form controller -->
            <!-- Note that this could have been done with a simple link and a $_GET parameter -->
            <form method="post" action="loginController.php">
                <fieldset>
                    <legend>Logout</legend>
                    <button type="submit">Logout</button>
                </fieldset>
            </form>
        </main>


        <?php include_footer(); ?>

    </body>
</html>