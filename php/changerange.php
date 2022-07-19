<?php
include "../inc/db.php";

$sql=$db->prepare("UPDATE produit_panier set quantit=? where id=?");
$sql->execute([$_GET['val'],$_GET['id']]);

?>
<script>
    window.location.href="javascript:history.go(-1)"
</script>