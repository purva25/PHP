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
        
        <div class="row">
            <div class="container navi">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="panelh">
                    <div class="panel panel-primary">
                        <div class="panel-heading" id="headg">
                            <center><h3>Create New Plan</h3></center>
                        </div>
                        <div class="panel-body">
                            <form method="post" action="create_submit.php">
                                <div class="form-group">
                                    <label for="budget">Initial Budget</label>
                                    <input type="number" class="form-control" placeholder="Initial Budget(Ex: 4000)" name="budget" required="true">
                                </div>
                                <div class="form-group">
                                    <label for="people">How many peoples you want to add in your group?</label>
                                    <input type="number" class="form-control" placeholder="No. of people" name="people" required="true">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block bcolor">Next</button>
                                </div>
                                <div><?php if(isset($_GET['error'])){echo $_GET['error'];}?></div>
                            </form>
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