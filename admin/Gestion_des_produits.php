<?php include "incAdmin/hedear.php" ?>

<?php
include "../inc/db.php";
$sql = $db->prepare("SELECT * from produits_ordinateur");
$sql->execute();
$tab = $sql->fetchAll();
if(empty($_GET['mdf'])){
?>
<table class='table table-striped mt-2'>
    <tr class="bg-cl text-white row-12">
        <td class="col-2">Image</td>
        <td class="col-2">Nom</td>
        <td class="col-2">Type</td>
        <td class="col">Prix</td>
        <td class="col-3">Description</td>
        <td class="col-2">action</td>
    </tr>
    <?php foreach ($tab as $val) { ?>

        <tr>
            <td><img src="image/<?= $val['img_ordinateur'] ?>" alt="" class="img-thumbnail imgg"> </td>
            <td><?= $val['nom_ordinateur'] ?></td>
            <td><?= $val['type_ordinateur'] ?></td>
            <td><?= $val['prix_ordinateur'] ?>DH</td>
            <td><?= $val['dscription_ordinateur'] ?></td>
            <td>
                <a href="?sepp=<?= $val['id_ordinateur'] ?>" onclick="return confirm('Voulez-vous supprimer le produit') "><i class="fa-solid fa-xmark"></i></a>
                <a href="?mdf=<?= $val['id_ordinateur'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
            </td>
        </tr>
    <?php } ?>
</table>
<?php }else{ ?>

<div class="adminbody">
    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label for="">Libellé du ordinateur :</label>
            <input type="text" name="c_name" id="" placeholder="Libellé du produit" class="form-control">
        </div>
        <div>
            <label for="">Photo du ordinateur :</label>
            <input type="file" name="c_image" id="" class="form-control">
        </div>
        <div>
            <label for="">Marque du ordinateur :</label>
            <input type="text" name="c_marque" id="" placeholder="Marque du pruduit" class="form-control">
        </div>
        <div class="c">
            <label for="">Type du ordinateur :</label>
            <select name="c_type" id="" class="form-select">
                <option value="Ordinateurs_de_bureau">Ordinateurs de bureau</option>
                <option value="Ordinateurs_de_portable">Ordinateurs de portable</option>
                <option value="Mini_PC">Mini PC</option>
            </select>
        </div>
        <div>
            <label for="">Prix du ordinateur :</label>
            <input type="number" name="c_prix" id="" class="form-control">
        </div>
        <div>
            <label for="">Description du ordinateur :</label>
            <textarea name="c_description" id="" cols="5" rows="10" class="form-control"></textarea>
        </div>
        <div>
            <input type="submit" value="Modifier de ordinateur" name="Modifier">
        </div>
    </form>
</div>


<?php

if(isset($_POST['Modifier'])){
    $mdf=$db->prepare("UPDATE `produits_ordinateur` SET `nom_ordinateur`=?,`img_ordinateur`=?,`marque_ordinateur`=?,`type_ordinateur`=?,`prix_ordinateur`=?',`dscription_ordinateur`=? WHERE id_ordinateur=?");
    $mdf->execute([$_POST['c_name'],$_POST['c_image'],$_POST['c_marque'],$_POST['c_type'],$_POST['c_prix'],$_POST['c_description'],$_GET['mdf']]);
    unset($_POST['c_name'],$_POST['c_image'],$_POST['c_marque'],$_POST['c_type'],$_POST['c_prix'],$_POST['c_description'],$_GET['mdf']);
}


}
if (isset($_GET['sepp'])) {
    $spp = $db->prepare("DELETE  FROM produits_ordinateur WHERE id_ordinateur=?");
    $spp->execute([$_GET['sepp']]);
    unset($_GET['sepp']);
}

?>