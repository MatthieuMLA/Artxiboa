<?php
/**
 * Simple PHP script example to showcase hwo HTML content
 * can be re-used across multiple HTML files
 * 
 * @author: w.delamare
 * @date: Dec. 2023
 */

    function include_header() {
        ?>
        <header>
            <img src="media/brandLogo.png" alt="Brand Logo" height="75" title="Artxiboa"></a>
            <h1>Artxiboa</h1>
            <div class="div1"><h3><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></h3></div>
        </header>
        <?php
    }

    function include_logout() {
        ?>
        <!-- A form to logout -->
        <!-- It redirects to the form controller -->
        <!-- Note that this could have been done with a simple link and a $_GET parameter -->
        <form method="post" action="loginController.php">
            <fieldset>
                <legend>Logout</legend>
                <button type="submit">Logout</button>
            </fieldset>
        </form>
        <?php
    }

    function include_menubar() {
        ?>
        <ul>
                <li><a href="#home">Accueil</a></li>
                <li><a href="#creation">Création des documents</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Gestion des documents</a>
                    <div class="dropdown-content">
                        <a href="#visualisation-document">Visualisation des documents</a>
                        <a href="#validation-document">Validation des documents</a>
                    </div>
                </li>
            <li><a href="#archive">Archive</a></li>
            <li style="float:right"><a class="active" href="loginController.php">Déconnexion</a></li>
        </ul>
        <?php
    }

    function include_connexion_form() {
        ?>
        <form method="post" action="loginController.php">
            <fieldset>
                <legend>Se Connecter</legend>
                <div>
                Nom d'utilisateur
                <label for="warning">
                    *
                </label>
                <input type="text" placeholder="login" id="login" name="login">
                </div>
                <div>
                Mot de passe
                <label for="warning">
                    *
                </label>
                <input type="password" placeholder='password' id='pwd' name="pwd">
                </div>
                <div>
                <label for="button">
                <button type="submit">Submit</button>
                </label>
                <label for="warning">
                    * Champs obligatoires
                </label>
                </div>
            </fieldset>
        </form>
        <?php
    }


    function include_footer() {
        ?>
        <footer>
            Copyright!©️TAI <a href="mailto:">Contact</a>
        </footer>
        <?php
    }


    function include_error_message($message) {
        echo "<p class='error_message'>" . $message . "</p>";
    }


?>