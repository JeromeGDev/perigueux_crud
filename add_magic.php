<?php
    include_once 'environnement.php';
    $requestCatApt = $bdd -> query('SELECT *
                                        FROM cataptitude');

    if (isset($_POST['aptitudeName']) && isset($_POST['aptitudeDescription']) && isset($_POST['idTypeMagicForm'])){
        $aptitudeName = htmlspecialchars($_POST['aptitudeName']);
        $aptitudeDescription = htmlspecialchars($_POST['aptitudeDescription']);
        $idTypeMagicForm = htmlspecialchars($_POST['idTypeMagicForm']);

        $requestApt = $bdd -> prepare('INSERT INTO aptitudes(aptitudeName, aptitudeDescription, catAptitude_id)
                                        VALUES( ? , ? , ? )');
        $requestApt -> execute(array($aptitudeName , $aptitudeDescription , $idTypeMagicForm));

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
    <title>Ajouter des aptitudes</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include('header.php'); ?>
<?php if (isset($sessionUserName)){ ?>
    
    <main>
        <h2> <?= $sessionUserName ?> Cette page vous permet d'ajouter des aptitudes</h2>
                
        <form action="add_magic.php" method="POST" enctype="multipart/form-data" >
        <!-- <form action="process-form.php" method="POST" enctype="multipart/form-data" > -->
            <div class="inputGroup">
                <label for="monsterName">Nom de l'aptitude</label>
                <input type="text" name="aptitudeName" id="aptitudeName" >
            </div>
            <div class="inputGroup">
                <label for="aptitudeDescription">Description de l'aptitude</label>
                <textarea name="aptitudeDescription" id="aptitudeDescription" cols="30" rows="10"></textarea>
            </div>
            <div class="inputGroup">
                
                    <label for="idTypeMagicForm">Quelle type d'aptitude possède la créature :</label>
                    <select name="idTypeMagicForm" id="idTypeMagicForm">
                        <option value="0" autofocus disabled>Choisir type :</option>
                    <?php while($catAptitude = $requestCatApt->fetch()){ ?>    
                        <option value="<?= $catAptitude['id'] ?>"><?= $catAptitude['catAptitude_name'] ?></option>
                    <?php } ?>
                    </select>
                
            </div>
            <td><button>Enregistrer</button></td>
        </form>
        <?php } else { ?>
            <p> Vous devez être identifié pour accéder au formulaire d'ajout de créature</p>
        <?php }?>
    </main>
</body>
</html>

+
