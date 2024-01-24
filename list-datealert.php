<?php  
     include 'condb.php';
     session_start(); 

     $sql="SELECT * FROM borrow_db WHERE status_id=8 and DATEDIFF(date_return,Now())=1 "; 
     $result = mysqli_query($conn,$sql); 
     $str = '<ul>';
     while($row = mysqli_fetch_assoc($result)){
        $str.='<div class="small text-gray-500">December 12, 2019</div>';
        $str.='<li>พรุ่งนี้ถึงกำหนดคืนเครื่อง <br> เลขที่ใบจอง : '.$row['orderID'].' <br> วันครบกำหนด '.$row['date_return'].'</li>'; 
     }
     $str.='</ul>';

     echo $str;
     mysqli_close($conn)

    
  ?>   

<?php  
     if (!$_SESSION['username']) {  
        header("Location: index.php");  
     } else {  
  
?>

<?php } ?>