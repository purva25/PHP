<?php
    require 'common.php';
    $budget= filter_input(INPUT_POST, 'budget');
    $people= filter_input(INPUT_POST, 'people');
    $_SESSION['budget']=$budget;
    $_SESSION['people']=$people;
    header('location:plandetails.php');
?>