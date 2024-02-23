<?php
    
    // inclure le modele
    require(__DIR__."/scripts/php/models/UserModel2.php");

    // def variable globale
    $File = array();

    // si provient d'un ofrmulaire
    if (isset($_POST['IdFile'])) {

        // check isi vide
        if (strlen($_POST['IdFile']) > 0) {
            $userModel = new UserModel();
            // appeler modele
            $result = $userModel->getWhatsInFile($_POST['IdFile']);
            $_SESSION['File']=$result;
            $File['file']=$result;
        }
        else {
            // si vide
            $something_to_say = "Could load the file";
        }
    }

    // inclure les includes necessaires à la vue
    require(__DIR__."/scripts/php/views/includes.php");


    // si on est en session on peut continuer
    if (session_start()) {
        require(__DIR__."/scripts/php/views/visualisation.php");
    }
    else {
        require(__DIR__."/scripts/php/views/login.php");
    }