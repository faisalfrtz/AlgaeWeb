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
                    <img class="img-circle" src="<?php echo base_url() ?>images/search.jpg" alt="User Image" style="width: 60px;height: 60px;margin-right: 10px">
                    <span class="username">
                      <a href="#"><?php echo $materi->getNama() ?></a>
                      <span class="pull-right">
                        <i class="fa fa-bar-chart"></i> <?php echo $materi->getJumView() ?> view(s)
                      </span>
                    </span>
                    <span class="description">
                      <span class="label label-success"><?php echo $materi->getKategori() ?></span>
                    </span>
                    <span class="description">Submit by <?php echo $materi->getSubmitBy() ?></span>
                    <span class="description">Posted on <?php echo $materi->getTglPost() ?></span>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-1" style="margin-top: 17%">
                      <a id="prev" style="color: #504e4e;display: none;">
                        <i class="fa fa-caret-left btnStep" style="font-size: 15em" aria-hidden="true"></i>
                      </a>
                    </div>
                    <div class="col-md-10">
                      <img class="img-responsive pad imgMt" src="<?php echo base_url() ?>images/materi/<?php echo $idMateri.'/'.$bag[0]['Gambar'] ?>" alt="Photo">
                    </div>
                    <div class="col-md-1" style="margin-top: 17%">
                      <a id="next" style="color: #504e4e">
                        <i class="fa fa-caret-right btnStep" style="font-size: 15em" aria-hidden="true"></i>
                      </a>
                    </div>
                    <div class="col-md-12">
                      <p style="font-size: 17px;text-align: justify;" id="deskripsiMateri"><?php $j=0; echo $bag[$j]['Deskripsi'] ?></p>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
                

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
var i = 0;
var stop = false;
var bagLength = <?php echo count($bag)?>;
//$j indicator deskripsiMateri
var j = 0;
var k = 0;

var deskBag = [
<?php 
while($j < count($bag)){ ?>
  "<?php echo $bag[$j]['Deskripsi'] ?>",
<?php
  $j++;
}
?>
];

var gbrBag = [
<?php 
$k = 0;
while($k < count($bag)){ ?>
  "<?php echo $bag[$k]['Gambar'] ?>",
<?php
  $k++;
}
?>
];

$("#prev").hide();

  $(document).on('click', "#next",function(event){
      event.preventDefault();
      if(stop != true){
        i++;
        j++;
        $(".imgMt").prop("src","<?php echo base_url() ?>images/materi/<?php echo $idMateri ?>/"+gbrBag[i]);
        $("#deskripsiMateri").text(deskBag[j]);
        $("#prev").show();
        if(i == bagLength-1){
          stop = true;
          $("#next").hide();
        }
      }
    })

  $(document).on('click', "#prev",function(event){
      event.preventDefault();
      if(i != 1){
        i--;
        j--;
        $(".imgMt").prop("src","<?php echo base_url() ?>images/materi/<?php echo $idMateri ?>/"+gbrBag[i]);
        $("#deskripsiMateri").text(deskBag[j]);
        stop = false;
        $("#next").show();
      }
      else{
        i--;
        j--;
        $(".imgMt").prop("src","<?php echo base_url() ?>images/materi/<?php echo $idMateri ?>/"+gbrBag[i]);
        $("#deskripsiMateri").text(deskBag[j]);
        stop = false;
        $("#prev").hide();
        $("#next").show();
      }
    })

  function search(ele) {
    if(event.key === 'Enter') {
        alert(ele.value);        
    }
  }
</script>

