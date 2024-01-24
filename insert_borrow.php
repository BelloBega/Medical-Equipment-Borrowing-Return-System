<?php 
session_start();
 include 'condb.php';
 $m_id=$_POST['m_id'];
 $borrower=$_POST['borrower'];
 $date_start=$_POST['date_start'];
 $date_return=$_POST['date_return'];

 $ymd = (date('Ymd'));

 $query = " SELECT MAX(orderID) as orderID FROM borrow_db";
 $resultorderID = mysqli_query($conn , $query );
 $row = mysqli_fetch_array($resultorderID);

 $orderID = $row['orderID'];
 if($orderID==''){
    $orderID=$ymd.'00';
 }{
    $orderID = ($orderID + 1);
 }


 $sql="INSERT INTO borrow_db(orderID,m_id,borrower,date_start,date_return,status_id,re_date)
 VALUES ('$orderID','$m_id','$borrower','$date_start','$date_return','6', NOW()) ";
 mysqli_query($conn,$sql);

 $orderID = mysqli_insert_id($conn);
 $_SESSION["order_id"] = $orderID ;
 

 for($i=0;$i<=(int)$_SESSION["intLine"]; $i++ ){
    if(($_SESSION["strProductID"][$i]) != ""){
        // ดึงข้อมูลเครื่องมือแพทย์ที่มี
        $sql1="SELECT * FROM product_borrow WHERE pro_id ='" . $_SESSION["strProductID"][$i] . "' ";
        $result1=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_array($result1);

        $sql2="INSERT INTO order_borrow(orderID,pro_id,orderQty) 
        VALUES('$orderID','".$_SESSION["strProductID"][$i]."','".$_SESSION["strQty"][$i]."')";
        if(mysqli_query($conn,$sql2)){
            $sql3 = "UPDATE product_borrow set amount=amount - '".$_SESSION["strQty"][$i]."'
            WHERE pro_id =  '".$_SESSION["strProductID"][$i]."' ";
        mysqli_query($conn,$sql3);
       
        echo "<script>alert('บันทึกข้อมูลเรียบร้อย');</script>";
        echo "<script>window.location='user_page.php';</script>";

        }
    }
 }
 mysqli_close($conn);
 unset($_SESSION['intLine']);
 unset($_SESSION["strProductID"]);
 unset($_SESSION["strQty"]);

 ?>
