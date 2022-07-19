<?php
try{
  include "db.php";
  if(isset($_SESSION['id_clien'])){
    $cp = $db->prepare("SELECT COUNT(id_produit_panier) as cp from produit_panier where id_clien=:cl and statut=:st");
    $cp->execute([":cl"=>$_SESSION['id_clien'],":st"=>"instance"]);
    $cpp=$cp->fetch()['cp'];
}else{
  $cpp=0;
}

}catch(PDOException $e){

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OrdiShop</title>
  <link rel="icon" href="../image/pc-monitor.png">
  <link rel="stylesheet" href="../css/indexcss.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/ee309550fb.js" crossorigin="anonymous"></script>
  <script src="js/jquery-3.6.0.min.js"></script>
</head>

<body>

  <header>
    <nav>
      <div class="nav-bar">
        <i class='bx bx-menu sidebarOpen'></i>
        <span class="logo navLogo"><a href="#">OrdiShop</a></span>

        <div class="menu">
          <div class="logo-toggle">
            <span class="logo"><a href="#">OrdiShop</a></span>
            <i class='bx bx-x siderbarClose'></i>
          </div>
          <ul class="nav-links">
            <li><a href="../index.php" id="">Home</a></li>
            <li><a href="../nos-ordinatour.php">Nos ordinateur</a></li>
            <li><a href="../nos-coffrets.php">Nos Couffre</a></li>
            <li><a href="../nos-fourmisseurs.php">Nos Fornisseur</a></li>
            <li><a href="../qui-sommes.php">Qui sommes Nous</a></li>
            <li><a href="../blog.php">blog</a></li>
            <li><a href="../mon-compte.php">Espace Client</a></li>
          </ul>
        </div>
        <div class="darkLight-searchBox">
          <div class="searchBox">
            <div class="searchToggle">
              <i class='bx bx-x cancel'></i>
              <i class='bx bx-search search'></i>
            </div>
            <form class="search-field">
              <input type="text" placeholder="Search..." id="search">
              <i class='bx bx-search' onclick="search()"></i>
            </form>
          </div>
          <a href="../php/panair.php" class="panier">
            <i class="fa-solid fa-cart-shopping text-light"></i><span id='panier' class="text-light"><?php echo $cpp ?></span>
          </a>
        </div>
      </div>
      <script src="../js/serch.js"></script>
    </nav>
  </header>