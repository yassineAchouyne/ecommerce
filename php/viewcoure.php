<?php
// include "../inc/session.php";
include '../inc/header.php' ?>
<section class="view">
<?php 
include '../inc/db.php'; 
if(isset($_GET['id'])){
$id =$_GET['id'];
$sql=$db->prepare("SELECT * from nos_couffre where id_nos_Couffre=:id");
$sql->execute([":id"=>$id]);
$view=$sql->fetchAll();
?>





    <div class="imag">
        <img src="../admin/image/<?= $view[0]['img_nos_Couffre'] ?>" alt="">
    </div>
    <div>
        <h1><?= $view[0]['nom_nos_Couffre'] ?></h1>
        <p>
        <?= $view[0]['description_nos_Couffre'] ?>
        </p>
    </div>
    <div class="viewprix">
        <h2><?= $view[0]['prix_nos_Couffre'] ?> DH</h2>
        <a href="panair.php?id=<?= $view[0]['id_nos_Couffre'] ?>" class="panier">Ajouter au panier</a>
    </div>


<?php 
}else{
    echo "<h1>Désolé, il n'y a pas de produit à afficher</h1>";
    echo'<p>Pour accéder à la liste des produits,  <a href="../nos-coffrets.php">cliquez ici</p></a> ';
}
echo" </section>";


include '../inc/footer.php' ?>