<?php  
 include 'condb.php';
 $status_id=$_GET['status_id'];
 $machinecode=$_GET['machinecode'];
 $orderID=$_GET['orderID'];

$sql1="UPDATE product set status_id=1 WHERE machinecode='$machinecode' ";  
$result1=mysqli_query($conn,$sql1);

$sql2="UPDATE record_borrow set status_id=10 WHERE machinecode='$machinecode' and orderID='$orderID' ";
$result2=mysqli_query($conn,$sql2);

if($result2){
    echo "<script>alert('คืนเรียบร้อย');</script>";
    echo "<script>window.location='receiver.php';</script>";
 }else{
    echo "<script>alert('ไม่สามารถคืนได้');</script>";
 }
mysqli_close($conn);

?>