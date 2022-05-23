<?php
    function abc($plan_id){
        $con= mysqli_connect("localhost","root","","expense") or die(mysqli_error($con));
        $q3="select * from plan where id='$plan_id'";
        $r3= mysqli_query($con, $q3);
        $row2= mysqli_fetch_array($r3);
        $_SESSION['budget1']=$row2['initial_budget'];
        $_SESSION['no_of_people1']=$row2['no_of_people'];
        $_SESSION['tit1']=$row2['title'];
        $_SESSION['from1']=$row2['from_date'];
        $_SESSION['to1']=$row2['to_date'];
        $_SESSION['plan_id']=$plan_id;
    }
?>