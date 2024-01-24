<?php
include 'condb.php';

session_start();  

if (!$_SESSION['username']) {  
   header("Location: index.php");  
} else {  

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Medical Equipment Borrowing-Return System</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    
    <style>
        body {
        font: 90%/1.45em "Helvetica Neue", HelveticaNeue, Verdana, Arial, Helvetica, sans-serif;
        margin: 0;
        padding: 0;
        color: #333;
        background-color: #fff;
             }

    </style>
   
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

           <!-- Sidebar - Brand -->
           <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin_page.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-user-md"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Borrowing Return</div>
            </a>

            <?php 
               $sql1="SELECT orderID , COUNT(orderID) AS count_orderID FROM borrow_db WHERE status_id=6 "; 
               $result1 = mysqli_query($conn,$sql1); 
               while($row=mysqli_fetch_array($result1)){ 
              //echo $sql1;  
              //exit(); 
            ?> 

            <?php 
               $sql5="SELECT orderID , COUNT(orderID) AS count_orderID_add FROM add_day_borrow WHERE status_id=13 "; 
               $result5 = mysqli_query($conn,$sql5); 
               while($row5=mysqli_fetch_array($result5)){ 
              //echo $sql1;  
              //exit(); 
            ?> 


            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="admin_page.php">
                    <i class="fas fa-home"></i>
                    <span>หน้าแรก</span></a>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="product_db.php">
                    <i class="fas fa-briefcase-medical"></i>
                    <span>คลังเครื่องสำรองทั้งหมด</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="request_borrow_db.php">
                    <i class="fas fa-cart-arrow-down"></i>
                    <span class="badge badge-danger badge-counter"><?=$row["count_orderID"]; ?></span>
                    <span>คำร้องขอการจองเครื่อง</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="request_add_day_borrow_db.php">
                    <i class="fas fa-cart-arrow-down"></i>
                    <span class="badge badge-danger badge-counter"><?=$row5["count_orderID_add"]; ?></span>
                    <span>คำร้องขอการยืมเครื่องต่อ</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="record_borrow_db.php">
                    <i class="fas fa-save"></i>
                    <span>บันทึกการยืม</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="record_return_db.php">
                    <i class="fas fa-save"></i>
                    <span>บันทึกการคืน</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="receiver.php">
                    <i class="fas fa-address-card"></i>
                    <span>ข้อมูลผู้มารับ-ส่งเครื่อง</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="reserve_admin_db.php">
                    <i class="fas fa-folder"></i>
                    <span>ประวัติการจอง</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="history.php">
                    <i class="fas fa-file-alt"></i>
                    <span>ประวัติการยืม-คืน</span></a>
            </li>

            <?php } } ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

         <!-- Content Wrapper -->
         <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
                    
            <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> admin<?php echo $_SESSION['user']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                           <!-- Dropdown - User Information -->
                           <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">คลังเครื่องมือสำรองทั้งหมด</h1>
                        <a href="productnew_db.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> ลงทะเบียนเครื่องใหม่</a>
                    </div>
               

                    <!-- Content Row -->
                    <div class=container-fluid>
                    <div class="row justify-content-md-center">
                    <div class="col-md-8 py-4">

                        <form class="row" method="POST">
                            <div class="col col-lg-6">
                            <select class="form-select" name="select" required>
                            <option value="" selected disabled>- เลือกหัวข้อที่ต้องการค้นหา -</option>
       
                            <option value="p.machinecode" <?php if(isset($_POST["select"])) {if($_POST['select'] == "p.machinecode") {echo"selected";}}?>>รหัสเครื่อง</option>
                            <option value="p.sapcode" <?php if(isset($_POST["select"])) {if($_POST['select'] == "p.sapcode") {echo"selected";}}?>>รหัสครุภัณฑ์</option>
                            <option value="p.serialnumber" <?php if(isset($_POST["select"])) {if($_POST['select'] == "p.serialnumber") {echo"selected";}}?>>หมายเลขเครื่อง</option>
                            <option value="d.devicename" <?php if(isset($_POST["select"])) {if($_POST['select'] == "d.devicename") {echo"selected";}}?>>ชื่ออุปกรณ์</option>
                            <option value="b.brand_name" <?php if(isset($_POST["select"])) {if($_POST['select'] == "b.brand_name") {echo"selected";}}?>>ยี่ห้อ</option>
                            <option value="m.model_name" <?php if(isset($_POST["select"])) {if($_POST['select'] == "m.model_name") {echo"selected";}}?>>รุ่น</option>
                            <option value="s.status_name" <?php if(isset($_POST["select"])) {if($_POST['select'] == "s.status_name") {echo"selected";}}?>>สถานะ</option>
                            </select>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="value" value="<?php if (isset($_POST['value'])) {echo $_POST['value'];} ?>" required/>
                            </div>
                            <div class="col-md-auto">
                                <button type="submit" name="submit" class="btn btn-success">ค้นหา</button>
                            </div>
                        </form>

                        <?php
                           if(isset($_POST['submit'])) {
                            $num=1;
                            $sql="SELECT p.*, s.status_name , d.devicename ,b.brand_name ,m.model_name 
                            FROM product as p 
                            LEFT JOIN status_tbl as s ON p.status_id = s.status_id  
                            LEFT JOIN product_devicename as d ON p.devicename_id = d.devicename_id 
                            LEFT JOIN product_brand as b ON p.brand_id = b.brand_id 
                            LEFT JOIN product_model as m ON p.model_id = m.model_id 
                            WHERE ".$_POST['select']." LIKE '".$_POST['value']."%' " ;
                            $query = mysqli_query($conn,$sql);
                            $check_data = mysqli_num_rows($query);
                            if($check_data == 0) {
                                echo'<p class="text-center py-4"><span class="badge bg-danger" style="font-size: 20px;">ไม่พบข้อมูล</span></p>';
                            }else{
                                ?>
                                <table class="table table-bordered mt-4">
                                    <thead class="table-secondary">
                                        <tr>
                                          <th scope="col">รหัสเครื่อง</th>
                                          <th scope="col">รหัสครุภัณฑ์</th>
                                          <th scope="col">ชื่ออุปกรณ์</th>
                                          <th scope="col">ยี่ห้อ</th>
                                          <th scope="col">รุ่น</th>
                                          <th scope="col">หมายเลขเครื่อง</th>
                                          <th scope="col">สถานะ</th>
                                          <th scope="col">แก้ไข</th>
                                          <th scope="col">ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                           while ($result = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                         <td> <?php echo $result["machinecode"]; ?></td>
                                         <td> <?php echo $result["sapcode"]; ?></td>
                                         <td> <?php echo $result["devicename"]; ?></td>
                                         <td> <?php echo $result["brand_name"]; ?></td>
                                         <td> <?php echo $result["model_name"]; ?></td>
                                         <td> <?php echo $result["serialnumber"]; ?></td>
                                         <td> <?php echo $result["status_name"]; ?></td>
                                         <td><a href="edit_product.php?machinecode=<?=$result["machinecode"]?>" class="btn btn-warning mb-4">edit</a></td>
                                   <td><a href="delete_product.php?machinecode=<?=$result["machinecode"]?>" class="btn btn-danger mb-4" onclick="Del(this.href);return false;">delete</a></td>
                                        </tr>
                                        <?php
                                           }
                                        ?>
                                    </tbody>
                                </table>
                             <?php
                               }
                            }
                             ?>
                    </div>
                 </div>           
            </div>

               <div class=container>
               <div class="row">

               <table  id="example" class="display nowrap table" width="100%">
                       <thead>
                            <tr class="table-info">
                               <th>รหัสเครื่อง</th>
                               <th>รหัสครุภัณฑ์</th>
                               <th>ชื่ออุปกรณ์</th>
                               <th>ยี่ห้อ</th>
                               <th>รุ่น</th>
                               <th>หมายเลขเครื่อง</th>
                               <th>สถานะ</th>
                               <th>แก้ไข</th>
                               <th>ลบ</th>
                            </tr>
                        </thead>

                           <?php
                                $query = "SELECT p.*, s.status_name , d.devicename ,b.brand_name ,m.model_name 
                                FROM product as p 
                                LEFT JOIN status_tbl as s ON p.status_id = s.status_id  
                                LEFT JOIN product_devicename as d ON p.devicename_id = d.devicename_id 
                                LEFT JOIN product_brand as b ON p.brand_id = b.brand_id 
                                LEFT JOIN product_model as m ON p.model_id = m.model_id   
                                order by status_id " or die ("Error:" . mysqli_error());  
                                $result = mysqli_query($conn,$query);  
      
     
                           ?>
                               <tbody>
                                   <?php foreach ($result as $row) { ?>
                                   <tr>
                                   <td>
                                   <?php echo $row["machinecode"]; ?>
                                   </td>
                                   <td>
                                   <?php echo $row["sapcode"]; ?>
                                   </td>
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
                                   <?php echo $row["serialnumber"]; ?>
                                   </td>
                                   <td>
                                   <?php echo $row["status_name"]; ?>
                                   </td>
                                   <td><a href="edit_product.php?machinecode=<?=$row["machinecode"]?>" class="btn btn-warning mb-4">edit</a></td>
                                   <td><a href="delete_product.php?machinecode=<?=$row["machinecode"]?>" class="btn btn-danger mb-4" onclick="Del(this.href);return false;">delete</a></td>
                                   </tr>
                               </tbody>  
 
             <?php 
            } 
            mysqli_close($conn);
             ?>    
         </table> 
         </div> 
         </div>
         <br><br>

            <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">คุณต้องการออกจากระบบหรือไม่?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                    <a class="btn btn-primary" href="index.php">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
    <script>
       
        $('table').dataTable({bFilter: false, bInfo: false});
    
    </script>


</body>

</html>
<?php } ?>




           

           
