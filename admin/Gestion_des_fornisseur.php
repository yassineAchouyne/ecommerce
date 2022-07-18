<?php 
include "sessionAdmin.php";
include "incAdmin/hedear.php" ;
?>
<h1 align="center" class="text-danger">Gestion des Fornisseur</h1>
<?php
include "../inc/db.php";
$sql = $db->prepare("SELECT * from fornisseur");
$sql->execute();
$tab = $sql->fetchAll();
if (empty($_GET['mdf'])) {
?>
    <table class='table table-striped mt-2'>
        <tr class="bg-cl text-white row-12">
            <td class="col-2">Image</td>
            <td class="col-2">Nom</td>
            <td class="col-3">Description</td>
            <td class="col-2">action</td>
        </tr>
        <?php foreach ($tab as $val) { ?>

            <tr>
                <td><img src="image/<?= $val['img_fornisseur'] ?>" alt="" class="img-thumbnail imgg"> </td>
                <td><?= $val['nom_fornisseur'] ?></td>
                <td><?= $val['description_fornisseur'] ?></td>
                <td>
                    <a href="?sepp=<?= $val['id_fornisseur'] ?>" onclick="return confirm('Voulez-vous supprimer le Couffre') "><i class="fa-solid fa-xmark"></i></a>
                    <a href="?mdf=<?= $val['id_fornisseur'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
            </tr>
        <?php } ?>
    </table>
<?php } else {

    $sql = $db->prepare("SELECT * from fornisseur where id_fornisseur=?");
    $sql->execute([$_GET['mdf']]);
    $tab = $sql->fetch();

?>

    <div class="adminbody">
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="">Libellé du Fournisseur :</label>
                <input type="text" name="c_name" value="<?= $tab['nom_fornisseur'] ?>" placeholder="Libellé du Fournisseur" class="form-control">
            </div>
            <div>
                <label for="">Photo du Fournisseur :</label>
                <input type="file" name="c_image" value="<?= $tab['img_fornisseur'] ?>" class="form-control">
            </div>
            <div>
                <label for="">Description du Fournisseur :</label>
                <textarea name="c_description" id="" cols="40" rows="10" class="form-control"><?= $tab['description_fornisseur'] ?></textarea>
            </div>
            <div>
                <input type="submit" value="Modifier un fornisseur" name="Modifier">
            </div>
            <div>
                <a href="Gestion_des_fornisseur.php" class="btn btn-outline-danger">Gestion Des Couffre</a>
            </div>
        </form>
    </div>


<?php

    if (isset($_POST['Modifier'])) {
        $nom = $_POST['c_name'];
        $description = $_POST['c_description'];
        $tmp_image = $_FILES['c_image'];
        $m = $_GET['mdf'];

        copy($tmp_image['tmp_name'], "image\\" . $tmp_image['name']);

        $mdf = $db->prepare("UPDATE fornisseur
    SET nom_fornisseur=:nom,img_fornisseur=:img,description_fornisseur=:decs 
    WHERE id_fornisseur=:id");
        $mdf->execute([":nom" => $nom,":img" => $tmp_image['name'],":decs" => $description, ":id" => $m]);
    }
}
if (isset($_GET['sepp'])) {
    $spp = $db->prepare("DELETE  FROM fornisseur WHERE id_fornisseur=?");
    $spp->execute([$_GET['sepp']]);
    unset($_GET['sepp']);
}

?>