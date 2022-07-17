<?php
// include "inc/session.php";
session_start();
$_SESSION['url']=$_SERVER['REQUEST_URI'];
include "inc/db.php";
if(isset($_SESSION['id_clien'])){
  $cp = $db->prepare("SELECT COUNT(id_produit_panier) as cp from produit_panier where id_clien=:cl");
  $cp->execute([":cl"=>$_SESSION['id_clien']]);
  $cpp=$cp->fetch()['cp'];
}else{
$cpp=0;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>OrdiShop</title>
  <link rel="icon" href="image/pc-monitor.png" />
  <link rel="stylesheet" href="css/indexcss.css" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://kit.fontawesome.com/ee309550fb.js" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <nav>
      <div class="nav-bar">
        <i class="bx bx-menu sidebarOpen"></i>
        <span class="logo navLogo"><a href="#">OrdiShop</a></span>

        <div class="menu">
          <div class="logo-toggle">
            <span class="logo"><a href="#">OrdiShop</a></span>
            <i class="bx bx-x siderbarClose"></i>
          </div>
          <ul class="nav-links">
            <li><a href="index.php" id="">Home</a></li>
            <li class="this">
              <a href="nos-ordinatour.php">Nos ordinateur</a>
            </li>
            <li><a href="nos-coffrets.php">Nos Couffre</a></li>
            <li><a href="nos-fourmisseurs.php">Nos Fornisseur</a></li>
            <li><a href="qui-sommes.php">Qui sommes Nous</a></li>
            <li><a href="blog.php">blog</a></li>
            <li><a href="mon-compte.php">Espace Client</a></li>
          </ul>
        </div>
        <div class="darkLight-searchBox">
          <div class="searchBox">
            <div class="searchToggle">
              <i class="bx bx-x cancel"></i>
              <i class="bx bx-search search"></i>
            </div>
            <form class="search-field">
              <input type="text" placeholder="Search..." id="search" />
              <i class="bx bx-search" onclick="search()"></i>
            </form>
          </div>
          <a href="../php/panair.php" class="panier">
            <i class="fa-solid fa-cart-shopping"></i><span id='panier'><?php echo $cpp ?></span>
          </a>
        </div>
      </div>
      <script src="js/serch.js"></script>
    </nav>
    <div class="menu2">
      <ul>
        <li>
          <input type="number" placeholder="Trier par prix" name="prix" id="prix"  />
        </li>
        <li>
          <input type="checkbox" name="Obureau" id="Obureau" checked/>Ordinateurs de bureau
        </li>
        <li>
          <input type="checkbox" name="Oportable" id="Oportable" checked/>Ordinateurs
          portables
        </li>
        <li>
          <input type="checkbox" name="MiniPC" class="MiniPC" id="MiniPC" checked/>Mini PC <button onclick=" fillter()" class="Sorte">Sorte</button>
        </li>
      </ul>
    </div>
  </header>
  <main>
    <section>
      <div class="gallery">
        <?php include("inc/db.php");
        $req = $db->prepare("SELECT * FROM produits_ordinateur");
        $req->execute();
        $row = $req->fetchAll();
        foreach ($row as $val) {
        ?>
          <article class="content">
            <img src="admin/image/<?= $val['img_ordinateur'] ?> " />
            <h3><?= $val['nom_ordinateur'] ?></h3>
            <a href="php/view.php?id=<?= $val['id_ordinateur'] ?>"><p>
              <?= $val['dscription_ordinateur'] ?>
            </p></a>
            <h6><?= $val['prix_ordinateur'] ?> DH</h6>
            <input type="hidden" id="typ" value="<?= $val['type_ordinateur'] ?>" />
            <ul>
          <?php 
          $avg=$db->prepare("SELECT avg(star) my from commentes where id_ordinateur=?");
          $avg->execute([$val['id_ordinateur']]);
          $r=$avg->fetch();
          $rus=$r['my'];
          $d=1.5;
          $f=2;
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
            <button class="buy"><a href="php/panair.php?id=<?= $val['id_ordinateur'] ?>" class="panier">Ajouter au panier</a></button>
          </article>
        <?php } ?>
      </div>
    </section>
  </main>
  <?php include "inc/footer.php" ?>