<?php
    $con=mysqli_connect('localhost','root','','ecommerce');
    $a_name=@$_POST['a_name'];
    $a_pass=@$_POST['a_pass'];
    if(isset($_POST['login'])){
        if(empty($a_name)or empty($a_pass)){
            echo '<script>alert("Veuillez entrer toutes les informations")</script>';
        }else{
            $get_admin="select * from admin where a_name='$a_name'and a_pass ='$a_pass'";
            $run_admin= mysqli_query($con,$get_admin) ;
            if(mysqli_num_rows($run_admin)==1){
                $row_admin=mysqli_fetch_array($run_admin) ;
                $aname=$row_admin['a_name'];
                setcookie("aname",$aname,time()+60*60*24);
                setcookie("adminlogin",1,time()+60*60*24);
                echo '<script>alert("accueillir à nouveau")</script>';
                header("Location: ok.php");
            }else{
                echo '<script>alert("Les données saisies sont incorrectes")</script>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="loginAll">
        <form action="login.php" method="post">
            <input type="text" name="a_name" id="" placeholder="Nom d'utilisateur"><br>
            <input type="password" name="a_pass" id="" placeholder="Mot de passe"><br>
            <input type="submit" value="Se connecter" name="login">
        </form>
    </div>
</body>
</html>