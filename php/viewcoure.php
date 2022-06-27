<?php 
include '../inc/db.php';
$id =$_GET['id'];
$sql=$db->prepare("SELECT * from nos_couffre where id_nos_Couffre=:id");
$sql->execute([":id"=>$id]);
$view=$sql->fetchAll();
?>


<?php include '../inc/header.php' ?>

<section class="view">
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
</section>

<?php include '../inc/footer.php' ?>