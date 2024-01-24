<?php
 include 'condb.php';
$ids = $_GET['id'];
$pro_id = $_GET['pro_id'];
$orderQty_up = $_POST['orderQty_up'];
$status_id = $_POST['status_id'];


$sql="UPDATE order_borrow set orderQty_up ='$orderQty_up ', status_id='$status_id' WHERE orderID='$ids' and pro_id='$pro_id' ";
$result=mysqli_query($conn,$sql);

$sql2="UPDATE borrow_db set status_id='$status_id' , up_date= NOW() WHERE orderID='$ids' ";  
$result2=mysqli_query($conn,$sql2);
 
     if($result){
        echo "<script>alert('บันทึกเรียบร้อย');</script>";
        echo "<script>window.location='detail_borrow.php?id=$ids';</script>";
     }else{
        echo "<script>alert('ไม่สามารถบันทึกได้');</script>";
     }
mysqli_close($conn);

?>