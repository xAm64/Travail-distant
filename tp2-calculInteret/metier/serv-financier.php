<?php
class financier {
    public $capital;
    public $tauxMensuel;
    public $nombreMois;

    public function __construct($_capital, $_tauxAnnuel, $_annees) {
        $this->capital = $_capital;
        $this->tauxMensuel = (double)$_tauxAnnuel/(100*12);
        $this->nombreMois = $_annees * 12;
    }
    public function calculMensualite(){
        $quotient= (1- pow ((1+$this->tauxMensuel), -$this->nombreMois));
        $mensualite = ($this->capital * $this->tauxMensuel) / $quotient;
        return $mensualite;
    }
}
?>