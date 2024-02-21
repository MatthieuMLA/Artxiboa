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
    // Check if the user comes from the form...
    if (isset($_POST['TitreFacture']) && isset($_POST['ContenuFacture'])) {

        // check if all fields have an input
        if (strlen($_POST['TitreFacture']) > 0 && strlen($_POST['ContenuFacture']) > 0) {
            $userModel = new UserModel();
            // Call the model to check if the user exists
            // How is the information stored? In a database? In a file? In a cloud? In a cookie?
            // The controller does not care about that. It just calls the model.
            $currentDate = date('Y-m-d');
            $Titre = $_POST['TitreFacture'];
            $Contenu = $_POST['ContenuFacture'];
            $Id_user = $_POST['IdUser'];
            $result = $userModel->add_file($Titre, 'facture', $Contenu, $currentDate, 1, $Id_user, 2);
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




    /*
    $userModel = new UserModel();
    // Call the model to check if the user exists
    // How is the information stored? In a database? In a file? In a cloud? In a cookie?
    // The controller does not care about that. It just calls the model.
    $currentDate = date('Y-m-d');
    $result = $userModel->add_file('Test de facture', 'facture', 'Lorem ipsum',$currentDate, 1, 1, 2);
    // If the search (in the db here) is successful
    print_r($result);
    if (isset($result)) {
        // the controller can now redirect to the correct welcome webpage
        // making sure the firstname and lastname are registered throughout the **session**
        $_DOCUMENT['Titre'] = $result['Titre'];
        $_DOCUMENT['Etat'] = $result['Etat'];
    }
    else {
        // set the error message to be displayed in the view
        $something_to_say = "Could not add file";  
    }*/

    $userModel = new UserModel();
    $RESULT = $userModel->display_file();
    //print_r($result);
    // Now, let's call the view.
    // If something to say, the view will display it
    // Otherwise, the view will simply display the login form

    // before calling the view, just include useful view-related functions
    require(__DIR__."/scripts/php/views/includes.php");


    // and then call the correct view
    // the form if not logged in, the welcome page if logged in
    if (session_start()) {
        require(__DIR__."/scripts/php/views/creationFacture.php");
    }
    else {
        require(__DIR__."/scripts/php/views/login.php");
    }