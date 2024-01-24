<?php 
include 'condb.php'; 
 $ids=$_GET['id'];   
 $sql="SELECT * FROM borrow_db b , register_db r ,status_tbl s  WHERE b.status_id='7' and b.m_id=r.m_id "; 
 $result= mysqli_query($conn,$sql); 
 $rs=mysqli_fetch_array($result);      
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
               $sql1="SELECT orderID , COUNT(orderID) AS count_orderID FROM borrow_Db WHERE status_id=6 "; 
               $result1 = mysqli_query($conn,$sql1); 
               while($row=mysqli_fetch_array($result1)){ 
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
                <a class="nav-link" href="reserve_admin_db.php">
                    <i class="fas fa-folder"></i>
                    <span>ข้อมูลการจอง</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-file"></i>
                    <span>ข้อมูลการยืม-คืน</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-address-card"></i>
                    <span>ข้อมูลพนักงาน</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-file-alt"></i>
                    <span>ประวัติการยืม-คืน</span></a>
            </li>

            <?php } ?>

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
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
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
                        <h1 class="h3 mb-0 text-gray-800">อนุมัติการจอง</h1>
                    
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                    <div class ="card-body"> 
                                            <h5>เลขที่ใบจอง <?=$ids?></h5> 
                                            รหัสผู้ใช้งาน : <?=$rs['m_id']?><br> 
                                            ชื่อผู้ขอจอง : <?=$rs['borrower']?><br> 
                                            หน่วยงาน : <?=$rs['agencyname']?><br> 
                                            สถานที่ตั้ง : <?=$rs['location']?><br> 
                                            หมายเลขโทรศัพท์ : <?=$rs['telephone']?><br> 
                                          
                                            <table class="table table-striped mb-4 mt-4"> 
                                            <tr> 
                                           <th width="10%"><center>ชื่ออุปกรณ์</center></th> 
                                           <th width="10%"><center>ยี่ห้อ</center></th> 
                                           <th width="10%"><center>รุ่น</center></th> 
                                           <th width="10%"><center>จำนวน</center></th> 
                                           <th width="10%"><center>วันที่จอง</center></th> 
                                           <th width="10%"><center>วันทีอนุมัติ</center></th> 
                                           <th width="10%"><center>วันที่ยืม</center></th>
                                           <th width="10%"><center>วันที่คืน</center></th>
                                           <th width="10%"><center>สถานะ</center></th>
                                           
  
                                           </tr> 
  
 <?php 
             $sql="SELECT * FROM  order_borrow o , product_borrow p , borrow_db b , product_devicename d , product_brand n , product_model m , status_tbl s
             WHERE o.orderID=b.orderID  and o.pro_id=p.pro_id and o.orderID='$ids' and b.status_id='7' and p.devicename_id=d.devicename_id and p.brand_id=n.brand_id 
             and p.model_id=m.model_id and o.status_id=s.status_id
             order by o.pro_id  "; 
             $result=mysqli_query($conn,$sql); 
             while($row=mysqli_fetch_array($result)){ 
             } 
 ?> 
  
               <tbody> 
             <?php foreach ($result as $row) { ?> 
                 <tr> 
                  <td align=center> 
                     <?php echo $row["devicename"]; ?> 
                  </td> 
                  <td align=center> 
                     <?php echo $row["brand_name"]; ?> 
                  </td> 
                  <td> 
                     <?php echo $row["model_name"]; ?> 
                  </td> 
                  <td align=center> 
                     <?php echo $row["orderQty"]; ?> 
                  </td> 
                  <td align=center> 
                     <?php echo $row["re_date"]; ?> 
                </td> 
                <td align=center> 
                     <?php echo $row["up_date"]; ?> 
                </td> 
                <td align=center> 
                     <?php echo $row["date_start"]; ?> 
                </td> 
                <td align=center> 
                     <?php echo $row["date_return"]; ?> 
                </td> 
                <td align=center> 
                     <?php echo $row["status_name"]; ?> 
                </td> 
             </tr> 
         </tbody>  
  
              <?php 
             } 
              mysqli_close($conn); // ปิดการเชื่อมต่อฐานข้อมูล 
              ?>     
          
          </table> 
          <form action="update_admin_come.php" method="post">
            <?php if($_GET['do']=='orderID_cancel'){ ?>
              <input type="hidden" name="orderID" value="<?php echo $ids;?>">
              <button type="submit" class="btn btn-danger" onclick="return confirm('ยืนยันการยกเลิก')">ยืนยันการยกเลิกใบจอง</button>
          </form>
            <?php } ?>
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

</body>

</html>
 
<?php } ?>   
           