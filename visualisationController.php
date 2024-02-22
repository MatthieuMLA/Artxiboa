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
    $File = array();
    // Now, let's call the view.
    // If something to say, the view will display it
    // Otherwise, the view will simply display the login form
    // Check if the user comes from the form...
    if (isset($_POST['IdFile'])) {

        // check if all fields have an input
        if (strlen($_POST['IdFile']) > 0) {
            $userModel = new UserModel();
            // Call the model to check if the user exists
            // How is the information stored? In a database? In a file? In a cloud? In a cookie?
            // The controller does not care about that. It just calls the model.
            $result = $userModel->getWhatsInFile($_POST['IdFile']);
            // If the search (in the db here) is successful
            $_SESSION['File']=$result;
            $File['file']=$result;
        }
        else {
            // set the error message to be displayed in the view
            $something_to_say = "Could load the file";
        }
    }

    // before calling the view, just include useful view-related functions
    require(__DIR__."/scripts/php/views/includes.php");


    // and then call the correct view
    // the form if not logged in, the welcome page if logged in
    if (session_start()) {
        require(__DIR__."/scripts/php/views/visualisation.php");
    }
    else {
        require(__DIR__."/scripts/php/views/login.php");
    }