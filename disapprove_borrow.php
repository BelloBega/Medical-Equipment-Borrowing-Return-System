<?php
 include 'condb.php';
$ids=$_GET['id'];
$status_id = $_GET['status_id'];
$up_date = date('Y-m-d H:i:s');

$sql="UPDATE borrow_db SET 
status_id = 11,
up_date = NOW()
WHERE orderID='$ids' ";
$result=mysqli_query($conn,$sql);
 
     if($result){
        echo "<script>alert('บันทึกเรียบร้อย');</script>";
        echo "<script>window.location='request_borrow_db.php';</script>";
     }else{
        echo "<script>alert('ไม่สามารถบันทึกได้');</script>";
     }
mysqli_close($conn);

?>
