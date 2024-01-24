<?php
 include 'condb.php';
$ids = $_GET['id'];
$new_date_return = $_POST['new_date_return'];
$status_id = $_POST['status_id'];


$sql="UPDATE borrow_db set date_return ='$new_date_return' , status_id='8' , date_app=NOW()  WHERE orderID='$ids' ";
$result=mysqli_query($conn,$sql);

$sql2="UPDATE add_day_borrow set status_id='$status_id' WHERE orderID='$ids' ";  
$result2=mysqli_query($conn,$sql2);
 
     if($result){
        echo "<script>alert('บันทึกเรียบร้อย');</script>";
        echo "<script>window.location='detail_add_day_borrow.php?id=$ids';</script>";
     }else{
        echo "<script>alert('ไม่สามารถบันทึกได้');</script>";
     }
mysqli_close($conn);

?>