<?php

/**
 * Our model classes (UserModel in this example) extends the base class DBModel
 * so that we can factorize every common methods into the super class
 * 
 * Every other model classes (to deal with other data and tables) will follow the same principle
 * 
 * @author: w.delamare
 * @date: Dec. 2023
 */

require("DBModel.php");

class UserModel extends DBModel {
    var $ID_Utilisateur;
    /**
     * @return an associative array of all employees with first_name, last_name, id, creation_date (not formatted)
     */
    function check_login(string $login, string $password) {
        $result = [];
        if (!$this->connected) {
            // Something went wrong during the connection to the database.
            // In this example, we simply do not perform the query...
            // A real website should display a message for users to understand while they cannot log in
            return $result;
        }
        // The request uses the MD5() functions since password should not be stored
        // without any protection in the database (i.e., use MD5() to store and retrieve passwords)
        $request = "SELECT * FROM user WHERE login=:login AND password=MD5(:password)";
        $statement = $this->db->prepare($request);
        $statement->execute([
            "login" => $login,
            "password" => $password
        ]);
        $entries = $statement->fetchAll();
        if (count($entries) == 1) {
            $result["firstname"] = $entries[0]['firstname'];
            $result["lastname"] = $entries[0]['lastname'];
            $result["Role"] = $entries[0]['Role'];
            $result["Id"] = $entries[0]['Id']; 
            $Id_Utilisateur = $result["Id"];
        }
        return $result;
    }

    function change_document(string $IdFile, string $ContenuFile) {
        $result = [];
        if (!$this->connected) {
            // Something went wrong during the connection to the database.
            // In this example, we simply do not perform the query...
            // A real website should display a message for users to understand while they cannot log in
            return $result;
        }
        $request = "UPDATE document SET Contenu=:ContenuFile WHERE Id=:IdFile";
        $statement = $this->db->prepare($request);
        $statement->execute([
            "ContenuFile" => $ContenuFile,
            "IdFile" => $IdFile
        ]);
        $entries = $statement->fetchAll();
    }

    function valider_document(string $IdFile) {
        $result = [];
        if (!$this->connected) {
            // Something went wrong during the connection to the database.
            // In this example, we simply do not perform the query...
            // A real website should display a message for users to understand while they cannot log in
            return $result;
        }
        $request = "UPDATE document SET Etat=3 WHERE Id=:IdFile";
        $statement = $this->db->prepare($request);
        $statement->execute([
            "IdFile" => $IdFile
        ]);
        $entries = $statement->fetchAll();
    }

    function refuser_document(string $IdFile) {
        $result = [];
        if (!$this->connected) {
            // Something went wrong during the connection to the database.
            // In this example, we simply do not perform the query...
            // A real website should display a message for users to understand while they cannot log in
            return $result;
        }
        $request = "UPDATE document SET Etat=2 WHERE Id=:IdFile";
        $statement = $this->db->prepare($request);
        $statement->execute([
            "IdFile" => $IdFile
        ]);
        $entries = $statement->fetchAll();
    }

    function envoyer_document(string $IdFile) {
        $result = [];
        if (!$this->connected) {
            // Something went wrong during the connection to the database.
            // In this example, we simply do not perform the query...
            // A real website should display a message for users to understand while they cannot log in
            return $result;
        }
        $request = "UPDATE document SET Etat=4 WHERE Id=:IdFile";
        $statement = $this->db->prepare($request);
        $statement->execute([
            "IdFile" => $IdFile
        ]);
        $entries = $statement->fetchAll();
    }

    // other useful methods to interact with the database
    // could be to add a new user, to delete a user, to update a user, etc.
    // all these methods will be called by the controller
    // and will be used to display the correct view
    // (e.g., if the user is added, the controller will call the view to display the welcome page)
    // (e.g., if the user is not added, the controller will call the view to display the login form with an error message)


