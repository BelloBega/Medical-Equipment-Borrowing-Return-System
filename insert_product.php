<?php
 include 'condb.php';
$machinecode = $_POST['machinecode'];
$sapcode = $_POST['sapcode'];
$devicename_id = $_POST['devicename_id'];
$brand_id = $_POST['brand_id'];
$model_id = $_POST['model_id'];
$serialnumber = $_POST['serialnumber'];


//เพิ่มข้อมูลครุภัณฑ์ ของ admin 
$sql="INSERT INTO product(machinecode,sapcode,devicename_id,brand_id,model_id,serialnumber) 
VALUES('$machinecode','$sapcode','$devicename_id','$brand_id','$model_id','$serialnumber') ";
$result=mysqli_query($conn,$sql);
 
     if($result){
        echo "<script>alert('บันทึกข้อมูลเรียบร้อย');</script>";
        echo "<script>window.location='product_db.php';</script>";
     }else{
        echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้');</script>";
     }
mysqli_close($conn);
?>

