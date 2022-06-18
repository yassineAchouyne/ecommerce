<?php
include("../inc/header.php");
?>
<section>
    <?php include("../inc/db.php"); 
    $req= $db->prepare("SELECT * FROM produits_ordinateur")  ;
    $req ->execute();
    $row=$req->fetchAll();
    foreach($row as $val){
     ?>
     <form  class="content">
        <img src="image/<?=$val['img_ordinateur']?> " />
        <h3><?=$val->nom_ordinateur?></h3>
        <p>
        <?=$val['dscription_ordinateur']?>
        </p>
        <h6><?=$val['prix_ordinateur']?></h6>
        <input type="hidden" name="1" id="typ" value="3" />
        <ul>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
        </ul>
        <button class="buy" onclick="panair()">Buy Now</button>
    </form>
    <?php } ?>
</section>