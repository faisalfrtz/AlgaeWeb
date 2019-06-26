<aside class="main-sidebar" >
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div>
        <img src="<?php echo base_url() ?>images/logoAlgae.png">
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li>
          <a href="<?php echo base_url().'C_Admin/kelolaUser' ?>">
            <i class="fa fa-users"></i> <span>Kelola Data User</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url().'C_Admin/kelolaForum' ?>">
            <i class="fa fa-list"></i> <span>Kelola Forum</span>
          </a>
        </li>
         <li>
          <a href="<?php echo base_url().'C_Admin/kelolaMateri' ?>">
            <i class="fa fa-file"></i> <span>Kelola Materi</span>
          </a>
        </li>
         <li>
          <a href="<?php echo base_url().'C_Admin/kelolaQuiz' ?>">
            <i class="fa fa-tasks"></i> <span>Kelola Quiz</span>
          </a>
        </li>
       
    </section>
    <!-- /.sidebar -->
  </aside>