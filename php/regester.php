<?php
    // $conn=mysqli_connect('localhost','root','','ecommerce');
    include "../inc/db.php";


    if(isset($_POST['submit'])){
        $fname= $_POST["fname"]   ;
        $lname=$_POST["lname"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $cpassword=$_POST["cpassword"];
        $profil="default.jpg";

        $sql = $db->prepare("SELECT * from clien where email=? && passworde=? && firstName=? && lastName=? ");
        $sql->execute([$email,$password,$fname,$lname]);
        $cp = $sql->rowCount();

        // $select=;

        // $result= mysqli_query($conn, $select);

        if($cp>0){
            echo "<script>alert ('email et mot de pass déja exist')</script>";
        }else{
            if($password!= $cpassword){
                echo "<script>alert ('le mot de passe ne correspond pas ')</script>";
            }else{
                // $insert= "INSERT into clien(firstName,lastName,email,passworde,profil) values(?,?,?,?,?)";
                // mysqli_query($conn , $insert);
                $insert = $db->prepare("INSERT into clien(firstName,lastName,email,passworde,profil) values(?,?,?,?,?)");
                $insert->execute([$fname,$lname,$email,$password,$profil]);
                header("Location: ../mon-compte.php?cle=Register");
            }
        }
    }
