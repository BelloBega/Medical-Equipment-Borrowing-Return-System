<?php  
     include 'condb.php';
     session_start(); 

     $sql="SELECT b.orderID , a.orderID , COUNT(b.orderID and a.orderID) AS days1 
     FROM borrow_db b , register_db r , add_day_borrow a WHERE b.m_id=r.m_id and b.status_id IN(7,11) 
     OR b.m_id=r.m_id and b.status_id=8 and DATEDIFF(b.date_return,Now())=1 OR b.m_id=r.m_id and b.status_id=8 and day(b.date_return)=day(now()) 
     OR a.orderID=b.orderID and a.status_id=7  "; 
     $result = mysqli_query($conn,$sql); 
     $days1 = mysqli_fetch_assoc($result); 

     if($days1['days1']>0){
        $noti_days1='<span class="noti-alert">'.$days1['days1'].'</span>';
     } else {
        $noti_days1="";
     }
     
     ?> 

<?php  
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

    <style>
        .noti-list{
            padding: 10px;
            height: 100px;
            width: 300px;
            border: 1px solid #CCC;
            background-color: #FFF;
            position: relative;
            top: 75px;
            right: 25px;
            display: none;
        }

    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="user_page.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-user-md"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Borrowing Return</div>
            </a>


            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="user_page.php">
                    <i class="fas fa-home"></i>
                    <span>หน้าแรก</span></a>

            <li class="nav-item active">
                <a class="nav-link" href="reserve_user_db.php">
                    <i class="fas fa-folder"></i>
                    <span>ข้อมูลการขอจอง</span></a>

                    <li class="nav-item active">
                <a class="nav-link" href="add_day_borrow.php">
                    <i class="fas fa-folder"></i>
                    <span>ขอยืมเครื่องต่อ</span></a>

            </li>
            <li class="nav-item active">
                <a class="nav-link" href="history_user.php">
                    <i class="fas fa-file-alt"></i>
                    <span>ประวัติการยืม-คืน</span></a>
            </li>

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
                        <?php
                             $sql2="SELECT * FROM borrow_db WHERE status_id=8 and DATEDIFF(date_return,Now())=1 order by orderID desc limit 0,1 "; 
                             $result2 = mysqli_query($conn,$sql2); 

                             $sql3="SELECT * FROM borrow_db WHERE status_id=8 and day(date_return)=day(now()) order by orderID desc limit 0,1 "; 
                             $result3 = mysqli_query($conn,$sql3);

                             $sql4="SELECT * FROM borrow_db WHERE status_id=7 order by orderID desc limit 0,1";
                             $result4 = mysqli_query($conn,$sql4);

                             $sql5="SELECT * FROM borrow_db WHERE status_id=11 order by orderID desc limit 0,1";
                             $result5 = mysqli_query($conn,$sql5);

                             $sql6="SELECT * FROM add_day_borrow WHERE status_id=7 order by orderID desc limit 0,1";
                             $result6 = mysqli_query($conn,$sql6);

                                    $str = '<ul>';
                                    $str.='<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">แจ้งเตือน</h6>';
                                     while($row1 = mysqli_fetch_assoc($result2)){
                                    $str.='<a class="dropdown-item d-flex align-items-center" href="view_alert_tomorrow.php?id='.$row1['orderID'].'">';
                                    $str.='<div class="mr-3">';
                                    $str.='<div class="icon-circle bg-primary">';
                                    $str.='<i class="fas fa-calendar-check text-white"></i>';
                                    $str.='</div>';
                                    $str.='</div>';
                                    $str.='<div>';
                                    $str.='<div class="small text-gray-500"> '.date("Y-m-d",strtotime("-1 day",strtotime($row1['date_return'])))  .'  </div>'; 
                                    $str.='พรุ่งนี้ถึงกำหนดคืนเครื่อง <br> เลขที่ใบจอง : '.$row1['orderID'].' <br> วันครบกำหนด '.$row1['date_return'].' '; 
                                    $str.='</div>';
                                    $str.='</a>';
                                              }
                                              while($row2 = mysqli_fetch_assoc($result3)){
                                                $str.='<a class="dropdown-item d-flex align-items-center" href="view_alert_today.php?id='.$row2['orderID'].' ">';
                                                $str.='<div class="mr-3">';
                                                $str.='<div class="icon-circle bg-warning">';
                                                $str.='<i class="fas fa-calendar-check text-white"></i>';
                                                $str.='</div>';
                                                $str.='</div>';
                                                $str.='<div>';
                                                $str.='<div class="small text-gray-500"> '.date("Y-m-d",strtotime($row2['date_return']))  .' </div>';
                                                $str.='วันนี้ถึงกำหนดคืนเครื่อง  <br> เลขที่ใบจอง : '.$row2['orderID'].' <br> กรุณานำเครื่องมาส่งคืน '; 
                                                $str.='</div>';
                                                $str.='</a>';
                                                    }
                                                    while($row3 = mysqli_fetch_assoc($result4)){
                                                        $str.='<a class="dropdown-item d-flex align-items-center" href="view_alert_approve.php?id='.$row3['orderID'].' ">';
                                                        $str.='<div class="mr-3">';
                                                        $str.='<div class="icon-circle bg-success">';
                                                        $str.='<i class="fas fa-file-alt text-white"></i>';
                                                        $str.='</div>';
                                                        $str.='</div>';
                                                        $str.='<div>';
                                                        $str.='<div class="small text-gray-500">'.$row3['up_date'].'</div>';
                                                        $str.='อนุมัติการยืมเครื่อง <br> เลขที่ใบจอง : '.$row3['orderID'].' <br> สามารถมารับเครื่องได้ '; 
                                                        $str.='</div>';
                                                        $str.='</a>';
                                                            }
                                                            while($row4 = mysqli_fetch_assoc($result5)){
                                                             $str.='<a class="dropdown-item d-flex align-items-center" href="view_alert_disapprove.php?id= '.$row4['orderID'].' ">';
                                                             $str.='<div class="mr-3">';
                                                             $str.='<div class="icon-circle bg-danger">';
                                                             $str.='<i class="fas fa-file-alt text-white"></i>';
                                                             $str.='</div>';
                                                             $str.='</div>';
                                                             $str.='<div>';
                                                             $str.='<div class="small text-gray-500">'.$row4['up_date'].'</div>';
                                                             $str.='ไม่อนุมัติการยืมเครื่อง <br> เลขที่ใบจอง : '.$row4['orderID'].' '; 
                                                             $str.='</div>';
                                                             $str.='</a>';
                                                }
                                                while($row5 = mysqli_fetch_assoc($result6)){
                                                    $str.='<a class="dropdown-item d-flex align-items-center" href="view_alert_addday.php?id='.$row5['orderID'].' ">';
                                                    $str.='<div class="mr-3">';
                                                    $str.='<div class="icon-circle bg-success">';
                                                    $str.='<i class="fas fa-file-alt text-white"></i>';
                                                    $str.='</div>';
                                                    $str.='</div>';
                                                    $str.='<div>';
                                                    $str.='<div class="small text-gray-500"> '.$row5['date_app'].'   </div>';
                                                    $str.='อนุมัติการยืมเครื่องต่อ <br> เลขที่ใบจอง : '.$row5['orderID'].' <br> จากวันที่  '.$row5['date_return'].' <br> เป็นวันที่  '.$row5['new_date_return'].' ' ; 
                                                    $str.='</div>';
                                                    $str.='</a>';
                                                }
                                    $str.='<a class="dropdown-item text-center small text-gray-500" href="all_aleart.php">แสดงทั้งหมด</a>';
                                    $str.='</div>';
                                    $str.='</ul>';
            
                                    ?>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="badge badge-danger badge-counter"><?php echo $noti_days1; ?></span>
                        <i class="fas fa-bell fa-fw" alt="" name="days1" id="days1"></i>
                            </a> 
                            <!-- Dropdown - Alerts -->
                                <?php echo $str ; ?>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
                                <script>
                                    $('#days1').click(function(){
                                        var obj = $(this).next();
                                        $(obj).fadeIn(400);
                                        $(this).prev().hide(100);
                                    });
                                    $('body').click(function(e){
                                         if(e.target.id!='days1' ){
                                            $('.noti-list').fadeOut(200);
                                         }
                                    });
                                </script>
                            
                               

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">  user<?php echo $_SESSION['user']; ?></span>
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
                        <h1 class="h3 mb-0 text-gray-800">ประวัติการยืม-คืน</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class=container-fluid>
                    <div class="row justify-content-md-center">
                    <div class="col-md-8 py-4">

                        <form class="row" method="POST">
                            <div class="col col-lg-6">
                            <select class="form-select" name="select" required>
                            <option value="" selected disabled>- เลือกหัวข้อที่ต้องการค้นหา -</option>
       
                            <option value="r.orderID" <?php if(isset($_POST["select"])) {if($_POST['select'] == "r.orderID") {echo"selected";}}?>>เลขที่ใบจอง</option>
                            <option value="machinecode" <?php if(isset($_POST["select"])) {if($_POST['select'] == "machinecode") {echo"selected";}}?>>หมายเลขเครื่อง</option>
                            <option value="m_id" <?php if(isset($_POST["select"])) {if($_POST['select'] == "m_id") {echo"selected";}}?>>รหัสผู้จอง</option>
                            <option value="borrower" <?php if(isset($_POST["select"])) {if($_POST['select'] == "borrower") {echo"selected";}}?>>ชื่อผู้จอง</option>
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
                            $sql="SELECT * FROM  borrow_db b , record_borrow r  , status_tbl s WHERE r.orderID=b.orderID
                            and  r.status_id=s.status_id and  b.status_id IN (6,7,8,9,10,11) and ".$_POST['select']." LIKE '".$_POST['value']."%'  ";  
                            $query = mysqli_query($conn,$sql);
                            $check_data = mysqli_num_rows($query);
                            if($check_data == 0) {
                                echo'<p class="text-center py-4"><span class="badge bg-danger" style="font-size: 20px;">ไม่พบข้อมูล</span></p>';
                            }else{
                                ?>
                               <table class="table table-bordered mt-4">
                                    <thead class="table-secondary">
                                        <tr>
                                        <th scope="col">เลขที่ใบจอง</th>
                                        <th scope="col">หมายเลขเครื่อง</th>
                                        <th scope="col">รหัสผู้จอง</th>
                                        <th scope="col">ชื่อผู้จอง</th>
                                        <th scope="col">วันมารับเครื่อง</th>
                                        <th scope="col">วันที่เริ่มต้นยืม</th>
                                        <th scope="col">กำหนดคืน</th>
                                        <th scope="col">วันที่คืน</th>
                                        <th scope="col">สถานะ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                           while ($result = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                         <td> <?php echo $result["orderID"]; ?></td>
                                         <td> <?php echo $result["machinecode"]; ?></td>
                                         <td> <?php echo $result["m_id"]; ?></td>
                                         <td> <?php echo $result["borrower"]; ?></td>
                                         <td> <?php echo $result["date_come"]; ?></td>
                                         <td> <?php echo $result["date_start"]; ?></td>
                                         <td> <?php echo $result["date_return"]; ?></td>
                                         <td> <?php echo $result["update_return"]; ?></td>
                                         <td> <?php echo $result["status_name"]; ?></td>
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

            <div class="container">
            <div class="row"> 
                    <table class="table table-striped mb-4 mt-4">  
                      <tr>  
                        <th>เลขที่ใบจอง</th>
                        <th>หมายเลขเครื่อง</th>
                        <th>รหัสผู้จอง</th>
                        <th>ชื่อผู้จอง</th>
                        <th>วันมารับเครื่อง</th>
                        <th>วันที่เริ่มต้นยืม</th>
                        <th>กำหนดคืน</th>
                        <th>วันที่คืน</th>
                        <th>สถานะ</th>

                      </tr>  
   
 <?php  
             $sql="SELECT * FROM  borrow_db b , record_borrow r  , status_tbl s , register_db d
             WHERE d.m_id=b.m_id and b.orderID=r.orderID and  r.status_id=s.status_id  ORDER BY r.update_return ASC";  
             $result=mysqli_query($conn,$sql);  
             while($row=mysqli_fetch_array($result)){  
             }  
 ?>  
   
               <tbody>  
             <?php foreach ($result as $row) { ?>  
                 <tr>  
                 <td>  
                     <?php echo $row["orderID"]; ?>  
                  </td>  
                  <td>  
                     <?php echo $row["machinecode"]; ?>  
                  </td>  
                  <td>  
                     <?php echo $row["m_id"]; ?>  
                  </td>  
                  <td>  
                     <?php echo $row["borrower"]; ?>  
                  </td>  
                  <td>  
                     <?php echo $row["date_come"]; ?>  
                  </td>  
                <td>  
                     <?php echo $row["date_start"]; ?>  
                </td>  
                <td>  
                     <?php echo $row["date_return"]; ?>  
                </td>  
                <td>  
                     <?php echo $row["update_return"]; ?>  
                </td>  
                <td>  
                     <?php echo $row["status_name"]; ?>  
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