
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <a href="<?php echo base_url().'General/tambahForum' ?>">
          <button type="button" class="fa fa-plus btn btn-flat btn-success" style="padding-top: 4px;padding-bottom: 4px;padding-right: 20px;margin-right:7px;margin-top:15px;"> Buat Forum Baru</button>
          </a>
          <form class="navbar-form navbar-right" role="search">
             <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari...">
                    <span class="input-group-btn">
                      <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                      </button>
                    </span>
              </div>
          </form>
          <hr/>
        </div>
        <div class="col-md-12">
           <div class="box box-solid box-primary">
                  <div class="box-header">
                    <h3 class="box-title">All Forum Thread</h3>
                  </div>
                  <div class="box-footer no-padding">
                    <ul class="nav nav-pills nav-stacked">
                    <?php if(count($listAll) != 0) { ?>  
                      <?php $i = 0; while($i < count($listAll) ){ ?>
                        <li><a href="<?php echo base_url().'General/viewForum/'.$listAll[$i]['idForum'] ?>">[<?php echo $listAll[$i]['Tipe'] ?>] <?php echo $listAll[$i]['Nama']?>
                          <span class="pull-right">
                            <?php $j = 0; while($j < 5) {?>
                              <?php if($j < $listAll[$i]['Rate']) { ?>
                                <span class="fa fa-star checked"></span>
                              <?php }else{ ?>
                                <span class="fa fa-star"></span>
                            <?php } $j++; }?>
                          </span>
                          <br/><span class="text-green">by: <?php echo $listAllUser[$i]->getNama() ?> </span>
                          <span class="pull-right" style="color: #8a8a8a "> <?php echo $listAll[$i]['TglPost']?> </span>
                          <br/>
                          <span class="description" style="color: grey">kategori : 
                            <span class="label label-success"><?php echo $listAll[$i]['Kategori'] ?></span>
                          </span>
                          </a>
                        </li>
                      <?php $i++; } ?>
                    <?php }else{ ?>
                      <li style="text-align: center"> Data Masih Kosong :( </li>
                    <?php } ?>
                      <li>
                        <a href="<?php echo base_url().'General/listForumSpec' ?>" class="text-blue" style="text-align: center">More Result <span class="fa fa-angle-double-right"></span></a>
                      </li>
                    </ul>
                  </div>
                  <!-- /.footer -->
                </div>
            </div>
          <div class="col-md-12">
           <div class="box box-solid box-success">
                  <div class="box-header">
                    <h3 class="box-title">Tips and Trick</h3>
                  </div>
                  <div class="box-footer no-padding">
                    <ul class="nav nav-pills nav-stacked">
                      <?php if(count($listTT) != 0) { ?>  
                      <?php $i = 0; while($i < count($listTT) ){ ?>
                        <li><a href="<?php echo base_url().'General/viewForum/'.$listTT[$i]['idForum'] ?>">[<?php echo $listTT[$i]['Tipe'] ?>] <?php echo $listTT[$i]['Nama']?>
                          <span class="pull-right">
                            <?php $j = 0; while($j < 5) {?>
                              <?php if($j < $listTT[$i]['Rate']) { ?>
                                <span class="fa fa-star checked"></span>
                              <?php }else{ ?>
                                <span class="fa fa-star"></span>
                            <?php } $j++; }?>
                          </span>
                          <br/><span class="text-green">by: <?php echo $listTTUser[$i]->getNama() ?> </span>
                          <span class="pull-right" style="color: #8a8a8a "> <?php echo $listTT[$i]['TglPost']?> </span>
                          <br/>
                          <span class="description" style="color: grey">kategori : 
                            <span class="label label-success"><?php echo $listTT[$i]['Kategori'] ?></span>
                          </span>
                          </a>
                        </li>
                      <?php $i++; } ?>
                    <?php }else{ ?>
                      <li style="text-align: center"> Data Masih Kosong :( </li>
                    <?php } ?>
                      <li>
                        <a href="<?php echo base_url().'General/listForumSpec/TT' ?>" class="text-blue" style="text-align: center">More Result <span class="fa fa-angle-double-right"></span></a>
                      </li>
                    </ul>
                  </div>
                  <!-- /.footer -->
                </div>
            </div>
            <div class="col-md-12">
             <div class="box box-solid box-success">
                    <div class="box-header">
                      <h3 class="box-title">Question and Answer</h3>
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-pills nav-stacked">
                       <?php if(count($listQA) != 0) { ?>  
                        <?php $i = 0; while($i < count($listQA) ){ ?>
                          <li><a href="<?php echo base_url().'General/viewForum/'.$listQA[$i]['idForum'] ?>">[<?php echo $listQA[$i]['Tipe'] ?>] <?php echo $listQA[$i]['Nama']?>
                            <span class="pull-right">
                              <?php $j = 0; while($j < 5) {?>
                                <?php if($j < $listQA[$i]['Rate']) { ?>
                                  <span class="fa fa-star checked"></span>
                                <?php }else{ ?>
                                  <span class="fa fa-star"></span>
                              <?php } $j++; }?>
                            </span>
                            <br/><span class="text-green">by: <?php echo $listQAUser[$i]->getNama() ?> </span>
                            <span class="pull-right" style="color: #8a8a8a "> <?php echo $listQA[$i]['TglPost']?> </span>
                            <br/>
                            <span class="description" style="color: grey">kategori : 
                              <span class="label label-success"><?php echo $listQA[$i]['Kategori'] ?></span>
                            </span>
                            </a>
                          </li>
                        <?php $i++; } ?>
                      <?php }else{ ?>
                        <li style="text-align: center"> Data Masih Kosong :( </li>
                      <?php } ?>
                        <li>
                          <a href="<?php echo base_url().'General/listForumSpec/QA' ?>" class="text-blue" style="text-align: center">More Result <span class="fa fa-angle-double-right"></span></a>
                        </li>
                      </ul>
                    </div>
                    <!-- /.footer -->
                  </div>
            </div>
            <div class="col-md-12">
             <div class="box box-solid box-default">
                    <div class="box-header">
                      <h3 class="box-title">Custom Forum</h3>
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-pills nav-stacked">
                        <?php if(count($listCF) != 0) { ?>  
                        <?php $i = 0; while($i < count($listCF) ){ ?>
                          <li><a href="<?php echo base_url().'General/viewForum/'.$listCF[$i]['idForum'] ?>">[<?php echo $listCF[$i]['Tipe'] ?>] <?php echo $listCF[$i]['Nama']?>
                            <span class="pull-right">
                              <?php $j = 0; while($j < 5) {?>
                                <?php if($j < $listCF[$i]['Rate']) { ?>
                                  <span class="fa fa-star checked"></span>
                                <?php }else{ ?>
                                  <span class="fa fa-star"></span>
                              <?php } $j++; }?>
                            </span>
                            <br/><span class="text-green">by: <?php echo $listCFUser[$i]->getNama() ?> </span>
                            <span class="pull-right" style="color: #8a8a8a "> <?php echo $listCF[$i]['TglPost']?> </span>
                            <br/>
                            <span class="description" style="color: grey">kategori : 
                              <span class="label label-success"><?php echo $listCF[$i]['Kategori'] ?></span>
                            </span>
                            </a>
                          </li>
                        <?php $i++; } ?>
                      <?php }else{ ?>
                        <li style="text-align: center"> Data Masih Kosong :( </li>
                      <?php } ?>
                        <li>
                          <a href="<?php echo base_url().'General/listForumSpec/All' ?>" class="text-blue" style="text-align: center">More Result <span class="fa fa-angle-double-right"></span></a>
                        </li>
                      </ul>
                    </div>
                    <!-- /.footer -->
                  </div>
            </div>
        </div>
    </div>
  </section>