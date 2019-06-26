<section class="content">
      <div class="row">
        <div class="col-md-12">
        <div class="box box-solid box-primary">
            <div class="box-header bg-blue">
              <h3 class="box-title">List All Quiz/Latihan</h3>
            </div>
            <!-- /.box-body -->
            <div class="box-body">
              <form action="#" method="post">
                <div class="form-group">
                  <label>Pilih Kategori Quiz</label>
                  <select class="form-control" name="pilKategori" id="pilKategori">
                    <option <?php echo $all ?> >All/Semua</option>
                    <option <?php echo $search ?> >Searching Algorithm</option>
                    <option <?php echo $sort ?> >Sorting Algorithm</option>
                    <option <?php echo $class ?> >Classification Algorithm</option>
                    <option <?php echo $clust ?> >Clustering Algorithm</option>
                    <option <?php echo $custom ?> >Custom</option>
                  </select>
                </div> 
                <div class="input-group searchform">
                <input type="searchform" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                      <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                      </button>
                    </span>
              </div>
              </form>
           </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-pills nav-stacked" id="bodyList" >
              </ul>
              <div style="text-align: center;">
                  <ul class="pagination">
                    <li class="active"><a href="#">1</a></li>
                    <li class=""><a href="#">2</a></li>
                  </ul> 
              </div>
            </div>
            <!-- /.footer -->
          </div>
    </div>
      </div>
    </section>

<script src="<?php echo base_url() ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
  setTimeout(function() {
        $("#pilKategori").trigger('change');
    },0);
</script>
<script>

     $("#pilKategori").change(function(event){
      event.preventDefault();
      var kategori = $(this).find('option:selected').val();
       $("#bodyList").empty();
      $.ajax({
        url:"<?php echo base_url().'C_Latihan/getDataListQuizBy/' ?>"+kategori,
        type:"GET",
        success: function(data){
          var dt = $.parseJSON(data);
          if(dt.temp == null){
            var text = `<li>
                    <div class="user-block" style="text-align: center">
                      <h4>Data Tidak Ditemukan :(</h4>
                    </div>
                </li>`;
              $("#bodyList").append(text);
          }
          else{
            var i = 0;
            while(i < dt.temp.length){
              var text = `<li>
                  <a href="<?php echo base_url().'General/doQuiz/' ?>`+dt.temp[i].idSoal+`">
                    <div class="user-block">
                      <img class="img-circle" src="<?php echo base_url() ?>images/sort.jpg" alt="User Image">
                      <span class="username">`+dt.temp[i].Nama+`
                        <span class="label label-success pull-right">`+dt.temp[i].Poin+` Poin</span>
                      </span>
                      <span class="description" style="color: #444 ">Author : `+dt.userTemp[i].Nama+`</span>
                      <span class="description" style="color: #444 ">Jumlah Soal : `+dt.jumSoal[i]+`</span>
                      <span class="description" style="color: #444 ">Waktu : `+dt.temp[i].Waktu +` Menit</span>
                      <span class="description" style="color: #444 ">Kategori : 
                        <span class="label label-success">`+dt.temp[i].Kategori+`</span>
                      </span>
                    </div>
                  </a>
                </li>`;
              $("#bodyList").append(text);
              i++;
            }
          }
        },
        error: function(){
          alert('error');
        }
      })
    });

</script>