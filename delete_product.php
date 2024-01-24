<?php
 include 'condb.php';
 $machinecode=$_GET['machinecode'];
 $sql="DELETE FROM product WHERE machinecode='$machinecode' ";
 if(mysqli_query($conn,$sql)){
    echo "<script>alert('ลบข้อมูลเรียบร้อย');</script>";
    echo "<script>window.location='product_db.php';</script>";
 }else{
    echo "Error : " . $sql . "<br>" . mysqli_error($conn);
    echo "<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
 }

mysqli_close($conn);

 ?>