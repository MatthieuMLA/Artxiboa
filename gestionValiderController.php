<?php
    
    // Inclure le modèle
    require(__DIR__."/scripts/php/models/UserModel2.php");

    // appeler modèle
    $userModel = new UserModel();

    // recupérer fichoers pertinents
    $FILES_MODIFICATION = $userModel->display_file_modified();
    $FILES_REFUSED = $userModel->display_file_refused();
    $FILES_ARCHIVED = $userModel->display_file_archived();
    $FILES_TO_VALIDATE = $userModel->display_file_to_validate();

    // check si provient d'un formualire
    if (isset($_POST['IdFile'])) {

        // check si vide
        if (strlen($_POST['IdFile']) > 0) {
            $userModel = new UserModel();
            // appeler modèle
            $result = $userModel->getWhatsInFile($_POST['IdFile']);
            $_SESSION['File']=$result;
            $File['file']=$result;
        }
        else {
            // si vide
            $something_to_say = "Could load the file";
        }
        }
        

    // Inclure les includes necessaires à la vue
    require(__DIR__."/scripts/php/views/includes.php");

    
    // si on est toujours en session on peut continuer
    if (session_start()) {
        require(__DIR__."/scripts/php/views/gestionValider.php");
    }
    else {
        require(__DIR__."/scripts/php/views/login.php");
    }