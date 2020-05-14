<?php
/** 
 * Mystring is a class simulates Javascript "String" class
 * 
 * @package mystring 
 * @author MDevoldere 
 * @version 1.0.0
 * @access public 
 * @see https://github.com/mdevoldere/DWWM_1909/tree/master/Php/mystring
 * @see https://github.com/mdevoldere/DWWM_1909/blob/master/Php/mystring/docs/MyString.svg
 */ 
class MyString
{
    protected $str;
    protected $length;

    public function __constructstring (string $_input)
    {
        $this->str = $_input;
        $this->length = strlen($this->str);
    }

    public function toString(){
        //renvoie la chaine de caractère et sa longueur
        return 'la chaine '.$this->str.' est de longueur '.$this->length;
    }

    public function charAt(int $_position){
        //renvoie le caractère à la position $position
        return $this->str[$_position] ?? "cette chaine n'existe pas";
    }

    public function indexOf(string $char){
        //renvoie le caractère saisie dans $char
        if(strlen($char)===1){
            return strpos($this->str, $char);
        }
        return "Valeur non valide";
    }

    public function substring(int $debut, int $fin){
        //renvoie la chaine de caractère de la position $debut à la position $fin
        return substr($this->str, $debut, $fin);
    }

    public function split(string $separateur){
        //utilise le(s) caractère(s) de $separateur pour séparer la chaine
        return explode($separateur, $this->str);
        
    }

    public function toLowerCase(){
        //envoie tout en minuscules
        /* (obsolète) return strtolower($this->str);*/
        return me_convert_case($this->str, MB_CASE_LOWER);
    }

    public function tuUpperCase(){
        //envoie tout en Majuscules
        /* (obsolète) return strtoupper($this->str);*/
        return me_convert_case($this->str, MB_CASE_UPPER);
    }
    public function toTitle(){
        return md_convert_case($this->str, MB_CASE_TITLE);
    }
    

} // fin de la classe MyString