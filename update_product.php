<?php
 include 'condb.php';
$machinecode = $_POST['machinecode'];
$sapcode = $_POST['sapcode'];
$devicename = $_POST['devicename'];
$brand = $_POST['brand_name'];
$model = $_POST['model_name'];
$serialnumber = $_POST['serialnumber'];

$sql="UPDATE product set sapcode='$sapcode', brand_name='$brand_name' ,model_name='$model_name' , serialnumber='$serialnumber' WHERE machinecode='$machinecode' ";
$result=mysqli_query($conn,$sql);
 
     if($result){
        echo "<script>alert('แก้ไขข้อมูลเรียบร้อย');</script>";
        echo "<script>window.location='product_db.php';</script>";
     }else{
        echo "<script>alert('ไม่สามารถแก้ไขข้อมูลได้');</script>";
     }
mysqli_close($conn);

?>

