<?php
if (isset($_GET['exit'])){
    session_unset();
    $urlCourante=$_SERVER["REQUEST_URI"];
    $urlGet = explode("?",$urlCourante);
    header('Location: '.$urlGet[0]);
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MES FONCTIONS PHP</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body style="background:lightgrey;">
<nav class="navbar navbar-expand-md navbar-light" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="../index.php">
        <img src="../img/header-logo-truffaut-2018-1.png" width="241px" height="34px" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../communes.php">Les Communes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../jeu.php">Le jeu des lettres</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../tableau.php">Nos Produits</a>
            </li>
            <?php
            if (isset($_SESSION['username'])) {
                echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"formulaire/product.php\">Ajouter un produit</a></li>";
            }
            ?>
        </ul>
        <p class="my-2 my-md-0">
            <?php
            if (isset($_SESSION['username'])) {
                echo $_SESSION['username'];
                echo "<br><a href='?exit=yes'>Se déconnecter</a>";
            }else{
                echo "<a href=\"connexion.php\">Se connecter </a><br>";
                echo "<a href=\"connexion.php?action=inscription\">Créer un compte</a>";
            }
            ?>
        </p>
    </div>
</nav>
