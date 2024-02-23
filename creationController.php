<?php
    /**
     * Example of a simple controller
     * It will call the model to get the data
     * and then decide which view to display (login form or welcome page)
     * 
     * @author: w.delamare
     * @date: Dec. 2023
     */

    
    // Inclure le model
    require(__DIR__."/scripts/php/models/UserModel2.php");

    // Inclure les includes necessaires à la vue
    require(__DIR__."/scripts/php/views/includes.php");


    // si on est toujours en session on peut continuer
    if (session_start()) {
        require(__DIR__."/scripts/php/views/creation.php");
    }
    else {
        require(__DIR__."/scripts/php/views/login.php");
    }

