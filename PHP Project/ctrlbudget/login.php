<?php
    require 'common.php';
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
        
        <div class="row">
            <div class="container navi">
                <div class="col-xs-4 col-xs-offset-4">
                    <div class="panelh">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="head">
                            <h3>Login</h3>
                        </div>
                        <div class="panel-body">
                            <form action="login_submit.php" method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" name="email" required="true">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password" required="true">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block" id="headg">Login</button>
                                </div>
                                <div><?php if(isset($_GET['error'])){echo $_GET['error'];}?></div>
                            </form>
                        </div>
                        <div class="panel-footer">
                            <p>Don't have an account? <a href="signup.php">Click here to Sign Up</a></p>
                        </div>
                    </div>
                </div>
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