<?php
require '../inc/autoload.php';
require '../inc/form-functions.php';
var_dump($_SESSION);
// Vérification formulaire + inscription de l'utilisateur en BDD
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['creation'] == 1){
      $errorMessageUsername = checkPostText('username', 128);

    }else{
      $errorMessageUsername = null;
      $_POST['username'] = 0;
    }
    $errorMessageEmail = checkPostText('email', 255);
    $errorMessagePassword = checkPostText('password', 128);

    if (empty($errorMessageUsername) && empty($errorMessageEmail) && empty($errorMessagePassword))
    {
        // Il n'y a pas d'erreur, on passe à l'inscription
        $database = new Database();
        $database->connect();

        // On crée un utilisateur en local
        $user = new User();
        $user->setUsername($_POST['username']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);
        $queryCreate = "INSERT INTO app_user (username, email, password) VALUES (" .$database->getStrParamsSQL($user->getUsername(),$user->getEmail(),$user->getPassword()) .")";
        $queryVerif = "SELECT * FROM app_user WHERE email ='".$_POST['email']."'";

        if ($_POST['creation'] == 1){
          $success = $database->exec($queryCreate);
        }
        else{
           $userConnect = $database->queryUnique($queryVerif, 'User');
           var_dump($userConnect['password']);
           var_dump(password_hash($_POST['password'], PASSWORD_ARGON2I));
           if(password_verify($_POST['password'], $userConnect['password'])){
             $_SESSION['username'] = $userConnect['username'];

           }else{
               $errorMessageConnexion = "Les informations de connexions ne sont pas correctes";
           }
        }

    } else {
        var_dump("Problème");
    }
}
