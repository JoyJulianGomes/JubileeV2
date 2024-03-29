<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Saint Joseph's High School & College, Dharenda | Silver Jubilee Registration" />
  <meta name="author" content="JDGomes" />
  <meta name="keywords" content="SJHSC Jubilee Registration" />

  <title>Admin Login</title>
  <link rel="icon" href="<?=base_url()?>resources/icons/school_logo_icon.png">
  
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>vendor/StarAdmin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>vendor/StarAdmin/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url();?>vendor/StarAdmin/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>vendor/StarAdmin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url();?>vendor/StarAdmin/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <?php echo form_open("AdminController/login_validation");?>
                <div class="form-group">
                  <label class="label">Username</label><p style="color:red"><?php echo form_error('username');?></p>
                  <div class="input-group">
                    <input type="text" name='username' class="form-control" placeholder="Username">
                    <div class="input-group-append">
                      <span class="input-group-text"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label><p style="color:red"><?php echo form_error('password');?></p>
                  <div class="input-group">
                    <input type="password" name='password' class="form-control" placeholder="*********">
                    <div class="input-group-append">
                      <span class="input-group-text"></span>
                    </div>
                  </div>
                </div>
                <label><?php echo (isset($login_error))?$login_error:'';?></label>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Login</button>
              <?php echo form_close()?>
            </div>
            <p class="footer-text text-center"></p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url();?>vendor/StarAdmin/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo base_url();?>vendor/StarAdmin/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo base_url();?>vendor/StarAdmin/js/off-canvas.js"></script>
  <script src="<?php echo base_url();?>vendor/StarAdmin/js/misc.js"></script>
  <!-- endinject -->
</body>

</html>