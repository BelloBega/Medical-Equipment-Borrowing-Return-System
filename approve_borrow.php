<?php
 include 'condb.php';
$ids=$_GET['id'];
$status_id = $_GET['status_id'];


$sql="UPDATE borrow_db SET 
status_id = 7,
up_date = NOW()
WHERE orderID='$ids' ";
$result=mysqli_query($conn,$sql);
 
     if($result){
        echo "<script>alert('อนุมัติเรียบร้อย');</script>";
        echo "<script>window.location='request_borrow_db.php';</script>";
     }else{
        echo "<script>alert('ไม่สามารถอนุมัติได้');</script>";
     }
mysqli_close($conn);

?>
