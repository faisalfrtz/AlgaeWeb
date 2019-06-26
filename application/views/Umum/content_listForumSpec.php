<section class="content">
      <div class="row">
        <div class="col-md-12">
        <div class="box box-solid box-primary">
            <div class="box-header bg-blue">
              <h3 class="box-title">List Thread</h3>
            </div>
            <!-- /.box-body -->
            <div class="box-body">
              <form action="#" method="post">
                <div class="form-group">
                  <label>Pilih Kategori Forum</label>
                  <select class="form-control" name="pilKategori" id="pilKategori">
                    <option value="All" <?php echo $all ?> >All/Semua Forum Thread</option>
                    <option <?php echo $tt ?> >Tips and Trick</option>
                    <option <?php echo $qa ?> >Question and Answer</option>
                    <option <?php echo $cf ?> >Custom Forum</option>
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
    },1);
</script>
<script>

     $("#pilKategori").change(function(event){
      event.preventDefault();
      var kategori = $(this).find('option:selected').val();
       $("#bodyList").empty();
      $.ajax({
        url:"<?php echo base_url().'C_Forum/getDataListForumBy/' ?>"+kategori,
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
              var rate = dt.list[i].Rate;
              var k = 1;
              var txtRate = "";
              while(k <= 5){
                if(k <= rate){
                  txtRate = txtRate + `<span class="fa fa-star checked"></span>`;
                }
                else{
                  txtRate = txtRate + `<span class="fa fa-star"></span>`;
                }
                k++;
              }
              var text = `<li><a href="<?php echo base_url().'General/viewForum/' ?>`+dt.list[i].idForum+`">[`+dt.list[i].Tipe+`] `+dt.list[i].Nama+`
                        <span class="pull-right">
                          `+txtRate+`
                        </span>
                        <br/><span class="text-green">by: `+dt.listUser[i].Nama+`</span>
                        <span class="pull-right" style="color: #8a8a8a ">`+dt.list[i].TglPost+`</span>
                        <br/>
                        <span class="description" style="color: grey">kategori : 
                          <span class="label label-success">`+dt.list[i].Kategori+`</span>
                        </span>
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