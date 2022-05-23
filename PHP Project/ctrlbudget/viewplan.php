<?php
    require 'common.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }
    $user_id=$_SESSION['id'];
    $title1=$_SESSION['tit1'];
    $plan_id=$_SESSION['plan_id'];
    $q5="select * from persons where user_id='$user_id' and plan_id='$plan_id'" or die(mysqli_error($con));
    $r5= mysqli_query($con, $q5);
    $query="select * from expenseinfo where user_id='$user_id' and plan_id='$plan_id'";
    $res= mysqli_query($con, $query);
    $q="select sum(amount) as sum from expenseinfo where user_id='$user_id' and plan_id='$plan_id'";
    $r= mysqli_query($con, $q);
    $row= mysqli_fetch_array($r);
    $from1=$_SESSION['from1'];
    $to1=$_SESSION['to1'];
    include 'color.php';
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
                    <div class="panel">
                        <div class="panel-heading text-center" id="headg">
                            <?php echo $title1;?><i class="glyphicon glyphicon-user pull-right"><?php echo $_SESSION['no_of_people1'];?></i>
                        </div>
                        <div class="panel-body">
                        <div class="row texta">
                            <div class="col-xs-6"><b>Budget:</b></div>
                            <div class="right"><?php echo "₹ ".$_SESSION['budget1'];?></div>
                        </div>
                        <div class="row texta">
                            <div class="col-xs-6"><b>Remaining Amount:</b></div>
                            <div class="right"><?php $amount=$_SESSION['budget1']-$row['sum'];echo color($amount);?></div>
                        </div>
                        <div class="row texta">
                            <div class="col-xs-6"><b>Date:</b></div>
                            <div class="right">
                            <?php 
                            $from2= date('d M', strtotime($_SESSION['from1']));
                            $to2= date('d M Y', strtotime($_SESSION['to1']));
                            echo $from2.' - '.$to2;?></div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-xs-offset-2" style="margin-top: 70px">
                    <a href="expense.php" style="text-decoration: none"><button type="submit" class="btn bcolor">Expense Distribution</button></a>     
                </div>
            </div>
             
            <div class="row" style="margin-bottom: 50px">
                <div class="col-xs-8">
                    <?php if(mysqli_num_rows($res)>0){
                        while($row2= mysqli_fetch_array($res)){
                    ?>
                    <div class="col-xs-4">
                        <div class="panel">
                            <div class="panel-heading text-center" id="headg">
                                <?php echo $row2['title'];?>
                            </div>
                            <div class="panel-body" style="font-size: 11px">
                                <div class="row texta">
                                    <div class="col-xs-4"><b>Amount</b></div>
                                    <div class="right"><?php echo "₹ ".$row2['amount'];?></div>
                                </div>
                                <div class="row texta">
                                    <div class="col-xs-4"><b>Paid by</b></div>
                                    <div class="right"><?php echo $row2['person_name'];?></div>
                                </div>
                                <div class="row texta">
                                    <div class="col-xs-4"><b>Paid on</b></div>
                                    <div class="right">
                                    <?php 
                                    $date1= date('d M Y', strtotime($row2['date']));
                                    echo $date1;?></div>
                                </div>
                                <?php 
                                $image=$row2['img_name'];
                                if($image){?>
                                    <div class="texta">
                                        <center><a href="bills/<?php echo $image;?>" style="font-size: 16px; text-decoration: none">Show Bill</a></center>
                                    </div>
                                <?php }else{?>
                                    <div class="texta">
                                        <center><a href="" style="font-size: 16px;text-decoration: none">You Don't have bill</a></center>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
                <div class="col-xs-4 right">
                    <div class="panelh">
                        <div class="panel">
                            <div class="panel-heading" id="headg">
                                <center><h3>Add New Expense</h3></center>
                            </div>
                            <div class="panel-body">
                                <form method="post" action="viewplan.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" placeholder="Expense Name" name="title" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="date" min="<?php echo $from1;?>" max="<?php echo $to1;?>" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="amount">Amount Spent</label>
                                        <input type="number" class="form-control" placeholder="Amount Spent" name="amount" required="true">
                                    </div>
                                    <div class="form-group">
                                        <select name="people" class="form-control">
                                            <option default>Choose</option>
                                            <?php while ($row5= mysqli_fetch_array($r5)) { ?>
                                            <option><?php echo $row5['person_name'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bill">Upload Bill</label>
                                        <input type="file" class="sample_class form-control" name="uploadedimage">
                                        
                                    </div>
                                    <div class="form-group">
                                        <button class="form-control bcolor" type="submit" name="upload" value="upload image">Add</button>
                                    </div>
                                </form>
                                <?php
                                    $title= filter_input(INPUT_POST, 'title');
                                    $date= filter_input(INPUT_POST, 'date');
                                    $amount=filter_input(INPUT_POST, 'amount');
                                    $name=filter_input(INPUT_POST, 'people');
                                    function GetImageExtension($imagetype){
                                        if(empty($imagetype)) return false;
                                        switch($imagetype){
                                            case 'image/bmp': return '.bmp';
                                            case 'image/gif': return '.gif';
                                            case 'image/jpeg': return '.jpg';
                                            case 'image/png': return '.png';
                                            default: return false;
                                        }
                                    }
                                    if(isset($_POST['upload'])){
                                        if (!empty($_FILES["uploadedimage"]["name"])) {
                                            $file_name= basename($_FILES["uploadedimage"]["name"]);
                                            $temp_name=$_FILES["uploadedimage"]["tmp_name"];
                                            $imgtype=$_FILES["uploadedimage"]["type"];
                                            $ext= GetImageExtension($imgtype);
                                            $imagename=date("d-m-Y")."-".time().$ext;
                                            $target_path = "D:/xampp/htdocs/Expenseweb/bills/".$imagename;
                                                                                       
                                            if(move_uploaded_file($temp_name, $target_path)){
                                            // Make a query to save data to your database.                                           
                                                $query="insert into expenseinfo(user_id,plan_id,img_name,title,date,amount,person_name) values ('$user_id','$plan_id','$imagename','$title','$date','$amount','$name')";
                                                $result= mysqli_query($con, $query) or die(mysqli_error($con));  
                                            }
                                            echo "<script>location.href='viewplan.php'</script>";
                                        }
                                        else{
                                            $query="insert into expenseinfo(user_id,plan_id,img_name,title,date,amount,person_name) values ('$user_id','$plan_id',NULL,'$title','$date','$amount','$name')";
                                            $result= mysqli_query($con, $query) or die(mysqli_error($con)); 
                                            echo "<script>location.href='viewplan.php'</script>";
                                        }
                                    }
                            ?>
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

