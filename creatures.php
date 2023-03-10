<?php
include ('environnement.php');
include_once ('functions.php');
    $request = $bdd->query('SELECT *
                                    FROM monster');
    $request2 = $bdd->query('SELECT *
                            FROM monster
                            INNER JOIN user
                            ON monster.user_id = user.id');
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
<?php include('header.php'); ?>

    <main>
        <?php if (isset($sessionUserName)){ ?>
            <h2> <?= $sessionUserName ?>, voici la liste des créatures</h2>
        <?php }?>
        <h3>Les monstres</h3>
        <?php // vérification des messages de success récupérés en $_GET dans les messages de retour des header(Location:...)
            if(isset($_GET["success"])){
                $success = htmlspecialchars($_GET["success"]);
                switch($success) { // on peut utiliser aussi des if(){} elseif(){}...
                    case 1:
                        echo "<p>Votre créature à bien été ajoutée</p>";
                        break;
                    case 2:
                        echo "<p>Votre créature à bien été modifiée</p>";
                        break;
                    case 3:
                        echo "<p>Votre créature à bien été supprimée</p>";
                        break;
                }
            }
        ?>
            <table class="tableMonster">
                <thead class="tableHeader">
                    <tr class="tableRow">
                        <th class="tableBox imageBox">Représentation</th>
                        <th class="tableBox">Nom Monstre</th>
                        <th class="tableBox">Description</th>
                        <!-- <th class="tableBox action modify">Modifier</th>
                        <th class="tableBox action delete">Supprimer</th> -->
                    </tr
                </thead>
                <tbody>
                <?php while ( $monsters = $request->fetch()){ ?>
                    <tr class="tableRow">
                        <td class="tableBox imageBox"><img class="imgMonster" src="assets/img/<?= $monsters['image']?>" alt="Image de <?= $monsters['monster_name']?>"></td>
                        <td class="tableBox tableTitle"><?= $monsters['monster_name']?></td>
                        <td class="tableBox tableDesc"><?= $monsters['description']?></td>
                        <!-- <td class="tableBox action"><a class="modify" href="./modification_creature.php?id=<?= $monsters['id'];?>">Modifier</a></td>
                        <td class="tableBox action"><a class="delete" href="./delete_creature.php?id=<?= $monsters['id'];?>">Supprimer</a></td> -->
                    </tr>                           
                <?php } ?>
                </tbody>
                <tfoot class="tableFooter">
                    <tr>
                        <td colspan="5" class="tableBox action footerBox"><a class="adder" href="add_creature.php" >Ajouter un monstre</a></td> </tr>
                </tfoot>
            </table>
            <div class="sectionArticles">
                <?php while ( $monsters = $request2->fetch()){ ?>
                    <article>
                        <img class="imgMonster" src="assets/img/<?= $monsters['image']?>" alt="Image de <?= $monsters['monster_name'] ?>">
                        <h3 class="tableTitle"><?= $monsters['monster_name']?></h3>
                        <p><?= $monsters['description']?></p>
                        <p>AUTEUR : <?= $monsters['userName']?></p>
                        <div class="actionsContainer">
                            <!-- <a class="modify" href="./modification_creature.php?id=<?= $monsters['id'];?>">Modifier</a>
                            <a class="delete" href="./delete_creature.php?id=<?= $monsters['id'];?>">Supprimer</a> -->
                        </div>
                        
                    </article>
                    
                <?php } ?>
            </div>
        
 
    </main>
</body>
</html>

+
