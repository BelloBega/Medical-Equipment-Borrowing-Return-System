<?php
include 'condb.php';
 $devicename_id = $_GET['id'];
 $query = "SELECT p.*, s.status_name 
 FROM product as p 
 LEFT JOIN status_tbl as s ON p.status_id = s.status_id 
 WHERE p.status_id ='3'
 order by status_id " or die ("Error:" . mysqli_error()); 
 $result = mysqli_query($conn,$query); 
 
  //  echo $query; 
  //  exit();
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin_pa.php">
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
                    <span>คลังเครื่องสำรอง</span></a>
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
                        <h1 class="h3 mb-0 text-gray-800">Medical Equipment Borrowing-Return System</h1>
    
                    </div>

                    <?php 
                          $sql2="SELECT up_date , COUNT(up_date) AS count_up_date FROM borrow_db WHERE  status_id='7' "; 
                          $result2 = mysqli_query($conn,$sql2); 
                          while($row2=mysqli_fetch_array($result2)){ 
                      ?> 

                    <a href="admin_come.php " class="btn btn-outline-primary mb-4">ที่ต้องมารับเครื่อง (<?=$row2["count_up_date"]; ?>) </a> <?php } ?>

                    <?php 
                          $sql3="SELECT date_return , COUNT(date_return) AS count_date_return FROM borrow_db WHERE  status_id='8' and day(date_return)=day(now())"; 
                          $result3 = mysqli_query($conn,$sql3); 
                          while($row3=mysqli_fetch_array($result3)){ 
                          //echo $sql1;  
                          //exit(); 
                      ?> 

                    <a href="admin_returned.php " class="btn btn-outline-success mb-4">ถึงกำหนดคืนเครื่อง (<?=$row3["count_date_return"]; ?>) </a> <?php } ?>

                    <?php 
                          $sql4="SELECT date_return , COUNT(date_return) AS count_date_return FROM borrow_db WHERE  status_id='8' and DATEDIFF(date_return, CURDATE())"; 
                          $result4 = mysqli_query($conn,$sql4); 
                          while($row4=mysqli_fetch_array($result4)){ 
                          //echo $sql1;  
                          //exit(); 
                      ?> 

                    <a href="admin_overdue.php " class="btn btn-outline-warning mb-4">เกินกำหนดคืนเครื่อง (<?=$row4["count_date_return"]; ?>) </a> <?php } ?>
                    

                    <!-- Content Row -->
                    <div class="row">

                    <?php 
                       $sql="SELECT * 
                       ,( select count(*) from product where devicename_id = p.devicename_id) as count_product ,(select count(*) from product where  devicename_id = p.devicename_id and status_id = '1') as amount
                       FROM product_borrow p , product_devicename d , product_brand b , product_model m, status_tbl s 
                       WHERE p.status_id=s.status_id and d.devicename_id = '$devicename_id' and p.devicename_id = d.devicename_id and p.brand_id = b.brand_id and p.model_id=m.model_id
                       order by p.status_id  ";
                       $result=mysqli_query($conn,$sql);
                       while($row=mysqli_fetch_array($result)){
                    
                    ?>

                   <div class="col col-sm-9 col-md-4"> 
                     <div class="card mb-4 rounded-3 shadow-sm"> 
                        <div class="card-header py-3 "> 
                           <h4 class="my-0 fw-normal "><?=$row["devicename"]; ?></h4> 
                        </div> 
                          <div class="card-body"> 
                          <img src="images/<?=$row['images']?>" width="200" height="150" class=" p-2 my-2 "> <br> 

                            <h1 class="card-title pricing-card-title">จำนวนที่เหลือ  : <?=$row["amount"]; ?><small class="text-body-secondary fw-light"></small></h1> 
                            <ul class="list-unstyled mt-3 mb-4"> 
                              <li> จำนวนทั้งหมด : <?=$row["count_product"]; ?></li> 
                            </ul> 
                          </div> 
                        </div> 
                    </div> 
 
                   <?php   }   ?> 
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

