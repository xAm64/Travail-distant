<?php
/**
 * Programme MyString
 * Test de la classe MyString
 */
require 'MyString.php';

$monObjet = new MyString("hello all!");
echo $monObjet->getStr();
echo $monObjet->charAt(9);
echo $monObjet->indexOf('o');
echo $monObjet->substr(2,8);
var_dump($monObjet->split('o'));
echo $monObjet->toLoerCase();
echo $monObjet->toUpperCase();
echo $monObjet->toTitle();