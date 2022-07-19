<?php
include "../inc/session.php";
include "../inc/db.php";



if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stat = "instance";
    $select = $db->prepare("SELECT * FROM produits_ordinateur where id_ordinateur=:id");
    $select->execute([":id" => $id]);
    $tabSelect = $select->fetchAll();
    foreach ($tabSelect as $val) {
        $addPaniar = $db->prepare("INSERT INTO `produit_panier`(`id_produit_panier`, `nom_produit_panier`, `img_produit_panier`, `prix_produit_panier`, `dscription_produit_panier`,`id_clien`,`quantit`, `statut`) values(:id,:nom,:img,:prix,:dscription,:clien,:qt,:statut)");
        $addPaniar->execute([":id" => $id, ":nom" => $val['nom_ordinateur'], ":img" => $val['img_ordinateur'], ":prix" => $val['prix_ordinateur'], ":dscription" => $val['dscription_ordinateur'], ":clien" => $_SESSION['id_clien'],"qt"=>1 ,":statut" => $stat]);

    }
    
    $url = $_SESSION['url'];
    header("Location:$url");
}
if (isset($_GET['idCouffre'])) {
    $id = $_GET['idCouffre'];
    $stat = "instance";
    $select = $db->prepare("SELECT * FROM nos_couffre where id_nos_Couffre=:id");
    $select->execute([":id" => $id]);
    $tabSelect = $select->fetchAll();
    foreach ($tabSelect as $val) {
        $addPaniar = $db->prepare("INSERT INTO `produit_panier`(`id_produit_panier`, `nom_produit_panier`, `img_produit_panier`, `prix_produit_panier`, `dscription_produit_panier`, `id_clien`,`quantit`, `statut`) values(:id,:nom,:img,:prix,:dscription,:clien,:qt,:statut)");
        $addPaniar->execute([":id" => $id, ":nom" => $val['nom_nos_Couffre'], ":img" => $val['img_nos_Couffre'], ":prix" => $val['prix_nos_Couffre'], ":dscription" => $val['description_nos_Couffre'], ":clien" => $_SESSION['id_clien'],":qt"=>1, ":statut" => $stat]);
    }
    $url = $_SESSION['url'];
    header("Location:$url");
}

if (isset($_GET['idSupprim'])) {
    $idSupprim = $_GET['idSupprim'];
    $supprim = $db->prepare("UPDATE produit_panier SET statut = :st WHERE id=:id");
    $supprim->execute([":st" => "revenir", ":id" => $idSupprim]);
    header("Location:panair.php");
}


?>
<?php include "../inc/header.php" ?>
<section>
    <table class="tablePanier">
        <caption>
            <h1 style="color: #9e121b;">Page Panier</h1>
        </caption>
        <tr class="hederTable">
            <td>Image de produit</td>
            <td>Nom de produit</td>
            <td>prix de produit</td>
            <td>description de produit</td>
            <td></td>
            <td>Action</td>
        </tr>
        <?php
        
        $selectPaneir = $db->prepare("SELECT * FROM produits_ordinateur po INNER JOIN produit_panier pp  on pp.id_produit_panier = po.id_ordinateur where pp.id_clien=:clien and pp.statut=:st");
        $selectPaneir->execute([":clien" => $_SESSION['id_clien'], ":st" => "instance"]);
        $tablePanier = $selectPaneir->fetchAll();
        $somme = 0;

        foreach ($tablePanier as $val) {

        ?>
            <tr>
                <td><img src="../admin/image/<?= $val['img_produit_panier'] ?>" alt=""></td>
                <td><?= $val['nom_produit_panier'] ?></td>

                <td class="prix_prd"><?= $val['prix_produit_panier'] ?> DH</td>
                <td><?= $val['dscription_produit_panier'] ?></td>
                <td>
                    <input type="range" id="one<?= $val['id'] ?>" min="1" max="<?=$val['quantite']?>" value="<?=$val['quantit']?>" onchange="qantite('one'+<?= $val['id'] ?>,'uno'+<?= $val['id'] ?>,<?= $val['id'] ?>)"/>
                    <div id="uno<?= $val['id'] ?>"><?=$val['quantit']?></div>
                </td>
                <td><a href="panair.php?idSupprim=<?= $val['id'] ?>"><i class="fa-solid fa-xmark" onclick="return confirm('Voulez-vous supprimer le produit') "></i></a></td>
            </tr>
        <?php $somme += $val['prix_produit_panier'];
        } ?>
    </table>
    <div>
        <h3>total
            <span style="color: #9e121b;" id="total"><?php echo $somme . " DH" ?></span>
            <?php
            $cp = $db->prepare("SELECT COUNT(id_produit_panier) as cp from produit_panier where id_clien=:cl");
            $cp->execute([":cl" => $_SESSION['id_clien']]);
            if ($cp->fetchAll()[0]['cp'] != 0) {
                echo '<a href="Payment.html" class="Acheter"> Acheter</a>';
            }
            ?>
        </h3>
    </div>
</section>
<?php include "../inc/footer.php" ?>