<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content='IE=edge'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Equipment Borrowing-Return System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<!-- Section: Design Block -->
<section class="text-center">
  <!-- Background image -->
  <div class="p-5 bg-image" style="
        background-image: url('images/bg.jpg');
        height: 300px;
        "></div>
  <!-- Background image -->

  <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
    <div class="card-body py-5 px-md-5">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-5">ลงชื่อเข้าใช้งาน</h2>
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row">
              <div class="col-md-6 mb-4">
              <form action="login.php" method="post">
                <div class="form-outline">
                  <input type="text" id="form3Example1" class="form-control" name="username" required />
                  <label class="form-label" for="form3Example1">User ID</label>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <input type="text" id="form3Example2" class="form-control" name="password" required />
                  <label class="form-label" for="form3Example2">Password</label>
                </div>
              </div>
            </div>

            
            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">
              LOG IN
            </button><br>
            <a>ลงทะเบียนผู้ใช้งานโดย ADMIN เท่านั้น !!</a>
            <a href="register.php" class="btn btn-outline-sacondary">Register</a>
            </form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
