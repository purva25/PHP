<?php
    require 'common.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }
    $user_id=$_SESSION['id'];
    $q="select * from plan where user_id='$user_id'";
    $r= mysqli_query($con, $q);
    $row1= mysqli_num_rows($r);
    include 'view_script.php';
?>  
<!DOCTYPE html>
<html>
    <head>
        <title>Ctrl Budget</title>
        <?php
            include 'link.php';
            $i=0;
        ?>
    </head>
    <body>
        <?php
            include 'header.php';
        ?>
        <?php
            if($row1==0){
        ?>
        <div class="container navi">
            <h2>You don't have any active plans</h2>
        <div class="col-xs-4 col-xs-offset-4">
        <div class="jumbotron ">
            <center><a href="createplan.php"><span class="glyphicon glyphicon-plus-sign"></span> Create a New Plan</a></center>
        </div>
        </div>
        </div>
        <?php
            } else {
        ?>
        <div class="container navi">
            <h2>Your plans</h2>
            <?php while ($row= mysqli_fetch_array($r)) {
            $i=$i+1; ?>
            <div class="col-xs-4 col-lg-3">
            <div class="panel">
                <div class="panel-heading text-center" id="headg">
                    <?php echo $row['title'];?><i class="glyphicon glyphicon-user pull-right"><?php echo $row['no_of_people'];?></i>
                </div>
                <form method="post" action="">
                    <div class="panel-body">
                        <div class="row texta">
                            <div class="col-xs-4 col-lg-3"><b>Budget:</b></div>
                            <div class="right"><?php echo "₹ ".$row['initial_budget'];?></div>
                        </div>
                        <div class="row texta">
                            <div class="col-xs-4 col-lg-3"><b>Date:</b></div>
                            <div class="right">
                            <?php 
                            $from3= date('d M', strtotime($row['from_date']));
                            $to3= date('d M Y', strtotime($row['to_date']));
                            echo $from3.' - '.$to3;?>
                            </div>
                        </div>

                        <div class="row panelc"> 
                            <button type="submit" name="btn<?php echo $i;?>" class="btn btn-block bcolor">View Plan</a></button>
                        </div>
                        <?php
                            $title=array();
                            //$planid=[];
                            $title[$i]=$row['title'];
                            $q1="select * from plan where user_id='$user_id' and title='$title[$i]'";
                            $r1= mysqli_query($con, $q1);
                            $row3= mysqli_fetch_array($r1);
                            $planid[$i]=$row3['id'];
                        ?>
                    </div>
                </form>
            </div>
            </div>
            <?php }             
            for($j=1;$j<=$i;$j++){
                if(isset($_POST["btn$j"])){
                    abc($planid[$j]);
                    header('location:viewplan.php');
                }
            }
            ?>
                       
        </div>
        <?php } ?>
        <a href="createplan.php" style="position:fixed;bottom:10%;right:10px;margin:0;"><span style="font-size:50px; color:#009B81;" class="glyphicon glyphicon-plus-sign"></span></a>
        <?php
            include 'footer.php';
        ?>
    </body>
</html>
