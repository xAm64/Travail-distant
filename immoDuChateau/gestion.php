<?php
include_once("funct/header.php");
include_once("funct/menu.php");
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
            echo "fichier transféré";
        } else {
            echo "pb technique";	
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
include_once("funct/footer.php");
?>