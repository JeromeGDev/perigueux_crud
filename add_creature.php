<?php
include_once 'environnement.php';

if (isset($_POST['name']) && isset($_POST['descriptionInForm'])){

    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['descriptionInForm']);

    if (isset($_FILES['imageUploaded'])){

        //Nom du fichier image dans une variable
        $image = $_FILES['imageUploaded']['name'];

        //Nom Temporaire du fichier image dans une variable
        $imageTmp = $_FILES['imageUploaded']['tmp_name'];

        $infoImage = pathinfo($image);

        $extImage = $infoImage["extension"];
        $imageName = $infoImage["filename"];

        $filename = $imageName . "." .time() . rand(1,1000). "." . $infoImage["extension"];

        move_uploaded_file($imageTmp, './assets/img/' .$image);
    }


    //var_dump($_FILES['imageUploaded']);

    $requestadd = $bdd -> prepare('INSERT INTO monster(monster_name, description, image, user_id)
                                    VALUES( ? , ? , ? , ? )');

    //SOIT
    $requestadd -> execute(array($name , $description , $image, $sessionUserId));
    // OU BIEN - qui est plus précis et lisible:
    // $request = $bdd -> prepare('INSERT INTO monster(monster_name, description, image)
    //                      VALUES(:monster_name = monster_name, :description = description , :image = image
    // WHERE id = ? ');  

    // $request -> execute(array($name,$description ,$image, $articleId ));

    // $request->execute(array(
    //     'monster_name'  => $name,
    //     'description'   => $description,
    //     'image'            => $image
    // ));
    header('Location: ./creatures.php?success=1');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une creature</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include('header.php'); ?>
<?php if (isset($sessionUserName)){ ?>
    <h2> <?= $sessionUserName ?> Cette page vous permet d'ajouter une creature</h2>


    <main>
        
        <h1>Ajouter une creature</h1>
        
        <form action="add_creature.php" method="POST" enctype="multipart/form-data" >
        <!-- <form action="process-form.php" method="POST" enctype="multipart/form-data" > -->
            <div class="inputGroup">
                <label for="monsterName">Nom de la créature</label>
                <input type="text" name="name" id="monsterName" >
            </div>
            <div class="inputGroup">
                <label for="monsterDescription">Description de la créature</label>
                <textarea name="descriptionInForm" id="monsterDescription" cols="30" rows="10"></textarea>
            </div>
            <div class="inputGroup">

            <!-- <label for="monsterImage" value="">Url de l'image (si image ajoutée manuellement)</label>
                <input type="text" name="urlMonster" id="monsterImage">
            </div> -->
            <div class="inputGroup">
                <label for="imageCreature">Importez l'image de la créature</label>
                <input type="file" name="imageUploaded" id="imageCreature">
            </div>
            <td><button>Valider</button></td>
            
        </form>
        <?php } else{ ?>
            <p> Vous devez être identifié pour accéder au formulaire d'ajout de créature</p>
        
        <?php }?>
    </main>
</body>
</html>

+
