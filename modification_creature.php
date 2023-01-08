<?php
include_once 'environnement.php';

$articleId = htmlentities($_GET['id']);


// requete de lecture de l'article en cours
$requestSelect = $bdd -> prepare('SELECT *
                                FROM monster
                                WHERE id = ?');
// requete d'execution de l'article en cours
$requestSelect -> execute(array($articleId));


if (isset($_POST['name']) && isset($_POST['descriptionInForm']) && isset($_POST['urlMonster'])){
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['descriptionInForm']);
    $image = htmlentities($_POST['urlMonster']);

    //SOIT
    $request = $bdd -> prepare('UPDATE monster
                            SET monster_name = ?, description = ? , image = ?
                            WHERE id = ? ');  
    
    $request -> execute(array($name,$description ,$image, $articleId ));
    // OU BIEN - qui est plus précis et lisible:
    // $request = $bdd -> prepare('UPDATE monster
    //                      SET monster_name = monster_name, description = description , image = image
    // WHERE id = ? ');  

    // $request -> execute(array($name,$description ,$image, $articleId ));

    // $request->execute(array(
    //     'monster_name'  => $name,
    //     'description'   => $description,
    //     'image'            => $image
    // ));
    header('Location: ./creatures.php?success=2');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les monstres</title>
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
<?php require_once('header.php'); ?>
    <main>
        
        <h1>Modification du monstre</h1>
        
        <form action="modification_creature.php<?= '?id=' . $articleId ?>" method="POST">
        
        <?php while($value = $requestSelect->fetch()) {?>
            
            <label for="monsterName">Nom de la créature</label>
            <input type="text" name="name" id="monsterName" value=" <?=$value['monster_name']; ?>">
            
            <label for="monsterDescription">Description de la créature</label>
            <textarea name="descriptionInForm" id="monsterDescription" cols="30" rows="10"><?=$value['description'];?></textarea>

            <label for="monsterImage">Description de la créature</label>
            <input type="text" name="urlMonster" id="monsterImage" value="<?=$value['image'];?>">
            
            <td><button>Valider</button></td>
            
        <?php } ?>

        </form>
    </main>
</body>
</html>

+
