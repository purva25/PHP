<?php
    require 'common.php';
    $name= mysqli_real_escape_string($con,filter_input(INPUT_POST, 'name'));
    $email= mysqli_real_escape_string($con, filter_input(INPUT_POST, 'email'));
    $pass= md5(mysqli_real_escape_string($con,filter_input(INPUT_POST, 'pass')));
    $contact=filter_input(INPUT_POST, 'phone');
    
    $reg_email= "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
    $reg_contact="/^[789][0-9]{9}$/";
    
    $q="select id from users where email='$email'";
    $r= mysqli_query($con, $q);
    if(mysqli_num_rows($r)>0){
        echo "<script>alert('Email Already Exists!!')</script>";
        echo "<script>location.href='signup.php'</script>";
    }
    else if(!preg_match($reg_email, $email)){
        //$error='Incorect EmailID';
        //header('location: signup.php?e1='.$error);
        echo "<script>alert('Incorect EmailID')</script>";
        echo "<script>location.href='signup.php'</script>";
    }
    else if(!preg_match($reg_contact, $contact)){
        echo "<script>alert('Contact number must be of 10 numbers')</script>";
        echo "<script>location.href='signup.php'</script>";
    }
    else{
        $query1="insert into users (name,email,password,phone_number) values ('$name','$email','$pass','$contact')";
        //die($query1);
        $submit= mysqli_query($con, $query1) or die(mysqli_error($con));
        echo "<script>alert('User Registered Successfully!!')</script>";
        echo "<script>location.href='home.php'</script>";
        $_SESSION['email']=$email;
        $_SESSION['id']=mysqli_insert_id($con);
    }
    
?>

