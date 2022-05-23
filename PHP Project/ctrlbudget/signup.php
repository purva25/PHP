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
                            <div class="panel-heading" id="head"><center><h4>Sign Up</h4></center></div>
                            <div class="panel-body">
                                <form action="signup_script.php" method="post">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" placeholder="Name" name="name" required="true">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" placeholder="Enter valid email" name="email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                    <div><?php if(isset($_GET['e1'])){echo $_GET['e1'];} ?></div>
                                </div>
                                <div class="form-group">
                                    <label for="pass">Password:</label>
                                    <input type="password" class="form-control" placeholder="Password(Min. 6 characters)" name="pass" required="true" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
          title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number:</label>
                                    <input type="text" class="form-control" placeholder="Enter valid Phone number(Ex: 9943568777)" name="phone" required="true" pattern="[0-9]{10}" title="Contact number must be of 10 numbers">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block" id="headg">Submit</button></div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
            include 'footer.php';
        ?>
    </body>
</html>
