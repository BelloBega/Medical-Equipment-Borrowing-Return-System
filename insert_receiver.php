<?php
 include 'condb.php';
$name_id = $_POST['name_id'];
$fullname = $_POST['fullname'];
$agencyname = $_POST['agencyname'];
$location = $_POST['location'];
$position = $_POST['position'];
$tel = $_POST['tel'];

$sql="INSERT INTO receiver(name_id,fullname,agencyname,location,position,tel) 
VALUES('$name_id','$fullname','$agencyname','$location','$position','$tel') ";
$result=mysqli_query($conn,$sql);
 
     if($result){
        echo "<script>alert('บันทึกข้อมูลเรียบร้อย');</script>";
        echo "<script>window.location='receiver.php';</script>";
     }else{
        echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้');</script>";
     }
mysqli_close($conn);
?>
