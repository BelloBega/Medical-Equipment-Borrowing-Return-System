<?php
 include 'condb.php';
$orderID=$_POST["orderID"];

// print_r($_POST);
// echo'<hr>';

// exit;

$sql="UPDATE borrow_db set status_id=12 WHERE orderID=$orderID ";
$result=mysqli_query($conn,$sql);
 
     if($result){
        echo "<script>alert('ยกเลิกใบจองเรียบร้อย');</script>";
        echo "<script>window.location='admin_come.php';</script>";
     }else{
        echo "<script>alert('ไม่สามารถยกเลิกใบจองได้');</script>";
     }
mysqli_close($conn);

?>