<?php include_once('functions.php'); ?>
<?php include_once ('environnement.php'); ?>
<?php include_once ('encode.php'); ?>
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
        <div class="connectionBlock">
            <h3>Déja enregistré? connectez vous!</h3>
            <form action="connect.php" method="POST">

                <div class="inputGroup">
                    <label for="userid">Nom d'utilisateur ou email</label>
                    <input type="text" required name="useridsForm" id="userId" placeholder="Henri, henri@fai.com">
                </div>
                <div class="inputGroup">
                    <label for="userPassword">Mot de passe</label>
                    <input type="password" required name="userPsdForm" id="userPassword">
                </div>
                <button>Me connecter</button>

                </form>
        </div>
    </div>
    <?php

        
        if (isset($_POST["userMail"]) && isset($_POST["userName"]) && isset($_POST['userPsd']) && isset($_POST['userPsdConfirm'])){

            $userMail = htmlspecialchars(trim(strtolower($_POST["userMail"])));
            $userName = htmlspecialchars(trim(strtolower($_POST["userName"])));
            $userPsd = htmlspecialchars(trim($_POST["userPsd"]));
            $userPsdConfirm = htmlspecialchars(trim($_POST["userPsdConfirm"]));

            //if(!$userMail || !$userName || !$userPsd || !$userPsdConfirm){ // fonctionne si tim() // sinon utiliser ligne ci-dessous
            if(empty($_POST["userMail"]) || empty($_POST["userName"]) || empty($_POST["userPsd"]) || empty($_POST["userPsdConfirm"])){
                echo '<div>Erreur de remplissage du formulaires</div>';
            } else {
                if ($userPsd == $userPsdConfirm){
                    // maintenant, vérifier si l'utilisateur existe :
                        $requestCount = $bdd -> prepare (' SELECT COUNT(*) AS usercount
                                                            FROM user
                                                            WHERE username = ?');
                        $requestCount -> execute (array($userName));

                        while ($count = $requestCount -> fetch()){

                            $countVerify = $count['usercount'];

                            if($countVerify < 1){
                                $passwordCrypt = encode($userPsdForm);
            
                                $requestAddUser = $bdd -> prepare('INSERT INTO user(userName, userMail, userPsd)
                                                            VALUES( ? , ? , ?  )');
                            
                                $requestAddUser -> execute(array($userName , $userMail , $passwordCrypt));
                                header('Location: creatures.php?successinscript=1');
                            } else {
                                header('Location: index.php?passworderror=1');
                            }
                        }

                }
            }
        }

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
    
</body>
</html>

