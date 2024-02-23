<?php


    // Inclure le modele
    require(__DIR__."/scripts/php/models/UserModel2.php");

    // Check si on provient d'un formulaire
    if (isset($_POST['TitreFacture']) && isset($_POST['ContenuFacture'])) {

        // check si ce n'est pas vide
        if (strlen($_POST['TitreFacture']) > 0 && strlen($_POST['ContenuFacture']) > 0) {
            $userModel = new UserModel();
            // appeler modele
            $currentDate = date('Y-m-d');
            $Titre = $_POST['TitreFacture'];
            $Contenu = $_POST['ContenuFacture'];
            $Id_user = $_POST['IdUser'];
            $result = $userModel->add_file($Titre, 'Facture', $Contenu, $currentDate, 1, $Id_user, 2);
            $result = array();
        }
        else {
            // si il y a un problème
            $something_to_say = "Missing fields";  
        }
    }
    else {
        // si ça ne vient pas d'un formulaire
        $something_to_say = "";  
    }

    // recupération des fichiers
    $userModel = new UserModel();
    $RESULT = $userModel->display_file();


    // Inclure les includes nécéssaires à la vue
    require(__DIR__."/scripts/php/views/includes.php");


    // si on est toujours en session on peut continuer
    if (session_start()) {
        require(__DIR__."/scripts/php/views/creationFacture.php");
    }
    else {
        require(__DIR__."/scripts/php/views/login.php");
    }