<?php
    include_once 'environnement.php';

    $request2 = $bdd->prepare('SELECT *
                                FROM user
                                INNER JOIN monster
                                ON user.id = monster.user_id
                                WHERE user_id = ?');
    $request2 -> execute(array($sessionUserId));

while ( $monsters = $request2->fetch()){

    if($sessionUserId = $monster['user_id']){

    $articleId = htmlentities($_GET['id']);

    $requestDEL = $bdd -> prepare('DELETE FROM monster
                                    WHERE id = ? ');  
    $requestDEL -> execute(array($articleId));
    header('Location: ./creatures.php?success=3');
    exit();
    } else {
        header('Location: indexphp');
    }
}
