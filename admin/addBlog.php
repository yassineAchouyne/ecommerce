<?php
include "sessionAdmin.php";
include "incAdmin/hedear.php";
?>
<?php
include "../inc/db.php";
if (isset($_POST["ajouter"])) {
    $nom = $_POST['c_name'];
    $tag = $_POST['c_tag'];
    $dateNew = date("Y-m-d");
    $description = $_POST['c_description'];
    $tmp_image = $_FILES['c_image'];

    try {
        if (!empty($nom) && !empty($description) && !empty($tmp_image) && !empty($tag) && !empty($dateNew)) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                copy($tmp_image['tmp_name'], "image\\" . $tmp_image['name']);
            }
            $sql = $db->prepare("INSERT INTO blog(nom_blog ,img_blog ,tag_blog ,dateNew_blog ,description_blog)  values (:nom,:img,:tag,:dateNew,:decs )");
            $sql->execute([":nom" => $nom, ":img" => $tmp_image['name'], ":tag" => $tag, ":dateNew" => $dateNew, ":decs" => $description]);
            echo '<div class="alert alert-success" role="alert"> Ajouté avec succès!</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Erreur Blog non ajouté!</div>';
        }
    } catch (PDOException $e) {
        die("erreur " . $e->getMessage());
    }
    unset($nom, $tag, $dateNew, $description, $tmp_image);
}


?>


<div class="adminbody">
    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label for="">Libellé du Blog :</label>
            <input type="text" name="c_name" id="" placeholder="Libellé du Blog" class="form-control">
        </div>
        <div>
            <label for="">Photo du Blog :</label>
            <input type="file" name="c_image" id="" class="form-control">
        </div>
        <div>
            <label for="">Tag du Blog :</label>
            <input type="text" name="c_tag" id="" placeholder="Tag du Blog" class="form-control">
        </div>
        <div>
            <label for="">Description du produit :</label>
            <textarea name="c_description" id="" cols="40" rows="10" class="form-control"></textarea>
        </div>
        <div>
            <input type="submit" value="ajouter un blog" name="ajouter">
        </div>
    </form>
</div>
</body>

</html>