<?php

    // Afficher le header pour la page de connexion : Image + Titre
    function include_header() {
    ?>
    <header>
        <img src="media/brandLogo.png" alt="Brand Logo" height="75" title="Artxiboa">
        <h1>Artxiboa</h1>
    </header>
    <?php
    }

    // Afficher les identifiants de connexion 
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
        
    // Afficher le header pour la page d'acceuil : Image + Titre + Nom de la personne connectée
    function include_header_home() {
        ?>
        <header>
            <img src="media/brandLogo.png" alt="Brand Logo" height="75" title="Artxiboa">
            <h1>Artxiboa</h1>
            <div class="div1"><h3><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></h3></div>
        </header>
        <?php
    }

    // Afficher logout -> non utilisé actuellement
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

    // Afficher la barre de menu avec différent dropdown (dans gestion) selon le role des utlisateurs (employé simple ou supérieur hiérarchique)
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
            <li><a href="index.php">Déconnexion</a></li>
        </ul>
        <?php
    }

    // Continuité de la fonction include_menubar()
    function dropdown_sup(){
        ?>
        <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Gestion</a>
                    <div class="dropdown-content">
                        <a href="gestionModificationController.php">Modifier des documents</a>
                        <a href="gestionValidationController.php">Valider des documents</a>
                    </div>
        </li>
    <?php
    }

    // Continuité de la fonction include_menubar()
    function dropdown_normal(){
        ?>
        <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Gestion</a>
                    <div class="dropdown-content">
                        <a href="gestionModificationController.php">Modifier des documents</a>
                        <a href="gestionRefusController.php">Voir les refus</a>
                    </div>
        </li>
        <?php
    }

    // Trois prochaines fonctions sur les boutons pour la gestion des fichiers
    // Dépendante du role
    // Pas utilisé actuellement
    function include_gestion_button() {
        if ($_SESSION['Role'] == '1'){
            include_gestion_button_sup();
        } 
        else{
            include_gestion_button_normal();
        }
    }

    function include_gestion_button_sup(){
        ?>
            <div>
                <form method="post" action="">
                    <button>Refuser</button>
                    <input type='text' id='RefusFile' name='RefusFile' value=true hidden>
                </form>
            </div>
            <div>
                <form method="post" action="">
                    <button>Valider</button>
                    <input type='text' id='RefusFile' name='RefusFile' value=false hidden>
                </form>
            </div>  
        <?php
    }

    function include_gestion_button_normal(){
        ?>
            <div>
                <form method="post" action="">
                    <button>Modifier</button>
                    <input type='text' id='ToValidateFile' name='ToValidateFile' value=false hidden>
                </form>
            </div>
            <div>
                <form method="post" action="">
                    <button>Envoyer pour validation</button>

                    <input type='text' id='ToValidateFile' name='ToValidateFile' value=true hidden>                
                </form>
            </div>  
        <?php
    }

    // Affichage de la page de création 
    function include_creation_buttons() {
        ?>
        <div class="buttoncrea">
            <div>
                <img src="media/devis.png" alt="Devis" height="170">
                <form method="post" action="creationDevisController.php">
                    <button>Créer un devis</button>
                </form>
                <p>Un devis est un document détaillant les coûts et les conditions d'une transaction commerciale proposée. Il est généralement envoyé avant la conclusion du contrat pour informer le client des coûts et conditions.</p>
            </div>
            <div>
                <img src="media/facture.png" alt="Facture" height="170">
                <form method="post" action="creationFactureController.php">
                    <button>Créer une facture</button>
                </form>
                <p>Une facture est un document qui détaille les biens ou services fournis à un client, avec leurs prix et les conditions de paiement. Elle est émise après la livraison des biens ou services et constitue une demande de paiement.</p>
            </div>
            <div>
                <img src="media/import.png" alt="Importer" height="170">
                <form method="post" action="importationController.php">
                    <button>Importer un document</button>
                </form>
                <p>L'importation de fichiers consiste à transférer des données d'un format à un autre, ou à transférer des données d'un système informatique à un autre.</p>
            </div>
    </div>
        <?php
    }

    // Affichage du formulaire pour se connecter
    function include_connexion_form() {
        ?>
        <form method="post" action="homeController.php" class="login-form">
            <fieldset>
                <div>
                    <div>
                    Nom d'utilisateur
                    <label>
                    *
                    </label>
                    </div>
                <input type="text" placeholder="login" id="login" name="login" required>
                </div>
                <div>
                    <div>
                    Mot de passe
                    <label>
                    *
                    </label>
                    </div>
                <input type="password" placeholder='password' id='pwd' name="pwd" required>
                </div>
                <div>
                <label for="button">
                <button id="button" class="up" type="submit">Se connecter</button>
                </label>
                </div>
                <label>
                    * Champs obligatoires
                </label>
            </fieldset>
        </form>
    <?php
    }

    // Affichage de document de la db sous forme de tableau 
    function include_display_file($RESULT){
        $nb = count($RESULT);
        echo "<p>" . $nb . " fichiers ont été trouvés.</p>";
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

    // Meme chose que include_display_file(), le bouton de fin change
    function include_display_file_modify($RESULT){
        $nb = count($RESULT);
        echo "<p>" . $nb . " fichiers ont été trouvés.</p>";
        echo("<table class='display'>");
        echo("<tr>");
        echo("<td>Titre</td>");
        echo("<td>Type de document</td>");
        echo("<td>Identifiant du modificateur</td>");
        echo("<td>Date de création</td>");
        echo("</tr>");
        foreach($RESULT as $res){
            echo "<form method='post' action='gestionModifierController.php' class='file-form'>";
            echo("<tr>");
            echo "<td>" . $res["Titre"] . "</td>";
            echo "<td>" . $res["Type"] . "</td>";
            echo "<td>" . $res["Id_Utilisateur"] . "</td>";
            echo "<td>" . $res["Date_creation"] . "</td>";
            echo "<td> <button> Modifier le fichier </button> </td>";
            echo("</tr>");
            ?>
            <input type='text' id='IdFile' name='IdFile' value=<?php echo  $res["Id"]?> hidden>
            <?php
            echo "</form>";
        }
        echo("</table>");
    }

    // Meme chose que include_display_file(), le bouton de fin change
    function include_display_file_validate($RESULT){
        $nb = count($RESULT);
        echo "<p>" . $nb . " fichiers ont été trouvés.</p>";
        echo("<table class='display'>");
        echo("<tr>");
        echo("<td>Titre</td>");
        echo("<td>Type de document</td>");
        echo("<td>Identifiant du modificateur</td>");
        echo("<td>Date de création</td>");
        echo("</tr>");
        foreach($RESULT as $res){
            echo "<form method='post' action='gestionValiderController.php' class='file-form'>";
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

    // Affichage pour les pages en travaux
    function include_en_travaux(){
        ?>
        <main>
            <div class="travaux">
                <img src="media/enTravaux.png" alt="Construction">
                <h1>Notre site web est actuellement en construction !</h1>
                <p>Nous vous remercions de votre patience et nous serons de retour bientôt avec une toute nouvelle apparence et des fonctionnalités améliorées.</p>
            </div>
    </main>
        <?php
    }

    // Afficher la page d'acceuil et ses informations lambdas
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

    // Afficher les outils pour creer une facture
    function create_facture() {
        ?>
        <h2>Information sur la facture</h2>
        <form method="post" action="creationFactureController.php">
        <div class="flex-container">
            <div class='box_crea'>
                <p>Remplir la zone ci-dessous</p>
                <textarea id="ContenuFacture" name="ContenuFacture" rows="20" cols="50" required></textarea>
            </div>
            <div class='box_crea'>
                <div class='file_info'>
                    <p>Titre</p>
                    <input type="text" id="TitreFacture" name="TitreFacture" required>
                    <p>Auteur : <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></p>
                    <input type="text" id="IdUser" name="IdUser" value=<?php echo $_SESSION['Id']?> hidden>
                    <p>Date : <?php echo date('Y-m-d'); ?></p>
                </div>
            </div>
        </div>
        <button class="creation">Créer</button>
        </form>
        <?php
    }

    // Aficher les outils pour creer un devis
    // Comme la fonction pour la facture, les noms changent 
    function create_devis() {
        ?>
        <h2>Information sur le devis</h2>
        <form method="post" action="creationDevisController.php">
        <div class="flex-container">
            <div class='box_crea'>
                <p>Remplir la zone ci-dessous</p>
                <textarea id="ContenuDevis" name="ContenuDevis" rows="20" cols="50" required></textarea>
            </div>
            <div class='box_crea'>
                <div class='file_info'>
                    <p>Titre</p>
                    <input type="text" id="TitreDevis" name="TitreDevis" required>
                    <p>Auteur : <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></p>
                    <input type="text" id="IdUser" name="IdUser" value=<?php echo $_SESSION['Id']?> hidden>
                    <p>Date : <?php echo date('Y-m-d'); ?></p>
                </div>
            </div>
        </div>
        <button class="creation">Créer</button>
        </form>
        <?php
    }

    // Premiere version pour afficher les documents recents -> pas utilisé actuellement
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

    // Deuxieme version pour afficher les documents récents, cette fois en questionnant la db
    function include_recent_files2(){ 
        echo "<div class='docRecent'>";
        ?><h4>Mes Documents récents</h4><?php
        echo "<table>";
        echo "<tr>";
        echo "<th>Type de fichier</th>";
        echo "<th>Nom de fichier</th>";
        echo "<th>Identifiant du fichier</th>";
        echo "</tr>";
        $RECENTFILES = $_SESSION['recentfiles'];
        foreach($RECENTFILES as $res){
            echo "<tr>";
            echo "<form method='post' action='visualisationController.php' class='fileform'>";
            echo "<td>" . $res["Type"] . "</td><td>" . $res["Titre"] . "</td><td>" . $res["Id"] . " </td><td>" ."<button> Voir le fichier </button></td>";
            ?>
            <input type='text' id='IdFile' name='IdFile' value=<?php echo  $res["Id"]?> hidden>
            <?php
            echo "</form>";
            echo "<tr>";
        }
        echo "</table>";
        echo "</div>";
    }

    // Afficher les informations pour importer un fichier
    function include_importation(){
        ?>
        <h4>Importer un fichier</h4>
        <form class="import2" action="travauxController.php">
        <div>
            <div>
                <p>Nom du fichier</p>
                <input type="text" id="filename" required/>
            </div>
            <div>
                <p>Date du fichier</p>
                <input type="date" id="filedate" required/>
            </div>
            <div>
                <p class="descripImport">L'importation de fichiers consiste à transférer des données d'un format à un autre, ou à transférer des données d'un système informatique à un autre.</p>
            </div>
        </div>
        <div>
            <div>
                <input type="file" id="file" name="file" required accept=".pdf,.txt">
                <p>Seuls les fichiers en .pdf ou .txt sont autorisés</p>
            </div>
            <div>
                <button>Ajouter le fichier</button>
            </div>
        </div>
        </form>
        <?php
    }

    // Afficher un footer
    function include_footer() {
        ?>
        <footer>
            Copyright!©️TAI <a href="mailto:">Contact</a>
        </footer>
        <?php
    }

    // Si il y a un erreur
    function include_error_message($message) {
        echo "<p class='error_message'>" . $message . "</p>";
    }


?>