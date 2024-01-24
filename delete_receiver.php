<?php
 include 'condb.php';
 $name_id=$_GET['name_id'];
 $sql="DELETE FROM receiver WHERE name_id='$name_id' ";
 if(mysqli_query($conn,$sql)){
    echo "<script>alert('ลบข้อมูลเรียบร้อย');</script>";
    echo "<script>window.location='receiver.php';</script>";
 }else{
    echo "Error : " . $sql . "<br>" . mysqli_error($conn);
    echo "<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
 }

mysqli_close($conn);

 ?>