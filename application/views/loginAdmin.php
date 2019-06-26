<!DOCTYPE html>
<html><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Algae | Login Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

  <style>
  .parallax {
      /* The image used */
      background-image: url("<?php echo base_url().'dist/img/photo6.jpg'?>");

      /* Set a specific height */
      height: 500px;

      /* Create the parallax scrolling effect */
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
  }
  </style>

<body class="hold-transition register-page parallax" >
<div class="register-box">
  <div class="register-logo">
    <a href="<?php echo base_url() ?>"><b>ALGAE</b><br/>Algorithm Learning</a>
  </div>
  <div class="register-box-body">
    <p class="login-box-msg">Admin Login</p>

    <form method="post">
      <div class="form-group has-feedback">
        <?php if($this->session->flashdata('errEmailcss') != null) {?>
        <input class="form-control" placeholder="Email" type="email" name="Email" style="<?php echo $this->session->flashdata('errEmailcss')?>;" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <p class="text-muted"><?php echo $this->session->flashdata('errEmailtxt')?></p>
        <?php }else{ ?>
        <input class="form-control" placeholder="Email" type="email" name="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?php } ?>
        
      </div>
      <div class="form-group has-feedback">
        <?php if($this->session->flashdata('errPasscss') != null) {?>
        <input class="form-control" placeholder="Password" type="password" name="Password" style="<?php echo $this->session->flashdata('errPasscss')?>;" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <p class="text-muted"><?php echo $this->session->flashdata('errPasstxt')?></p>
        <?php }else{ ?>
        <input class="form-control" placeholder="Password" type="password" name="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php } ?>
      </div>

      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4 pull-right">
          <button type="submit" formaction="<?php echo base_url().'C_User/loginAdmin' ?>" class="btn btn-primary btn-block btn-flat" >Masuk</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url() ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url() ?>bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url() ?>plugins/iCheck/icheck.min.js"></script>

</body></html>