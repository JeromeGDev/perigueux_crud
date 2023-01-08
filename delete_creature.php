<?php
include_once 'environnement.php';
$articleId = htmlentities($_GET['id']);

$requestDEL = $bdd -> prepare('DELETE FROM monster
                                WHERE id = ? ');  
$requestDEL -> execute(array($articleId));
header('Location: ./creatures.php?success=3');
exit();
