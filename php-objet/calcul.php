<?php
class calcul {
    private $tauxImpots = 0;
    private $montant = 0;
			
	public function calculerTaux($_revenus){
		if ($_revenus <= 3000) {
			$this->tauxImpots = 0;
		} elseif ($_revenus > 3000 && $_revenus <= 15000 ) {
			$this->tauxImpots = 9;
		} else {
			$this->tauxImpots = 14;
		}
		
        $montant = $_revenus * $this->tauxImpots / 100;
    	return $montant;
    }
}