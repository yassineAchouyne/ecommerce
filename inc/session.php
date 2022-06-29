<?php 
session_start();
if(empty($_SESSION['id_clien'])){

?>

<meta http-equiv="refresh" content="0.5;url='../mon-compte.php?cle=Register'">

<?php
}else{
    if(isset ($_GET['ses'])){
        $_SESSION['id_clien']=$_GET['ses'];
        
        header("Location:../mon-compte.php");
    }
}
?>
