<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url().'General' ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LG</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="font-size: small"><b>Algorithm </b>Learning Website</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- Tasks: style can be found in dropdown.less -->
          <!-- User Account: style can be found in dropdown.less -->
          <?php if($this->session->userdata('user') == 'Umum'){ ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-sign-in"></i>
              <span class="hidden-xs">Masuk</span>
            </a>
            <ul class="dropdown-menu" style="margin-top: 3px; border-color: #3c8dbc;border-width: 5px;border-radius: 5px;">
              <li class="user-header" style="background: white;">
              <form method="post">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Email" required="">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password" required="">
                </div>
              <div class="pull-left">
                <a href="#">Lupa Password ?</a>
              </div>
              <div class="pull-left">
              Belum punya akun ? <a href="<?php echo base_url().'General/signUp' ?>">Buat akun baru</a>
              </div>
              </li>
              <li class="user-footer">
                <div>
                  <button type="submit" formaction="<?php echo base_url().'C_User/cekUser' ?>" class="btn btn-primary btn-block">Masuk</button>
                </div>
              </form>
              </li>
            </ul>
          </li>
        <?php } elseif($this->session->userdata('user') == 'Pelajar'){ ?>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url().$user->getPict() ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $user->getNama() ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url().$user->getPict() ?>" class="img-circle" alt="User Image">

                    <p>
                      <?php echo $user->getNama() ?> - <?php echo $user->getPekerjaan() ?>
                      <small>Level <?php echo $user->getLevel() ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body" style="text-align: center;">
                    <p>Total Poin : <?php echo $user->getTotPoin() ?></p>
                    <p>Title : <?php echo $user->getTitle() ?></p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url().'General/profile' ?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url().'C_User/logout' ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
          <?php } ?>
        </ul>
      </div>  
    </nav>
    <?php if($this->session->flashdata('error') != null) { ?>
      <div style="text-align: center;background-color: #c9331d;color: white;"><?php echo $this->session->flashdata('error') ?></div>
    <?php } ?>
  </header>