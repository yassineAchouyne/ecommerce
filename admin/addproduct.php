<?php 
include "sessionAdmin.php";
include "incAdmin/hedear.php" ;
?>
<?php 
include "../inc/db.php";
if(isset($_POST["ajouter"])){
    $nom=$_POST['c_name'];
    $marque=$_POST['c_marque'];
    $type=$_POST['c_type'];
    $prix=$_POST['c_prix'];
    $description=$_POST['c_description'];
    $tmp_image=$_FILES['c_image'];
    

    try{
        if(!empty($nom)&&!empty($description)&&!empty($tmp_image)&&!empty($marque)&&!empty($type)&&!empty($prix)){
            if($_SERVER['REQUEST_METHOD']=='POST'){
            copy($tmp_image['tmp_name'],"image\\".$tmp_image['name']);
        }
        $sql= $db->prepare("INSERT INTO produits_ordinateur(nom_ordinateur ,img_ordinateur ,marque_ordinateur ,type_ordinateur ,prix_ordinateur ,dscription_ordinateur)  values (:nom,:img,:marque,:typ,:prix,:decs )")  ;
        $sql ->execute([":nom"=>$nom,":img"=>$tmp_image['name'],":marque"=>$marque,":typ"=>$type,":prix"=>$prix,":decs"=>$description ]);
        echo '<div class="alert alert-success" role="alert"> Ajouté avec succès!</div>';
        }else{
           echo '<div class="alert alert-danger" role="alert">Erreur Produit non ajouté!</div>';
        }
        
    }catch(PDOException $e){
        die("erreur ".$e->getMessage());
    }
    unset($nom,$marque,$type,$prix,$description,$tmp_image );

}


?>



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
                <input type="submit" value="ajouter un ordinateur" name="ajouter">
            </div>
        </form>
        

    </div>
</body>
</html>