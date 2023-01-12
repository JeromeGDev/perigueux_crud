<!-- est-il possible de stocker les url des pages dans les variables d'environnement de manière à faciliter la gestion des liens de navigation et leur utilisation dans les pages, exemple, ajouter un renvoi vers un page de login-->
<nav>
    <ul class="navUl">
        <li class="navBtn" >
            <a class="navBtn_a" href="./index.php">Accueil</a>
        </li>

        <li class="navBtn" >
                <a class="navBtn_a" href="./exercices.php">Exercices PHP</a>
        </li>
        
        <li class="navBtn" >
                <a class="navBtn_a" href="./creatures.php">Toutes les Créatures</a>
        </li>
        
        <?php if (isset($sessionUserId)) { ?>
            <li class="navBtn" >
                    <a class="navBtn_a" href="./mycreatures.php">Mes Créatures</a>
            </li>
        <?php }?>

        <?php if (isset($sessionUserId)) { ?>
            <li class="navBtn" >
                <a class="navBtn_a" href="./add_creature.php">Créer une créature</a>
            </li>
        <?php }?>

        <?php if (isset($sessionUserId)) { ?>
            <li class="navBtn" >
                <a class="navBtn_a" href="./add_magic.php">Ajouter Aptitudes</a>
            </li>
        <?php }?>

        <?php if (!isset($sessionUserId)) { ?>
            <li class="navBtn" >
                <a class="navBtn_a" href="./signin.php">S'enregistrer</a>
            </li>
        <?php }?>

        <!-- <li class="navBtn" >
            <a class="navBtn_a" href="./add_creature2.php">Créer une créature2</a>
        </li> -->

        <li class="navBtn" >
            <?php if (isset($sessionUserId)) { ?>
                <a class="navBtn_a" href="./deconnect.php">Se Deconnecter</a>
            <?php } else { ?>
                <a class="navBtn_a" href="./connect.php">Se connecter</a>
            <?php }?>
        </li>
    </ul>
</nav>
