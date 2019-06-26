<!DOCTYPE html>
<html><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Algae | Daftar Akun</title>
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
    <p class="login-box-msg">Daftar Akun Baru</p>

    <form method="post">
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Full name" type="text" name="Nama" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select class="form-control" name="Gender" required>
          <option>Pria</option>
          <option>Wanita</option>
        </select>
      </div>
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
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Retype password" name="rePassword" type="password" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Umur" type="number" name="Umur" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select class="form-control" name="Pekerjaan" required>
          <option>Guru</option>
          <option>Mahasiswa</option>
          <option>Dosen</option>
          <option>Siswa SMA</option>
          <option>Siswa SMP</option>
          <option>Siswa SD</option>
          <option>Lainnya</option>
        </select>
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Alamat" name="Alamat" required>
        <span class="fa fa-map-marker form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <div class="icheckbox_square-blue" style="position: relative;" aria-checked="false" aria-disabled="false"><input style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;" type="checkbox" required><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div> Saya setuju dengan <a data-toggle="modal" href="#myModal">Syarat & Ketentuan</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" formaction="<?php echo base_url().'C_User/signUp' ?>" class="btn btn-primary btn-block btn-flat" >Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


    <a href="<?php echo base_url() ?>" class="text-center">Aku sudah punya akun</a>
  </div>
  <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Syarat dan Ketentuan</h4>
      </div>
      <div class="modal-body">
        <p>Jika anda yang ingin mendaftar</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
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
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

<script type="text/javascript">

/*     function cek(){
      var pass1 = $("input[name=Password]").val();
      var pass2 = $("input[name=rePassword]").val();
      var email = $("input[name=Email]").val();
      $("input[name=Email]").css("border-color","");
      $("input[name=Password]").css("border-color","");
      $("input[name=rePassword]").css("border-color","");
      $.ajax({
        url:"<?php// echo base_url().'C_User/getUser/' ?>"+email,
        type:"GET",
        success: function(data){
          var dt = $.parseJSON(data);
          var cek = true;
          if(dt.user == 1){
            $("input[name=Email]").css("border-color","red");
            cek = false;
          }
          else{
            if(pass1 != pass2){
              $("input[name=Password]").css("border-color","red");
              $("input[name=rePassword]").css("border-color","red");
              cek = false;
            }
          }
        },
        error: function(){
          alert('error');
        }
      });
    };*/

</script>


</body></html>