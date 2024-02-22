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

    if (isset($_POST['TitreDevis']) && isset($_POST['ContenuDevis'])) {

        // check if all fields have an input
        if (strlen($_POST['TitreDevis']) > 0 && strlen($_POST['ContenuDevis']) > 0) {
            $userModel = new UserModel();
            // Call the model to check if the user exists
            // How is the information stored? In a database? In a file? In a cloud? In a cookie?
            // The controller does not care about that. It just calls the model.
            $currentDate = date('Y-m-d');
            $Titre = $_POST['TitreDevis'];
            $Contenu = $_POST['ContenuDevis'];
            $Id_user = $_POST['IdUser'];
            $result = $userModel->add_file($Titre, 'Devis', $Contenu, $currentDate, 1, $Id_user, 1);
            $result = array();
        }
        else {
            // set the error message to be displayed in the view
            $something_to_say = "Missing fields";  
        }
    }
    else {
        // set the error message to be displayed in the view
        $something_to_say = "Missing fields";  
    }    
    // Now, let's call the view.
    // If something to say, the view will display it
    // Otherwise, the view will simply display the login form

    // before calling the view, just include useful view-related functions
    require(__DIR__."/scripts/php/views/includes.php");


    // and then call the correct view
    // the form if not logged in, the welcome page if logged in
    if (session_start()) {
        require(__DIR__."/scripts/php/views/creationDevis.php");
    }
    else {
        require(__DIR__."/scripts/php/views/login.php");
    }
