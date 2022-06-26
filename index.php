<?php include "inc/header.php" ?>
<section>
  <div class="interface">
    <div>
      <h1>Vous avez votre demande</h1>
      <p><span class="OrdiShop">Ordi<span>Shop</span></span> La société vous offre les meilleurs ordinateurs <span> Programation</span> , <span>Consiption</span> et <span>Des Jeux</span></p>
      <div><a class="cssbuttons-io-button" href="qui-sommes.php"> En savoir plus
          <div class="icon">
            <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 0h24v24H0z" fill="none"></path>
              <path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="currentColor"></path>
            </svg>
          </div>
        </a></div>
    </div>
    <div class="bg"></div>
  </div>
</section>

<section>
  <div class="gallery">
    <?php include("inc/db.php");
    $req = $db->prepare("SELECT * FROM produits_ordinateur");
    $req->execute();
    $row = $req->fetchAll();
    for ($val = 0; $val < 3; $val++) {
    ?>
      <form class="content">
        <img src="image/<?= $row[$val]['img_ordinateur'] ?> " />
        <h3><?= $row[$val]['nom_ordinateur'] ?></h3>
        <p>
          <?= $row[$val]['dscription_ordinateur'] ?>
        </p>
        <h6><?= $row[$val]['prix_ordinateur'] ?> DH</h6>
        <input type="hidden" id="typ" value="<?= $row[$val]['type_ordinateur'] ?>" />
        <ul>
          <li><i class="fa fa-star" aria-hidden="true"></i></li>
        </ul>
        <button class="buy"><a href="php/panair.php?id=<?= $row[$val]['id_ordinateur'] ?>" class="panier">Ajouter au panier</a></button>
      </form>
    <?php } ?>
  </div>

  <div class="voirtot"><a class="cssbuttons-io-button" href="nos-ordinatour.php"> Voir tout
      <div class="icon">
        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 0h24v24H0z" fill="none"></path>
          <path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="currentColor"></path>
        </svg>
      </div>
    </a></div>
  <div class="gallery">
    <?php include("inc/db.php");
    $req = $db->prepare("SELECT * FROM nos_couffre");
    $req->execute();
    $couffre = $req->fetchAll();
    for ($val = 0; $val < 3; $val++) {
    ?>
      <form class="content">
        <img src="admin/image/<?= $couffre[$val]['img_nos_Couffre'] ?> " />
        <h3><?= $couffre[$val]['nom_nos_Couffre'] ?></h3>
        <p>
          <?= $couffre[$val]['description_nos_Couffre'] ?>
        </p>
        <h6><?= $couffre[$val]['prix_nos_Couffre'] ?> DH</h6>
        <ul>
          <li><i class="fa fa-star" aria-hidden="true"></i></li>
        </ul>
        <button class="buy"><a href="php/panair.php?idCouffre=<?= $couffre[$val]['id_nos_Couffre'] ?>" class="panier">Ajouter au panier</a></button>
      </form>
    <?php } ?>
  </div>
  <div class="voirtot"> <a class="cssbuttons-io-button" href="nos-coffrets.php"> Voir tout
      <div class="icon">
        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 0h24v24H0z" fill="none"></path>
          <path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="currentColor"></path>
        </svg>
      </div>
    </a>
  </div>
</section>

<?php include "inc/footer.php" ?>