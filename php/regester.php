<?php
    $conn=mysqli_connect('localhost','root','','ecommerce');


    if(isset($_POST['submit'])){
        $fname=mysqli_real_escape_string($conn, $_POST["fname"])   ;
        $lname=mysqli_real_escape_string($conn,$_POST["lname"]);
        $email=mysqli_real_escape_string($conn,$_POST["email"]);
        $password=$_POST["password"];
        $cpassword=$_POST["cpassword"];

        $select="select * from clien where email='$email' && passworde='$password' ";

        $result= mysqli_query($conn, $select);

        if(mysqli_num_rows($result)>0){
            echo "<script>alert ('error')</script>";
        }else{
            if($password!= $cpassword){
                echo "<script>alert ('error')</script>";
            }else{
                $insert= "insert into clien(firstName,lastName,email,passworde) values('$fname','$lname','$email','$password')";
                mysqli_query($conn , $insert);
                header('../index.html');
            }
        }
    }
    
?>