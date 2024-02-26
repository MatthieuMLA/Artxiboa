<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Env</title>
    </head>
<?php
class DBModel {

    // permet de cacher la connexion -> meilleur sécurité
    protected $db = null;
    protected $connected = false;


    /**
     * Constructeur
     * permet de se connecter à la base de données
     */

    public function __construct() {
        $this->connected = $this->connect_to_db();
    }


    /**
     * Pour se connecter à la base de données
     * Seul le constructeur s'occupe de cette fonction donc on le met en privé
     *
     * @return: true si la connexion a pu se faire, sinon non
     */
    private function connect_to_db() {   
        require __DIR__. "/../env_settings.php";     
        try {
            $this->db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $pwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            return true;
        }
        catch (Exception $e) {
            return false;
        }
    }
}

