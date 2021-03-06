<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rumahku.com</title>
  <link rel="icon" type="image/png" href="../images/logo1.jpg">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
    $vendorDirectory = base_url("/mcvendor/login/");
  ?>
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo $vendorDirectory ?>vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo $vendorDirectory ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo $vendorDirectory ?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo $vendorDirectory ?>vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?php echo $vendorDirectory ?>vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo $vendorDirectory ?>vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo $vendorDirectory ?>vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?php echo $vendorDirectory ?>vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo $vendorDirectory ?>css/util.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $vendorDirectory ?>css/main.css">
  <style>
    .fixed-header {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 2;
      background-color: white;
      color: black;
    }
  </style>
<!--===============================================================================================-->
</head>
<body>
  <div class="fixed-header">
    <div style="width:100%;padding-left:10px;">
      <div style="width:15%;float:left;">Rumahku.com</div>
      <div style="width:85%;float:left;margin:auto;"><p style="font-size:12px;">Rancang Bangun Sistem Penjualan Alat-Alat Rumah Tangga</p></div>
    </div>
  </div>
  <div class="limiter">
    <div class="container-login100" style="background-image: url('<?php echo $vendorDirectory ?>images/bg-01.jpg');">
      <div class="wrap-login100 p-t-30 p-b-50">
        <span class="login100-form-title p-b-41">
          Account Register
        </span>
        <form class="login100-form validate-form p-b-33 p-t-5" action="<?php echo base_url('sigin/doRegister')?> " method="post">

          <div class="wrap-input100 validate-input" data-validate = "Enter username">
            <input class="input100" type="text" name="username" placeholder="User name">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <input class="input100" type="password" name="password" placeholder="Password">
            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
          </div>
          
          <div class="wrap-input100 validate-input" data-validate = "Enter name">
            <input class="input100" type="text" name="name" placeholder="Name">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="wrap-input100">
            <select class="input100" name="id_akses">
              <option value="1">Admin</option>
              <option value="2" selected>Kasir</option>
            </select>
          </div>

          <?php
            if (isset($validation)) {
              echo '<div style="color:red;text-align: center;"><b>';
              echo $validation;
              echo '</b><div>';
            }
          ?>


          <div class="container-login100-form-btn m-t-32">
            <button class="login100-form-btn">
              Register
            </button>
          </div>
          <p style="text-align: center;margin-top: 20px;">
            Already have an account? <a href="login" style="color: blue;">Login</a> here.
          </p>
        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="<?php echo $vendorDirectory ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo $vendorDirectory ?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo $vendorDirectory ?>vendor/bootstrap/js/popper.js"></script>
  <script src="<?php echo $vendorDirectory ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo $vendorDirectory ?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo $vendorDirectory ?>vendor/daterangepicker/moment.min.js"></script>
  <script src="<?php echo $vendorDirectory ?>vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo $vendorDirectory ?>vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo $vendorDirectory ?>js/main.js"></script>

</body>
</html>