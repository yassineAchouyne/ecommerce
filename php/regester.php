<?php
    $conn=mysqli_connect('localhost','root','','ecommerce');


    if(isset($_POST['submit'])){
        $fname=mysqli_real_escape_string($conn, $_POST["fname"])   ;
        $lname=mysqli_real_escape_string($conn,$_POST["lname"]);
        $email=mysqli_real_escape_string($conn,$_POST["email"]);
        $password=$_POST["password"];
        $cpassword=$_POST["cpassword"];
        $profil="default.jpg";

        $select="select * from clien where email='$email' && passworde='$password' && firstName='$lname' && lastName='$lname' ";

        $result= mysqli_query($conn, $select);

        if(mysqli_num_rows($result)>0){
            echo "<script>alert ('email et mot de pass déja exist')</script>";
        }else{
            if($password!= $cpassword){
                echo "<script>alert ('le mot de passe ne correspond pas ')</script>";
            }else{
                $insert= "insert into clien(firstName,lastName,email,passworde,profil) values('$fname','$lname','$email','$password','$profil')";
                mysqli_query($conn , $insert);
                header("Location: ../mon-compte.php?cle=Register");
            }
        }
    }
    
?>
