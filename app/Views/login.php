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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css');?>" rel="stylesheet">

</head>

    <body class="bg-gradient-primary">

      <div class="containers" style="color:black;"> 
       <?= \config\Services::validation()->listErrors(); 
        ?>
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
            <div class="col-lg-6 " d-none d-lg-block><img src="<?php echo base_url('assets/img/admin.png');?>" style="width:450px; height:450px;"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" method="post" id="login_user" name="login_user" action="<?= site_url('/Crud/login_action') ?>">
                  <table>
                  <tr>
                  <td>
                    <div class="form-group">
                      Username::<input type="text" name="username" class="form-control form-control-user" placeholder="Enter Email Address..." >
                    </div>
                  </td>
                  
                 </tr>
                  <tr>
                  <td>
                    <div class="form-group">
                      Password::<input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password" >
                    </div>
                  </td>
                  
                  </tr>
                  <tr>
                   <td>
                   <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                   </td>
                  </tr>
                    <tr>
                    <td>
                    <button  type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    </td>
                    </tr>
                  
                  </table>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/js/sb-admin-2.min.js');?>"></script>

<script>
if($("#login_user").length > 0)
{
  $('#login_user').validate({
    rules:
    {
      username :{
        required: true,
      },
      password :{
        required: true,
      },
    },
    messages:{
      username:{
        required: "please enter valid Username",
      },
      password:{
        required: "please enter valid password",
      }
    }
  })
}
</script>
</body>

</html>
