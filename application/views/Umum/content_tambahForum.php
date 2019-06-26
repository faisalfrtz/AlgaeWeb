<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Buat Forum Baru
              </h3>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <form method="post">
            <div class="box-body">
              <div class="form-group">
                <label>Nama Forum :</label>
                <input type="text" class="form-control" name="Nama" required>
              </div>
              <div class="form-group" id="formTipe">
                <label>Tipe Forum :</label>
                <select id="pilTipe" class="form-control" name="Tipe">
                  <option>Question and Answer</option>
                  <option>Tips and Trick</option>
                  <option value="Custom">Custom</option>
                </select>
              </div>
              <div class="form-group">
                <label>Kategori Algoritma :</label>
                <select class="form-control" name="Kategori">
                  <option>Basic Algorithm</option>
                  <option>Advance Algorithm</option>
                  <option>Searching Algorithm</option>
                  <option>Sorting Algorithm</option>
                  <option>Classification Algorithm</option>
                  <option>Clustering Algorithm</option>
                </select>
              </div>
            </div>
            <div class="box-body pad">
            <label>Isi Forum :</label>
                    <textarea id="editor1" name="isi" rows="10" cols="80">
                                    
                    </textarea>
            </div>
            <div class="box-footer">
              <span class="pull-right">
                <button type="submit" formaction="<?php echo base_url().'C_Forum/tambahForum' ?>" class="btn btn-success">Selesai</button>
              </span>
            </div>
            </form>
          </div>
    </div>
      </div>
    </section>

<script src="<?php echo base_url() ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
  $(function () {
    CKEDITOR.replace('editor1');
  });
</script>
<script type="text/javascript">
var hasChanged = 0;
  $("#pilTipe").change(function(event){
      event.preventDefault();
      var tipe = $(this).find('option:selected').val();
      if(tipe == 'Custom' && hasChanged == 0){
        text = '<input type="text" placeholder="Ketikan tipe forum custom disini" class="form-control" name="CustomTipe" id="CustomTipe" style="margin-top:10px" required>';
        $('#formTipe').append(text);
        hasChanged = 1;
      }
      else{
        $('#CustomTipe').remove();
        hasChanged = 0;
      }
  });

</script>