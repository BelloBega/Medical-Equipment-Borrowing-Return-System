<?php
 include 'condb.php';
$name_id = $_POST['name_id'];
$fullname = $_POST['fullname'];
$agencyname = $_POST['agencyname'];
$location = $_POST['location'];
$position = $_POST['position'];
$tel = $_POST['tel'];

$sql="UPDATE receiver set name_id='$name_id' ,fullname='$fullname' ,agencyname='$agencyname' , location='$location' , position='$position' , tel='$tel' WHERE name_id='$name_id' ";
$result=mysqli_query($conn,$sql);
 
     if($result){
        echo "<script>alert('แก้ไขข้อมูลเรียบร้อย');</script>";
        echo "<script>window.location='receiver.php';</script>";
     }else{
        echo "<script>alert('ไม่สามารถแก้ไขข้อมูลได้');</script>";
     }
mysqli_close($conn);

?>
