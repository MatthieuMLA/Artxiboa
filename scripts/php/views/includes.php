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
    </header>
    <?php
    }

    function include_connexion_info() {
        ?>
        <h4>
            Pour supérieur hiérarchique
            <br>
            Login : donut
            <br>
            Mot de passe : 123
            <br>
            <br>
            Pour employé
            <br>
            Login : el barto
            <br>
            Mot de passe : EatMyShorts
        </h4>
        <?php
        }
        

    function include_header_home() {
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
        <ul class="menubar">
                <li><a href="homeController.php">Accueil </a></li>
                <li><a href="creationController.php">Création</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Gestion</a>
                    <div class="dropdown-content">
                        <a href="gestionController.php">Visualiser des documents</a>
                        <a href="gestionController.php">Valider des documents</a>
                    </div>
                </li>
            <li><a href="archiveController.php">Archive</a></li>
            <li><a class="active" href="loginController_target.php">Déconnexion</a></li>
        </ul>
        <?php
    }

    function include_connexion_form() {
        ?>
        <form method="post" action="home.php" class="login-form">
            <fieldset>
                <div>
                    <div>
                    Nom d'utilisateur
                    <label for="warning">
                    *
                    </div>
                </label>
                <input type="text" placeholder="login" id="login" name="login">
                </div>
                <div>
                    <div>
                    Mot de passe
                    <label for="warning">
                    *
                    </label>
                    </div>
                <input type="password" placeholder='password' id='pwd' name="pwd">
                </div>
                <div>
                <label for="button">
                <button class="up" type="submit">Se connecter</button>
                </label>
                </div>
                <label for="warning">
                    * Champs obligatoires
                </label>
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