<?php

    
    // Inclure le model
    require(__DIR__."/scripts/php/models/UserModel2.php");

    // Recupération des fichiers d'archives
    $userModel = new UserModel();
    $RESULT = $userModel->display_file_archived();;

    // Inclure les includes pour les vues
    require(__DIR__."/scripts/php/views/includes.php");


    // si on est toujours en session on peut continuer
    if (session_start()) {
        require(__DIR__."/scripts/php/views/archive.php");
    }
    else {
        require(__DIR__."/scripts/php/views/login.php");
    }