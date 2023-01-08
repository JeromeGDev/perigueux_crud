<?php
include_once 'environnement.php';


if (isset($_POST['name']) && isset($_POST['descriptionInForm']) && isset($_POST['urlMonster'])){
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['descriptionInForm']);
    $image = htmlentities($_POST['urlMonster']);

    $requestadd = $bdd -> prepare('INSERT INTO monster(monster_name, description, image)
                                    VALUES (?,?,?)');

    //SOIT
    $requestadd -> execute(array($name,$description ,$image));
    // OU BIEN - qui est plus précis et lisible:
    // $request->execute(array(
    //     'monster_name'  => $name,
    //     'description'   => $description,
    //     'image'         => $image
    // ));
    header('Location: ./creatures.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une creature</title>
</head>
<body>
    <header>
        <?php include_once('nav.php'); ?>
    </header>
    <main>
        
        <h1>Ajouter une creature</h1>
        
        <form action="add_creature.php" method="POST" enctype="multipart/form-data" >
            
            <label for="monsterName">Nom de la créature</label>
            <input type="text" name="name" id="monsterName" >
            
            <label for="monsterDescription" value="">Description de la créature</label>
            <textarea name="descriptionInForm" id="monsterDescription" cols="30" rows="10"></textarea>

            <label for="monsterImage" value="">Url de l'image (si image ajoutée manuellement)</label>
            <input type="text" name="urlMonster" id="monsterImage">

            <label for="imageCreature">Choisissez l'image de la créature</label>
            <input type="file" name="monsterImageUpload" id="imageCreature">
            
            <td><button>Valider</button></td>
            
        </form>
    </main>
</body>
</html>

+
