
<?php

require("DBModel.php");

class UserModel extends DBModel {
    /**
     * But est de pouvoir appeler cette variable dans le futur
     */
    var $ID_Utilisateur;
    /**
     * @return un array avec firstname, lastname, role et identifiant
     */
    function check_login(string $login, string $password) {
        $result = [];
        if (!$this->connected) {
            // Si il y a un probleme avec la connexion à la db
            // Ici on n'affiche rien
            return $result;
        }
        // La requete utilise la fonction MD5() car le mot de passe ne devrait pas être enregistré
        // test que l'utilisateur avec le mdp existe
        $request = "SELECT * FROM user WHERE login=:login AND password=MD5(:password)";
        $statement = $this->db->prepare($request);
        $statement->execute([
            "login" => $login,
            "password" => $password
        ]);
        $entries = $statement->fetchAll();
        // si c'est vide c'est qu'il n'y a pas d'utilisateur avec ce mdp
        if (count($entries) == 1) {
            $result["firstname"] = $entries[0]['firstname'];
            $result["lastname"] = $entries[0]['lastname'];
            $result["Role"] = $entries[0]['Role'];
            $result["Id"] = $entries[0]['Id']; 
            $Id_Utilisateur = $result["Id"];
        }
        return $result;
    }

    /*
    * Affecte le contenu du document
    * Target le document à partir de son ID et change son contenu 
    * Ne retrourne rien
    */
    function change_document(string $IdFile, string $ContenuFile) {
        $result = [];
        if (!$this->connected) {
            // Si il y a un probleme avec la connexion à la db
            // Ici on n'affiche rien
            return $result;
        }
        $request = "UPDATE document SET Contenu=:ContenuFile WHERE Id=:IdFile";
        $statement = $this->db->prepare($request);
        $statement->execute([
            "ContenuFile" => $ContenuFile,
            "IdFile" => $IdFile
        ]);
        
    }

    /*
    * Affecte l'état du document
    * Target le document à partir de son ID et change son état ici pour valider donc etat=3
    * Ne retrourne rien
    */
    function valider_document(string $IdFile) {
        $result = [];
        if (!$this->connected) {
            // Si il y a un probleme avec la connexion à la db
            // Ici on n'affiche rien
            return $result;
        }
        $request = "UPDATE document SET Etat=3 WHERE Id=:IdFile";
        $statement = $this->db->prepare($request);
        $statement->execute([
            "IdFile" => $IdFile
        ]);
        
    }

    /*
    * Affecte l'état du document
    * Target le document à partir de son ID et change son état ici pour refuser donc etat=2
    * Ne retrourne rien
    */
    function refuser_document(string $IdFile) {
        $result = [];
        if (!$this->connected) {
            // Si il y a un probleme avec la connexion à la db
            // Ici on n'affiche rien
            return $result;
        }
        $request = "UPDATE document SET Etat=2 WHERE Id=:IdFile";
        $statement = $this->db->prepare($request);
        $statement->execute([
            "IdFile" => $IdFile
        ]);
        
    }

    /*
    * Affecte l'état du document
    * Target le document à partir de son ID et change son état ici pour envoyer vers validation donc etat=4
    * Ne retrourne rien
    */
    function envoyer_document(string $IdFile) {
        $result = [];
        if (!$this->connected) {
            // Si il y a un probleme avec la connexion à la db
            // Ici on n'affiche rien
            return $result;
        }
        $request = "UPDATE document SET Etat=4 WHERE Id=:IdFile";
        $statement = $this->db->prepare($request);
        $statement->execute([
            "IdFile" => $IdFile
        ]);
        
    }

