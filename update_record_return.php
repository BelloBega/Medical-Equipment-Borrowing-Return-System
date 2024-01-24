<?php
 include 'condb.php';
$status_id = $_GET['status_id'];
$ids = $_GET['id'];

$sql="UPDATE borrow_db SET status_id=10 
WHERE  orderID='$ids' ";
$result=mysqli_query($conn,$sql);

$sql1=("SELECT * FROM order_borrow WHERE orderID='$ids' ");
$hand=mysqli_query($conn,$sql1);
while($row1=mysqli_fetch_array($hand)){
   $proid=$row1['pro_id'];
   $num=$row1['orderQty'];

   // อัพเดตจำนวนเครื่องเข้าสต็อก
   $sql2="UPDATE product_borrow set amount=amount + $num WHERE pro_id='$proid' ";
   $result=mysqli_query($conn,$sql2);

}

     if($result){
        echo "<script>alert('บันทึกการคืนเครื่องครบเรียบร้อย');</script>";
        echo "<script>window.location='record_return_db.php';</script>";
     }else{
        echo "<script>alert('ไม่สามารถบันทึกได้');</script>";
     }
mysqli_close($conn);

?>