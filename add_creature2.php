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

        move_uploaded_file($imageTmp, './assets/img/' .$image);
    }



    $requestadd = $bdd -> prepare('INSERT INTO monster(monster_name, description, image)
                                    VALUES( ? , ? , ? )');

    //SOIT
    $requestadd -> execute(array($name , $description , $image));

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
    <main>
        
        <h1>Ajouter une creature</h1>
        
        <form action="process-form.php" method="POST" enctype="multipart/form-data" >
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

            <div class="inputGroup">
                <label for="imageCreature">Importez l'image de la créature</label>
                <input type="file" name="imageUploaded" id="imageCreature">
            </div>
            <td><button>Valider</button></td>
            
        </form>
    </main>
</body>
</html>

+
