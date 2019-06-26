    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <div class="box box-solid box-primary">
            <div class="box-header bg-blue">
              <h3 class="box-title">Dept First Search Algorithm</h3>
            </div>
            <!-- /.box-body -->
            <div class="box-body">
              <div class="box box-widget">
                <div class="box-header with-border">
                  <div class="user-block">
                    <img class="img-circle" src="<?php echo base_url().'images/'.$Soal->Pict ?>" alt="User Image" style="width: 60px;height: 60px;margin-right: 10px">
                    <span class="username">
                      <?php echo $Soal->Nama ?>
                    </span>
                    <span class="description">
                      <span class="label label-success"><?php echo $Soal->Kategori ?></span>
                    </span>
                    <span class="description">Author : <?php echo $Author->getNama() ?></span>
                    <span class="description">Submitted by <?php echo $Soal->SubmitBy ?>, on <?php echo $Soal->TglPost ?></span>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12" style="text-align: center">
                    <?php if(isset($hasil)){?>
                      <h2>Score: <?php echo $hasil ?></h2>
                      <?php if($hasil <= 100 && $hasil >= 80){ ?>
                        <h2>Sempurna, Tingkatkan asah terus kemampuan kamu :) </h2>
                        
                      <?php }elseif($hasil < 80 && $hasil >= 40){ ?>
                        <h2>Lumayan, Tingkatkan kembali :) </h2>
                        <button class="btn btn-lg btn-success" onclick="goBack()"> Coba Kembali ? </button>

                      <?php }else{ ?>
                        <h2>Kurang, Tidak apa-apa :( Tingkatkan kembali !</h2>
                        <button onclick="goBack()" class="btn btn-lg btn-success"> Coba Kembali ? </button>
                      <?php } ?>

                    <?php }else{?>
                      <h2>Anda Belum melaksanakan Quiz :( </h2>
                    <?php } ?>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                </div>

              </div>
           </div>
            <!-- /.footer -->
          </div>
    </div>
      </div>
    </section>

<script src="<?php echo base_url() ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<script>
function goBack() {
    window.history.back();
}
</script>
