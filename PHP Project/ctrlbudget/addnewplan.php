<?php
    require 'common.php';
    $budget=$_SESSION['budget'];
    $people=$_SESSION['people'];
    $user_id=$_SESSION['id'];
    $title= filter_input(INPUT_POST, 'title');
    $from= filter_input(INPUT_POST, 'from');
    $to= filter_input(INPUT_POST, 'to'); 
    $query="insert into plan(user_id,title,from_date,to_date,initial_budget,no_of_people) values ('$user_id','$title','$from','$to','$budget','$people')";
    $result= mysqli_query($con, $query);
    
    $_SESSION['title']=$title;
    $_SESSION['from']=$from;
    $_SESSION['to']=$to;
    $_SESSION['pid']= mysqli_insert_id($con);
    $pid=$_SESSION['pid'];
    for($i=1;$i<=$people;$i++){
        $person= filter_input(INPUT_POST, "Person$i");
        $q1="insert into persons(plan_id,user_id,person_name) values('$pid','$user_id','$person')";
        $r1= mysqli_query($con, $q1) or die(mysqli_error($con));
    }
    header('location:home.php');
?>