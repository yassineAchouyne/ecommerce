<?php
// include "inc/session.php";
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
  <script src="js/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="css/blog.css" />
</head>

<body class="light-theme">
  <!-- راسية الموقع -->
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
            <li><a href="nos-ordinatour.php">Nos ordinateur</a></li>
            <li><a href="nos-coffrets.php">Nos Couffre</a></li>
            <li><a href="nos-fourmisseurs.php">Nos Fornisseur</a></li>
            <li><a href="qui-sommes.php">Qui sommes Nous</a></li>
            <li class="this"><a href="/blog.php">blog</a></li>
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
  </header>

  <main class="main">
    <div class="container-m">
      <div class="blog">
        <h2 class="h2">Latest Blog Post</h2>

        <div class="blog-card-group">
          <?php include("inc/db.php");
          $req = $db->prepare("SELECT * FROM blog");
          $req->execute();
          $row = $req->fetchAll();
          foreach ($row as $val) {
          ?>
            <article class="blog-card">
              <div class="blog-card-banner">
                <img src="admin/image/<?= $val['img_blog'] ?>" alt="" width="250" class="blog-banner-img" />
              </div>

              <div class="blog-content-wrapper">
                <button class="blog-topic text-tiny" id="<?= $val['tag_blog'] ?>">
                  <?= $val['tag_blog'] ?>
                </button>

                <h3>
                  <a href="#" class="h3">
                    <?= $val['nom_blog'] ?>
                  </a>
                </h3>

                <p class="blog-text">
                  <?= $val['description_blog'] ?>.
                </p>

                <div class="wrapper-flex">
                  <div class="wrapper">
                    <p class="text-sm">
                      <time datetime="2022-01-17"><?= $val['dateNew_blog'] ?></time>
                      <span class="separator"></span>
                    </p>
                  </div>
                </div>
              </div>
            </article>
          <?php } ?>

        </div>
      </div>
      <div class="aside">
        <div class="topics">
          <div class="tags">
            <h2 class="h2">Tags</h2>

            <div class="wrapper">

            <?php
            $tag=$db->prepare("SELECT tag_blog from blog");
            $tag->execute();
            $tabtag=$tag->fetchAll();
            foreach($tabtag as $val){
            ?>
              <a class="hashtag" href="#<?= $val['tag_blog'] ?>">#<?= $val['tag_blog'] ?></a>
            <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php include "inc/footer.php" ?>