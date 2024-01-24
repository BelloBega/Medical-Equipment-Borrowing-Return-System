<?php 
 session_start();
 include 'condb.php'; 
 
 if(isset($_POST['save']))
 {
 $orderID=$_POST['orderID'];
 $lender=$_POST['lender'];
 $name_id=$_POST['name_id']; 
 $b_receiver=$_POST['b_receiver']; 
 $date_come=$_POST['date_come']; 
 $machinecode=$_POST['machinecode']; 

 foreach($machinecode as $machinecoderow)
        {
          // echo $machinecoderow;
          $query="INSERT INTO record_borrow(orderID,machinecode,lender,b_receiver,name_id,date_come) 
          VALUES ('$orderID','$machinecoderow','$lender','$b_receiver','$name_id', NOW())"; 
          $query_run=mysqli_query($conn,$query); 

          $sql1="UPDATE product set status_id='3' WHERE machinecode='$machinecoderow' ";  
          $result1=mysqli_query($conn,$sql1);

          $sql2="UPDATE borrow_db set status_id='8' WHERE orderID='$orderID' ";  
          $result2=mysqli_query($conn,$sql2);

         }

         if($query_run)
         {
          echo "<script>alert('บันทึกข้อมูลเรียบร้อย');</script>";
          echo "<script>window.location='record_borrow_db.php';</script>"; 
         }
         else
         {
          echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้');</script>";
         }
       }
 mysqli_close($conn);  
 
?>