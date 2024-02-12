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
        <ul>
                <li><a href="#home">Accueil</a></li>
                <li><a href="#creation">Création des documents</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Gestion des documents</a>
                    <div class="dropdown-content">
                        <a href="#sub-item1">Visualisation des documents</a>
                        <a href="#sub-item2">Sub tier3</a>
                    </div>
                </li>
            <li><a href="#archive">Archive</a></li>
        </ul>

        <main>
            <h3>Welcome <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'] . "!!"; ?></h3>
            


            <!-- A form to logout -->
            <!-- It redirects to the form controller -->
            <!-- Note that this could have been done with a simple link and a $_GET parameter -->
            <form method="post" action="index.php">
                <fieldset>
                    <legend>Logout</legend>
                    <button type="submit">Logout</button>
                </fieldset>
            </form>
        </main>


        <?php include_footer(); ?>

    </body>
</html>