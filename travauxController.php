<?php
    
    // Inclure le modele
    require(__DIR__."/scripts/php/models/UserModel2.php");

    // inclure les includes necessaires à la vue
    require(__DIR__."/scripts/php/views/includes.php");

    
    // si on est en session on peut continuer
    if (session_start()) {
        require(__DIR__."/scripts/php/views/enTravaux.php");
    }
    else {
        require(__DIR__."/scripts/php/views/login.php");
    }