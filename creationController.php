<?php
    /**
     * Example of a simple controller
     * It will call the model to get the data
     * and then decide which view to display (login form or welcome page)
     * 
     * @author: w.delamare
     * @date: Dec. 2023
     */

    
    // do all necessary includes first
    // __DIR__ allows you to use relative paths explicitly
    require(__DIR__."/scripts/php/models/UserModel2.php");

    // Now, let's call the view.
    // If something to say, the view will display it
    // Otherwise, the view will simply display the login form

    // before calling the view, just include useful view-related functions
    require(__DIR__."/scripts/php/views/includes.php");


    // and then call the correct view
    // the form if not logged in, the welcome page if logged in
    if (session_start()) {
        require(__DIR__."/scripts/php/views/creation.php");
    }
    else {
        require(__DIR__."/scripts/php/views/login.php");
    }

