<?php
    
    
    // Inclure le modele
    require(__DIR__."/scripts/php/models/UserModel2.php");

    // si probleme session
    if (session_start()){
        $_SESSION = array();
        session_destroy();
    }

    // Inclure les includes necessaires à la vue
    require(__DIR__."/scripts/php/views/includes.php");

    // si le prenom est def on peut continuer
    if (isset($_SESSION['firstname'])) {
        require(__DIR__."/scripts/php/views/home.php");
    }
    else {
        require(__DIR__."/scripts/php/views/login.php");
    }

