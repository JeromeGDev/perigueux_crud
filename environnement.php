<?php
/*try{*/
  session_start();
  $bdd = new PDO ('mysql:host=localhost;dbname=academie;charset=utf8', 'root' ,'');
  /*}catch(Exception $e) {
      die('Erreur' .$e->getMessage());
    };*/
    if (isset($_SESSION["userId"]) && isset($_SESSION["userName"])){
      $sessionUserId = $_SESSION["userId"];
      $sessionUserName = $_SESSION["userName"];
    }

