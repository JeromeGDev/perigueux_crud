<?php
require_once('functions.php');
        $numberToTest = htmlspecialchars((int)$_GET['numberToTest']);
    if (isset($numberToTest)){
        echo "le nombre à tester est $numberToTest <br>";
        if ( !(( $numberToTest == 0) || ($numberToTest == null))  ){
            isPairTest( $numberToTest );
        } else{
            echo "test impossible sans valeur"."\n";
        }
    } else{
        echo "en attente d'un nombre à saisir<br>";
    } 


?>
