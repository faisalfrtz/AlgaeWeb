<section class="content">
      <div class="row">
        <div class="col-md-12">
        <div class="box box-solid box-primary">
            <div class="box-header bg-blue">
              <h3 class="box-title">List Searching Algorithm</h3>
            </div>
            <!-- /.box-body -->
            <div class="box-body">
              <form action="#" method="post">
                <div class="form-group">
                  <label>Pilih Kategori Pembelajaran Algoritma</label>
                  <select class="form-control" name="pilKategori" id="pilKategori">
                    <option <?php echo $all ?> >All/Semua</option>
                    <option <?php echo $search ?> >Searching Algorithm</option>
                    <option <?php echo $sort ?> >Sorting Algorithm</option>
                    <option <?php echo $class ?> >Classification Algorithm</option>
                    <option <?php echo $clust ?> >Clustering Algorithm</option>
                  </select>
                </div> 
                <div class="input-group searchform">
                <input type="searchform" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                      <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                      </button>
                    </span>
              </div>
              </form>
           </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-pills nav-stacked" id="bodyList">
              </ul>
              <div>
                <div style="text-align: center;">
                  <ul class="pagination">
                    <li class="active"><a href="#">1</a></li>
                    <li class=""><a href="#">2</a></li>
                  </ul> 
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
        url:"<?php echo base_url().'C_Materi/getDataListMateriBy/' ?>"+kategori,
        type:"GET",
        success: function(data){
          var dt = $.parseJSON(data);
          if(dt.list == null){
            var text = `<li>
                    <div class="user-block" style="text-align: center">
                      <h4>Data Tidak Ditemukan :(</h4>
                    </div>
                </li>`;
              $("#bodyList").append(text);
          }
          else{
            var i = 0;
            while(i < dt.list.length){
              var text = `<li>
                  <a href="<?php echo base_url().'General/learnAlgo/' ?>`+dt.list[i].idMateri+`">
                    <div class="user-block">
                      <img class="img-circle" src="<?php echo base_url() ?>images/sort.jpg" alt="User Image">
                      <span class="username">`+dt.list[i].Nama+`</span>
                      <span class="pull-right" >
                      <span class="label label-success">Poin : `+dt.list[i].Poin+`</span>
                      </span>
                      <span class="description">Author : `+dt.listUser[i].Nama+`</span>
                      <span class="description">Kategori : 
                        <span class="label label-success">`+dt.list[i].Kategori+`</span>
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
/*        complete: function(){
          $('#load').hide();             
        }*/
      })
    });

</script>