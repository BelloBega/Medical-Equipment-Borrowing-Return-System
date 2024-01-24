<?php
 include 'condb.php';
$orderID = $_POST['orderID'];
$machinecode = $_POST['machinecode'];
$date_start = $_POST['date_start'];
$date_return = $_POST['date_return'];
$new_date_return = $_POST['new_date_return'];
$reason = $_POST['reason'];

$sql="INSERT INTO add_day_borrow(orderID,machinecode,date_start,date_return,new_date_return,reason) 
VALUES('$orderID','$machinecode','$date_start','$date_return','$new_date_return','$reason') ";
$result=mysqli_query($conn,$sql);
 
     if($result){
        echo "<script>alert('ส่งคำร้องเรียบร้อย');</script>";
        echo "<script>window.location='add_day_borrow.php';</script>";
     }else{
        echo "<script>alert('ไม่สามารถส่งคำร้องได้');</script>";
     }
mysqli_close($conn);
?>