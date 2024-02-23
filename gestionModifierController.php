<?php
    
    // Inclure le modèle
    require(__DIR__."/scripts/php/models/UserModel2.php");

    // Recupérer fichiers pertinents
    $userModel = new UserModel();
    $FILES_MODIFICATION = $userModel->display_file_modified();
    $FILES_REFUSED = $userModel->display_file_refused();
    $FILES_ARCHIVED = $userModel->display_file_archived();
    $FILES_TO_VALIDATE = $userModel->display_file_to_validate();

    // Check si provient d'un formulaire
    if (isset($_POST['IdFile'])) {
        // check si non vide
        if (strlen($_POST['IdFile']) > 0) {
            $userModel = new UserModel();
            // appelle modèle
            $result = $userModel->getWhatsInFile($_POST['IdFile']);
            $_SESSION['File']=$result;
            $File['file']=$result;
        }
        else {
            // Si problème
            $something_to_say = "Could load the file";
        }
        }
        

    // Inclure les includes nécessaires à la vue
    require(__DIR__."/scripts/php/views/includes.php");

    
    // si on est toujours en session on peut continuer
    if (session_start()) {
        require(__DIR__."/scripts/php/views/gestionModifier.php");
    }
    else {
        require(__DIR__."/scripts/php/views/login.php");
    }