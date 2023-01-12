<?php include_once('functions.php'); ?>
<?php include_once 'environnement.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercices PHP divers</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <meta name="description" content="Exercice de découverte de php">
</head>
<body>
<?php include_once('header.php'); ?>
<?php if (isset($sessionUserName)){ ?>
<h2> Bienvenue <?= $sessionUserName ?></h2>
 <?php } else { ?>
    <h2> Bienvenue </h2>
 <?php } ?>

    <h2>Connexion obligatoire</h2>
    
</body>
</html>

