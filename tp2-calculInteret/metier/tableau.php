<?php
class tableau{
    public $montant;
    public $tauxMensuel;
    public $nombreMois;
    //mes variables
    private $pair= false;
    private $interetsRestant;
    private $mensualite;
    private $total = 0;
    private $mensualiteMontant;
    private $mensualiteInterets;

    public function __construct($_montant, $_taux, $_annees){
        $this->montant = $_montant;
        $this->tauxMensuel = (double)$_taux/(100*12);
        $this->nombreMois = $_annees * 12;
        $this->interetsRestant = $_montant * 3 / 100;
        $this->mensualiteMontant = round(($_montant / $_annees),2);
        $this->mensualiteInterets = round((($_montant * $_taux / 100) / ($_annees * 12)),2);
    }
    public function calculPayeMensuel(){
        $quotient= 1- pow((1+$this->tauxMensuel), -$this->nombreMois);
        $mensuel = ($this->montant + $this->tauxMensuel) / $quotient;
        $this->mensualite = $mensuel;
    }
    private function calculNouveauMontant(){
        $this->montant = $this->montant - $mensualiteMontant;
        $this->interetsRestant = $this->interetsRestant - $mensualiteInterets;
    }
    public function toutAfficher(){
    ?>
    <table>
    <tr><th>mois</th><th>montant restant</th><th>intérêts restant</th><th>Mensualitée</th><th>Total payé</th></tr>
    <?php
        for ($i = 1; $i <= $nombreMois; $i++){
            if ($pair == true){
                ?>
                <tr class="pair"><td class="pair"><?php echo $i ?></td><td class="pair"><?php echo $montantRestant ?></td><td class="pair"><?php echo $interetsRestant ?></td><td class="pair"><?php echo $mensualite ?></td><td class="pair"><?php echo $total ?></td></tr>
                <?php
                calculNouveauMontant();
                $pair = false;
            } else {
                ?>
                <tr class="impair"><td class="impair"><?php echo $i ?></td><td class="pair"><?php echo $montantRestant ?></td><td class="impair"><?php echo $interetsRestant ?></td><td class="impair"><?php echo $mensualite ?></td><td class="impair"><?php echo $total ?></td></tr>
                <?php
                calculNouveauMontant();
                $pair = true;
            }
        }
        ?>
        </table>
        <?php
    
    }
}
?>