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
            <?php 
                if ($_SESSION['Role'] == '1'){
                    dropdown_sup();
                } 
                else{
                    dropdown_normal();
                }?>

            <li><a href="archiveController.php">Archive</a></li>
            <li><a class="active" type="submit" href="index.php">Déconnexion</a></li>
        </ul>
        <?php
    }

    function dropdown_sup(){
        ?>
        <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Gestion</a>
                    <div class="dropdown-content">
                        <a href="gestionController.php">Modifier des documents</a>
                        <a href="gestionController.php">Valider des documents</a>
                    </div>
        </li>
    <?php
    }

    function dropdown_normal(){
        ?>
        <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Gestion</a>
                    <div class="dropdown-content">
                        <a href="gestionController.php">Modifier des documents</a>
                        <a href="gestionController.php">Envoyer pour validation</a>
                    </div>
        </li>
        <?php
    }

    function include_creation_buttons() {
        ?>
        <div class="buttoncrea">
            <div>
                <img src="media/devis.png" alt="Devis" height="170"></a>
                <form method="post" action="creationDevisController.php">
                    <button>Créer un devis</button>
                </form>
                <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.</p>
            </div>
            <div>
                <img src="media/facture.png" alt="Facture" height="170"></a>
                <form method="post" action="creationFactureController.php">
                    <button>Créer une facture</button>
                </form>
                <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.</p>
            </div>
            <div>
                <img src="media/import.png" alt="Importer" height="170"></a>
                <button>Importer un document</button>
                <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.</p>
            </div>
    </div>
        <?php
    }

    function include_connexion_form() {
        ?>
        <form method="post" action="homeController.php" class="login-form">
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

    function include_display_file($RESULT){
        $nb = count($RESULT);
        echo "<p>Found " . $nb . " results.</p>";
        echo("<table class='display'>");
        echo("<tr>");
        echo("<td>Titre</td>");
        echo("<td>Type de document</td>");
        echo("<td>Identifiant du modificateur</td>");
        echo("<td>Date de création</td>");
        echo("</tr>");
        foreach($RESULT as $res){
            echo("<tr>");
            echo "<td>" . $res["Titre"] . "</td>";
            echo "<td>" . $res["Type"] . "</td>";
            echo "<td>" . $res["Id_Utilisateur"] . "</td>";
            echo "<td>" . $res["Date_creation"] . "</td>";
            echo "<td> <button> Voir le fichier </button> </td>";
            echo("</tr>");
        }
        
        echo("</table>");
        if (isset($something_to_say)) {
            include_error_message($something_to_say);
        }
    }

    function include_recent_files($RECENTFILES){
        $nb = count($RECENTFILES);
        foreach($RECENTFILES as $res){
            echo "<p>" . $res["Type"] . " " . $res["Titre"] ."</p>";
        }
    }

    function create_facture() {
        ?>
        <h2>Information sur la facture</h2>
        <form method="post" action="creationFactureController.php">
        <div class="flex-container">
            <div class='box_crea'>
                <p>Sélectionner une zone à remplir</p>
                <p>Lorem Ipsum</p>
                <input type="text" id="ContenuFacture" name="ContenuFacture">
            </div>
            <div class='box_crea'>
                <div class='file_info'>
                    <p>Titre</p>
                    <input type="text" id="TitreFacture" name="TitreFacture">
                    <p>Auteur : <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></p>
                    <input type="text" id="IdUser" name="IdUser" value=<?php echo $_SESSION['Id']?> hidden>
                    <p>Date : <?php echo date('Y-m-d'); ?></p>
                </div>
                <div class='feedback'>
                    <p>Feedback</p>
                </div>
            </div>
        </div>
        <button>Next</button>
        </form>
        <?php
    }

    function create_devis() {
        ?>
        <h2>Information sur le devis</h2>
        <form method="post" action="creationController.php">
        <div class="flex-container">
            <div class='box_crea'>
                <p>Sélectionner une zone à remplir</p>
                <p>Lorem Ipsum</p>
                <input type="text" id="ContenuFacture" name="ContenuFacture">
            </div>
            <div class='box_crea'>
                <div class='file_info'>
                    <p>Titre</p>
                    <input type="text" id="TitreDevis" name="TitreDevis">
                    <p>Auteur : <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></p>
                    <p>Date : <?php echo date('Y-m-d'); ?></p>
                </div>
                <div class='feedback'>
                    <p>Feedback</p>
                </div>
            </div>
        </div>
        <button>Next</button>
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