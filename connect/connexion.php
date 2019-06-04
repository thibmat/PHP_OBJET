<?php
session_start();
//INCLUSION EN TETE + NAVBAR
require '../inc/header.php';
//INCLUSION TRAITEMENT formulaire
require '../connect/verif_connexion.php';
?>
<main class="text-center container w-25">
    <?php
    if (!isset($_SESSION['username'])) {
        ?>
        <form method="post">
            <?php if (isset($_GET['action']) && $_GET['action'] === 'inscription' ){
              $valid = 'S\'inscrire';
            ?>
                <h1 class="h3 mb-3 font-weight-normal">Créer un compte</h1>
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text"
                           class="form-control <?= (isset($errorMessageUsername) && !empty($errorMessageUsername)) ? 'is-invalid' : '' ?>"
                           id="username" name="username" value="<?= $_POST['username']  ?? '' ?>">
                    <div class="invalid-feedback"><?= $errorMessageUsername ?? "" ?></div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email"
                           class="form-control <?= (isset($errorMessageEmail) && !empty($errorMessageEmail)) ? 'is-invalid' : '' ?>"
                           id="email" name="email" value="<?= $_POST['email']  ?? '' ?>">
                    <div class="invalid-feedback"><?= $errorMessageEmail ?? "" ?></div>
                </div>
            <?php
            } else {
              $valid = 'Se connecter';
            ?>
                <h1 class="h3 mb-3 font-weight-normal">Se connecter</h1>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email"
                           class="form-control <?= (isset($errorMessageEmail) && !empty($errorMessageEmail)) ? 'is-invalid' : '' ?>"
                           id="email" name="email" value="<?= $_POST['email']  ?? '' ?>">
                    <div class="invalid-feedback"><?= $errorMessageEmail ?? "" ?></div>
                </div>
            <?php
            }
            ?>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password"
                       class="form-control <?= (isset($errorMessagePassword) && !empty($errorMessagePassword)) ? 'is-invalid' : '' ?>"
                       id="password" name="password" value="<?= $_POST['password']  ?? '' ?>">
                <div class="invalid-feedback"><?= $errorMessagePassword ?? "" ?></div>
            </div>

            <?php
            if (isset($_GET['action']) && $_GET['action'] === 'inscription' )
            {
            ?>
              <input type="hidden" id="creation" name="creation" value=1>
            <?php
            }
            ?>
            <input type="submit" value=<?= '"'.$valid.'"' ?> class="btn btn-outline-success">
        </form>
        <?php
    } else {
        echo "Hello ".$_SESSION['username'];
        echo "<br><a href='?exit=yes'>Se déconnecter</a>";
    }
    ?>
</main>
