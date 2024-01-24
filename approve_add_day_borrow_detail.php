<?php
include 'condb.php';
$ids=$_GET['id'];
$pro_id=$_GET['pro_id'];
?> 

<?php

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
                        <h1 class="h3 mb-0 text-gray-800">บันทึก อนุมัติ/ไม่อนุมัติการยืมเครื่องต่อ</h1>
    
                    </div>

                    <!-- Content Row -->
                    <div class="container">
                    <div class="row">
             <?php
                $query="SELECT * FROM  order_borrow o , product_borrow p , borrow_db b , product_devicename d , product_brand n , product_model m , status_tbl s ,add_day_borrow a
                WHERE o.orderID=b.orderID  and o.pro_id=p.pro_id and o.orderID='$ids' and b.status_id=8 and p.devicename_id=d.devicename_id and p.brand_id=n.brand_id 
                and p.model_id=m.model_id  and a.status_id=s.status_id and a.status_id=13  and b.orderId=a.orderID
                order by o.pro_id , a.status_id "; 
                $result=mysqli_query($conn,$query); 
                $row=mysqli_fetch_array($result);

             ?>

             <?php 
                $query1 = "SELECT * FROM status_tbl WHERE status_id IN (7,11) ORDER BY status_name  asc" or die("Error:" . mysqli_error()); 
                $result2 = mysqli_query($conn, $query1); 
            ?>
         
            <form method="POST" action="update_approve_add_day.php?id=<?=$row['orderID']?>">
            <div class="col col-md-8">
            <label>ชื่ออุปกรณ์</label>
            <input type="text" name="devicename" class="form-control" value="<?=$row['devicename']?>" readonly > <br>
            <label>ยี่ห้อ</label>
            <input type="text" name="brand_name" class="form-control" value="<?=$row['brand_name']?>" readonly ><br>
            <label>รุ่น </label>
            <input type="text" name="model_name" class="form-control" value="<?=$row['model_name']?>" readonly><br>
            <label>จำนวน</label>
            <input type="text" name="orderQty" class="form-control" value="<?=$row['orderQty']?>" readonly><br>
            <label>วันที่จอง</label>
            <input type="text" name="re_date" class="form-control" value="<?=$row['re_date']?>" readonly><br>
            <label>วันที่เริ่มต้นยืม</label>
            <input type="text" name="date_start" class="form-control" value="<?=$row['date_start']?>" readonly ><br>
            <label>วันที่ต้องคืนเครื่องเดิม</label>
            <input type="text" name="date_return" class="form-control" value="<?=$row['date_return']?>" readonly ><br>
            <label>วันที่ต้องคืนเครื่องใหม่</label>
            <input type="date" name="new_date_return" class="form-control" value="<?=$row['new_date_return']?>" min="<?php echo date ("Y-m-d", strtotime("+1 day", strtotime($row['date_return']))); ?>" max="<?php echo date ("Y-m-d", strtotime("+7 day", strtotime($row['date_return']))); ?>"  ><br>
            
            <label>อนุมัติ/ไม่อนุมัติ</label> 
                  <select name="status_id" class="form-control" required> 
                  <option value="">-กรุณาเลือก-</option> 
                  <?php foreach($result2 as $results){?> 
                  <option value="<?php echo $results["status_id"];?>"> 
                  <?php echo $results["status_name"]; ?> 
                  </option> 
                  <?php } ?> 
                  </select><br> 
            <input type="submit" value="บันทึก" class="btn btn-success">
            <a href="detail_borrow.php" class="btn btn-danger mb-4 mt-4">ยกเลิก</a>
               </div>
        </form>
        </div>
     </div>

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

</body>

</html>
<?php } ?>

