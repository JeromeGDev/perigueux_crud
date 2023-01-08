<?php
include('functions.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercices php</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include_once('header.php'); ?>
    <main>
    <section class="sectionExercicesPhp">
        <h2 class="h2ExercicesPhp">Titre html1</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio accusantium reiciendis esse quibusdam, quis vero. Dolor impedit numquam suscipit, nulla dolores animi eaque tempora illo, rem itaque odio ducimus obcaecati.</p>
        
        <?php echo 'Mon premier texte php'; ?>
        <?php echo '<h2>Mon premier titre h2 php</h2>'; ?>
        <!-- echo 'xx'; permet d'afficher du texte-->
        <?php
            $age = 51;
            echo 'J\'ai '.$age.'ans';
        ?>
    </section>

    <section class="sectionExercicesPhp">
        <h2 class="h2ExercicesPhp">Exercice 1</h2>
        <h3>Voici la liste des 25 premiers entiers, incluant 0, donc, s'arrêtant à 24:</h3>
            <?php
                for( $i=0 ; $i < 25 ; $i++ ){
                    echo ''.$i.',';
                };
                for( $i=25 ; $i <= 25 ; $i++ ){
                    echo ''.$i.'.<br>';
                };
            ?>
    </section>

    <section class="sectionExercicesPhp">
        <h2 class="h2ExercicesPhp">Exercice 2</h2>
        <h3> les 25 premiers entiers par ordre décroissant, incluant 25, et s'arrêtant donc à 1 sont :</h3>
            <?php
                $i = 25;
                while( $i > 1 ){
                    echo ' '.$i--.', ';
                    if ( $i == 1 ){
                        echo ' '.$i--.'.<br>';  
                    }
                }
            ?>
    </section>
    
    <section class="sectionExercicesPhp">
            <h2 class="h2ExercicesPhp">Exercice 3</h2>
            <h3> liste incrémentielle des 25 premiers entiers, ligne par ligne</h3>
            <?php

                // on veut afficher une suite de valeurs, la tableau semble la meilleure solution pour réaliser cette opération
                $ivalues = [];

                for ( $i = 1 ; $i <= 25 ; $i++ ){
                
                    // définit un tableau ivalues qui contiendra toutes les valeurs à afficher et contenant la valeur initiale i - =0 pour le premier element
                    $ivalues[] = $i;

                    // dans le tableau ivalues, pour chaque ivalue on affiche le contenu du
                    foreach( $ivalues as $ivalue ){

                        echo $ivalue . ' ';

                    }
                    echo "<br/>";
                }
            ?>
            <?php // CORRECTION
            for ( $i = 1 ; $i <= 25 ; $i++){
                for ($k = 1; $k <= $i ; $k++){
                    echo $k. " ";
                }
                echo "<br>";
            }
            ?>
    </section>

    <section class="sectionExercicesPhp">
        <h2 class="h2ExercicesPhp">Exercice 4</h2>
        <h3> Somme des 30 premiers entier privés de 0 : 1+2+3+4+5+....+30</h3>
        <?php

            $avalues=[];
            
            for ( $j = 1 ; $j <= 30 ; $j++ ){
                $avalues[] = $j ;
            }

            echo "Somme(1=>30) = 1 + 2 + 3 + 4 + 5 + 6 + 7 + 8 + 9 + 10 + 11 + 12 + 13 + 14 + 15 + 16 + 17 + 18 + 19 + 20 + 21 + 22 + 23 + 24 + 25 + 26 + 27 + 28 + 29 + 30 ="  . array_sum( $avalues) . ".\n";

        ?><p>
        <?php
            
                $n=0;
                for ( $k = 1 ; $k <= 30 ; $k++ ){
                    $n = $n + $k;
                }
                echo "$n <br>";
            
        ?></p>
    </section>

    <section class="sectionExercicesPhp">
        <h2 class="h2ExercicesPhp">Exercice 5</h2>

        <h3> Fonction paire : vérifie si un nombre est pair</h3>

        <?php
            $number = 100;
            if (( $number == (0 || null) ) != true ){
                isPair( $number );
            } else{
                echo "test impossible sans valeur"."\n";
            }

        ?>
        <h2 class="h2ExercicesPhp">Exercice 5 - autre version</h2>

        <h3> Fonction paire : vérifie si un nombre est pair à partir d'un formulaire</h3>
        <div>
            <form action="exercices.php" method="GET" class='isEven'>
                <label for="numberToTest">Saisissez un nombre à tester : </label>
                <input  style='margin-left:1rem;' type="numberToTest" name="numberToTest" id="numberToTest">
                <input style='margin-left:2rem;' type="submit" value="Tester le nombre saisi" id="validator">
            </form>
            <?php
                if(isset($_GET['numberToTest'])){
                    $numberToTest = htmlspecialchars((int)$_GET['numberToTest']);
                    isEven( $numberToTest );
                }
            ?>
        </div>



    </section>

    <section class="sectionExercicesPhp">
        <h2 class="h2ExercicesPhp">Exercice 6</h2>

        <h3> En utilisant la fonction de l'exercice précédant, afficher uniquement les nombre pair de 1 a 20</h3>

        <?php
            $min = 0;
            $max = 20;
            // Détermine si un nombre est pair entre la valeur min et la valeur max
            for ( $i = $min ; $i <= $max ; $i++ ){
                isEven( $i );
            }


            // fourni la liste des nombres pairs <= entre les valeurs min max
            echo "<h3>Affichage sous forme de liste : </h3>";
            echo "Liste des nombres pairs entre $min et $max : ";
            for ( $i = $min ; $i < $max ; $i++ ){
                $newNumbers = [];
                $newNumbers[] = $i+1;
                
                foreach( $newNumbers as $newNumber ){
                    
                    allEvens( $newNumber,$max );

                }
            }


        ?>
    </section>


    <section class="sectionExercicesPhp">
        <h2 class="h2ExercicesPhp"'>Exercice 7</h2>
        <h3> Faire une fonction qui permet de trouver l’hypoténuse d'un triangle rectangle.</h3>
        <p>Pour rappel le théorème de Pythagore qui permet de calculer l’hypoténuse est :</p>
        <p>a²=b²+c² (La longueur b et c sont connue.)</p>
        <?php
            $b = 5;
            $c = 10;
            $a = round(hypo( $b,$c),2 );
            if(isset($a) && isset($b) && isset($c)){
                echo 'un triangle de cote '.$b.'cm et '.$c.'cm  aura une longueur d\'hypotenus égale à '.$a.'cm <br>';
            }
        ?>
        <section class="sectionExercicesPhp">
            <h2 class="h2ExercicesPhp"'>Pythagore dynamique</h2>
            <h3> Ne renseignez que les champs connus et laissez vide le champs dont vous souhaitez connaître la valeur</h3>
            <div class="pythagore">
                <form class="pythagoreForm" action="exercices.php" method="GET">
                    <div class="inputGroup">
                        <label for="mesure">Votre unité de mesure ?</label>
                        <select type="text" name="unityMesure" id="mesure">
                            <option disabled value="0">Choisissez votre unité de mesure</option>
                            <option value="mm">mm</option>
                            <option value="cm">cm</option>
                            <option value="dm">dm</option>
                            <option value="m">m</option>
                            <option value="km">km</option>
                        </select>
                    </div>
                    <div class="inputGroup">
                        <label for="side1">Longueur du premier coté</label>
                        <input type="number" name="firstSide" id="side1" placeholder="laisser vide l'inconnue">
                    </div>
                    <div class="inputGroup">
                        <label for="side2">Longueur du deuxième coté</label>
                        <input type="number" name="secondSide" id="side2" placeholder="laisser vide l'inconnue">
                        </div>
                    <div class="inputGroup">

                        <label for="hypotenus">Longueur de l’hypoténuse</label>
                        <input type="number" name="hypotenuseSide" id="hypotenus" placeholder="laisser vide l'inconnue">
                    </div>
                    <button>Chercher la valeur manquante</button></form>
                <div class="result">

                    <?php
                        if((isset($_GET['firstSide']) || isset($_GET['secondSide']) || isset($_GET['hypotenuseSide'])) && isset($_GET['unityMesure'])){
                            $fs = htmlspecialchars((int)$_GET['firstSide']);
                            $ss = htmlspecialchars((int)$_GET['secondSide']);
                            $hs = htmlspecialchars((int)$_GET['hypotenuseSide']);
                            $um = htmlspecialchars((string)$_GET['unityMesure']);

                            if(
                                (isset($fs) && isset($ss) && isset($um) ) ||
                                (isset($ss) && isset($hs) && isset($um) ) ||
                                (isset($fs) && isset($hs) && isset($um) )
                            ){
                                
                                echo '<div class="resutltString">';
                                pythagore($fs,$ss,$hs,$um);// retourne les valeurs
                                echo '</div>';
                                echo '<div class="resultVisuel" "style=height:'.($hs*1.1).'">';
                                    echo '<div style="display: inline-block;height : 0;width : 0;border-right : '.($fs*10).'px solid transparent;border-bottom : '.($ss*10).'px solid green;border-left : '.($hs*10).'px solid transparent;"'.'<br>';
                                echo '</div>';
                            }
                        }
                    ?>
                </div>
            </div>
        </section>
    </section>

    <section class="sectionExercicesPhp">
        <h2 class="h2ExercicesPhp">Exercice 8</h2>
        <h3>Déclarez une variable $heure et faire une condition qui permette de savoir si c'est le matin l'après midi ou le soir</h3>

        <?php
     
        date_default_timezone_set("Europe/Paris" );
        $heure = date("H" );
        $minute = date("i" );
        $seconde = date("s" );
        $heure_actuelle =  date("H:i:s" );

        if (( $heure > 06) && ( $heure < 12) ){
            echo "Nous sommes le matin, et il est $heure_actuelle.<br>";
        } else if (( $heure >= 12) && ( $heure < 18) ){
            echo "Nous sommes l'apres-midi, et il est $heure_actuelle.<br>";
        } else if (( $heure >= 18) && ( $heure < 22) ){
            echo "Nous sommes le soir, et il est $heure_actuelle.<br>";
        } else if ((( $heure > 22) && (( $heure < 23) & ( $minute < 59) && ( $seconde < 59))) || (( $heure > 00) & ( $heure < 06)) ){
            echo "Nous sommes la nuit, et il est $heure_actuelle.<br>";
        }
        ?>
    
    
    </section>

    <section class="sectionExercicesPhp">
        <h2 class="h2ExercicesPhp">Exercice 9</h2>
        <h3>Condition ternaire</h3>
        <p>Utiliser la fonction EstPair de l'exercice 5 pour écrire une condition ternaire qui vérifie si un nombre est pair</p>

        <<pre class="balisePreExercicesPhp">
        function isAlsoPair( $number ){
                echo ( $number%2) == 0 ? "Le nombre $number est pair" : "Le nombre $number est impair" . ";\n";
            }
        </pre>

        <?php
            $number = rand(1,200);
            isAlsoPair( $number );
            echo "Test de cette fonction sur la valeur $number : <br>";

        ?>
    
    </section>

    <section class="sectionExercicesPhp">
        <h2 class="h2ExercicesPhp">Exercice 10</h2>
        <h3>foo, bar ou foobar?</h3>
        <p>Affichez les nombres de 1 à 100, pour les multiples de 5 vous afficherez "bar", pour les multiples de 3 vous afficherez "foo" et pour les multiples de 3 et de 5 vous afficherez "foobar".</p>

        <?php
            
            for ( $i = 1 ; $i <= 100 ; $i++) {

                if ( ( ( $i % 5 ) == 0) && ( ( $i % 3 ) == 0) ) {
                    echo "<p class='pExercicePhpExo10'>le nombre $i est un multiple de 3 et de 5 donc :<span class='spanExercicePhpExo10' id='value5et3'>foobar </span></p>";
                } elseif ( ( $i % 5 ) == 0 ){
                    echo "<p class='pExercicePhpExo10'>le nombre $i est un multiple 5 donc : <span class='spanExercicePhpExo10' id='value5'>bar</span></p>";
                } elseif ( ( ( $i % 3 ) == 0 ) ){
                    echo "<p class='pExercicePhpExo10'>le nombre $i est un multiple de 3 donc : <span class='spanExercicePhpExo10' id='value3'>foo </span></p>";
                } else {
                    echo "<p class='pExercicePhpExo10'>le nombre $i est... quelconque </p>";
                }
        }
        ?>
            <h2>EXERCICE 10</h2>
            <h3>AUTRE + (résultat identique)</h3>

        <p>
        <?php 

            for( $i = 1; $i <= 100; $i++ ){

            switch( $i ){
                case ( ( ( $i % 5 ) == 0) && ( ( $i % 3 ) == 0) );
                //echo'etape3<br>';
                    echo "<p class='pExercicePhpExo10' id='value5et3'>le nombre $i est un multiple de 3 et de 5 donc :<span class='spanExercicePhpExo10' id='value5et3'>foobar </span></p>";
                break;

                case ( ( $i % 5 ) == 0 ):
                //echo'etape2<br>';
                    echo "<p class='pExercicePhpExo10' id=''>le nombre $i est un multiple 5 donc : <span class='spanExercicePhpExo10' id='value5'>bar</span></p>";
                break;

                case ( ( ( $i % 3 ) == 0 ) ):
                // echo "etape1<br>";
                 echo "<p class='pExercicePhpExo10' id='value5'>le nombre $i est un multiple de 3 donc : <span class='spanExercicePhpExo10' id='value3'>foo </span></p>"; 
                break; 

                default:
                echo "<p class='pExercicePhpExo10' id='value3'>le nombre $i est... quelconque </p>";
            }
            }

            ?>
        </p>
    </section>

    <section class="sectionExercicesPhp">
        <h2 class="h2ExercicesPhp">Exercice 11</h2>
        <h3>Affichage de tableau</h3>
        <p>Utilisez ce tableau </p>
        <pre class="balisePreExercicesPhp">
        $identitePersonne = [
            'nom'       => 'Croft',
            'prénom'    => 'Lara',
            'metier'    => 'Archéologue'
        ];
        </pre>
        <p>pour faire un echo de la phrase suivante dans une balise h1:</p>
        <p>C'est un plaisir de vous voir Lara Croft!(Archéologue)</p>
        <h4>Exemple d'un des deux syntaxes utilisées :</h4>
        <pre class="balisePreExercicesPhp">
            echo 'C\'est un plaisir de vous voir '. $identitePersonne['prénom'].' '. $identitePersonne['nom'] .' !('.$identitePersonne['metier'].')'
        </pre>

        <p>
            <?php

                $identitePersonne = [
                    'nom'       => 'Croft',
                    'prénom'    => 'Lara',
                    'metier'    => 'Archéologue'
                ];
                
                echo "C'est un plaisir de vous voir ". $identitePersonne['prénom']." ".$identitePersonne['nom']." !(".$identitePersonne['metier'].") \n";
                echo 'C\'est un plaisir de vous voir '. $identitePersonne['prénom'].' '. $identitePersonne['nom'] .' !('.$identitePersonne['metier'].')<br>';
            ?>
        </p>
    </section>

    <section class="sectionExercicesPhp">
        <h2 class="h2ExercicesPhp">Exercice 12</h2>
        <h3> tableaux fighters</h3>
        <h4>Première manière </h4>


        <?php
            $fighters=['Zelda','Samus','Bowser','Peach','Lucina'];

            foreach( $fighters as $fighter ){


                if (strlen( $fighter ) == 6 ){

                    echo "Le tableau $fighter a un nom qui comporte ". strlen( $fighter ) ." lettres.";
                    echo "<br>";

                }
            }

        ?>
        <h4>Deuxième manière </h4>
        <h5>Liste des tableaux de longueur 6 lettres :</h5>
            <ul>
                 <?php

                $zfighters=['Zelda','Samus','Bowser','Peach','Lucina'];

                foreach( $zfighters as $zfighters ){

                    if ( ( strlen( $zfighters)) == 6 ){
                        
                        echo  "<li>".$zfighters ."</li>";
                    }
                }

                ?>
                
            </ul>
        
        <h4>Troisième manière </h4>
        <h5>Liste des tableaux qui ont un nom de longueur 6 lettres :</h5>
            <ul>
                 <?php

                $afighters=['Zelda','Samus','Bowser','Peach','Lucina'];
                
                echo "les tableaux ";

                foreach( $afighters as $afighter ){
                    
                    if ( ( strlen( $afighter)) == 6 ){
                        
                        echo  $afighter ." et ";
                    }
                    
                }

                echo " comportent bien 6 lettres";

                ?>
            </ul>
    </section>

    <section class="sectionExercicesPhp">
        <h2 class="h2ExercicesPhp">Exercice 13</h2>
        <h3>Recherche de la plus petite valeur dans un tableau d’entiers</h3>
        <p>Écrire le programme qui recherche la plus petite valeur dans un tableau de dix entiers.</p>


        <?php
            // variables qui déterminent des valeurs aléatoire entre 10 et 1000
            $value0 = rand(10,1000 );
            $value1 = rand(10,1000 );
            $value2 = rand(10,1000 );
            $value3 = rand(10,1000 );
            $value4 = rand(10,1000 );
            $value5 = rand(10,1000 );
            $value6 = rand(10,1000 );
            $value7 = rand(10,1000 );
            $value8 = rand(10,1000 );
            $value9 = rand(10,1000 );

            // tableau des 10 variables
            $integers=[$value0,$value1,$value2,$value3,$value4,$value5,$value6,$value7,$value8,$value9];

            // tri du tableau
            sort( $integers );

            // affichage de l'index 0
            echo "Nombres entier le plus petit du tableau [$value0,$value1,$value2,$value3,$value4,$value5,$value6,$value7,$value8,$value9] est : " . $integers[0] . "\n";
        ?>
    </section>
   
    <section class="sectionExercicesPhp">
        <h2 class="h2ExercicesPhp">Exercice 14</h2>
        <h3>Tri d’un tableau d’entiers</h3>
        <blockquote>On cherche le programme qui permet de trier par ordre croissant les valeurs d’un tableau d’entiers quelconques. Ce programme s'inspire en partie sur la recherche du plus petit élément d’un tableau d’entiers (cf. exercice précédent)</blockquote>
        <h4>Première manière</h4>
        <h5>Premiere manière : Application exacte des consignes : tableau comportant une liste d'entiers, et tri du tableau : </h5>
        <p>
            <?php
                // variables qui déterminent des valeurs aléatoire entre 10 et 1000
                $integersArray =[52,37,70,85,692,567,512,365,874,514,469,352,];
                sort( $integersArray ); // sort() change les clés, et asort() conserve les clé
                echo 'Ci-dessus, Tableau de nombres entiers triés par ordre croissant avec var_dump'. var_dump( $integersArray );
                echo 'Ci-dessus, Tableau de nombres entiers triés par ordre croissant avec print_r'. print_r( $integersArray );
            ?>
        </p>
        <h5>Autre méthode : Génération d'un tableau de longueur d'index aléatoire (comprise entre 0 et 40) comportant des valeurs aléatoires comprises entre 50 et 2000</h5>
        <p>
            <?php
                // variables qui déterminent : value0 = valeur min des index, value1, valeur max des index et value3 des valeurs aléatoire entre 50 et 2000
                $value0 = rand( 0, 20 );
                $value1 = rand( 20, 40 );
                $value3 = rand( 50, 2000 );
                $integersArray = [];
                
                // pour toutes les valeurs de l'index $i égale = au nombre minimum d'index du tableau (value0) et inférieur au nombre maximal d'index du tableau (value1), sachant que value0 sera toujours inférieur à value1 :
                for ( $i = $value0 ; $i < $value1 ; $i++ ){

                    // on choisi un nombre aléatoire compris entre "value1 (qui est un entier aléatoire entre 20 et 40)" et " value3 (qui est un nombre aléatoire entre 50 et 2000"
                    $coef = rand( $value1,$value3 );

                    // on ajoute la valeur du coefficient aléatoire dans le tableau
                    $integersArray[$i] = $coef;
                    
                }
                // on tri du tableau par ordre croissant
                sort( $integersArray );
                array_sum( $integersArray );
                // on affiche le contenu du tableau trié
                echo 'Tableau de '. $value0.' nombres entiers choisis aléatoirement , triés par ordre croissant '. var_dump( $integersArray );

                //autre manière d'afficher le tableau plus classique et avec du style
                echo "<h5>Même tableau affiché avec du style en ajoutant les entêtes de colonne et le total dans le footer du tableau</h5>";
                echo "<table class='tableExoPhp'><thead class='tableHeadExoPhp'><td class='tableHeadTdLeftExoPhp'>Index</td><td class='tableHeadTdRightExoPhp'>Valeur</td></thead><tbody>";
                        
                foreach( $integersArray as $key => $value ){
                    echo "<tr>
                        <td class='tableExoPhpTd1'>".$key."</td>
                        <td class='tableExoPhpTd2 bold'>".$value."</td>
                    </tr>";
                }
                echo "</tbody>";
                echo "<tfoot>
                        <tr>
                            <td class='bold'>Total :</td>
                            <td class='bold'>".array_sum( $integersArray )."</td>
                        </tr>
                    </tfoot>
                </table>";
            
            ?>
        </p>
    </section>

        
    <section class="sectionExercicesPhp">
        <h2 class="h2ExercicesPhp">Exercice 15</h2>
        <h3>Table des multiplications</h3>
        <blockquote>faire le tableau des multiplications de 1 à 9 (possibilité rajoutée de changer les valeurs à multiplier dans le code directement)</blockquote>
            <?php
                $multiplicateur1 = 1;
                $multiplicateur2 = 2;
                $multiplicateur3 = 3;
                $multiplicateur4 = 4;
                $multiplicateur5 = 5;
                $multiplicateur6 = 6;
                $multiplicateur7 = 7;
                $multiplicateur8 = 8;
                $multiplicateur9 = 9;

                $multiplesArray = [$key => $multiplicateur1, $multiplicateur2, $multiplicateur3, $multiplicateur4, $multiplicateur5, $multiplicateur6, $multiplicateur7, $multiplicateur8, $multiplicateur9 ];


                
                // pour toutes les valeurs de l'index $i égale = au nombre minimum d'index du tableau (value0) et inférieur au nombre maximal d'index du tableau (value1), sachant que value0 sera toujours inférieur à value1 :

                //autre manière d'afficher le tableau plus classique et avec du style
                echo "<h5>Tableau de multiplication</h5>";
                echo "<table class='tableExoPhp'>
                <thead class='tableHeadExoPhp'>
                <td class='tableHeadTdLeftExoPhp'>Multiples</td>
                <td class='tableExoPhpTdM1 bold'>".$multiplicateur1."</td>
                <td class='tableExoPhpTdM1 bold'>".$multiplicateur2."</td>
                <td class='tableExoPhpTdM1 bold'>".$multiplicateur3."</td>
                <td class='tableExoPhpTdM1 bold'>".$multiplicateur4."</td>
                <td class='tableExoPhpTdM1 bold'>".$multiplicateur5."</td>
                <td class='tableExoPhpTdM1 bold'>".$multiplicateur6."</td>
                <td class='tableExoPhpTdM1 bold'>".$multiplicateur7."</td>
                <td class='tableExoPhpTdM1 bold'>".$multiplicateur8."</td>
                <td class='tableExoPhpTdM1 bold'>".$multiplicateur9."</td>
                </thead>
                <tbody>";                   
                    for( $key = 1 ; $key < 10 ; $key++ ){
                    echo "<tr>
                        <td class='tableExoPhpTdMkey bold'>".$key."</td>
                        <td class='tableExoPhpTdM1'>".multiply( $key,$multiplicateur1)."</td>
                        <td class='tableExoPhpTdM1'>".multiply( $key,$multiplicateur2)."</td>
                        <td class='tableExoPhpTdM1'>".multiply( $key,$multiplicateur3)."</td>
                        <td class='tableExoPhpTdM1'>".multiply( $key,$multiplicateur4)."</td>
                        <td class='tableExoPhpTdM1'>".multiply( $key,$multiplicateur5)."</td>
                        <td class='tableExoPhpTdM1'>".multiply( $key,$multiplicateur6)."</td>
                        <td class='tableExoPhpTdM1'>".multiply( $key,$multiplicateur7)."</td>
                        <td class='tableExoPhpTdM1'>".multiply( $key,$multiplicateur8)."</td>
                        <td class='tableExoPhpTdM1'>".multiply( $key,$multiplicateur9)."</td>
                    </tr>";
                    }
                echo "</tbody>
                    </table>";
            
            ?>
        </section>

</body>
</html>
