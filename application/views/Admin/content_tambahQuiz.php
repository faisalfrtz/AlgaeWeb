<section class="content">
      <div class="row">
        <div class="col-md-12">
        <div class="box box-solid box-primary">
            <div class="box-header bg-blue">
              <h3 class="box-title">Tambah Latihan</h3>
            </div>
            <!-- /.box-body -->
            <div class="box-body">
              <div class="box box-widget">
                <div class="box-header with-border">
                  <div class="user-block">
                    <img class="img-circle" src="<?php echo base_url().'images/'.$detailQuiz->Pict ?>" alt="User Image" style="width: 60px;height: 60px;margin-right: 10px">
                    <span class="username">
                      <?php echo $detailQuiz->Nama ?>
                    </span>
                    <span class="description">
                      <span class="label label-success"><?php echo $detailQuiz->Kategori ?></span>
                    </span>
                  </div>
                </div>
                <!-- /.box-header -->
                <form method="post" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                  <label class="col-sm-2 pull-left" style="padding-top: 0">Tambah Soal</label>
                  <div class="col-sm-1">
                    <input class="form-control" id="stepper" max="100" min="0" type="Number" value="1" >
                  </div>
                  <div class="col-sm-7">
                    <button class="btn btn-success" id="addSlideBtn" ><i class="fa fa-plus"></i></button>
                  </div>
                  <div class="col-sm-2">
                    <label>Jumlah Soal</label>
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
                            <label for="comment">Soal :</label>
                            <textarea class="form-control" rows="3" name="soal1" ></textarea>
                          </div>
                          <span class="form-horizontal"> 
                          <div class="form-group">      
                            <label class="col-sm-2 pull-left" style="padding-top: 0">Pilihan Jawaban</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                  <label><input type="radio" value="A" checked name="opt1"><input type="text" name="A1" class="form-control" style="padding-right: 280px" placeholder="Pilihan Jawaban A"></label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" value="B" name="opt1"><input type="text" name="B1" class="form-control" style="padding-right: 280px" placeholder="Pilihan Jawaban B"></label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" value="C" name="opt1"><input type="text" name="C1" class="form-control" style="padding-right: 280px" placeholder="Pilihan Jawaban C"></label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" value="D" name="opt1"><input type="text" name="D1" class="form-control" style="padding-right: 280px" placeholder="Pilihan Jawaban D"></label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" value="E" name="opt1"><input type="text" name="E1" class="form-control" style="padding-right: 280px" placeholder="Pilihan Jawaban E"></label>
                                </div>
                            </div>
                          </div>
                          </span>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                  <span class="pull-right">
                      <button type="submit" formaction="<?php echo base_url().'C_Latihan/tambahDaftarSoal/'.$detailQuiz->idSoal ?>" class="btn btn-success">Selesai</button>
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
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
  $(function () {
    CKEDITOR.replace('soal1');
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
                            <label for="comment">Soal:</label>
                            <textarea class="form-control" rows="3" name="soal`+currNum+`" ></textarea>
                          </div>
                          <span class="form-horizontal"> 
                          <div class="form-group">      
                            <label class="col-sm-2 pull-left" style="padding-top: 0">Pilihan Jawaban</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                  <label><input type="radio" value="A" checked name="opt`+currNum+`"><input type="text" name="A`+currNum+`" class="form-control" style="padding-right: 280px" placeholder="Pilihan Jawaban A"></label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" value="B" name="opt`+currNum+`"><input type="text" name="B`+currNum+`" class="form-control" style="padding-right: 280px" placeholder="Pilihan Jawaban B"></label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" value="C" name="opt`+currNum+`"><input type="text" name="C`+currNum+`" class="form-control" style="padding-right: 280px" placeholder="Pilihan Jawaban C"></label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" value="D" name="opt`+currNum+`"><input type="text" name="D`+currNum+`" class="form-control" style="padding-right: 280px" placeholder="Pilihan Jawaban D"></label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" value="E" name="opt`+currNum+`"><input type="text" name="E`+currNum+`" class="form-control" style="padding-right: 280px" placeholder="Pilihan Jawaban E"></label>
                                </div>
                            </div>
                          </div>
                          </span> 
                    </div>`;
        $("#bodyRow").append(text);
        ck('soal'+currNum);
        i++;
      }
      $('#currNum').val(currNum);
  });

  function ck(id){
    CKEDITOR.replace(id);
  }

</script>

