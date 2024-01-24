<?php
  session_start();

  if (isset($_POST['username'])) {
    
    include('condb.php');

    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordenc = md5($password);

    $query = "SELECT * FROM register_db WHERE username = '$username' AND password ='$passwordenc' ";

    $result = mysqli_query($conn,$query);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_array($result);

        $_SESSION['username'] = $row['username'];
        $_SESSION['user'] = $row['firstname'] . " " . $row['lastname'];
        $_SESSION['user_level'] = $row['user_level'];
        $_SESSION['m_id'] = $row['m_id'];

        if ($_SESSION['user_level'] == 'a') {
            header("Location: admin_page.php");
        }
        if ($_SESSION['user_level'] == 'm') {
            header("Location: user_page.php");
        }
       } else {
        echo "<script>alert('User หรือ Password ไม่ถูกต้อง');</script>";
       }
    }else {
     header("Location: index.php");                                                                               
   }
?>