<?php include "incAdmin/hedear.php" ?>
<?php 
include "../inc/db.php";
if(isset($_POST["ajouter"])){
    $nom=$_POST['c_name'];
    $description=$_POST['c_description'];
    $tmp_image=$_FILES['c_image'];
    
    try{
       
        if(!empty($nom)&&!empty($description)&&!empty($tmp_image)){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                
                copy($tmp_image['tmp_name'],"image\\".$tmp_image['name']);
            }
            $sql= $db->prepare("INSERT INTO fornisseur(nom_fornisseur ,img_fornisseur ,description_fornisseur)  values (:nom,:img,:decs )")  ;
            $sql ->execute([":nom"=>$nom,":img"=>$tmp_image['name'],":decs"=>$description ]);
            echo '<div class="alert alert-success" role="alert"> Ajouté avec succès!</div>';
        }else {
            echo '<div class="alert alert-danger" role="alert">Erreur Fornisseur non ajouté!</div>';
        }
        
    }catch(PDOException $e){
        die("erreur ".$e->getMessage());    
    }
    unset($nom,$description,$tmp_image );
}


?>


<div class="adminbody">
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="">Libellé du Fournisseur :</label>
                <input type="text" name="c_name" id="" placeholder="Libellé du Fournisseur" class="form-control">
            </div>
            <div>
                <label for="">Photo du Fournisseur :</label>
                <input type="file" name="c_image" id="" class="form-control">
            </div>
            <div>
                <label for="">Description du Fournisseur :</label>
                <textarea name="c_description" id="" cols="40" rows="10" class="form-control"></textarea>
            </div>
            <div>
                <input type="submit" value="ajouter un fornisseur" name="ajouter">
            </div>
        </form>
        

    </div>
</body>
</html>