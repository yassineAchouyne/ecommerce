<?php
session_start();
include "../inc/db.php";
if (isset($_POST['connecter'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = $db->prepare("SELECT * from `admin` where email=:email and passworde=:pas");
    $sql->execute([":email" => $email, ":pas" => $pass]);
    $cp = $sql->rowCount();
    $admin = $sql->fetch();
    if ($cp != 0) {
        $_SESSION['id_admin'] = $admin['id_admin'];
        header("Location:dashpord.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../image/pc-monitor.png">
    <title>login admin</title>
    <link rel="stylesheet" href="../css/indexcss.css">
</head>

<body>
    <section class="admin">
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
            <div><input type="submit" value="Se connecter" name="connecter" /></div>
        </form>
    </section>
    <script src="../js/main.js"></script>
</body>

</html>