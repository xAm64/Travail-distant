<?php
require_once ("funct/header.php");
require_once ("Funct/menu.php");
?><h2>Simulateur de crédit</h2>
<p><a href="index.php"><img src="images/retour.gif"></a></p><?php
if(isset($_GET['montant']) && isset($_GET['taux']) && isset($_GET['annees'])){
    $pair = false;
    $montant = $_GET['montant'];
    $taux = ($_GET['taux'] / 100) / 12;
    $montant = $montant * (1 + $taux);
    $nombreMois = $_GET['annees']*12;
    $quotient = (1 - pow ( (1+$taux), -$nombreMois));
    $calculMensuel = $montant * $taux / $quotient;
    $mensualiteMontant = ($_GET['montant'] / $_GET['annees']) / 12;
    $interets = $montant * (1 + ($_GET['taux'] / 100));
    $mensualiteInterets = ($_GET['montant'] * $_GET['taux'] / 100) / $nombreMois;
    $montantRestant = $_GET['montant'];
    $interetsRestant = $_GET['montant'] * 3 / 100;
    $mensualite = $mensualiteMontant + $mensualiteInterets;
    $totalPaye = 0;

    //rappel du montant
    echo "<p>Le montant emprunté est: ".$_GET['montant']."€, la durée du crédit est sur: ".$nombreMois." mois, soit: ".round($calculMensuel,2)." € par mois</p>"
    ?>
    <table>
    <tr><th>mois</th><th>capital du restant</th><th>intérêts restant</th><th>Mensualitée</th><th>Déjà payé</th></tr>
    <?php
    //algorythme calcul
    for ($i = 1; $i < $nombreMois; $i++){
        if ($pair == true){
            echo "<tr class=\"pair\"><td class=\"pair\">".$i."</td><td class=\"pair\">".round($montantRestant,2)."</td><td class=\"pair\">".round($interetsRestant,2)."</td><td class=\"pair\">".round($mensualite,2)."</td><td class=\"pair\">".round($totalPaye,2)."</td></tr>";
            $montantRestant = $montantRestant - $mensualiteMontant;
            $interetsRestant = $interetsRestant - $mensualiteInterets;
            $totalPaye = $totalPaye + $mensualite;
            $pair = false;
        } else {
            echo "<tr class=\"impair\"><td class=\"impair\">".$i."</td><td class=\"impair\">".round($montantRestant,2)."</td><td class=\"impair\">".round($interetsRestant,2)."</td><td class=\"impair\">".round($mensualite,2)."</td><td class=\"impair\">".round($totalPaye,2)."</td></tr>";
            $montantRestant = $montantRestant - $mensualiteMontant;
            $interetsRestant = $interetsRestant - $mensualiteInterets;
            $totalPaye = $totalPaye + $mensualite;
            $pair = true;
        }
    }
    if ($pair == true){
        echo "<tr class=\"pair\"><td class=\"pair\">".$nombreMois."</td><td class=\"pair\">".round($montantRestant,2)."</td><td class=\"pair\">".round($interetsRestant,2)."</td><td class=\"pair\">".round($mensualite,2)."</td><td class=\"pair\">".round($totalPaye,2)."</td></tr>
        </table>";
    } else {
        echo "<tr class=\"impair\"><td>".$nombreMois."</td class=\"impair\"><td>".round($montantRestant,2)."</td class=\"impair\"><td>".round($interetsRestant,2)."</td></td class=\"impair\"><td>".round($mensualite,2)."</td></td class=\"impair\"><td>".round($totalPaye,2)."</td></tr>
        </table>";
    }

} else {
    ?>
    <p>Une erreur à été détecter<br>
    Le calcul ne peux pas se faire</p>
    <a href="index.php"><input type="button" value="recommencer"></a>
    <?php
}
echo '<p><a href="index.php"><img src="images/retour.gif"></a></p>';
require_once ("funct/footer.php");
?>