    /*
    * Affecte la db pour y ajouter un document
    * Toutes les infos du document sont donnés en entrée
    * Se connecte à la db et ajoute un nouveau document 
    * Retourne les infrmations du document
    */
    function add_file(string $Titre, string $Type, string $Contenu, string $Date_creation, int $Etat, int $Id_Utilisateur, int $Id_template) {
        $result = [];
        if (!$this->connected) {
        // Si il y a un probleme avec la connexion à la db
        // Ici on n'affiche rien
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
        //$entries = $statement->fetchAll();
        //if (count($entries) == 1) {
        //    $result["Titre"] = $entries[0]['Titre'];
        //    $result["Type"] = $entries[0]['Type'];
        //    $result["Contenu"] = $entries[0]['Contenu'];
        //    $result["Date_creation"] = $entries[0]['Date_creation'];
        //    $result["Etat"] = $entries[0]['Etat'];
        //    $result["Id_Utilisateur"] = $entries[0]['Id_Utilisateur'];
        //    $result["Id_template"] = $entries[0]['Id_template'];
        //}
        $result["Titre"] = $Titre;
        $result["Type"] = $Type;
        $result["Contenu"] = $Contenu;
        $result["Date_creation"] = $Date_creation;
        $result["Etat"] = $Etat;
        $result["Id_Utilisateur"] = $Id_Utilisateur;
        $result["Id_template"] = $Id_template;
        return $result;
    }


    /*
    * Affecte la db
    * Retourne tous les documents de la db - Pas utilisé actuellement
    */
    function display_file(){
        $result = [];
        if (!$this->connected) {
            // Si il y a un probleme avec la connexion à la db
            // Ici on n'affiche rien
            return $result;
        }
        $request = "SELECT * FROM document";
        $statement = $this->db->prepare($request);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    /*
    * Se base sur la fonction display_file() seulement limiter aux documents toujours en etat de modification ou refuser donc etat=1 ou =2
    * Retourne tous les fichiers ayant pour etat 1 ou 2
    */
    function display_file_modified(){
        $result = [];
        if (!$this->connected) {
            // Si il y a un probleme avec la connexion à la db
            // Ici on n'affiche rien
            return $result;
        }
        $request = "SELECT * FROM document WHERE Etat=1 OR Etat=2";
        $statement = $this->db->prepare($request);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    /*
    * Se base sur la fonction display_file() seulement limiter aux documents toujours en etat de refus donc etat=2
    * Retourne tous les fichiers ayant pour etat 2
    */
    function display_file_refused(){
        $result = [];
        if (!$this->connected) {
            // Si il y a un probleme avec la connexion à la db
            // Ici on n'affiche rien
            return $result;
        }
        $request = "SELECT * FROM document WHERE Etat=2";
        $statement = $this->db->prepare($request);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    /*
    * Se base sur la fonction display_file() seulement limiter aux documents toujours en etat à valider donc etat=4
    * Retourne tous les fichiers ayant pour etat 4
    */
    function display_file_to_validate(){
        $result = [];
        if (!$this->connected) {
            // Si il y a un probleme avec la connexion à la db
            // Ici on n'affiche rien
            return $result;
        }
        $request = "SELECT * FROM document WHERE Etat=4";
        $statement = $this->db->prepare($request);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    /*
    * Se base sur la fonction display_file() seulement limiter aux documents toujours en etat de modification donc etat=3
    * Retourne tous les fichiers ayant pour etat 3
    */
    function display_file_archived(){
        $result = [];
        if (!$this->connected) {
            // Si il y a un probleme avec la connexion à la db
            // Ici on n'affiche rien
            return $result;
        }
        $request = "SELECT * FROM document WHERE Etat=3";
        $statement = $this->db->prepare($request);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    /*
    * Se base sur la fonction display_file() seulement limiter aux documents appartenant à un Id_user
    * Retourne tous les fichiers ayant pour Id_Utilisateur celui qu'on cherhce
    */
    function getRecentFiles($Id_Utilisateur){
        $result = [];
        if (!$this->connected) {
            // Si il y a un probleme avec la connexion à la db
            // Ici on n'affiche rien
            return $result;
        }
        $request = "SELECT * FROM document WHERE Id_Utilisateur=:Id_Utilisateur ORDER BY Date_creation DESC;";
        $statement = $this->db->prepare($request);
        $statement->execute([
            "Id_Utilisateur" => $Id_Utilisateur,
        ]);
        $result = $statement->fetchAll();
        return $result;
    }
    
    /*
    * Questionne la db pour avoir le contenu d'un document repéré par son Id
    * Retourne le contenu d'un fichier particulier
    */
    function getWhatsInFile($Id){
        $result = [];
        if (!$this->connected) {
            // Si il y a un probleme avec la connexion à la db
            // Ici on n'affiche rien
            return $result;
        }
        $request = "SELECT * FROM document WHERE Id=:Id";
        $statement = $this->db->prepare($request);
        $statement->execute([
            "Id" => $Id,
        ]);
        $result = $statement->fetchAll();
        return $result;
    }
}