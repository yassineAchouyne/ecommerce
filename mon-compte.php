<?php include "inc/header.php" ?>
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
    <div><input type="submit" value="Register" name="submit" onclick="verificationRegister()" /></div>
  </form>
</section>



<script src="js/main.js"></script>
</body>

</html>