<?php
include_once("funct/header.php");
include_once("funct/menu.php");
$extention;
?>
<div class="retour"><a href="index.php"><img src="images/retour.gif"></a></div>
<?php
if(isset($_FILES['image']) and $_FILES["image"]["name"]!="")
{
    $nom=$_FILES['image']['name'];
    $type =$_FILES['image']['type'];
    $tab_split=explode('/',$type);
    $ext=$tab_split[1];
    
    $img_path="photos/";
    $nouveaunom="img"; //mettre ici plus tard l'auto indempt pour le nom de l'image
    $tab_ref=array('gif','GIF','jpeg','JPEG','jpg','JPG','png','PNG');
    if(in_array($ext,$tab_ref))
    {
        $destination_img=$img_path.$nouveaunom.'.'.$ext;

        echo $destination_img."<br/>";
        $origin=$_FILES['image']['tmp_name'];
        if(move_uploaded_file($origin,$destination_img)==true){
            $vignette="photos/img_petit.".$ext;
            $dimentionDeLaPhoto=getimagesize($destination_img);
            $sourceLargeur=$dimentionDeLaPhoto[0];
            $sourceHauteur=$dimentionDeLaPhoto[1];
            $destinationLargeur=800;
            $destinationHauteur=$destinationLargeur*($sourceHauteur/$sourceLargeur);
            $image=imagecreatetruecolor($destinationLargeur, $destinationHauteur);
            $flux = extentionImage($ext);
            switch ($ext){
                case 'jpg':
                case 'JPG':
                case 'jpeg':
                case 'JPEG':
                    $flux = imagecreatefromjpeg($destination_img);
                    $extension = 'jpg';
                break;
                case 'png':
                case 'PNG':
                    $flux = imagecreatefrompng($destination_img);
                    $extension = 'png';
                break;
                case 'gif':
                case 'GIF':
                    $flux = imagecreatefromgif($destination_img);
                    $extension = 'gif';
                break;
                $taille;
                if ($sourceLargeur> $destinationLargeur){
                    $taille = true;
                }
                $flux = redimensionImage($extension, $taille);
            }
        } else {
            echo "Échec du transfert";	
        }
    } else {
        echo "extension fichier non autorisée";
    }
}
?>
<form method="post" name="ajoutgestion" enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF'] ?>">
    <fieldset><legend>Ajouter un Bien immobilier</legend>
        <label for="image">Charger une image</label>
        <input type="file" name="image" id="image">
        <input type="submit" value="Ajouter" name="valider" style="max-width:100px">
    </fieldset>
</form>
<?php
function redimensionImage($_extension, $_taille){
    if ($_taille = true){
        imagecopysampled($image, $flux,0,0,0,0, $destinationLargeur, $destinationHauteur, $sourceLargeur, $sourceHauteur);
    } else {
        imagecoyresized($image, $flux,0,0,0,0, $destinationLargeur, $destinationHauteur, $sourceLargeur, $sourceHauteur);
    }
    switch ($_extension){
        case 'jpg':
            $flux = imagejpg($image, $vignette);
        break;
        case 'png':
            $flux = imagepng($image, $vignette);
        break;
        case 'gif':
            $flux = imagegif($image, $vignette);
        break;
    }
    return $flux;
}

if(isset($_SESSION["nom_user"]) and !empty($_SESSION["nom_user"])){
    ?>
    <form method="POST" name="ajoutgestion" enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF'] ?>">
	<legend>Ajouter un Bien Immobilier</legend>
    <p>Titre présentation du bien immobilier <input type="text" id="titre" name="titre" placeholder="le titre" class="form-control"></p>
    <p>Nombre de pièce <input type="number"  step="1" id="nbpiece" name="nbpiece" placeholder="nombre piece"  min="1" max="136" class="form-control"></p>
    <p>Surface <input type="number"  step="1" id="aire" name="aire" placeholder="superficie du bien"  min="1" max="900000" class="form-control"></p>
    <p>Prix vendeur <input type="number"  step="5000" id="prix" name="prix" placeholder="Prix souhaités"  min="5000" max="9999995000"></p>
    <p>Description <textarea class="form-control" name="description"></textarea></p>
    <p>Diagnostique  Gaz à Effet de Serre <select name="ges" id="ges" class="form-control"  style=" max-width:100px"><?php
		for ($i ="a"; $i <= "f"; $i++){
			?><option value="<?php echo strtoupper($i) ?>"><?php echo strtoupper($i) ?></option><?php
		}
	?></select>
    <p> Note classe economique <select name="eco" id="eco" class="form-control" style="max-width:100px"><?php
		for($i="a"; $i<="h" ; $i++){
			?><option value="<?php echo strtoupper($i) ?>"><?php echo strtoupper($i) ?></option><?php
		}
    ?></select><?php
    $connect = immo::getImmo();
	$rq="select * from categories";
	$state=$connect->prepare($rq);
    $state->execute();
	?><select name="cat" id="cat" class="form-control" style="max-width:200px">';  
	<option value="">Choisir une catégorie</option><?php
		while($ligne=$state->fetch()){
			?><option value="<?php echo $ligne[0] ?>"><?php echo $ligne[1]?></option><?php
		} 
    ?></select>
    <p>Charger une image <input type="file" name="image" id="image"></p> 
	<p><input type="submit" value="Ajouter" name="valider" class="btn btn-success"  style="max-width:100px"></p>
	</fieldset></form><?php
	} else {
    ?><p class="danger">Accès refusé</p><?php
}
include_once("funct/footer.php");
?>