<?php  
 include 'condb.php'; 
 
 if(isset($_POST['save']))
 {
 $ids=$_GET['id'];
 $orderID=$_POST['orderID'];
 $returnee=$_POST['returnee'];
 $s_name_id=$_POST['s_name_id']; 
 $s_receiver=$_POST['s_receiver']; 
 $update_return=$_POST['update_return']; 
 $machinecode=$_POST['machinecode']; 
  
 foreach($machinecode as $machinecoderow)
        {
          // echo $machinecoderow;
          $query="UPDATE record_borrow set  status_id=10 , returnee='$returnee' , s_name_id='$s_name_id' , s_receiver='$s_receiver' , update_return=NOW() 
          WHERE machinecode='$machinecoderow' and orderID='$orderID' "; 
          $query_run=mysqli_query($conn,$query); 

          $sql="UPDATE product set status_id='1' WHERE machinecode='$machinecoderow' ";  
          $result=mysqli_query($conn,$sql);


         }
         if($query_run)
         {
          echo "<script>alert('บันทึกข้อมูลเรียบร้อย');</script>";
          echo "<script>top.location='detail_record_return.php?id=$ids';</script>"; 
         }


         else
         {
          echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้');</script>";
         }
       }
 mysqli_close($conn);  
 
?>