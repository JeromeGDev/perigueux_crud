<?php

// $passwordCrypt = sha1(sha1('123',$userPsdForm .'salage'));// (ne pas aller plus loin) double cryptage sha1 + '123' et 'salage' = chaines de caractere a choisir au hasard, mais défintif qui augmente le cryptage
// $passwordCrypt = sha1(sha1('123',$userPsd .'salage'));// (ne pas aller plus loin) double cryptage sha1 + '123' et 'salage' = chaines de caractere a choisir au hasard, mais défintif qui augmente le cryptage


function encode($a){
    return sha1(sha1('123',$a.'salage'));// (ne pas aller plus loin) double cryptage sha1 + '123' et 'salage' = chaines de caractere a choisir au hasard, mais défintif qui augmente le cryptage
}
