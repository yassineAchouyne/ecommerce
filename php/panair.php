<?php
include "../inc/db.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // header("Location: ../nos-ordinatour.php");
    $select = $db->prepare("SELECT * FROM produits_ordinateur where id_ordinateur=:id");
    $select->execute([":id" => $id]);
    $tabSelect = $select->fetchAll();
    foreach ($tabSelect as $val) {
        $addPaniar = $db->prepare("INSERT INTO produit_panier VALUES(:id,:nom,:img,:prix,:dscription)");
        $addPaniar->execute([":id" => $id, ":nom" => $val['nom_ordinateur'], ":img" => $val['img_ordinateur'], ":prix" => $val['prix_ordinateur'], ":dscription" => $val['dscription_ordinateur']]);
    }
    header("Location: ../nos-ordinatour.php");
}
if(isset($_GET['idSupprim'])){
    $idSupprim=$_GET['idSupprim'];
    $supprim=$db->prepare("DELETE FROM produit_panier WHERE id_produit_panier=:supp");
    $supprim->execute([":supp"=>$idSupprim]);
}


?>
<?php include "../inc/header.php" ?>
<section>
    <table class="tablePanier">
        <caption><h1 style="color: #9e121b;">Page Panier</h1></caption>
        <tr class="hederTable">
            <td>Image de produit</td>
            <td>Nom de produit</td>
            <td>prix de produit</td>
            <td>Quantity</td>
            <td>description de produit</td>
            <td>Action</td>
        </tr>
        <?php 
        $selectPaneir=$db->prepare("SELECT * FROM produit_panier");
        $selectPaneir->execute();
        $tablePanier=$selectPaneir->fetchAll();
        foreach($tablePanier as $val){

        ?>
        <tr>
            <td><img src="../admin/image/<?=$val['img_produit_panier'] ?>" alt=""></td>
            <td><?=$val['nom_produit_panier'] ?></td>
            <td class="prix_prd"><?=$val['prix_produit_panier'] ?> DH</td>
            <td>
                <input type="number" name="qt" class="qt"  value="1">
            </td>
            <td><?=$val['dscription_produit_panier'] ?></td>
            <td><a href="panair.php?idSupprim=<?= $val['id_produit_panier']?>"><i class="fa-solid fa-xmark"></i></a></td>
        </tr>
        <?php }?>
    </table>
    <div>
        <script>
            var tab=document.getElementsByClassName('tablePanier')[0];
            var tr=tab.getElementsByTagName('tr');
            var somme=0;
            for(i=1;i<tr.length;i++){
                var pr=tr[i].getElementsByClassName('prix_prd')[0];
                var qt=tr[i].getElementsByClassName('qt')[0];
                somme+=Number( pr.innerHTML)*qt.value;
            }
            var rus=document.getElementById('total');
            rus.innerHTML=somme;
        </script>
        <h3 >total <span style="color: #9e121b;" id="total"></span></h3>
    </div>
</section>
<?php include "../inc/footer.php" ?>