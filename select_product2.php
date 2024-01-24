<?php 
 include("condb.php");
 
 $devicename_id =$_REQUEST["devicename_id"];

 $sql1= "SELECT * FROM  product WHERE devicename_id = '$devicename_id' "; 
	
 	$result1 = mysqli_query($conn, $sql1); 

   echo "<option selected disabled >กรุณาเลือกรหัสเครื่่อง</option>";

   while($row1 = mysqli_fetch_array($result1)) { 

   echo"<option value='$row1[0]'>" .$row1["machinecode"]." </option>";
	}

 ?>