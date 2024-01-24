<?php 
    session_start();

     require_once "condb.php";
     
     if (isset($_POST['submit'])){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $agencyname = $_POST['agencyname'];
        $telephone = $_POST['telephone'];
        $position = $_POST['position'];
        $department = $_POST['department'];

      // ตรวจสอบบว่า username ซ้ำกันหรือไม่
        $user_check = "SELECT * FROM register_db WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn,$user_check);
        $user = mysqli_fetch_assoc($result);

              if ($user['username'] === $username) {
                echo "<script>alert('Username exists');</script>";
              }else{
                $passwordenc = md5($password);

                $query = "INSERT INTO register_db (username,password,firstname,lastname,agencyname,telephone,position,department)
                          VALUE ('$username','$passwordenc','$firstname','$lastname','$agencyname','$telephone','$position','$department')";
                $resilt = mysqli_query($conn,$query);

                if ($result){
                    $_SESSION['seccess']="Insert user successfully";
                    header("Location: login.php");
                }else{
                    $_SESSION['error'] = "Something went wrong";
                    header("Location: login.php");
                }
            }
         }
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

         <div class="h1 text-center alert alert-info mb-4 mt-4" role="alert">ลงทะเบียนผู้ใช้งาน</div>  

             <div class="col-sm-8" >
                 <div class="center">
            

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="username">User ID (กรอกเฉพาะตัวเลข 7 ตัว)</label>
            <input type="text" name="username" class="form-control" required>
            <br>
            <label for="username">Password</label>
            <input type="text" name="password" class="form-control" required>
            <br>
            <label for="firstname">ชื่อผู้ใช้งาน</label>
            <input type="text" name="firstname" class="form-control" required>
            <br>
            <label for="lastname">นามสกุลผู้ใช้งาน</label>
            <input type="text" name="lastname" class="form-control" required>
            <br>
            <label for="agencyname">ชื่อหน่วยงาน</label>
            <input type="text" name="agencyname" class="form-control" required>
            <br>
            <label for="agencyname">สถานที่ตั้ง</label>
            <input type="text" name="location" class="form-control" required>
            <br>
            <label for="telephone">เบอร์โทรศัพท์</label>
            <input type="text" name="telephone" class="form-control" required>
            <br>
            <label for="position">ตำแหน่ง</label>
            <input type="text" name="position" class="form-control" required>
            <br>
            <label for="department">แผนก</label>
            <input type="text" name="department" class="form-control" required>
            <br>
            <label for="department">รหัสผู้มารับ-ส่งเครื่อง</label>
            <input type="text" name="r_id" class="form-control" >
            <br>
            <label for="department">ชื่อผู้มารับ-ส่งเครื่อง</label>
            <input type="text" name="receiver" class="form-control" >
            <br>
            <input type="submit" name="submit" value="Submit" class="btn btn-success">
            <a href="index.php"  class="btn btn-warning mb-4 mt-4">มีบัญชีแล้ว</a>
    </form>
             </div>
        </div>
    </div>
</div>

</body>
</html>
