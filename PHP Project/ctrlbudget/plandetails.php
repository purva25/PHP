<?php
    require 'common.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }
    $budget=$_SESSION['budget'];
    $people=$_SESSION['people'];
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
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="panelh">
                        <div class="panel">
                            <div class="panel-body">
                                <form method="post" action="addnewplan.php">
                                    <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" placeholder="Enter Title(Ex:Trip to goa)" name="title" required="true">
                                    </div>
                                    <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label for="from">From</label>
                                            <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="from" required="true">
                                        </div>
                                        <div class="col-xs-6">
                                            <label for="to">To</label>
                                            <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="to" required="true">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label for="budget">Initial Budget</label>
                                            <input type="number" class="form-control" placeholder="<?php echo $budget?>" readonly>
                                        </div>
                                        <div class="col-xs-6">
                                            <label for="people">No of people</label>
                                            <input type="number" class="form-control" placeholder="<?php echo $people?>" readonly>
                                        </div>
                                    </div>
                                    </div>
                                    <?php
                                        for($i=1;$i<=$people;$i++){
                                    ?>
                                    <div class="form-group">
                                        <label>Person <?php echo $i ?></label>
                                        <input type="text" class="form-control" placeholder="Person <?php echo $i ?> Name" name="Person<?php echo $i ?>" required="true">
                                    </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block bcolor">Submit</button>
                                    </div>.
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
