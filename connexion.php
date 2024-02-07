<?php
$bdd = new PDO('mysql:host=localhost;dbname=artxiboa;charset=utf8;', 'root', '');
if(isset($_POST['envoi'])){
    if(!empty($_POST['email']) AND !empty($_POST['mdp'])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']);

        $recupUser = $bdd->prepare('SELECT * FROM utilisateur')
    }
}else{
    echo "Veuillez compléter tous les champs";
}   
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Connexion</title>
        <meta charset="utf-8">
    </head>

    <body>
        <form method="POST" action="" align="center">
            <input type="email" name="email" autocomplete="off">
            <br>
            <input type="password" name="mdp" id="mdp"autocomplete="off">
            <br>
            <input type="submit" name="envoi">
        </form>
    </body>
</html>