<?php
    
    // Inclure le modele
    require(__DIR__."/scripts/php/models/UserModel2.php");

    // Inclure les includes necessaires à la vue
    require(__DIR__."/scripts/php/views/includes.php");

    
    
    // si on est toujours en session on peut continuer
    if (session_start()) {
        require(__DIR__."/scripts/php/views/importation.php");
    }
    else {
        require(__DIR__."/scripts/php/views/login.php");
    }