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
        <li class="header">LEARN ALGORITHM</li>
<!--         <li>
          <a href="">
            <i class="fa fa-code"></i> <span>Algorithm Introduction</span>
          </a>
        </li> -->
        <li>
          <a href="<?php echo base_url().'General/listMateri' ?>">
            <i class="fa fa-list"></i> <span>Daftar Pembelajaran</span>
          </a>
        </li>
        <li class="header">DISKUSI</li>
        <li>
          <a href="<?php echo base_url().'General/listForum' ?>">
            <i class="fa fa-comment-o"></i>Forum Diskusi<span></span>
          </a>
        </li>
        <li class="header">LAINNYA</li>
        <li>
          <a href="<?php echo base_url().'General/listQuiz' ?>">
            <i class="fa fa-book"></i>Quiz<span></span>
          </a>
        </li>
        <li>
          <a href="">
            <i class="fa fa-file-o"></i>Kirim Soal/Materi<span></span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>