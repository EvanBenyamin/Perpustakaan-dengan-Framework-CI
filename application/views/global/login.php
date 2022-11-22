<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - E-Library SMA SEJAHTERA 1 DEPOK</title>
    <link rel="shortcut icon" href="<?php echo base_url()."logo/"; ?>icon.png"/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- Morris charts -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/morris/morris.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
   <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/skin-blue-light.css">

   
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Login</b> E-library</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
         <?php echo form_open('web/login'); ?>
       
          <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="Username">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
         
        </div><!-- /.social-auth-links -->

     

      </div><!-- /.login-box-body -->
       <center><a href="<?php echo base_url();?>Buku/">Kembali Ke Home</a></center>
    </div><!-- /.login-box -->


    <!-- jQuery 2.1.4 -->
     <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url()."assets/"; ?>plugins/jquery/jquery-2.1.4.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url()."assets/"; ?>plugins/bootstrap/js/bootstrap.min.js"></script>
 
    <script type="text/javascript" src="<?php echo base_url()."assets/"; ?>plugins/datatables/datatables.min.js"></script>

    <!-- AdminLTE App -->
    <script src="<?php echo base_url()."assets/"; ?>plugins/admin style/js/app.min.js"></script>

  </body>
</html>

                      