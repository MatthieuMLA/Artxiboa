<?php
    
    // Inclure le modèle
    require(__DIR__."/scripts/php/models/UserModel2.php");

    // appeler modèle
    $userModel = new UserModel();

    // recuperer fichiers pertinents
    $FILES_MODIFICATION = $userModel->display_file_modified();
    $FILES_REFUSED = $userModel->display_file_refused();
    $FILES_ARCHIVED = $userModel->display_file_archived();
    $FILES_TO_VALIDATE = $userModel->display_file_to_validate();

    // inclure les includes nécessaires pour la vue
    require(__DIR__."/scripts/php/views/includes.php");

    
    
    // si on est toujours en session on peut continuer
    if (session_start()) {
        require(__DIR__."/scripts/php/views/gestionRefus.php");
    }
    else {
        require(__DIR__."/scripts/php/views/login.php");
    }