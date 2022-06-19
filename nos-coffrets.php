<?php include "inc/header.php" ?>
<section>
  <div class="gallery">
    <?php include("inc/db.php");
    $req = $db->prepare("SELECT * FROM nos_couffre");
    $req->execute();
    $row = $req->fetchAll();
    foreach ($row as $val) {
    ?>
      <form class="content">
        <img src="admin/image/<?= $val['img_nos_Couffre'] ?> " />
        <h3><?= $val['nom_nos_Couffre'] ?></h3>
        <p>
          <?= $val['description_nos_Couffre'] ?>
        </p>
        <h6><?= $val['prix_nos_Couffre'] ?> DH</h6>
        <ul>
          <li><i class="fa fa-star" aria-hidden="true"></i></li>
        </ul>
        <button class="buy"><a href="php/panair.php?idCouffre=<?= $val['id_nos_Couffre'] ?>" class="panier">Ajouter au panier</a></button>
      </form>
    <?php } ?>
    <!-- <div class="content">
          <img src="image/coufr 2.jpg" />
          <h3>HP + support PC</h3>
          <p>
          HP, 15.6" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive,
          Windows 10.
          </p>
          <h6>DH799.99</h6>
          <ul>
          <li><i class="fa fa-star" aria-hidden="true"></i></li>
          <li><i class="fa fa-star" aria-hidden="true"></i></li>
          <li><i class="fa fa-star" aria-hidden="true"></i></li>
          <li><i class="fa fa-star" aria-hidden="true"></i></li>
          <li><i class="fa fa-star" aria-hidden="true"></i></li>
          </ul>
          <button class="buy">Buy Now</button>
      </div>
      <div class="content">
          <img
          src="image/coufr 1.jpg"
          />
          <h3>LAPTOP + Sac à dos</h3>
          <p>
          Samsung Ativ Laptop (Core i5 4th Gen/8 GB/1 TB/Windows 8 1) -
          NP270E5J-K01US.
          </p>
          <h6>DH154.99</h6>
          <ul>
          <li><i class="fa fa-star" aria-hidden="true"></i></li>
          <li><i class="fa fa-star" aria-hidden="true"></i></li>
          <li><i class="fa fa-star" aria-hidden="true"></i></li>
          <li><i class="fa fa-star" aria-hidden="true"></i></li>
          <li><i class="fa fa-star" aria-hidden="true"></i></li>
          </ul>
          <button class="buy">Buy Now</button>
      </div>
      <div class="content">
          <img src="image/coufr 3.jpg" />
          <h3>Emballer</h3>
          <p>Asus Travelmate P414-51 14´´ i5-1135G7/16GB/512GB SSD Laptop</p>
          <h6>DH200.00</h6>
          <ul>
          <li><i class="fa fa-star" aria-hidden="true"></i></li>
          <li><i class="fa fa-star" aria-hidden="true"></i></li>
          <li><i class="fa fa-star" aria-hidden="true"></i></li>
          <li><i class="fa fa-star" aria-hidden="true"></i></li>
          <li><i class="fa fa-star" aria-hidden="true"></i></li>
          </ul>
          <button class="buy">Buy Now</button>
      </div>
          <div class="content">
              <img src="image/coufr 2.jpg" />
              <h3>HP + support PC</h3>
              <p>
              HP, 15.6" HD , Intel Core i5-1035G1, 12GB , 1TB Hard Drive,
              Windows 10.
              </p>
              <h6>DH799.99</h6>
              <ul>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              </ul>
              <button class="buy">Buy Now</button>
          </div>
          <div class="content">
              <img
              src="image/coufr 1.jpg"
              />
              <h3>LAPTOP + Sac à dos</h3>
              <p>
              Samsung Ativ Laptop (Core i5 4th Gen/8 GB/1 TB/Windows 8 1) -
              NP270E5J-K01US.
              </p>
              <h6>DH154.99</h6>
              <ul>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              </ul>
              <button class="buy">Buy Now</button>
          </div>
          <div class="content">
              <img src="image/coufr 3.jpg" />
              <h3>Emballer</h3>
              <p>Asus Travelmate P414-51 14´´ i5-1135G7/16GB/512GB SSD Laptop</p>
              <h6>DH200.00</h6>
              <ul>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              </ul>
              <button class="buy">Buy Now</button>
          </div> -->
  </div>
</section>
<?php include "inc/footer.php" ?>