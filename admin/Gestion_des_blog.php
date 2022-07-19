<?php
include "sessionAdmin.php";
include "incAdmin/hedear.php";
?>
<h1 align="center" class="text-danger">Gestion des Blog</h1>
<?php
include "../inc/db.php";
$sql = $db->prepare("SELECT * from blog");
$sql->execute();
$tab = $sql->fetchAll();
if (empty($_GET['mdf'])) {
?>
    <table class='table table-striped mt-2'>
        <tr class="bg-cl text-white row-12">
            <td class="col-2">Image</td>
            <td class="col-2">Nom</td>
            <td class="col-2">Tag</td>
            <td class="col-3">Description</td>
            <td class="col-2">action</td>
        </tr>
        <?php foreach ($tab as $val) { ?>

            <tr>
                <td><img src="image/<?= $val['img_blog'] ?>" alt="" class="img-thumbnail imgg"> </td>
                <td><?= $val['nom_blog'] ?></td>
                <td><?= $val['tag_blog'] ?></td>
                <td><?= $val['description_blog'] ?></td>
                <td>
                    <a href="?sepp=<?= $val['id_blog'] ?>" onclick="return confirm('Voulez-vous supprimer le Couffre') "><i class="fa-solid fa-xmark"></i></a>
                    <a href="?mdf=<?= $val['id_blog'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
            </tr>
        <?php } ?>
    </table>
<?php } else {

    $sql = $db->prepare("SELECT * from blog where id_blog=?");
    $sql->execute([$_GET['mdf']]);
    $tab = $sql->fetch();

?>

    <div class="adminbody">
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="">Libellé du Blog :</label>
                <input type="text" name="c_name" value="<?= $tab['nom_blog'] ?>" placeholder="Libellé du Blog" class="form-control">
            </div>
            <div>
                <label for="">Photo du Blog :</label>
                <input type="file" name="c_image" value="<?= $tab['img_blog'] ?>" class="form-control">
            </div>
            <div>
                <label for="">Tag du Blog :</label>
                <input type="text" name="c_tag" value="<?= $tab['tag_blog'] ?>" placeholder="Tag du Blog" class="form-control">
            </div>
            <div>
                <label for="">Description du produit :</label>
                <textarea name="c_description" id="" cols="40" rows="10" class="form-control"><?= $tab['description_blog'] ?></textarea>
            </div>
            <div>
                <input type="submit" value="Modifier un blog" name="Modifier">
            </div>
            <div>
                <a href="Gestion_des_blog.php" class="btn btn-outline-danger">Gestion Des Couffre</a>
            </div>
        </form>
    </div>


<?php

    if (isset($_POST['Modifier'])) {
        $nom = $_POST['c_name'];
        $description = $_POST['c_description'];
        $tmp_image = $_FILES['c_image'];
        $tag = $_POST['c_tag'];
        $m = $_GET['mdf'];

        copy($tmp_image['tmp_name'], "image\\" . $tmp_image['name']);

        $mdf = $db->prepare("UPDATE blog
    SET nom_blog=:nom,img_blog=:img,tag_blog=:tag,description_blog=:decs 
    WHERE id_blog=:id");
        $mdf->execute([":nom" => $nom, ":img" => $tmp_image['name'], ":tag" => $tag, ":decs" => $description, ":id" => $m]);
    }
}
if (isset($_GET['sepp'])) {
    $spp = $db->prepare("DELETE  FROM blog WHERE id_blog=?");
    $spp->execute([$_GET['sepp']]);
    unset($_GET['sepp']);
}

?>