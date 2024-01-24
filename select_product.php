<?php 
 include("condb.php");
 
	$devicename_id =$_REQUEST["devicename_id"];
   $brand_id =$_REQUEST["brand_id"];

 	$sql2= "SELECT * FROM  product_brand WHERE devicename_id = '$devicename_id' "; 
	
 	$result2 = mysqli_query($conn, $sql2); 
	
	while($row2 = mysqli_fetch_array($result2)) { 
   echo"<option selected disabled > กรุณาเลือกยี่ห้อ</option></option>";
	
	echo"<option value='$row2[0]'>" .$row2["brand_name"]." </option>";
	}

   $sql3= "SELECT * FROM  product_model WHERE brand_id = '$brand_id' "; 
	
   $result3 = mysqli_query($conn, $sql3); 
  
   while($row3 = mysqli_fetch_array($result3)) { 
    echo"<option selected disabled > กรุณาเลือกรุ่น </option></option>";
    echo"<option value='$row3[0]'>" .$row3["model_name"]." </option>";
  }
 ?>