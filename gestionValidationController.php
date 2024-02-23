<?php
    
    // Inclure le modèle
    require(__DIR__."/scripts/php/models/UserModel2.php");

    // appeler le modèle
    $userModel = new UserModel();

    // recupérer fichiers pertinents
    $FILES_MODIFICATION = $userModel->display_file_modified();
    $FILES_REFUSED = $userModel->display_file_refused();
    $FILES_ARCHIVED = $userModel->display_file_archived();
    $FILES_TO_VALIDATE = $userModel->display_file_to_validate();

    // check si vient d'un formualire
    if (isset($_POST['IdFile']) && isset($_POST['ContenuFile']) && isset($_POST['Valider'])) {
        // check si champs vide
        if (strlen($_POST['IdFile']) > 0 && strlen($_POST['ContenuFile']) > 0) {
            // check si fichier validé ou refusé

            if ($_POST['Valider'] == 'true'){
                // appeler modèle
                $userModel = new UserModel();
                // enregistrer changements
                $result = $userModel->change_document($_POST['IdFile'], $_POST['ContenuFile']);
                // valider le document (envoyer vers archive)
                $result = $userModel->valider_document($_POST['IdFile']);
            }
            else {
                // appeler modèle
                $userModel = new UserModel();
                // enregistrer les changements
                $result = $userModel->change_document($_POST['IdFile'], $_POST['ContenuFile']);
                // refuser le document
                $result = $userModel->refuser_document($_POST['IdFile']);
            }
        }
        else {
            // si vide - en soit pas possible car input required 
            $something_to_say = "";  
        }
    }
    else {
        // si pas formulaire
        $something_to_say = "";
    }


    // Inclure les includes necessaires à la vue
    require(__DIR__."/scripts/php/views/includes.php");

    
    // si on est toujours en session on peut continuer
    if (session_start()) {
        require(__DIR__."/scripts/php/views/gestionValidation.php");
    }
    else {
        require(__DIR__."/scripts/php/views/login.php");
    }