<?php
    session_start();
    session_unset();
    session_destroy();
?>
<?php 
    if(!isset($_SESSION['id'])){
        header('location: index.php');
        exit;
    }
?>