    function add_file(string $Titre, string $Type, string $Contenu, string $Date_creation, int $Etat, int $Id_Utilisateur, int $Id_template) {
        $result = [];
        if (!$this->connected) {
        // Something went wrong during the connection to the database.
        // In this example, we simply do not perform the query...
        // A real website should display a message for users to understand while they cannot log in
            return $result;
        }
        $request = "INSERT INTO document (Titre, Type, Contenu, Date_creation, Etat, Id_Utilisateur, Id_template) VALUES (:Titre, :Type, :Contenu, :Date_creation, :Etat, :Id_Utilisateur, :Id_template)";
        $statement = $this->db->prepare($request);
        $statement->execute([
            "Titre" => $Titre,
            "Type" => $Type,
            "Contenu" => $Contenu,
            "Date_creation" => $Date_creation,
            "Etat" => $Etat,
            "Id_Utilisateur" => $Id_Utilisateur,
            "Id_template" => $Id_template
        ]);
        $entries = $statement->fetchAll();
        if (count($entries) == 1) {
            $result["Titre"] = $entries[0]['Titre'];
            $result["Type"] = $entries[0]['Type'];
            $result["Contenu"] = $entries[0]['Contenu'];
            $result["Date_creation"] = $entries[0]['Date_creation'];
            $result["Etat"] = $entries[0]['Etat'];
            $result["Id_Utilisateur"] = $entries[0]['Id_Utilisateur'];
            $result["Id_template"] = $entries[0]['Id_template'];
        }
        return $result;
    }

    function display_file(){
        $result = [];
        if (!$this->connected) {
            // Something went wrong during the connection to the database.
            // In this example, we simply do not perform the query...
            // A real website should display a message for users to understand while they cannot log in
            return $result;
        }
        // The request uses the MD5() functions since password should not be stored
        // without any protection in the database (i.e., use MD5() to store and retrieve passwords)
        $request = "SELECT * FROM document";
        $statement = $this->db->prepare($request);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    function display_file_modified(){
        $result = [];
        if (!$this->connected) {
            // Something went wrong during the connection to the database.
            // In this example, we simply do not perform the query...
            // A real website should display a message for users to understand while they cannot log in
            return $result;
        }
        // The request uses the MD5() functions since password should not be stored
        // without any protection in the database (i.e., use MD5() to store and retrieve passwords)
        $request = "SELECT * FROM document WHERE Etat=1 OR Etat=2";
        $statement = $this->db->prepare($request);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    function display_file_refused(){
        $result = [];
        if (!$this->connected) {
            // Something went wrong during the connection to the database.
            // In this example, we simply do not perform the query...
            // A real website should display a message for users to understand while they cannot log in
            return $result;
        }
        // The request uses the MD5() functions since password should not be stored
        // without any protection in the database (i.e., use MD5() to store and retrieve passwords)
        $request = "SELECT * FROM document WHERE Etat=2";
        $statement = $this->db->prepare($request);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    function display_file_to_validate(){
        $result = [];
        if (!$this->connected) {
            // Something went wrong during the connection to the database.
            // In this example, we simply do not perform the query...
            // A real website should display a message for users to understand while they cannot log in
            return $result;
        }
        // The request uses the MD5() functions since password should not be stored
        // without any protection in the database (i.e., use MD5() to store and retrieve passwords)
        $request = "SELECT * FROM document WHERE Etat=4";
        $statement = $this->db->prepare($request);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    function display_file_archived(){
        $result = [];
        if (!$this->connected) {
            // Something went wrong during the connection to the database.
            // In this example, we simply do not perform the query...
            // A real website should display a message for users to understand while they cannot log in
            return $result;
        }
        // The request uses the MD5() functions since password should not be stored
        // without any protection in the database (i.e., use MD5() to store and retrieve passwords)
        $request = "SELECT * FROM document WHERE Etat=3";
        $statement = $this->db->prepare($request);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    function getRecentFiles($Id_Utilisateur){
        $result = [];
        if (!$this->connected) {
            // Something went wrong during the connection to the database.
            // In this example, we simply do not perform the query...
            // A real website should display a message for users to understand while they cannot log in
            return $result;
        }
        // The request uses the MD5() functions since password should not be stored
        // without any protection in the database (i.e., use MD5() to store and retrieve passwords)
        $request = "SELECT * FROM document WHERE Id_Utilisateur=:Id_Utilisateur ORDER BY Date_creation DESC;";
        $statement = $this->db->prepare($request);
        $statement->execute([
            "Id_Utilisateur" => $Id_Utilisateur,
        ]);
        $result = $statement->fetchAll();
        return $result;
    }
    
    function getWhatsInFile($Id){
        $result = [];
        if (!$this->connected) {
            // Something went wrong during the connection to the database.
            // In this example, we simply do not perform the query...
            // A real website should display a message for users to understand while they cannot log in
            return $result;
        }
        // The request uses the MD5() functions since password should not be stored
        // without any protection in the database (i.e., use MD5() to store and retrieve passwords)
        $request = "SELECT * FROM document WHERE Id=:Id";
        $statement = $this->db->prepare($request);
        $statement->execute([
            "Id" => $Id,
        ]);
        $result = $statement->fetchAll();
        return $result;
    }
}