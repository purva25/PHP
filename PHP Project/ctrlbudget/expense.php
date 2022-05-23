<?php
    require 'common.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }
    $user_id=$_SESSION['id'];
    $plan_id=$_SESSION['plan_id'];
    $query="select * from plan where user_id='$user_id' and id='$plan_id'";
    $result= mysqli_query($con, $query);
    $rows= mysqli_fetch_array($result);
    $q="select sum(amount) as sum from expenseinfo where user_id='$user_id' and plan_id='$plan_id'";
    $r= mysqli_query($con, $q);
    $row4= mysqli_fetch_array($r);
    $q4="select * from persons where plan_id='$plan_id'";
    $r4= mysqli_query($con, $q4);
    function pname($name,$id){
        $con= mysqli_connect("localhost","root","","expense") or die(mysqli_error($con));
        $q="select amount from expenseinfo where plan_id='$id' and person_name='$name'";
        $r= mysqli_query($con, $q);
        $row= mysqli_fetch_array($r);
        if(mysqli_num_rows($r)>0){
            $amount=$row['amount'];
            return $amount;
        }
        else {
            $amount=0;
            return $amount;
        }
    }
    include 'color.php';
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
        
        <div class="container navi">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="panel">
                        <div class="panel-heading text-center" id="headg">
                            <?php echo 'abc';?><i class="glyphicon glyphicon-user pull-right"><?php echo $_SESSION['no_of_people1'];?></i>
                        </div>
                        <div class="panel-body">
                            <div class="row texta">
                                <div class="col-xs-6"><b>Initial Budget</b></div>
                                <div class="right"><b><?php echo "₹ ".$rows['initial_budget'];?></b></div>
                            </div>

                            <?php while($row6= mysqli_fetch_array($r4)){?>
                            <div class="row texta">                            
                                <div class="col-xs-6"><b><?php echo $row6['person_name']?></b></div>
                                <div class="right"><?php $amount=pname($row6['person_name'], $plan_id);echo "₹ ".$amount;?></div>                            
                            </div>
                            <?php } ?>
                            <div class="row texta">
                                <div class="col-xs-6"><b>Total Amount Spent</b></div>
                                <div class="right"><b><?php echo "₹ ".$row4['sum'];?></b></div>
                            </div>
                            <div class="row texta">
                                <div class="col-xs-6"><b>Remaining Amount</b></div>
                                <div class="right"><?php $amount=$rows['initial_budget']-$row4['sum'];echo color($amount);?></div>
                            </div>
                            <div class="row texta">
                                <div class="col-xs-6"><b>Individual Shares</b></div>
                                <div class="right"><?php $n=$rows['no_of_people'];$share=$row4['sum']/$n;echo "₹ ".$share;?></div>
                            </div>
                            <?php 
                            mysqli_data_seek($r4, 0);
                            while($row= mysqli_fetch_array($r4)){?>
                            <div class="row texta">                            
                                <div class="col-xs-6"><b>Person <?php echo $row['person_name']?></b></div>
                                <div class="right">
                                    <?php $amount1=pname($row['person_name'], $plan_id);
                                    echo ecolor($amount1-$share);
                                    ?></div>                            
                            </div>
                            <?php } ?>
                            <div class="texta">
                                <center><a href="viewplan.php" style="text-decoration: none"><button class="btn bcolor" style="font-size: 16px"><i class="glyphicon glyphicon-arrow-left"></i> Go back</button></a></center>
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
