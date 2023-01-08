<?php

function isPair( $a ){
    if(isset($a)){
        if( !$a ){
            echo "On ne peut tester une valeur nulle ou égale à 0" . ";\n";
        } else if( ( $a % 2 ) == 0 ){
            echo "Le nombre $a est pair" . ";\n";
        } else {
            echo "Le nombre $a est impair" . ";\n";
        }
    }
}

function isEven( $a ){
    if(isset($a)){
        if(( $a % 2) === 0 ){
            echo "le nombre $a est pair. <br>";
        } else {
            echo "Le nombre $a est impair" . ";\n";
        }
    }
}

function allEvens( $a,$b ){
    if(isset($a) && isset($b)){
        if(( $a % 2 ) === 0 ){
            if( $a < $b ){
                echo "$a, ";
            } else if( $a == $b ){
                echo "$a. ";
            }
        }
        
    }
}



function isAlsoPair( $number ){
    if(isset($number)){
        echo ( $number % 2) == 0 ? "Le nombre $number est pair" : "Le nombre $number est impair" . ";\n";
        
    }
}

function multiply( $a,$b ){
    if(isset($a) && isset($b)){
        return $a * $b;
    }
}

function hypo( $b,$c ){
    if(isset($b) && isset($c)){
        return sqrt( (pow( $b,2) + pow( $c,2))  );
    }
}

function pythagore($a,$b,$c,$mesure){
    if(isset($a) && isset($b) && isset($mesure) && !$c){
        $c = round(sqrt( (pow( $a,2) + pow( $b,2)) ),2);
        echo 'un triangle dont les cotés mesurent '.$a.''.$mesure.' et '.$b.''.$mesure.' a une longueur d\'hypoténuse égale à '.$c.''.$mesure.' <br>';
    } elseif(isset($a) && isset($c) && isset($mesure) && !$b){
        $b = round(sqrt( (pow( $c,2) - pow( $a,2))),2);
        echo 'un triangle dont le premier coté mesure '.$a.''.$mesure.' et qui a une longueur d\'hypoténuse égale à '.$c.''.$mesure.' a une longueur de son troisième coté égale à '.$b.''.$mesure.' <br>';
    } elseif(isset($b) && isset($c) && isset($mesure) && !$a){
        $a = round(sqrt( (pow( $c,2) - pow( $b,2))),2);
        echo 'un triangle dont le premier coté mesure '.$b.''.$mesure.' et qui a une longueur d\'hypoténuse égale à '.$c.''.$mesure.' a une longueur de son troisième coté égale à '.$a.''.$mesure.' <br>';
    }
}

function getUrl($url){
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
        $url = "https"; 
    } else {
        $url = "http"; 
    }   
    // Ajoutez // à l'URL.
    $url .= "://"; 
    
    // Ajoutez l'hôte (nom de domaine, ip) à l'URL.
    $url .= htmlentities($_SERVER['HTTP_HOST']);
    
    // Ajouter l'emplacement de la ressource demandée à l'URL
    $url .= htmlentities($_SERVER['REQUEST_URI']);
        
    // Afficher l'URL
    return $url;
}
