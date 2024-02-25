<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    // Inclure le modèle
    require(__DIR__."/scripts/php/models/UserModel2.php");

    $userModel = new UserModel();
    $FILES_MODIFICATION = $userModel->display_file_modified();
    $FILES_REFUSED = $userModel->display_file_refused();
    $FILES_ARCHIVED = $userModel->display_file_archived();
    $FILES_TO_VALIDATE = $userModel->display_file_to_validate();

    // Check si provient d'un formulaire
    if (isset($_POST['IdFile']) && isset($_POST['ContenuFile'])) {

        // check si les champs sont vides
        if (strlen($_POST['IdFile']) > 0 && strlen($_POST['ContenuFile']) > 0) {
            $userModel = new UserModel();
            $result = $userModel->change_document($_POST['IdFile'], $_POST['ContenuFile']);
            $result = $userModel->envoyer_document($_POST['IdFile']);
        }
        else {
            // si vide
            $something_to_say = "";  
        }
    }
    else {
        // si pas de formulaire
        $something_to_say = "";
    }


    // Inclure les includes nécessaires à la vue
    require(__DIR__."/scripts/php/views/includes.php");

    // si on est toujours en session on peut continuer
    if (session_start()) {
        require(__DIR__."/scripts/php/views/gestionModification.php");
    }
    else {
        require(__DIR__."/scripts/php/views/login.php");
    }