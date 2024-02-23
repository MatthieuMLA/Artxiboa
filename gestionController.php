<?php
    
    // Inclure le modele
    require(__DIR__."/scripts/php/models/UserModel2.php");

    // recupération de fichiers pertinents
    $userModel = new UserModel();
    $FILES_MODIFICATION = $userModel->display_file_modified();
    $FILES_REFUSED = $userModel->display_file_refused();
    $FILES_ARCHIVED = $userModel->display_file_archived();


    // Inclure les includes nécéssaires à la vue
    require(__DIR__."/scripts/php/views/includes.php");

    
    // si on est toujours en session on peut continuer
    if (session_start()) {
        require(__DIR__."/scripts/php/views/gestion.php");
    }
    else {
        require(__DIR__."/scripts/php/views/login.php");
    }