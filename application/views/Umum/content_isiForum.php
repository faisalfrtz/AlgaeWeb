<section class="content">
      <div class="row">
        <div class="col-md-12">
         <div class="box box-solid box-success">
                <div class="box-header bg-green">
                  <h3 class="box-title">Forum Diskusi</h3>
                </div>
                <div class="box-body">
                    <h3 style="margin-top:3px;">[<?php echo $Forum->Tipe ?>] <?php echo $Forum->Nama ?>
                    </h3>
                    <span class="pull-right">
                      <span class="dropdown">
                          <button class="btn btn-warning" type="button" data-toggle="dropdown"><i class="fa fa-star"></i> Rate
                          <span class="caret"></span></button>
                          <ul class="dropdown-menu">
                            <li><a href="" class="rateStar" ><span class="text-muted">
                              <span class="fa fa-star checked"></span>
                            </span></a></li>
                            <li><a href="" class="rateStar" ><span class="text-muted">
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                            </span></a></li>
                            <li><a href="" class="rateStar" ><span class="text-muted">
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                            </span></a></li>
                            <li><a href="" class="rateStar" ><span class="text-muted">
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                            </span></a></li>
                            <li><a href="" class="rateStar" ><span class="text-muted">
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                            </span></a></li>
                          </ul>
                      </span>
                      <button class="btn btn-primary"><i class="fa fa-share"></i> Share</button>
                    </span>
                    <p class="text-muted">posted on <?php echo $Forum->TglPost ?>
                      <span class="label label-success"><?php echo $Forum->Kategori ?></span>
                    </p>
                    <p class="text-muted">
                      <?php 
                      $k = 1;
                      while($k <= 5){
                        if($k <= $Forum->Rate){
                          echo '<span class="fa fa-star checked"></span>';
                        }
                        else{
                          echo '<span class="fa fa-star"></span>';
                        }
                        $k++;
                      }
                      ?>
                      based on <?php echo $Forum->JumRate ?> user's rating
                    </p>
                    <?php 
                    if(isset($userRate)) { ?>
                      <p class="text-muted">
                        <span class="label label-primary" id="userRateTxt">
                          You've been rate this thread with <?php echo $userRate ?> <span class="fa fa-star checked"></span>
                        </span>
                      </p>
                    <?php }elseif(isset($userNotRate)) { ?>
                      <p class="text-muted">
                        <span class="label label-danger" id="userRateTxt">
                          You've not been rate this thread</span>
                        </span>
                      </p>
                    <?php } ?>
                    <hr/>
                    <div class="row">
                      <div class="col-md-2" style="text-align: center;">
                        <div>
                          <img class="img-circle" style="width:90px;height: 90px;" src="<?php echo base_url().$Author->getPict() ?>" alt="User Avatar">
                        </div><hr style="margin-top: 10px;margin-bottom: 10px;" />
                        <div style="margin-left: 10px;">
                          <p class="text-muted">Author: <?php echo $Author->getNama() ?>  
                          </p>
                          <span>
                            <span class="label label-primary">Lv. <?php echo $Author->getLevel() ?></span>
                            <span class="label label-success"><?php echo $Author->getTitle() ?></span>
                          </span>
                          <hr/>
                        </div>
                      </div>
                      <div class="col-md-10">
                        <div class="pull-left" style="margin-top: 10px;">
                        <p style="text-align: justify;"><?php echo $Forum->Isi ?>
                         </p>
                         <hr/>
                         <?php if($Forum->Lampiran != null) { ?>
                         <h4>Lampiran</h4>
                         <img class="img-responsive pad" src="<?php echo base_url().$Forum->Lampiran ?>" alt="Photo" style="width: 80%">
                         <?php } ?>
                     </div>
                    </div>
                  </div>
                </div>
                <!-- /.footer -->
              </div>
        </div>
        <div class="col-md-12">
          <h3 style="margin-top: 0px;">Kolom Komentar (<?php echo count($listKomen)?> Komentar)</h3>
        </div>
        <!-- KOMENTAR -->
        <?php 
        $i = 0;
        while($i < count($listKomen)){
        ?>
        <div class="col-md-12">
          <!-- Box Comment -->
          <div class="box box-solid box-primary">
            <!-- /.box-header -->
            <div class="box-body">
            <?php 
            $value = $listKomen[$i]['Value'];
            $colorV = 'blue';
            if($value > 0){
              $value = '+'.$value;
              $colorV = 'green';
            }
            elseif($value < 0){
              $colorV = 'red';
            }
            ?>
            <p class="pull-right valueTxt" style="margin-right: 20px;margin-top: 9px;font-size: 20px;font-weight: bold;color: <?php echo $colorV ?>;"><?php echo $value ?></p>
              <div class="user-block">
                <img class="img-circle" src="<?php echo base_url().$listUserKomen[$i]->getPict() ?>" alt="User Image">
                <span class="username"><a href="#"><?php echo $listUserKomen[$i]->getNama() ?></a></span>
                <span class="description">
                  <span class="label label-primary">Lv. <?php echo $listUserKomen[$i]->getLevel() ?></span>
                  <span class="label label-success"><?php echo $listUserKomen[$i]->getTitle() ?></span>
                </span>
                <span class="description">Comment on <?php echo $listKomen[$i]['TglKomen'] ?></span>
                
              </div>

              <hr/>
              <!-- post text -->
              <p style="text-align: justify;"><?php echo $listKomen[$i]['Isi'] ?></p>

              <!-- Social sharing buttons -->
              <?php if(isset($user)) { ?>
              <span class="pull-right">
                <button type="button" class="btn btn-primary btn-xs" onclick="like(1,'<?php echo $user->getEmail() ?>',`<?php echo $listKomen[$i]['idKomentar'] ?>`,`<?php echo $listKomen[$i]['Value'] ?>`,event,<?php echo $i ?>)"><i class="fa fa-thumbs-up"></i> Like</button>
                <button type="button" class="btn btn-danger btn-xs" onclick="like(-1,'<?php echo $user->getEmail() ?>',`<?php echo $listKomen[$i]['idKomentar'] ?>`,`<?php echo $listKomen[$i]['Value'] ?>`,event,<?php echo $i ?>)"><i class="fa fa-thumbs-down"></i> Dislike</button>
                <button type="button" title="Report" class="btn btn-danger btn-xs"><i class="fa fa-flag"></i></button>
              </span>
              <?php }?>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <?php $i++; } $curJumK = $i;?>

        <div style="text-align: center;" id="paginate">
          <ul class="pagination">
            <li class="active"><a href="#">1</a></li>
            <li class=""><a href="#">2</a></li>
          </ul> 
        </div>

        <?php if(isset($user)){ ?>
        <div class="col-md-12" > 
          <div class="box box-solid box-success">
            <div class="box-body">
              <div class="row">
                <div class="col-md-1" style="text-align: center;">
                  <img class="img-circle" src="<?php echo base_url().$user->getPict() ?>" style="width:80px;height: 80px;" alt="User Image">
                </div>
                <div class="col-md-11">
                  <div class="form-group">
                    <label>Beri Komentar</label>
                    <textarea class="form-control" id="userKomen" rows="3" placeholder="Ketik Disini..." style="max-width: 100%"></textarea>
                  </div>
                  <button class="btn btn-primary pull-right" id="giveComment" >Submit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php }else{ ?>
        <div class="col-md-12"> 
          <div class="box box-solid box-success">
            <div class="box-body">
              <div class="row">
                <div class="col-md-11">
                  <div class="form-group">
                    <label style="text-align: center">
                    Anda tidak bisa memberikan komentar :( Login/Daftar untuk bisa memberi komentar</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>

  <script src="<?php echo base_url() ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
  <?php if(isset($user)) { ?>
  <script>
     $(".rateStar").click(function(event){
      event.preventDefault();
      var rate = $('.rateStar').index(this) + 1 ;
      $.ajax({
        url:"<?php echo base_url().'C_Forum/rateForum/'.$Forum->idForum.'/'.$user->getEmail().'/' ?>"+rate,
        type:"GET",
        success: function(data){
          var dt = $.parseJSON(data);
          text = `You've been rate this thread with `+rate+` <span class="fa fa-star checked"></span>`;
          $('#userRateTxt').html(text);
          alert('Terima Kasih sudah memberi rating terhadap thread ini :)');
        },
        error: function(){
          alert('error');
        }
      })
    });

     function like(value,email,idKomentar,curValue,event,i){
      event.preventDefault();
      $.ajax({
        url:"<?php echo base_url().'C_Forum/giveLikeComm/' ?>"+value+'/'+email+'/'+idKomentar+'/'+curValue,
        type:"GET",
        success: function(data){
          var dt = $.parseJSON(data);
          if(dt.cek == true){
            newValue = parseInt(curValue)+parseInt(value);
            $('.valueTxt').eq(i).text(newValue);
            if(newValue > 0){
              $('.valueTxt').eq(i).css("color","green");
            }
            else{
              $('.valueTxt').eq(i).css("color","red");
            }
          }
          else{
            alert('Anda sudah memberikan Like/Dislike');
          }
        },
        error: function(){
          alert('error');
        }
      });
     };

     $("#giveComment").click(function(event){
      event.preventDefault();
      var isi = $('#userKomen').val();
      $.ajax({
        url:"<?php echo base_url().'C_Forum/giveComment/'.$Forum->idForum.'/'.$user->getEmail().'/' ?>"+isi,
        type:"GET",
        success: function(data){
          var dt = $.parseJSON(data);
          var textS = `
          <div class="col-md-12">
            <!-- Box Comment -->
            <div class="box box-solid box-primary">
              <!-- /.box-header -->
              <div class="box-body">
              <p class="pull-right" style="margin-right: 20px;margin-top: 9px;font-size: 20px;font-weight: bold;color: green;">`+dt.komen.Value+`</p>
                <div class="user-block">
                  <img class="img-circle" src="<?php echo base_url().$user->getPict() ?>" alt="User Image">
                  <span class="username"><a href="#"><?php echo $user->getNama() ?></a></span>
                  <span class="description">
                    <span class="label label-primary">Lv. <?php echo $user->getLevel() ?></span>
                    <span class="label label-success"><?php echo $user->getTitle() ?></span>
                  </span>
                  <span class="description">Comment on `+dt.komen.TglKomen+`</span>
                  
                </div>

                <hr/>
                <!-- post text -->
                <p style="text-align: justify;">`+dt.komen.Isi+`</p>

                <!-- Social sharing buttons -->

                <span class="pull-right">
                <button type="button" class="btn btn-primary btn-xs" onclick="like(1,<?php echo $user->getEmail() ?>,`+dt.komen.idKomentar+`,0,event,<?php $curJumK++; echo $curJumK ?> )" ><i class="fa fa-thumbs-up"></i> Like</button>
                <button type="button" class="btn btn-danger btn-xs" onclick="like(-1,<?php echo $user->getEmail() ?>,`+dt.komen.idKomentar+`,0,event,<?php $curJumK++; echo $curJumK ?> )" ><i class="fa fa-thumbs-down"></i> Dislike</button>
                <button type="button" title="Report" class="btn btn-danger btn-xs"><i class="fa fa-flag"></i></button>
              </span>

              </div>
              <!-- /.box-footer -->
            </div>
            <!-- /.box -->
          </div>`;
          $("#paginate").before(textS);
        },
        error: function(){
          alert('error');
        }
      })
    });

</script>
<?php } ?>