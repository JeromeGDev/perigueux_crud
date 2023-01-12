<?php
include ('environnement.php');
include_once ('functions.php');
$requestAuth = $bdd->query('SELECT *
                                    FROM roles');

$result = mysql_query("SHOW COLUMNS FROM ".$nom_table."");


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include('header.php'); ?>

    <main>
        <?php if (isset($sessionUserName)){ ?>
            <h2> Accès admin, utilisateur : <?= $sessionUserName ?></h2>
        <?php }?>
        <h3>Gestion de l'admin</h3>
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
            <table class="adminTable">
                <thead class="adminTableHeader">
                    <tr class="tableRow">
                        <th class="adminTableBox imageBox">Représentation</th>
                        <th class="adminTableBox">Nom Monstre</th>
                        <th class="adminTableBox">Description</th>
                        <!-- <th class="tableBox action modify">Modifier</th>
                        <th class="tableBox action delete">Supprimer</th> -->
                    </tr
                </thead>
                <tbody>
                <?php while ( $monsters = $request->fetchAll()){ ?>
                    <tr class="adminTableRow">
                        <td class="adminTableBox imageBox"></td>
                        <td class="adminTableBox tableTitle"></td>
                        <td class="adminTableBox tableDesc"></td>
                    </tr>                           
                <?php } ?>
                </tbody>
                <tfoot class="adminTableeFooter">
                    <tr>
                        <td colspan="5" class="adminTableBox action footerBox"><a class="adder" href="add_creature.php" >Ajouter un monstre</a></td> </tr>
                </tfoot>
            </table>
            </div>
        
 
    </main>
</body>
</html>

+
