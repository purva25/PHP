<?php
    require 'common.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ctrl Budget</title>
        <?php
            include 'link.php';
        ?>
    </head>
    <body>
        <?php
            include 'header.php';
        ?>
        
        <div class="container navi">
            <div class="row">
                <div class="col-xs-6">
                    <h2>Who are we?</h2>
                    <p>We are a group of young technocrats who come up with an idea of solving budget and time issues which we usually face in our daily lives. We are here to provide a budget controller according to your aspects.<br>Budget control is the biggest financial issue in the present world. One should look after budget control to get rid off from their financial crisis.</p>
                </div>
                <div class="col-xs-6">
                    <h2>Why choose us?</h2>
                    <p>We provide with a predominant way to control and manage your budget estimations with ease of accessing for multiple users.</p>
                </div>
            </div>    
            <div class="row">
                <div class="col-xs-6">
                    <h2>Contact Us</h2>
                    <p><b>Email: </b>trainings@internshala.com<br><b>Mobile: </b>+91-8448444853</p>
                </div>
            </div>
        </div>
        
        <?php
            include 'footer.php';
        ?>
    </body>
</html>
