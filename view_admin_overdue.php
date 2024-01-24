<?php
include 'condb.php';
 $ids=$_GET['id'];  
 $sql="SELECT * FROM borrow_db b ,record_borrow c, register_db r ,status_tbl s
 WHERE b.orderID=c.orderID and b.status_id=s.status_id and b.status_id='8' and b.m_id=r.m_id and c.status_id IN (8,10) 
 order by b.status_id  "; 
 $result= mysqli_query($conn,$sql);
 $rs=mysqli_fetch_array($result);     

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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


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
                <a class="nav-link" href="receiver.php">
                    <i class="fas fa-address-card"></i>
                    <span>ข้อมูลพนักงาน</span></a>
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
                        <h1 class="h3 mb-0 text-gray-800">บันทึกการคืน</h1> 
                    </div> 

                    <!-- Content Row --> 
                    <div class="row"> 
                   
                          <div class ="card-body"> 
                                 <h5>เลขที่ใบยืม <?=$ids?></h5>  
                                 ชื่อผู้ขอจอง : <?=$rs['borrower']?><br> 
                                 หน่วยงาน : <?=$rs['agencyname']?><br> 
                                 สถานที่ตั้ง : <?=$rs['location']?><br> 
                                 หมายเลขโทรศัพท์ : <?=$rs['telephone']?><br> 
                                 <br> 
                                   
                                 ผู้ให้ยืม : <?=$rs['lender']?><br> 
                                 รหัสผู้มารับเครื่อง : <?=$rs['name_id']?><br> 
                                 ผู้มารับเครื่อง : <?=$rs['b_receiver']?><br>  
                                 <br> 

                                 <table class="table table-striped mb-4"> 
                                 <tr> 
                                 <th width="10%"><center>รหัสเครื่อง</center></th>   
                                 <th width="10%"><center>ชื่ออุปกรณ์</center></th> 
                                 <th width="10%"><center>ยี่ห้อ</center></th> 
                                 <th width="10%"><center>รุ่น</center></th> 
                                 <th width="10%"><center>วันที่จอง</center></th>
                                 <th width="10%"><center>วันที่มารับเครื่อง</center></th>
                                 <th width="10%"><center>วันที่เริ่มต้นยืม</center></th> 
                                 <th width="10%"><center>กำหนดคืน</center></th> 
                                 <th width="10%"><center>จำนวนที่อนุมัติ</center></th>
                                 <th width="10%"><center>จำนวนวันที่เกินกำหนก</center></th>
                                 <th width="10%"><center>สถานะ</center></th> 
                                 </tr> 
 
            <?php 
            $sql="SELECT * FROM  order_borrow o , product_borrow p , borrow_db b , product_devicename d , product_brand  n , product_model m ,record_borrow r , product t ,status_tbl s
            WHERE o.orderID=b.orderID and o.orderID=r.orderID and r.orderID=b.orderID and o.pro_id=p.pro_id and o.orderID='$ids' and p.devicename_id = d.devicename_id and p.brand_id = n.brand_id 
            and p.model_id=m.model_id and b.status_id='8' and r.status_id IN (8,10) and r.machinecode=t.machinecode and p.devicename_id=t.devicename_id and r.status_id=s.status_id
            order by o.pro_id and r.status_id "; 
            $result=mysqli_query($conn,$sql); 
            while($row=mysqli_fetch_array($result)){ 
            } 

            ?> 
 
  
         <tbody> 
            <?php foreach ($result as $row) { ?> 
                <tr> 
                <td align=center> 
                    <?php echo $row["machinecode"]; ?> 
                 </td> 
                 <td align=center> 
                    <?php echo $row["devicename"]; ?> 
                 </td> 
                 <td align=center> 
                    <?php echo $row["brand_name"]; ?> 
                 </td> 
                 <td align=center> 
                    <?php echo $row["model_name"]; ?> 
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
                    <?php echo $row["orderQty_up"]; ?> 
               </td>
               <td align=center> 
               <?php $date_return = date('Y-m-d',strtotime($row['date_return']));
                          $datenow = date('Y-m-d');

                         //echo 'วันที่สั่งซื้อ' .$up_date;
                         //echo '<br>';
                         //echo 'วันปัจจุบัน' .$datenow;

                          $caldate = round(abs(strtotime("$date_return") - strtotime("$datenow"))/60/60/24);

                         echo $caldate. 'วัน';
                    ?>
                </td>
               <td align=center> 
                    <?php echo $row["status_name"]; ?> 
               </td>
               
             </tr> 
             <?php } ?> 
</table>         
                        
                   


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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <?php } ?> 