<?php
class tableau{
    public $montant;
    public $tauxMensuel;
    public $nombreMois;
    //mes variables
    private $pair= false;
    private $interets;
    private $mensualite;
    private $total = 0;
    private $mensualiteMontant;
    private $mensualiteInterets;

    public function __construct($_montant, $_taux, $_annees){
        $this->montant = $_montant;
        $this->tauxMensuel = (double)$_taux/(100*12);
        $this->nombreMois = $_annees * 12;
        $this->interets = $_montant * 3 / 100;
        $this->mensualiteMontant = ($_montant / $_annees) / 12;
        $this->mensualiteInterets = ($_montant * $_taux / 100) / ($_annees * 12);
    }
    public function calculPayeMensuel(){
        $quotient= 1- pow((1+$this->tauxMensuel), -$this->nombreMois);
        $mensuel = ($this->montant * $this->tauxMensuel) / $quotient;
        $this->mensualite = $mensuel;
    }

    private function nouvelleMensualite() {
        $this->montant = round(($this->montant - $this->mensualiteMontant),2);
        $this->interets = round(($this->interets - $this->mensualiteInterets),2);
        $this->total = round(($this->total + $this->mensualite),2); 
    }
    
    public function toutAfficher(){
    ?>
    <table>
    <tr><th>mois</th><th>montant restant</th><th>intérêts restant</th><th>Mensualitée</th><th>Total payé</th></tr>
    <?php
        $this->mensualite = round(($this->mensualiteMontant + $this->mensualiteInterets),2);
        for ($i = 1; $i <= $this->nombreMois; $i++){
            if ($this->pair == true){
                ?>
                <tr class="pair"><td class="pair"><?php echo $i ?></td><td class="pair"><?php echo $this->montant ?></td><td class="pair"><?php echo $this->interets ?></td><td class="pair"><?php echo $this->mensualite ?></td><td class="pair"><?php echo $this->total ?></td></tr>
                <?php
                $this->nouvelleMensualite();
                $this->pair = false;
            } else {
                ?>
                <tr class="impair"><td class="impair"><?php echo $i ?></td><td class="impair"><?php echo $this->montant ?></td><td class="impair"><?php echo $this->interets ?></td><td class="impair"><?php echo $this->mensualite ?></td><td class="impair"><?php echo $this->total ?></td></tr>
                <?php
                $this->nouvelleMensualite();
                $this->pair = true;
            }
        }
        ?>
        </table>
        <p>Total payé: <?php echo $this->total ?>€</p>
        <?php
    
    }
}
?>