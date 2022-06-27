<?php include '../inc/header.php' ?>
<?php 
include '../inc/db.php';

if(isset($_GET['id'])){
$id =$_GET['id'];
$sql=$db->prepare("SELECT * from produits_ordinateur where id_ordinateur=:id");
$sql->execute([":id"=>$id]);
$view=$sql->fetchAll();
?>

<section class="view">
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
</section>

<?php } include '../inc/footer.php' ?>