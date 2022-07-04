<?php include "incAdmin/hedear.php" ?>
<h1 align="center" class="text-danger">Gestion des Couffre</h1>
<?php
include "../inc/db.php";
$sql = $db->prepare("SELECT * from nos_couffre");
$sql->execute();
$tab = $sql->fetchAll();
if(empty($_GET['mdf'])){
?>
<table class='table table-striped mt-2'>
    <tr class="bg-cl text-white row-12">
        <td class="col-2">Image</td>
        <td class="col-2">Nom</td>
        <td class="col">Prix</td>
        <td class="col-3">Description</td>
        <td class="col-2">action</td>
    </tr>
    <?php foreach ($tab as $val) { ?>

        <tr>
            <td><img src="image/<?= $val['img_nos_Couffre'] ?>" alt="" class="img-thumbnail imgg"> </td>
            <td><?= $val['nom_nos_Couffre'] ?></td>
            <td><?= $val['prix_nos_Couffre'] ?>DH</td>
            <td><?= $val['description_nos_Couffre'] ?></td>
            <td>
                <a href="?sepp=<?= $val['id_nos_Couffre'] ?>" onclick="return confirm('Voulez-vous supprimer le Couffre') "><i class="fa-solid fa-xmark"></i></a>
                <a href="?mdf=<?= $val['id_nos_Couffre'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
            </td>
        </tr>
    <?php } ?>
</table>
<?php }else{

$sql=$db->prepare("SELECT * from nos_couffre");
$sql->execute();
$tab=$sql->fetch();

?>

<div class="adminbody">
    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label for="">Libellé du ordinateur :</label>
            <input type="text" name="c_name" value="<?= $tab['nom_nos_Couffre'] ?>" placeholder="Libellé du produit" class="form-control">
        </div>
        <div>
            <label for="">Photo du ordinateur :</label>
            <input type="file" name="c_image" value="<?="../admin/image". $tab['img_nos_Couffre'] ?>" class="form-control">
        </div>
        <div>
            <label for="">Prix du ordinateur :</label>
            <input type="number" name="c_prix" value="<?= $tab['prix_nos_Couffre'] ?>" class="form-control">
        </div>
        <div>
            <label for="">Description du ordinateur :</label>
            <textarea name="c_description"  cols="5" rows="10" class="form-control"><?= $tab['description_nos_Couffre'] ?></textarea>
        </div>
        <div>
            <input type="submit" value="Modifier de ordinateur" name="Modifier">
            
        </div>
        <div>
            <a href="Gestion_des_couffre.php" class="btn btn-outline-danger">Gestion Des Couffre</a>
        </div>
    </form>
</div>


<?php
if(isset($msg)) echo $msg ;
if(isset($_POST['Modifier'])){
    $nom=$_POST['c_name'];
    $prix=$_POST['c_prix'];
    $description=$_POST['c_description'];
    $tmp_image=$_FILES['c_image'];
    $m=$_GET['mdf'];

    copy($tmp_image['tmp_name'],"image\\".$tmp_image['name']);

    $mdf=$db->prepare("UPDATE nos_couffre
    SET nom_nos_Couffre=:nom,img_nos_Couffre=:img,prix_nos_Couffre=:prix,description_nos_Couffre=:decs 
    WHERE id_nos_Couffre=:id");
    $mdf->execute([":nom"=>$nom,":img"=>$tmp_image['name'],":prix"=>$prix,":decs"=>$description ,":id"=>$m]);

}


}
if (isset($_GET['sepp'])) {
    $spp = $db->prepare("DELETE  FROM nos_couffre WHERE id_nos_Couffre=?");
    $spp->execute([$_GET['sepp']]);
    unset($_GET['sepp']);
}

?>