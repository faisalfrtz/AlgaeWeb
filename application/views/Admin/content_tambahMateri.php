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
                    <img class="img-circle" src="<?php echo base_url().'images/'.$detailMateri->Pict ?>" alt="User Image" style="width: 60px;height: 60px;margin-right: 10px">
                    <span class="username">
                      <?php echo $detailMateri->Nama ?>
                    </span>
                    <span class="description">
                      <span class="label label-success"><?php echo $detailMateri->Kategori ?></span>
                    </span>
                  </div>
                </div>
                <!-- /.box-header -->
                <form method="post" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                  <label class="col-sm-2 pull-left" style="padding-top: 0">Tambah Slide</label>
                  <div class="col-sm-1">
                    <input class="form-control" id="stepper" max="100" min="0" type="Number" value="1" >
                  </div>
                  <div class="col-sm-7">
                    <button class="btn btn-success" id="addSlideBtn" ><i class="fa fa-plus"></i></button>
                  </div>
                  <div class="col-sm-2">
                    <label>Jumlah Slide</label>
                    <input readonly="" class="form-control" name="currNum" id="currNum" max="100" min="0" type="Number" value="1" >
                  </div>
                </div>
                <hr/>
                  <div class="row" id="bodyRow">
                    <div class="col-md-1">
                      <h4>1.</h4>
                    </div>
                    <div class="col-md-11">
                        <div class="form-group">
                          <label>Pilih File</label>
                          <input type="file" name="gambar1" accept="image/*">
                          <p class="help-block">Maks. 4MB dan ekstensi : image extension only</p>
                        </div>
                         <div class="form-group">
                            <label for="comment">Deskripsi Step:</label>
                            <textarea class="form-control" rows="3" name="step1" ></textarea>
                          </div> 
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                  <span class="pull-right">
                      <button type="submit" formaction="<?php echo base_url().'C_Materi/tambahSlide/'.$detailMateri->idMateri ?>" class="btn btn-success">Selesai</button>
                  </span>                  
                </div>
                </form>
              </div>
           </div>
            <!-- /.footer -->
          </div>
    </div>
      </div>
    </section>
<script src="<?php echo base_url() ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
<style type="text/css">
  @keyframes bounce {
    0%, 20%, 60%, 100% {
      -webkit-transform: translateY(0);
      transform: translateY(0);
    }

    40% {
      -webkit-transform: translateY(-20px);
      transform: translateY(-20px);
    }

    80% {
      -webkit-transform: translateY(-10px);
      transform: translateY(-10px);
    }
  }
  .btnStep:hover {
    color: #18ce7a;
    animation: bounce 0.8s;
  }
</style>
<script>
var currNum = 1;

  $('#addSlideBtn').click(function(event){
     event.preventDefault();
      var jumSlide = $('#stepper').val();
      var i = 0;
      while(i < jumSlide){
        currNum++;
        text = `<div class="col-md-1">
                      <h4>`+currNum+`.</h4>
                    </div>
                    <div class="col-md-11">
                        <div class="form-group">
                          <label>Pilih File</label>
                          <input type="file" name="gambar`+currNum+`" accept="image/*">
                          <p class="help-block">Maks. 4MB dan ekstensi : image extension only</p>
                        </div>
                         <div class="form-group">
                            <label for="comment">Deskripsi Step:</label>
                            <textarea class="form-control" rows="3" name="step`+currNum+`" ></textarea>
                          </div> 
                    </div>`;
        $("#bodyRow").append(text);
        i++;
      }
      $('#currNum').val(currNum);
  })

</script>

