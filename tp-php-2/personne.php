<?php
class personne {
    private $nom;
    protected $prenom;
    protected $adress;
    private $mail;

    

    public function getPersonne(){
        return ($this->nom.' '.$this->prenom.' '.$this->adress.' '.$this->mail);
    }

    public function setAdress($_nouvelleAdresse){
        $this->adress = $_nouvelleAdresse;
    }

    public function setMail($_newMail){
        $this->mail = $_newMail;
    }
}