<?php
session_start();
if (empty($_SESSION['id_admin'])) {

?>

    <meta http-equiv="refresh" content="10;url='login.php'">

<?php
}

?>