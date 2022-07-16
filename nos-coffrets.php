<?php
// include "inc/session.php";
 include "inc/header.php" ?>
<section>
  <div class="gallery">
    <?php include("inc/db.php");
    $req = $db->prepare("SELECT * FROM nos_couffre");
    $req->execute();
    $row = $req->fetchAll();
    foreach ($row as $val) {
    ?>
      <article class="content">
        <img src="admin/image/<?= $val['img_nos_Couffre'] ?> " />
        <h3><?= $val['nom_nos_Couffre'] ?></h3>
        <a href="php/viewcoure.php?id=<?= $val['id_nos_Couffre'] ?>"><p>
        <?= $val['description_nos_Couffre'] ?>
        </p></a>
        <h6><?= $val['prix_nos_Couffre'] ?> DH</h6>
        <ul>
          <?php 
          $avg=$db->prepare("SELECT avg(star) my from commentescouffre where id_ordinateur=?");
          $avg->execute([$val['id_nos_Couffre']]);
          $r=$avg->fetch();
          $rus=$r['my'];
          
          for($i=1;$i<=5;$i++){
            if($i<=$rus){
              echo "<li><i class='fa fa-star'></i></li>";
              $d=$i+0.5;
              $f=$i+1;
            }elseif($rus>=$d && $rus<=$f)
              echo"<li><i class='fa fa-solid fa-star-half-stroke'></i></li>";
            else echo"<li><i class='fa fa-regular fa-star'></i></li>";
          }
            
          ?>
          
        </ul>
        <button class="buy"><a href="php/panair.php?idCouffre=<?= $val['id_nos_Couffre'] ?>" class="panier">Ajouter au panier</a></button>
      </article>
    <?php } ?>
  </div>
</section>
<?php include "inc/footer.php" ?>