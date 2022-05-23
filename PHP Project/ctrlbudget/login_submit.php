<?php
    require 'common.php';
    $email= mysqli_real_escape_string($con,filter_input(INPUT_POST,'email'));
    $pass= md5(mysqli_real_escape_string($con,filter_input(INPUT_POST,'password')));
    $q1="select id from users where email='$email' and password='$pass'";
    $r= mysqli_query($con, $q1) or die(mysqli_error($con));
    if(mysqli_num_rows($r)==1){
        $row= mysqli_fetch_array($r);
        $_SESSION['email']=$email;
        $_SESSION['id']=$row['id'];
        header('location: home.php');
        //header('location: login.php');
    }
    else{
        echo "<script>alert('Invalid Credentials!!')</script>";
        echo "<script>location.href='login.php'</script>";
    }
?>