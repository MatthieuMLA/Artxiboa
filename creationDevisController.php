<?php

    
    // Inclure le model
    require(__DIR__."/scripts/php/models/UserModel2.php");

    if (isset($_POST['TitreDevis']) && isset($_POST['ContenuDevis'])) {

        // check si le titre et contenu est défini
        if (strlen($_POST['TitreDevis']) > 0 && strlen($_POST['ContenuDevis']) > 0) {
            $userModel = new UserModel();
            // appeler le modele
            $currentDate = date('Y-m-d');
            $Titre = $_POST['TitreDevis'];
            $Contenu = $_POST['ContenuDevis'];
            $Id_user = $_POST['IdUser'];
            $result = $userModel->add_file($Titre, 'Devis', $Contenu, $currentDate, 1, $Id_user, 1);
            $result = array();
        }
        else {
            // si il y a un probleme
            $something_to_say = "Missing fields";  
        }
    }
    else {
        // si il y a un probleme
        $something_to_say = "Missing fields";  
    }  
    
    // Inclure les includes necessaires à la vue
    require(__DIR__."/scripts/php/views/includes.php");


    // si on est toujours en session on peut continuer
    if (session_start()) {
        require(__DIR__."/scripts/php/views/creationDevis.php");
    }
    else {
        require(__DIR__."/scripts/php/views/login.php");
    }
