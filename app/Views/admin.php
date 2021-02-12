<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
   
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css');?>" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="<?php echo base_url('assets/vendor/dataTables/dataTables.bootstrap4.min.css');?>" rel="stylesheet">

</head>
<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
            <div class="col-lg-6 " d-none d-lg-block><img src="<?php echo base_url('assets/img/studentinsert.jpg');?>" style="width:480px; height:480px;"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Update Page of Student Data</h1>
                    <hr border="2" color="black"/>
    </div>
    </div>
    <form method="post" id="update_user" name="update_user" enctype="multipart/form-data" action="<?= site_url('Crud/adminsave')?>"> 
      <input type="hidden" name="userid" id="userid" value="<?php echo $admin['userid']; ?>">

      <div class="form-group">
        <label>UaserName</label>
        <input type="text" name="username" id="username" class="form-control" value="<?php echo $admin['username']; ?>">
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="text" name="password" id="password" class="form-control" value="<?php echo $admin['password']; ?>">
      </div>
      <div class="form-group">
        <label>Profile</label>
        <input type="file" name="profile"  id="profile" class="form-control" value="<?php echo $admin['profile']; ?>">
      </div>
      <div class="form-group">
        <input type="submit" id="btn_submit" class="btn btn-primary btn-block" value="save data">
      </div>
    </form>
  </div>
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/js/sb-admin-2.min.js');?>"></script>
<script>
var Namespace={
    configuration:{
    adminforms:"<?php echo site_url('Crud/adminsave');?>",
  }
}
</script>
 <script type="text/javascript" src="<?php echo base_url('assets/js/adminedit.js'); ?>"></script>
</body>
</html>