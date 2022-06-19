<?php 
include "../inc/db.php";
if(isset($_POST["ajouter"])){
    $nom=$_POST['c_name'];
    $prix=$_POST['c_prix'];
    $description=$_POST['c_description'];
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $tmp_image=$_FILES['c_image'];
        copy($tmp_image['tmp_name'],"image\\".$tmp_image['name']);
    }
    

    try{
        $sql= $db->prepare("INSERT INTO nos_couffre(nom_nos_Couffre ,img_nos_Couffre ,prix_nos_Couffre ,description_nos_Couffre)  values (:nom,:img,:prix,:decs )")  ;
        $sql ->execute([":nom"=>$nom,":img"=>$tmp_image['name'],":prix"=>$prix,":decs"=>$description ]);
    }catch(PDOException $e){
        echo $e->getMessage() ;
    }
}


?>

<?php include "incAdmin/hedear.php" ?>
<div class="adminbody">
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="">Libellé du produit :</label>
                <input type="text" name="c_name" id="" placeholder="Libellé du produit">
            </div>
            <div>
                <label for="">Photo du produit :</label>
                <input type="file" name="c_image" id="" >
            </div>
            <div>
                <label for="">Prix du produit :</label>
                <input type="number" name="c_prix" id="">
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