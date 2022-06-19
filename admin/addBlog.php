<?php 
include "../inc/db.php";
if(isset($_POST["ajouter"])){
    $nom=$_POST['c_name'];
    $tag=$_POST['c_tag'];
    $dateNew=date("Y-m-d");
    $description=$_POST['c_description'];
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $tmp_image=$_FILES['c_image'];
        copy($tmp_image['tmp_name'],"image\\".$tmp_image['name']);
    }
    

    try{
        $sql= $db->prepare("INSERT INTO blog(nom_blog ,img_blog ,tag_blog ,dateNew_blog ,description_blog)  values (:nom,:img,:tag,:dateNew,:decs )")  ;
        $sql ->execute([":nom"=>$nom,":img"=>$tmp_image['name'],":tag"=>$tag,":dateNew"=>$dateNew,":decs"=>$description ]);
    }catch(PDOException $e){
        echo $e->getMessage() ;
    }
}


?>

<?php include "incAdmin/hedear.php" ?>
<div class="adminbody">
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="">Libellé du Blog :</label>
                <input type="text" name="c_name" id="" placeholder="Libellé du Blog">
            </div>
            <div>
                <label for="">Photo du Blog :</label>
                <input type="file" name="c_image" id="" >
            </div>
            <div>
                <label for="">Tag du Blog :</label>
                <input type="text" name="c_tag" id="" placeholder="Tag du Blog">
            </div>
            <div>
                <label for="">Description du produit :</label>
                <textarea name="c_description" id="" cols="40" rows="10"></textarea>
            </div>
            <div>
                <input type="submit" value="ajouter un produit" name="ajouter">
            </div>
        </form>
        

    </div>
</body>
</html>