<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php et bases de données</title>
</head>
<body>
<?php require_once('nav.php'); ?>

    <section style='border:solid 2px #000; margin-bottom:2rem; background-color:#ececec;padding: 2rem 5rem;'>
        <h2 style='padding:.5rem .8rem; background-color:#333;color:#e4e4e4;text-transform:uppercase; margin:1rem auto;text-align:center;'>Requête GET via url</h2>
        <p>En utilisant uniquement l'URL, envoyer des données ayant pour clé « ville » et « transport » et pour valeur associé la ville et le moyen de transport que vous voulez Afficher le resultat dans une balise HTML sous cette forme : « la ville choisie est … et le voyage se fera en … !»</p>

        https://"formulaires.php?ville=paris&moyen=train"
        <?php
            if (isset($_GET['ville']) && isset($_GET['transport'])) {
                $ville = htmlspecialchars($_GET['ville']);
                $transport = htmlspecialchars($_GET['transport']);

                echo"<p> la ville choisie est " . $ville." et le voyage se fera en ".$transport."!</p>";
            } else {
                echo "<p>Choisir un moyen de transport via l'url</p>";
            }
        ?>
    </section>
    <section style='border:solid 2px #000; margin-bottom:2rem; background-color:#ececec;padding: 2rem 5rem;'>
        <h2 style='padding:.5rem .8rem; background-color:#333;color:#e4e4e4;text-transform:uppercase; margin:1rem auto;text-align:center;'>GET : Affichage via formulaire</h2>
        <p>Faire un formulaire qui demande l'animal préféré à l'utilisateur, le message devra ensuite afficher : « Votre animal choisi est : .. »</p>
        <form action="formulaires.php" method="GET">
            <label for="favoriteAnimal">Quel est votre animal préféré ? :</label>
            <input type="text" name="animal" id="favoriteAnimal">
            <button>ENVOYER</button>
        </form>
        <?php
            if(isset($_GET["animal"])){
                $animal= htmlspecialchars($_GET["animal"]);
                echo '<p>Vous avez indiqué que votre animal préféré était :'.$animal."<p/>\n";
            }
        ?>
    </section>
    <section style='border:solid 2px #000; margin-bottom:2rem; background-color:#ececec;padding: 2rem 5rem;'>
        <h2 style='padding:.5rem .8rem; background-color:#333;color:#e4e4e4;text-transform:uppercase; margin:1rem auto;text-align:center;'>3.Requête POST</h2>
        <p>Faire un formulaire en méthode post qui aura un input pour choisir la couleur (trois minimum) et un input pour le pseudo. Afficher le pseudo sur la page et la couleur choisir en background color de la page</p>
        <section style='border:solid 2px #000; margin-bottom:2rem; background-color:#ececec;padding: 2rem 5rem;'>
        
            <form action="formulaires.php" method="POST">
                <h3>Quelle est votre couleur préférée ?</h3>
                    <div style="display:flex;gap:1rem;">
                        <label for="nickname">Votre pseudo :</label>
                        <input type="text" name="pseudo" id="nickname">
                    </div>
                
                    <div style="display:flex;gap:1rem;">
                        <label for="color1"><div style="display:block;width:50px;height:20px;background-color:#b0C741" width="50px" height="20px"></div></label>
                        <input type="radio" name="favoriteColor" id="color1" value="#b0C741">
                    </div>

                    <div style="display:flex;gap:1rem;">
                        <label for="color2"><div style="display:block;width:50px;height:20px;background-color:#41C0B7" width="50px" height="20px"></div></label>
                        <input type="radio" name="favoriteColor" id="color2" value="#41C0B7">
                    </div>

                    <div style="display:flex;gap:1rem;">
                        <label for="color3"><div style="display:block;width:50px;height:20px;background-color:#B0417C" width="50px" height="20px"></div></label>
                        <input type="radio" name="favoriteColor" id="color3" value="#B0417C">
                    </div>

                    <div style="display:flex;gap:1rem;">
                        <label for="color4">Couleur personnalisée</label>
                        <input type="color" name="customColor" id="color4">
                    </div>

                <button type="submit">ENVOYER</button>
            </form>
            <?php
            if (isset($_POST['pseudo'])){
                if (isset($_POST['favoriteColor'])){
                    if (isset($_POST['customColor'])){
                        $favoriteColors = htmlspecialchars($_POST['favoriteColor']);
                        $pseudo = htmlspecialchars($_POST['pseudo']);
                        if (isset($favoriteColors)){
                            $colorChosen = $favoriteColors ;
                        } else {
                            $colorChosen = htmlspecialchars($_POST['customColor']) ;
                        }
                        echo "<p>la couleur favorite de $pseudo couleur favorite <span style='background-color:$colorChosen'>$colorChosen<span> </p>" ;
                        //var_dump($_POST);
                    }
                }
            }
            ?>
        </section>
    </section>
    <section style='border:solid 2px #000; margin-bottom:2rem; background-color:#ececec;padding: 2rem 5rem;'>
        <h2 style='padding:.5rem .8rem; background-color:#333;color:#e4e4e4;text-transform:uppercase; margin:1rem auto;text-align:center;'>4.Dés numériques</h2>
        <p>Faire un formulaire POST qui permet de lancer des dés qui sont uniquement des multiples de 6. Envoyer un message d'erreur GET si le nombre choisi n'est pas valide.</p>
        <section style='border:solid 2px #000; margin-bottom:2rem; background-color:#ececec;padding: 2rem 5rem;'>
        <?php
                        $erreurMsg = null;
                        $successMsg = null;
                        $value = null;                    
                    if (isset($_POST["dice"])){
                        $dice = htmlspecialchars((int)$_POST['dice']);
                        $randomDice = htmlspecialchars(rand(1,$dice));
                        if (( $dice % 6 ) == 0){
                            echo $randomDice;
                        } else{
                            header('Location: formulaires.php?error=1');
                        }
                    }
                ?>
        <?php
            if (isset($_GET['error'])){
                echo "<p>Saisir une valeur valide, multiple de 6</p>";
            }
        ?>
            <form action="formulaires.php" method="POST">
                <h3>Saisir des multiples de 6</h3>
                <label for="des1">Choisir le nombre de faces du dés (multiple de 6)</label>
                <input type="number" name="dice" id="des1" placeholder="Saisir un nombre">
                <button type="submit">LANCER</button>
            </form>

        </section>
    </section>
    <section style='border:solid 2px #000; margin-bottom:2rem; background-color:#ececec;padding: 2rem 5rem;'>
        <h2 style='padding:.5rem .8rem; background-color:#333;color:#e4e4e4;text-transform:uppercase; margin:1rem auto;text-align:center;'>5.Jeux : nombre mystère</h2>
        <p>Il s’agit d’écrire un programme via un formulaire POST qui permette à un utilisateur de deviner un nombre compris entre 0 et 1000. Si le nombre proposé est plus petit ou plus grand que le nombre à deviner, le programme devra afficher un message d’erreur du type « Le nombre que vous proposez est trop petit » (ou « ... trop grand »). Tant que l’utilisateur n’aura pas trouvé le bon nombre, le programme lui demandera d’entrer une nouvelle valeur .</p>
        <section style='border:solid 2px #000; margin-bottom:2rem; background-color:#ececec;padding: 2rem 5rem;'>
        
            <form action="formulaires.php" method="POST">
                <h3>Devinez le bon nombre</h3>
                <input type="number" name="toguess" id="numbertoguess">

                
                <button>ENVOYER</button>

            </form>
   
        </section>
    </section>
</body>
</html>
