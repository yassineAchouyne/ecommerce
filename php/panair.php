<?php
include "../inc/session.php";
include "../inc/db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $select = $db->prepare("SELECT * FROM produits_ordinateur where id_ordinateur=:id");
    $select->execute([":id" => $id]);
    $tabSelect = $select->fetchAll();
    foreach ($tabSelect as $val) {
        $addPaniar = $db->prepare("INSERT INTO produit_panier VALUES(:id,:nom,:img,:prix,:dscription,:clien)");
        $addPaniar->execute([":id" => $id, ":nom" => $val['nom_ordinateur'], ":img" => $val['img_ordinateur'], ":prix" => $val['prix_ordinateur'], ":dscription" => $val['dscription_ordinateur'],":clien"=>$_SESSION['id_clien']]);
    }
    header("Location:panair.php");
}
if (isset($_GET['idCouffre'])) {
    $id = $_GET['idCouffre'];
    
    $select = $db->prepare("SELECT * FROM nos_couffre where id_nos_Couffre=:id");
    $select->execute([":id" => $id]);
    $tabSelect = $select->fetchAll();
    foreach ($tabSelect as $val) {
        $addPaniar = $db->prepare("INSERT INTO produit_panier VALUES(:id,:nom,:img,:prix,:dscription,:clien)");
        $addPaniar->execute([":id" => $id, ":nom" => $val['nom_nos_Couffre'], ":img" => $val['img_nos_Couffre'], ":prix" => $val['prix_nos_Couffre'], ":dscription" => $val['description_nos_Couffre'],":clien"=>$_SESSION['id_clien']]);
    }
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
            <td>description de produit</td>
            <td>Action</td>
        </tr>
        <?php 
        $selectPaneir=$db->prepare("SELECT * FROM produit_panier where id_clien=:clien");
        $selectPaneir->execute([":clien"=>$_SESSION['id_clien']]);
        $tablePanier=$selectPaneir->fetchAll();
        $somme=0;
        
        foreach($tablePanier as $val){
            
        ?>
        <tr>
            <td><img src="../admin/image/<?=$val['img_produit_panier'] ?>" alt=""></td>
            <td><?=$val['nom_produit_panier'] ?></td>
            <td class="prix_prd"><?=$val['prix_produit_panier'] ?> DH</td>
            <td><?=$val['dscription_produit_panier'] ?></td>
            <td><a href="panair.php?idSupprim=<?= $val['id_produit_panier']?>"><i class="fa-solid fa-xmark"></i></a></td>
        </tr>
        <?php $somme+=$val['prix_produit_panier'];}?>
    </table>
    <div>
        <h3 >total 
            <span style="color: #9e121b;" id="total"><?php echo $somme ." DH"?></span>
            <?php 
            $cp=$db->prepare("SELECT COUNT(id_produit_panier) as cp from produit_panier where id_clien=:cl");
            $cp->execute([":cl"=> $_SESSION['id_clien']]);
            if($cp->fetchAll()[0]['cp']!=0){
                echo '<a href="Payment.html" class="Acheter"> Acheter</a>';
            } 
            ?>
        </h3>
    </div>
</section>
<?php include "../inc/footer.php" ?>