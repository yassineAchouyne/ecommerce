<?php 
include "sessionAdmin.php";
include "incAdmin/hedear.php" ;
include "../inc/db.php";
?>
<link rel="stylesheet" href="css/dash.css">

<body>
        <div class="main">
            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php 
                                $sql=$db->prepare("SELECT count(*) cp from clien");
                                $sql->execute([]);
                                echo $sql->fetch()['cp'];
                            ?>
                        </div>
                        <div class="cardName">tous les clients</div>
                    </div>

                    <div class="iconBx">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php 
                                $sql=$db->prepare("SELECT count(*) cp from produit_panier");
                                $sql->execute([]);
                                echo $sql->fetch()['cp'];
                            ?>
                        </div>
                        <div class="cardName">Ventes</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php 
                                $sql1=$db->prepare("SELECT count(*) cp from commentes");
                                $sql1->execute([]);
                                $sql2=$db->prepare("SELECT count(*) cp from commentescouffre");
                                $sql2->execute([]);
                                echo $sql1->fetch()['cp']+$sql2->fetch()['cp'];
                            ?>
                        </div>
                        <div class="cardName">Comments</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">0 DH</div>
                        <div class="cardName">Gagner</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Commandes récentes</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Image</td>
                                <td>Clien</td>
                                <td>Nom</td>
                                <td>prix</td>
                                <td>Statut</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                                $sql=$db->prepare("SELECT * from produit_panier p inner join clien c on p.id_clien=c.id");
                                $sql->execute([]);
                                $tab= $sql->fetchAll();
                                foreach($tab as $val){
                            ?>
                            <tr>
                                
                                <td>
                                    <div class="imgBx"><img src="/admin/image/<?=$val['img_produit_panier']?>" alt=""></div>
                                </td>
                                <td><?=$val['firstName']?> <?=$val['lastName']?></td>
                                <td><?=$val['nom_produit_panier']?></td>
                                <td><?=$val['prix_produit_panier']?> DH</td>
                                <td><span class="status instance">instance</span></td>
                            </tr>
                            <?php }?>
                            
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Clients récents</h2>
                    </div>

                    <table>
                    <?php 
                                $sql=$db->prepare("SELECT * from clien ");
                                $sql->execute([]);
                                $tab= $sql->fetchAll();
                                foreach($tab as $val){
                            ?>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../image/<?=$val['profil']?>" alt=""></div>
                            </td>
                            <td>
                                <h4><?=$val['firstName']?> <?=$val['lastName']?><br> <span><?=$val['adress']?></span></h4>
                            </td>
                        </tr>
                        <?php }?>

                        
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
