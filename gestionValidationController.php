<?php
    
    // do all necessary includes first
    // __DIR__ allows you to use relative paths explicitly
    

    // Now, let's call the view.
    // If something to say, the view will display it
    // Otherwise, the view will simply display the login form

    require(__DIR__."/scripts/php/models/UserModel2.php");

    $userModel = new UserModel();
    $FILES_MODIFICATION = $userModel->display_file_modified();
    $FILES_REFUSED = $userModel->display_file_refused();
    $FILES_ARCHIVED = $userModel->display_file_archived();
    $FILES_TO_VALIDATE = $userModel->display_file_to_validate();

    if (isset($_POST['IdFile']) && isset($_POST['ContenuFile']) && isset($_POST['Valider'])) {
        // check if all fields have an input
        if (strlen($_POST['IdFile']) > 0 && strlen($_POST['ContenuFile']) > 0) {
            if ($_POST['Valider'] == 'true'){
                $userModel = new UserModel();
                $result = $userModel->change_document($_POST['IdFile'], $_POST['ContenuFile']);
                $result = $userModel->valider_document($_POST['IdFile']);
            }
            else {
                $userModel = new UserModel();
                $result = $userModel->change_document($_POST['IdFile'], $_POST['ContenuFile']);
                $result = $userModel->refuser_document($_POST['IdFile']);
            }
        }
        else {
            // set the error message to be displayed in the view
            $something_to_say = "";  
        }
    }
    else {
        // set the error message to be displayed in the view
        $something_to_say = "";
    }


    // before calling the view, just include useful view-related functions
    require(__DIR__."/scripts/php/views/includes.php");

    
    // and then call the correct view
    // the form if not logged in, the welcome page if logged in

    if (session_start()) {
        require(__DIR__."/scripts/php/views/gestionValidation.php");
    }
    else {
        require(__DIR__."/scripts/php/views/login.php");
    }