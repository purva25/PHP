<?php
    function color($amount){
        if($amount<0){
            $amount= abs($amount);
            echo "<b style='color:red'>Overspent by ".$amount."</b>";
        }
        else if($amount>0){
            echo "<b style='color:green'>₹ ".$amount."</b>";
        }
        else{
            echo "₹ 0";
        }
    }
    function ecolor($amount){
        if($amount<0){
            $amount= abs($amount);
            echo "<b style='color:red'>Owes ₹ ".$amount."</b>";
        }
        else if($amount>0){
            echo "<b style='color:green'>Gets back ₹ ".$amount."</b>";
        }
        else{
            echo "₹ 0";
        }
    }
?>

