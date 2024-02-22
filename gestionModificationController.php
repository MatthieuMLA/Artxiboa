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


    // before calling the view, just include useful view-related functions
    require(__DIR__."/scripts/php/views/includes.php");

    
    // and then call the correct view
    // the form if not logged in, the welcome page if logged in

    if (session_start()) {
        require(__DIR__."/scripts/php/views/gestionModification.php");
    }
    else {
        require(__DIR__."/scripts/php/views/login.php");
    }