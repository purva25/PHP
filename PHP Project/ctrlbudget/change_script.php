<?php
    require 'common.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }
    $pass= md5(mysqli_real_escape_string($con,filter_input(INPUT_POST, 'pass')));
    $newpass= md5(mysqli_real_escape_string($con,filter_input(INPUT_POST, 'newpass')));
    $repass= md5(mysqli_real_escape_string($con,filter_input(INPUT_POST, 'repass')));
    $reg_pass="#.*^(?=.{6,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#";
    $email=$_SESSION['email'];
    
    $q2="select * from users where email='$email' and password='$pass'";
    $result=mysqli_query($con, $q2) or die(mysqli_error($con));
    
    if(!preg_match($reg_pass, $pass) AND !preg_match($reg_pass, $newpass) AND !preg_match($reg_pass, $repass)){
        $err='Enter Password in correct Format';
        header('location:changepass.php?e1='.$err);
        //echo "<script>alert('Enter Password in correct Format')</script>";
        //echo "<script>location.href:changepass.php</script>";
    }
    else if($pass==$newpass){
        echo "<script>alert('Old Password and New password cannot match')</script>";
        echo "<script>location.href:changepass.php</script>";
    }
    else if($repass!=$newpass){
        echo "<script>alert('New Password and Re-type password should match')</script>";
        echo "<script>location.href:changepass.php</script>";
    }
    else if(mysqli_num_fields($result)>0){
        $update_query = "UPDATE users SET password = '$newpass' WHERE email = '$email'";
        $update_query_result = mysqli_query($con , $update_query) or die(mysqli_error($con));
        echo "<script>alert('Password Changed Successfully!!')</script>";
        echo "<script>location.href:changepass.php</script>";
    }
    else{
        echo "<script>alert('Invalid Credentials!!')</script>";
        echo "<script>location.href:changepass.php</script>";
    }
?>