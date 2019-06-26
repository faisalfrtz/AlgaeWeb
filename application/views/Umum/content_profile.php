
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url().$user->getPict() ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $user->getNama() ?></h3>

              <p class="text-muted text-center"><?php echo $user->getPekerjaan() ?></p>

              <hr/>
              <p class="text-center">Level : <?php echo $user->getLevel() ?></p>
              <hr/>
              <p class="text-center">Total Poin : <?php echo $user->getTotPoin() ?></p>
              <hr/>
              <p class="text-center">Title : <?php echo $user->getTitle() ?></p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Data Profil</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-warning" id="editBtn"><span class="fa fa-pencil-square-o" ></span> Edit Profil</button>
              <button class="btn btn-primary" id="viewBtn" style="display: none;"><span class="fa fa-eye" ></span> View Profil</button>
            </div><!-- /.box-tools -->
          </div><!-- /.box-header -->
          <span class="form-horizontal" style="display: none;" id="editProfile">
          <form method="post">
          <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 pull-left" style="padding-top: 0"><i class="fa fa-user"></i> Nama</label>
                  <div class="col-sm-10">
                    <input class="form-control" name="Nama" type="text" value="<?php echo $user->getNama() ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 pull-left" style="padding-top: 0"><i class="fa fa-user"></i> Password</label>
                  <div class="col-sm-10">
                    <input class="form-control" name="Password" type="password" value="<?php echo $user->getPassword() ?>" >
                  </div>
                </div>
                <div class="form-group">      
                  <label class="col-sm-2 pull-left" style="padding-top: 0"><i class="fa fa-venus-mars"></i> Gender</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="Gender">
                      <option><?php echo $user->getGender() ?></option>
                      <option>Pria</option>
                      <option>Wanita</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">      
                  <label class="col-sm-2 pull-left" style="padding-top: 0"><i class="fa fa-user"></i> Umur</label>
                  <div class="col-sm-10">
                    <input class="form-control" name="Umur" type="number" value="<?php echo $user->getUmur() ?>">
                  </div>
                </div>
                <div class="form-group">      
                  <label class="col-sm-2 pull-left" style="padding-top: 0"><i class="fa fa-map-marker"></i> Alamat</label>
                  <div class="col-sm-10">
                    <input class="form-control" name="Alamat" type="text" value="<?php echo $user->getAlamat() ?>">
                  </div>
                </div>
                <div class="form-group">      
                  <label class="col-sm-2 pull-left" style="padding-top: 0"><i class="fa fa-briefcase"></i> Pekerjaan</label>
                  <div class="col-sm-10">
                   <select class="form-control" name="Pekerjaan">
                      <option><?php echo $user->getPekerjaan() ?></option>
                      <option>Guru</option>
                      <option>Mahasiswa</option>
                      <option>Dosen</option>
                      <option>Siswa SMA</option>
                      <option>Siswa SMP</option>
                      <option>Siswa SD</option>
                      <option>Lainnya</option>
                    </select>
                    
                  </div>
                </div>
          </div><!-- box-footer -->
          <div class="box-footer">
            <span class="pull-right" id="btn">
              <button class="btn btn-success" formaction="<?php echo base_url().'C_User/updateProfile/'.$user->getEmail() ?>" type="submit">Update</button>
            </span>
          </div>
          </form>
          </span>
          <span class="form-horizontal" id="viewProfile">
          <form method="post">
          <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 pull-left" style="padding-top: 0"><i class="fa fa-user"></i> Nama</label>
                  <div class="col-sm-10">
                    <?php echo $user->getNama() ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 pull-left" style="padding-top: 0"><i class="fa fa-envelope"></i> Email</label>
                  <div class="col-sm-10">
                    <?php echo $user->getEmail() ?>
                  </div>
                </div>
                <div class="form-group">      
                  <label class="col-sm-2 pull-left" style="padding-top: 0"><i class="fa fa-venus-mars"></i> Gender</label>
                  <div class="col-sm-10">
                    <?php echo $user->getGender() ?>
                  </div>
                </div>
                <div class="form-group">      
                  <label class="col-sm-2 pull-left" style="padding-top: 0"><i class="fa fa-user"></i> Umur</label>
                  <div class="col-sm-10">
                    <?php echo $user->getUmur() ?>
                  </div>
                </div>
                <div class="form-group">      
                  <label class="col-sm-2 pull-left" style="padding-top: 0"><i class="fa fa-map-marker"></i> Alamat</label>
                  <div class="col-sm-10">
                    <?php echo $user->getAlamat() ?>
                  </div>
                </div>
                <div class="form-group">      
                  <label class="col-sm-2 pull-left" style="padding-top: 0"><i class="fa fa-briefcase"></i> Pekerjaan</label>
                  <div class="col-sm-10">
                    <?php echo $user->getPekerjaan() ?>
                  </div>
                </div>
          </div>
          </span>
        </div><!-- /.box -->
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <script src="<?php echo base_url() ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script type="text/javascript">
      $("#editBtn").click(function(event){
        event.preventDefault();
        $('#viewProfile').hide();
        $('#editProfile').show();
        $('#editBtn').hide();
        $('#viewBtn').show();
      });

      $("#viewBtn").click(function(event){
        event.preventDefault();
        $('#viewProfile').show();
        $('#editProfile').hide();
        $('#editBtn').show();
        $('#viewBtn').hide();
      });

    </script>
