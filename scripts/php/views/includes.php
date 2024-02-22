<?php
/**
 * Simple PHP script example to showcase hwo HTML content
 * can be re-used across multiple HTML files
 * 
 * @author: w.delamare
 * @date: Dec. 2023
 */
    //require(__DIR__."/../models/UserModel2.php");
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
                <p>Un devis est un document détaillant les coûts et les conditions d'une transaction commerciale proposée. Il est généralement envoyé avant la conclusion du contrat pour informer le client des coûts et conditions.</p>
            </div>
            <div>
                <img src="media/facture.png" alt="Facture" height="170"></a>
                <form method="post" action="creationFactureController.php">
                    <button>Créer une facture</button>
                </form>
                <p>Une facture est un document qui détaille les biens ou services fournis à un client, avec leurs prix et les conditions de paiement. Elle est émise après la livraison des biens ou services et constitue une demande de paiement.</p>
            </div>
            <div>
                <img src="media/import.png" alt="Importer" height="170"></a>
                <form method="post" action="gestionController.php">
                    <button>Importer un document</button>
                </form>
                <p>L'importation de fichiers consiste à transférer des données d'un format à un autre, ou à transférer des données d'un système informatique à un autre.</p>
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
            echo "<form method='post' action='visualisationController.php' class='file-form'>";
            echo("<tr>");
            echo "<td>" . $res["Titre"] . "</td>";
            echo "<td>" . $res["Type"] . "</td>";
            echo "<td>" . $res["Id_Utilisateur"] . "</td>";
            echo "<td>" . $res["Date_creation"] . "</td>";
            echo "<td> <button> Voir le fichier </button> </td>";
            echo("</tr>");
            ?>
            <input type='text' id='IdFile' name='IdFile' value=<?php echo  $res["Id"]?> hidden>
            <?php
            echo "</form>";
        }
        echo("</table>");
    }

    function include_en_travaux(){
        ?>
        <main>
            <div class="travaux">
                <img src="media/enTravaux.png" alt="Construction"></a>
                <h1>Notre site web est actuellement en construction !</h1>
                <p>Nous vous remercions de votre patience et nous serons de retour bientôt avec une toute nouvelle apparence et des fonctionnalités améliorées.</p>
            </div>
    </main>
        <?php
    }

    function include_accueil(){
        ?>
        <main>
            <h1>Bienvenue sur notre système d'archivage électronique</h1>
            <h2>Améliorez l'accès à l'information et réduisez les coûts d'exploitation</h2>
            <p>
                Notre système d'archivage électronique vise à améliorer l'accès à l'information au sein de votre entreprise, réduire les coûts d'exploitation et diminuer les risques de litiges.
            </p>
        </main>
        <?php
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
        <button class="creation">Créer</button>
        </form>
        <?php
    }


    function create_devis() {
        ?>
        <h2>Information sur le devis</h2>
        <form method="post" action="creationDevisController.php">
        <div class="flex-container">
            <div class='box_crea'>
                <p>Sélectionner une zone à remplir</p>
                <p>Lorem Ipsum</p>
                <input type="text" id="ContenuDevis" name="ContenuDevis">
            </div>
            <div class='box_crea'>
                <div class='file_info'>
                    <p>Titre</p>
                    <input type="text" id="TitreDevis" name="TitreDevis">
                    <p>Auteur : <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></p>
                    <input type="text" id="IdUser" name="IdUser" value=<?php echo $_SESSION['Id']?> hidden>
                    <p>Date : <?php echo date('Y-m-d'); ?></p>
                </div>
                <div class='feedback'>
                    <p>Feedback</p>
                </div>
            </div>
        </div>
        <button class="creation">Créer</button>
        </form>
        <?php
    }

    function include_recent_files() {
        ?>
        <main>
            
            <div class="flex-container">

                <div class="box">Mes Document Récents
                    <div class="div2">
                        <div class="h1">
                        
                        </div>
                    </div>
                </div>

                <div class="box">
                    <table id="customers">
                        <tr>
                            <th>Dernier Document Visualiser</th>
                            <th>Noms</th>
                            <th>Version</th>
                        </tr>
                        <tr>
                            <td>Facture </td>
                            <td>Safran</td>
                            <td>V1</td>
                        </tr>
                        <tr>
                            <td>Devis</td>
                            <td>Adour BTP</td>
                            <td>V3</td>
                        </tr>
                    </table>
                </div>


        </main>
        <?php        
    }

    function include_recent_files2(){ 
        echo "<div class='docRecent'>";
        ?><h4>Document récent</h4><?php
        $RECENTFILES = $_SESSION['recentfiles'];
        foreach($RECENTFILES as $res){
            echo "<form method='post' action='visualisationController.php' class='file-form'>";
            echo "<p>" . $res["Type"] . " " . $res["Titre"] . " " . $res["Id"] . "  " ."<button> Voir le fichier </button></p>";
            ?>
            <input type='text' id='IdFile' name='IdFile' value=<?php echo  $res["Id"]?> hidden>
            <?php
            echo "</form>";
        }
        echo "</div>";
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