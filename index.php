<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Monitoring Keuangan Harsika Cafe</title>
  <link rel="shortcut icon" href="../gambar/sistem/asset.png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
  <style>
    * {box-sizing: border-box;}

    body {
      margin: 0;
      font-family: 'Inter';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/inter/v2/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuOKfAZJhiI2B.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
    }

    .username,.password {
      overflow: hidden;
      background-color: #ffff;
    }

    .username a,.password a {
      float: right;
      display: block;
      color: black;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    .username a:hover, ,.password a:hover {
      background-color: #ddd;
      color: black;
    }
    .cls-4 {
      font-family: 'Inter';
      font-style: normal;
      font-weight: 300;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/inter/v2/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuOKfAZJhiI2B.woff2) format('woff2');
      unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        font-size: 16px;
      }
    .username a.active , ,.password a.active{
      background-color: #2196F3;
      color: white;
    }

    .username .login-container ,.password .login-container {
      float: right;
    }

    .username input[type=text] ,.password input[type=password] {
      width: 200px;
      border-radius: 10px;
      padding: 10px 10px;
      margin: 20px 15px;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    .username .login-container button ,.password .login-container button {
      float: right;
      padding: 6px 10px;
      margin-top: 8px;
      margin-right: 16px;
      background-color: #555;
      color: white;
      font-size: 17px;
      border: none;
      cursor: pointer;
    }

    .username .login-container button:hover, .password .login-container button:hover {
      background-color: green;
    }

    @media screen and (max-width: 600px) {
      .username .login-container,.password .login-container {
        float: none;
      }
      .username a, .password a, .username input[type=text], .password input[type=password], .username .login-container button, .password .login-container button {
        float: none;
        display: block;
        text-align: left;
        width: 100%;
        margin: 0;
        padding: 14px;
      }
      .username input[type=text], .password input[type=text] {
        border: 1px solid #ccc;  
  }
}
</style>

</head>
<body class=" bg-primary">
  <div class="container">
    <div class="login-box">

      <center>

        <!-- <h3 class="cafe">MONITORING SYSTEM</h3> -->
        <img src="./gambar/sistem/nama.png" alt="Monitoring System" style="width:  100%;height: auto">
        <br>
        <br>

        <?php
        if(isset($_GET['alert'])){
          if($_GET['alert'] == "gagal"){
            echo "<div class='alert alert-danger'>LOGIN GAGAL! USERNAME DAN PASSWORD SALAH!</div>";
          }else if($_GET['alert'] == "logout"){
            echo "<div class='alert alert-success'>ANDA TELAH BERHASIL LOGOUT</div>";
          }else if($_GET['alert'] == "belum_login"){
            echo "<div class='alert alert-warning'>ANDA HARUS LOGIN UNTUK MENGAKSES DASHBOARD</div>";
          }
        }
        ?>
      </center>

      <div class="login-box-body">

<center>
 <img src="./gambar/sistem/asset.png" alt="Logo" style="width:  200px;height: auto">
</center>
<br>
<br> 
      <!-- <p class="login-box-msg text-bold">LOGIN</p> -->
<center>
      <form action="periksa_login.php" method="POST">
        <div class="username" id="username">
        <label class="cls-4">Username  </label>
        <input type="text" class="form-control" placeholder="Username" name="username" required="required" autocomplete="off">
        <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
        </div>
        <div class="password" id="username">
        <label class="cls-4">Password   </label>
          <input type="password" class="form-control" placeholder="Password " name="password" required="required" autocomplete="off">
          <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
        </div>
        <br>
        <br>
        <div class="password" id="username">
        <button type="submit" class="btn btn-info btn-md btn-flat" >LOGIN</button>
        </div>
        </center>
          </form>

    </div>
  </div>
</div>


<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
