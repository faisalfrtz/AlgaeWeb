    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <div class="box box-solid box-primary">
            <div class="box-header bg-blue">
              <h3 class="box-title">Latihan</h3>
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
                    <div class="col-md-12">
                        <span class="pull-right">
                          <div class="box box-header bg-blue" style="text-align: center;">
                              Sisa Waktu :<br>
                              <span style="font-size: 18px;" id="time"><?php echo $Soal->Waktu.':00' ?></span>
                          </div>
                        </span>
                      </div>
                      <?php 
                      $no = 1;
                      $noCur = 1;
                      $jumSoal = $daftarSoal->num_rows();
                      foreach($daftarSoal->result() as $c) {
                      ?>
                      <?php 
                        if($no != 1) {
                          $display = 'display : none';
                        }else{
                          $display = null;
                        }
                         ?>
                      <div class="col-md-6 <?php echo 'No'.$no ?>" style="<?php echo $display ?>;">
                        <h4>No. <?php echo $no ?> dari <?php echo $jumSoal ?></h4>
                      </div>
                      <div class="col-md-12 <?php echo 'No'.$no ?>" style="<?php echo $display ?>;">
                          <p style="text-align: justify;">
                            <?php echo $c->Isi ?>
                          </p>
                          <?php if($c->Gambar != null) { ?>
                          <img class="img-responsive pad imgQz" src="<?php echo base_url().$c->Gambar ?>" alt="Photo" style="width: 500px;">
                          <?php } ?>
                      </div>
                      <form method="post">
                      <div class="col-md-12 <?php echo 'No'.$no ?>" style="<?php echo $display ?>;">
                        <div class="radio">
                          <label><input type="radio" value="A" required name="<?php echo 'jwb'.$no ?>"><?php echo $c->A ?></label>
                        </div>
                        <div class="radio">
                          <label><input type="radio" value="B" required name="<?php echo 'jwb'.$no ?>"><?php echo $c->B ?></label>
                        </div>
                        <div class="radio">
                          <label><input type="radio" value="C" required name="<?php echo 'jwb'.$no ?>"><?php echo $c->C ?></label>
                        </div>
                        <div class="radio">
                          <label><input type="radio" value="D" required name="<?php echo 'jwb'.$no ?>"><?php echo $c->D ?></label>
                        </div>
                        <div class="radio">
                          <label><input type="radio" value="E" required name="<?php echo 'jwb'.$no ?>"><?php echo $c->E ?></label>
                        </div>
                      </div>
                      <?php $no++; }?>
                      <div class="col-md-12">
                        <span class="pull-left">
                          <div class="btn btn-warning" id="next">Next</div>
                        </span>
                          <span class="pull-right">
                            <button type="submit" formaction="<?php echo base_url().'C_Latihan/lihatNilai/'.$Soal->idSoal.'/'.$jumSoal ?>" class="btn btn-success btn-lg" id="fin" style="display: none;">Finish</button>
                          </span>
                      </div>
                    </form>
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
<script type="text/javascript">
var noCur = <?php echo $noCur ?>;
var jumSoal = <?php echo $jumSoal ?>;
  


  $("#next").click(function(event){
      event.preventDefault();
      var jwb = 'input[name=jwb'+noCur+']';
      if($(jwb).is(':checked')){
        var No = '.No'+noCur;
        $(No).hide();
        noCur++;

        if(noCur == jumSoal){
          $('#next').hide();
          $('#fin').show();
        }
        No = '.No'+noCur;
        $(No).show();
      }else{
        alert('Tolong pilih jawaban terlebih dahulu :)');
      }
  });

</script>
<script type="text/javascript">
  function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }

        if(minutes == '00' && seconds == '00'){
          alert('Waktu Habis');
          window.location.href = "<?php echo base_url().'C_Latihan/lihatNilai/'.$Soal->idSoal.'/'.$jumSoal ?>";
        } 

    }, 1000);
}

window.onload = function () {
    var Minutes = 60 * <?php echo $Soal->Waktu ?>,
        display = document.querySelector('#time');
    startTimer(Minutes, display);
};
</script>