<?php 
include "../inc/session.php";
include '../inc/header.php' ;

?>
<section class="view">
<?php 
include '../inc/db.php';
if(isset($_GET['id'])){
$id =$_GET['id'];
$sql=$db->prepare("SELECT * from produits_ordinateur where id_ordinateur=:id");
$sql->execute([":id"=>$id]);
$view=$sql->fetchAll();
?>

    <div class="imag">
        <img src="../admin/image/<?= $view[0]['img_ordinateur'] ?>" alt="">
    </div>
    <div>
        <h1><?= $view[0]['nom_ordinateur'] ?></h1>
        <p>
        <?= $view[0]['dscription_ordinateur'] ?>
        </p>
    </div>
    <div class="viewprix">
        <h2><?= $view[0]['prix_ordinateur'] ?>DH</h2>
        <a href="panair.php?id=<?= $view[0]['id_ordinateur'] ?>" class="panier">Ajouter au panier</a>
    </div>


<?php 
}else{
    echo "<h1>Désolé, il n'y a pas de produit à afficher</h1>";
    echo'<p>Pour accéder à la liste des produits,  <a href="../nos-ordinatour.php">cliquez ici</p></a> ';
}
echo" </section>";
include '../inc/footer.php' ?>