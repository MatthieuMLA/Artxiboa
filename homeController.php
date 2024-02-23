<?php
    
    // Inclure le modèle
    require(__DIR__."/scripts/php/models/UserModel2.php");
    
    // def variable globale
    $RECENTFILES=array();

    // Check si provient d'un formulaire
    if (isset($_POST['login']) && isset($_POST['pwd'])) {

        // check si vide
        if (strlen($_POST['login']) > 0 && strlen($_POST['pwd']) > 0) {
            $userModel = new UserModel();
            // appeler modèle
            // verifier les informations de login
            $result = $userModel->check_login($_POST['login'], $_POST['pwd']);

            // si recherche est un succes
            if (isset($result['firstname'])) {
                // debut session
                session_start();
                $_SESSION['firstname'] = $result['firstname'];
                $_SESSION['lastname'] = $result['lastname'];
                $_SESSION['Role'] = $result['Role'];
                $_SESSION['Id'] = $result['Id'];
                $Id_user = $result['Id'];
                $RECENTFILES=$userModel->getRecentFiles($Id_user);
                $_SESSION['recentfiles']=$userModel->getRecentFiles($Id_user);
            }
            else {
                // si probleme
                $something_to_say = "Invalid login and/or password.";  
            }
        }
        else {
            // si probleme
            $something_to_say = "Missing login and/or password";
        }
    }

    // Inclure les includes necessaires à la vue
    require(__DIR__."/scripts/php/views/includes.php");


    // si on est toujours en session et que y'a pas de probleme on peut continuer
    if ((session_status() == PHP_SESSION_ACTIVE || session_start()) && !isset($something_to_say)) {
        require(__DIR__."/scripts/php/views/home.php");
    }
    else {
        require(__DIR__."/scripts/php/views/login.php");
    }

