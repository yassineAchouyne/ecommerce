<?php 
include "sessionAdmin.php";
include "incAdmin/hedear.php" ;
?>
<?php 
include "../inc/db.php";
if(isset($_POST["ajouter"])){
    $nom=$_POST['c_name'];
    $prix=$_POST['c_prix'];
    $description=$_POST['c_description'];
    $tmp_image=$_FILES['c_image'];
    

    try{
        if(!empty($nom)&&!empty($description)&&!empty($tmp_image)&&!empty($prix)){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                
                copy($tmp_image['tmp_name'],"image\\".$tmp_image['name']);
            }
            $sql= $db->prepare("INSERT INTO nos_couffre(nom_nos_Couffre ,img_nos_Couffre ,prix_nos_Couffre ,description_nos_Couffre)  values (:nom,:img,:prix,:decs )")  ;
            $sql ->execute([":nom"=>$nom,":img"=>$tmp_image['name'],":prix"=>$prix,":decs"=>$description ]);
            echo '<div class="alert alert-success" role="alert"> Ajouté avec succès!</div>';
        }else{
            echo '<div class="alert alert-danger" role="alert">Erreur Couffre non ajouté!</div>';
        } 
    }catch(PDOException $e){
        die("erreur ".$e->getMessage());
    }
    unset($no,$prix,$description,$tmp_image );
}


?>


<div class="adminbody">
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="">Libellé du couffre :</label>
                <input type="text" name="c_name" id="" placeholder="Libellé du produit" class="form-control">
            </div>
            <div>
                <label for="">Photo du couffre :</label>
                <input type="file" name="c_image" id="" class="form-control">
            </div>
            <div>
                <label for="">Prix du couffre :</label>
                <input type="number" name="c_prix" id="" class="form-control">
            </div>
            <div>
                <label for="">Description du couffre :</label>
                <textarea name="c_description" id="" cols="40" rows="10" class="form-control"></textarea>
            </div>
            <div>
                <input type="submit" value="ajouter un couffre" name="ajouter">
            </div>
        </form>
        

    </div>
</body>
</html>