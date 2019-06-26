      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">

            <div class="box">
              <div class="box-header">
                <h3>Kelola User</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($listUser->result() as $c) {
                    if($c->Flag == 1){
                      $Status = 'Aktif';
                    }else{
                      $Status ='Tidak Aktif';
                    }
                   ?>
                  <tr>
                    <td><?php echo $c->Nama ?></td>
                    <td><?php echo $c->Email ?></td>
                    <td><?php echo $Status ?></td>
                    <td>
                      <button class="btnEdit btn btn-success" title="Edit" data-uname="<?php echo $user->getNama() ?>" ><i class="fa fa-edit"></i></button> 
                    <button class="btnView btn btn-primary" title="Lihat Detail" data-uname="<?php echo $user->getNama()?>"><i class="fa fa-eye"></i></button>
                    <button class="btnDel btn btn-danger" title="Non-Aktifkan" data-uname="<?php echo $user->getNama()?>"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
