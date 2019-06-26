<section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3>Kelola Quiz</h3>
              <hr/>
              <button class="btn btn-primary btn-flat" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Latihan Baru</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Author</th>
                    <th>Tanggal Post</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no = 1;
                  foreach($listLatihan->result() as $c) {
                    if($c->Flag == 1){
                      $Status = 'Aktif';
                    }else{
                      $Status ='Tidak Aktif';
                    };
                   ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $c->Nama ?></td>
                    <td><?php echo $c->Kategori ?></td>
                    <td><?php echo $c->Author ?></td>
                    <td><?php echo $c->TglPost ?></td>
                    <td><?php echo $Status ?></td>
                    <td>
                      <button class="btnEdit btn btn-success" title="Edit" data-idf="<?php echo $c->idSoal ?>" ><i class="fa fa-edit"></i></button> 
                    <a href="<?php echo base_url().'C_Admin/viewQuiz/'.$c->idSoal ?>">
                    <button class="btnView btn btn-primary" title="Lihat Detail" data-idf="<?php echo $c->idSoal ?>"><i class="fa fa-eye"></i></button></a>
                    <a href="<?php echo base_url().'C_Admin/delQuiz/'.$c->idSoal ?>">
                    <button class="btnDel btn btn-danger" id="btnDel" title="Non-Aktifkan" data-idf="<?php echo $c->idSoal ?>"><i class="fa fa-times"></i></button></a>
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

    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Latihan Baru</h4>
      </div>
      <span class="form-horizontal">
      <div class="modal-body">
      <form method="post">
                <div class="form-group">
                  <label class="col-sm-2 pull-left" style="padding-top: 0">Nama Latihan</label>
                  <div class="col-sm-10">
                    <input class="form-control" name="Nama" type="text" required="">
                  </div>
                </div>

                <div class="form-group">      
                  <label class="col-sm-2 pull-left" style="padding-top: 0">Kategori</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="Kategori">
                      <option>Searching Algorithm</option>
                      <option>Sorting Algorithm</option>
                      <option>Classification Algorithm</option>
                      <option>Clustering Algorithm</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 pull-left" style="padding-top: 0">Jum Poin</label>
                  <div class="col-sm-10">
                    <input class="form-control" max="100" min="0" name="Poin" type="Number" required="">
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 pull-left" style="padding-top: 0">Waktu Pengerjaan (Menit)</label>
                  <div class="col-sm-10">
                    <input class="form-control" max="100" min="0" name="Waktu" type="Number" required="">
                  </div>
                </div>
      </div>
      </span>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit" formaction="<?php echo base_url().'C_Latihan/tambahQuiz' ?>">Tambah</button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script src="<?php echo base_url() ?>plugins/jQuery/jquery-2.2.3.min.js"></script>