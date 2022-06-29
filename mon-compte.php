<?php
session_start();
include "inc/db.php";
if (isset($_POST['connecter'])) {
  $email = $_POST['email'];
  $pass = $_POST['password'];

  $sql = $db->prepare("SELECT * from clien where email=:email and passworde=:pas");
  $sql->execute([":email" => $email, ":pas" => $pass]);
  $cp = $sql->rowCount();
  $clien = $sql->fetch();
  if ($cp != 0) {
    $a = $clien['id'];
    $_SESSION['id_clien'] = $clien['id'];
    header("Location:inc/session.php?ses=$a");
  }
}


?>



<?php include "inc/header.php" ?>

<?php
if (!isset($_SESSION['id_clien'])) {
  if (empty($_GET['cle'])) {

?>
    <section id="espas">
      <form action="php/regester.php" method="post" class="form">
        <div class="titre">
          <h2>Register</h2>
        </div>
        <div class="titre">
          <p>creat your accont .It's free only takes a minute</p>
        </div>
        <div>
          <input type="text" name="fname" placeholder="First Name" class="notvide text" required />
          <input type="text" name="lname" placeholder="Last Name" class="notvide text" required />
        </div>
        <div></div>
        <div><input type="email" name="email" id="" placeholder="Email" class="notvide" required /></div>
        <div>
          <input type="password" name="password" id="" placeholder="Password" class="notvide Password" required onkeyup="verificationPassword()" />
        </div>
        <div>
          <input type="password" name="cpassword" id="" placeholder="Confirm Password" class="notvide Password" required onkeyup="verificationPassword()" />
        </div>
        <div>
          <input type="checkbox" name="" id="chec" onclick="ShowPassword()">Show password
        </div>
        <div>
          <a href="?cle=Register">Avez-vous un compte ?</a>
        </div>
        <div><input type="submit" value="Register" name="submit" onclick="verificationRegister()" /></div>
      </form>
    </section>
  <?php } else {

  ?>
    <section id="espas">
      <form action="" method="post" class="form">
        <div class="titre">
          <h2>Se connecter</h2>
        </div>
        <div></div>
        <div><input type="email" name="email" id="" placeholder="Email" class="notvide" required /></div>
        <div>
          <input type="password" name="password" id="" placeholder="Password" class="notvide Password" required onkeyup="verificationPassword()" />
        </div>
        <div>
          <input type="checkbox" name="" id="chec" onclick="ShowPassword()">Show password
        </div>
        <div>
          <a href="mon-compte.php?cle=">Créer un nouveau compte</a>
        </div>
        <div><input type="submit" value="Se connecter" name="connecter" /></div>
      </form>
    </section>

  <?php }
} else {

  ?>
  

<?php
}
?>

<script src="js/main.js"></script>
</body>

</html>