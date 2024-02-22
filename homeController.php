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
    

    $RECENTFILES=array();

    // Check if the user comes from the form...
    if (isset($_POST['login']) && isset($_POST['pwd'])) {

        // check if all fields have an input
        if (strlen($_POST['login']) > 0 && strlen($_POST['pwd']) > 0) {
            $userModel = new UserModel();
            // Call the model to check if the user exists
            // How is the information stored? In a database? In a file? In a cloud? In a cookie?
            // The controller does not care about that. It just calls the model.
            $result = $userModel->check_login($_POST['login'], $_POST['pwd']);
            // If the search (in the db here) is successful
            if (isset($result['firstname'])) {
                // the controller can now redirect to the correct welcome webpage
                // making sure the firstname and lastname are registered throughout the **session**
                session_start();
                $_SESSION['firstname'] = $result['firstname'];
                $_SESSION['lastname'] = $result['lastname'];
                $_SESSION['Role'] = $result['Role'];
                $_SESSION['Id'] = $result['Id'];
                $Id_user = $result['Id'];
                $RECENTFILES=$userModel->getRecentFiles($Id_user);
                //print_r($RECENTFILES);
                $_SESSION['recentfiles']=$userModel->getRecentFiles($Id_user);
            }
            else {
                // set the error message to be displayed in the view
                $something_to_say = "Invalid login and/or password.";  
            }
        }
        else {
            // set the error message to be displayed in the view
            $something_to_say = "Missing login and/or password";
        }
    }
    //print_r($RECENTFILES);
    //$RECENTFILES = $userModel->getRecentFiles($_SESSION['Id']);
    
    // If the user wants to logout, simply destroy the session
    // (and hence redirect to the login form)
    /*
    if (isset($_POST['logout'])) {
        session_start();
        session_destroy();
    }*/


    // Now, let's call the view.
    // If something to say, the view will display it
    // Otherwise, the view will simply display the login form

    // before calling the view, just include useful view-related functions
    require(__DIR__."/scripts/php/views/includes.php");

    // and then call the correct view
    // the form if not logged in, the welcome page if logged in

    if ((session_status() == PHP_SESSION_ACTIVE || session_start()) && !isset($something_to_say)) {
        require(__DIR__."/scripts/php/views/home.php");
    }
    else {
        require(__DIR__."/scripts/php/views/login.php");
        //$_SESSION = array();
        //session_destroy();
    }

