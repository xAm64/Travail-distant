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
include_once("funct/footer.php");
?>