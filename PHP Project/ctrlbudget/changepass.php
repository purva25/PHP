<?php
    require 'common.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }
?>
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
        
        <div class="container">
            <div class="row navi">
                <div class="col-xs-4 col-xs-offset-4">
                    <form action="change_script.php" method="post">
                        <h4><b>Change Password</b></h4>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Old Password" name="pass">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="New Password" name="newpass">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Re-type New Password" name="repass">
                        </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary">Change</button></div>
                        <div><?php if(isset($_GET['e1'])){echo $_GET['e1'];} ?></div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="navbar-fixed-bottom">
            <?php
                    include 'footer.php';
            ?>
        </div>
    </body>
</html>