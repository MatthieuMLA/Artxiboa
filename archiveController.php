<?php

    
    // Inclure le model
    require(__DIR__."/scripts/php/models/UserModel2.php");

    // Recupération des fichiers d'archives
    $userModel = new UserModel();
    $RESULT = $userModel->display_file_archived();;

    // Inclure les includes pour les vues
    require(__DIR__."/scripts/php/views/includes.php");


    // and then call the correct view
    // the form if not logged in, the welcome page if logged in

    if (session_start()) {
        require(__DIR__."/scripts/php/views/archive.php");
    }
    else {
        require(__DIR__."/scripts/php/views/login.php");
    }