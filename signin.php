<?php include_once('functions.php'); ?>
<?php include_once ('environnement.php'); ?>
<?php include_once ('encode.php'); ?>
<?php
    if (isset($_POST["useridsForm"]) && isset($_POST["userPsdForm"])){
        // stocke la saisie dans une variable
        $useridsForm =  htmlspecialchars(trim(strtolower($_POST["useridsForm"])));
        
        // la requête défini l'égalité entre les données saisies et les données de la bdd
        $requestCompare = $bdd -> prepare (' SELECT *
                                            FROM user
                                            WHERE userName = ? OR userMail = ?');
        $requestCompare -> execute (array($useridsForm , $useridsForm)); // défini que $useridsForm s'applique au userName ET au userMail de la requête

        $userPsdForm = htmlspecialchars(trim($_POST["userPsdForm"]));

        $passwordCrypt = encode($userPsdForm);

        while ($user = $requestCompare -> fetch()){
            //$user = $requestCheck -> fetch();
            if( $passwordCrypt === $user["userPsd"] ){
                $userId =  $user["id"];
                $_SESSION["userId"] = $userId;
                $_SESSION["userName"] = $useridsForm;
                header('Location: creatures.php?successconnect=1');
            } else {
                header('Location: index.php?successconnect=0');
            }
        }
        
        
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <meta name="description" content="Exercice de découverte de php">
</head>
<body>
    <?php include_once('header.php'); ?>
    <?php if (isset($sessionUserName)){ ?>
    <h2> Bienvenue <?= $sessionUserName ?></h2>
    <?php } else { ?>
        <h2> Bienvenue </h2>
        <p>vou devez vous connecter</p>
    <?php } ?>
        <h2>Connexion obligatoire</h2>
        <div class="connectionBlocks">
            <div class="connectionBlock">
                <h3>M'enregistrer</h3>
                <form action="connect.php" method="POST">

                    <div class="inputGroup">
                        <label for="userEmail">votre email</label>
                        <input type="email" required name="userMail" id="userEmail" placeholder="votre@email.ext">
                    </div>
                    <div class="inputGroup">
                        <label for="userName">Nom d'utilisateur</label>
                        <input type="text" required name="userName" id="userName" placeholder="Nom d'utilisateur">
                    </div>
                    <div class="inputGroup">
                        <label for="userPassword">Mot de passe</label>
                        <input type="password" required name="userPsd" id="userPassword">
                    </div>
                    <div class="inputGroup">
                        <label for="userPasswordConfirm">Confirmation de Mot de passe</label>
                        <input type="password" required name="userPsdConfirm" id="userPasswordConfirm">
                    </div>
                    <button>Valider inscription</button>

                </form>
            </div>
        </div>
</body>
</html>

