<section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3>Kelola Forum</h3>
              <hr/>
              <a href="<?php echo base_url().'C_Admin/tambahForum' ?>">
                <button class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Buat Forum Baru</button>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Forum</th>
                    <th>Tipe</th>
                    <th>Author</th>
                    <th>Tanggal Post</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no = 1;
                  foreach($listForum->result() as $c) {
                    if($c->Flag == 1){
                      $Status = 'Aktif';
                    }else{
                      $Status ='Tidak Aktif';
                    };
                   ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $c->Nama ?></td>
                    <td><?php echo $c->Tipe ?></td>
                    <td><?php echo $c->Author ?></td>
                    <td><?php echo $c->TglPost ?></td>
                    <td><?php echo $Status ?></td>
                    <td>
                      <button class="btnEdit btn btn-success" title="Edit" data-idf="<?php echo $c->idForum ?>" ><i class="fa fa-edit"></i></button> 
                      <a href="<?php echo base_url().'C_Admin/viewForum/'.$c->idForum ?>">
                    <button class="btnView btn btn-primary" title="Lihat Detail" data-idf="<?php echo $c->idForum ?>"><i class="fa fa-eye"></i></button></a>
                    <a href="<?php echo base_url().'C_Admin/delForum/'.$c->idForum ?>">
                    <button class="btnDel btn btn-danger" title="Non-Aktifkan" data-idf="<?php echo $c->idForum ?>"><i class="fa fa-times"></i></button></a>
                    </td>
                  </tr>
                  <?php $no++; } ?>
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
