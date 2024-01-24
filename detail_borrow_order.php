<?php
include 'server.php';
 $ids=$_GET['id'];  
 $sql="SELECT * FROM borrow_db b , status_tbl s WHERE b.status_id=s.status_id
 and b.status_id='4'
 order by b.status_id  ";
 $result= mysqli_query($conn,$sql);
 $rs=mysqli_fetch_array($result);     
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content='IE=edge'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Equipment Borrowing-Return System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>


  <body>
        <div class="container">
        <div class="row">
            <div class="col-sm-4"></div></div>

     
            <div class="h1 text-center alert alert-info mb-4 mt-4" role="alert">ขอจองเครื่อง</div>

<div class ="card-body">
    <h5>เลขที่ใบจอง <?=$ids?></h5> 
    ชื่อผู้ขอจอง : <?=$rs['borrower']?><br>
    หน่วยงาน : <?=$rs['agencyname']?><br>
    สถานที่ตั้ง : <?=$rs['location']?><br>
    หมายเลขโทรศัพท์ : <?=$rs['tel']?><br>
    Email : <?=$rs['email']?><br>
    สถานะ : <?=$rs['status_name']?><br>
    <table class="table table-striped mb-4 mt-4">
        <tr>
           <th>ชื่อออุปกรณ์</th>
           <th>ยี่ห้อ</th>
           <th>รุ่น</th>
           <th>จำนวน</th>
           <th>วันที่จอง</th>

</tr>

<?php
            $sql="SELECT * FROM  order_borrow o , product_borrow p , borrow_db b WHERE o.orderID=b.orderID 
            and o.pro_id=p.pro_id and o.orderID='$ids' and b.status_id='4'
            order by o.pro_id  ";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result)){
            }
?>

              <tbody>
            <?php foreach ($result as $row) { ?>
                <tr>
                 <td>
                    <?php echo $row["devicename"]; ?>
                 </td>
                 <td>
                    <?php echo $row["brand_name"]; ?>
                 </td>
                 <td>
                    <?php echo $row["model_name"]; ?>
                 </td>
                 <td>
                    <?php echo $row["orderQty"]; ?>
                 </td>
                 <td>
                    <?php echo $row["re_date"]; ?>
               </td>
            </tr>
        </tbody> 

             <?php
            }
             mysqli_close($conn); // ปิดการเชื่อมต่อฐานข้อมูล
             ?>    
        
         </table>
         </div>
         </div>
        
        
</body>

</html>
          