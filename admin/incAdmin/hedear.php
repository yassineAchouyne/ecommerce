<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrdiShop Admin</title>
    <link rel="icon" href="/image/pc-monitor.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dash.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
    <script src="https://kit.fontawesome.com/ee309550fb.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</head>

<body class="addprd">
    <header class="bg-cl">
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="dashpord.php">Ordichop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-light"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-togglec text-light" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Ajouter items
                            </a>
                            <ul class="dropdown-menu dropdown-menu bg-cl " aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="addproduct.php">Produit</a></li>
                                <li><a class="dropdown-item" href="addouffre.php">Couffre</a></li>
                                <li><a class="dropdown-item" href="addFournisseur.php">Fornisseur</a></li>
                                <li><a class="dropdown-item" href="addBlog.php">Blog</a></li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link  text-light" href="commende.php">
                                Les commande
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-togglec text-light" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gestion de stock
                            </a>
                            <ul class="dropdown-menu dropdown-menu bg-cl " aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="Gestion_des_produits.php">GS Produit</a></li>
                                <li><a class="dropdown-item" href="Gestion_des_couffre.php">GS Couffre</a></li>
                                <li><a class="dropdown-item" href="Gestion_des_fornisseur.php">GS Fornisseur</a></li>
                                <li><a class="dropdown-item" href="Gestion_des_blog.php">GS Blog</a></li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item ">
                            <a class="nav-link  text-light" href="addAdmin.php">
                                Admin
                            </a>
                        </li>
                        <li class="nav-item user">
                            <a class="nav-link  text-light" href="">
                                <img src="/image/1386f3c1-3ce7-490e-a9dc-d18780c808cc.jpg" alt="">
                            </a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>