<section class="content">
    <div class="row">

      <div class="col-md-3">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
              <div class="widget-user-image">
                <img class="img-circle" src="<?php echo base_url() ?>images/code2Logo.png" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">What is Algorithm ?</h3>
              <h5 class="widget-user-desc small">Pembahasan khusus mengenai algortima</h5>
              <a href="<?php echo base_url().'General/listMateri/'?>"><button type="button" class="widget-user-desc btn btn-primary" style="padding-right: 5px; margin-left: 73px;">Mulai Belajar <span class="badge" style="margin-left: 15px;"><i class="fa fa-angle-double-right"></i></span></button></a> 
            </div>
          </div>
          <!-- /.widget-user -->
      </div>

      <div class="col-md-3">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="<?php echo base_url() ?>images/search.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Searching Algorithm</h3>
              <h5 class="widget-user-desc small">Algoritma khusus pencarian</h5>
              <a href="<?php echo base_url().'General/listMateri/Search'?>">
              <button type="button" class="widget-user-desc btn btn-primary" style="padding-right: 5px; margin-left: 73px;">Mulai Belajar <span class="badge" style="margin-left: 15px;"><i class="fa fa-angle-double-right"></i></span></button></a>
            </div>
          </div>
          <!-- /.widget-user -->
      </div>

      <div class="col-md-3">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-green">
              <div class="widget-user-image">
                <img class="img-circle" src="<?php echo base_url() ?>images/sort.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Sorting Algorithm</h3>
              <h5 class="widget-user-desc small">Algoritma khusus pengurutan</h5>
              <a href="<?php echo base_url().'General/listMateri/Sort'?>">
              <button type="button" class="widget-user-desc btn btn-primary" style="padding-right: 5px; margin-left: 73px;">Mulai Belajar <span class="badge" style="margin-left: 15px;"><i class="fa fa-angle-double-right"></i></span></button></a>
            </div>
          </div>
          <!-- /.widget-user -->
      </div>

      <div class="col-md-3">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-red">
              <div class="widget-user-image">
                <img class="img-circle" src="<?php echo base_url() ?>images/cluster3.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Clustering Algorithm</h3>
              <h5 class="widget-user-desc small">Algoritma khusus klustering</h5>
              <a href="<?php echo base_url().'General/listMateri/Clust'?>">
              <button type="button" class="widget-user-desc btn btn-primary" style="padding-right: 5px; margin-left: 73px;">Mulai Belajar <span class="badge" style="margin-left: 15px;"><i class="fa fa-angle-double-right"></i></span></button></a>
            </div>
          </div>
          <!-- /.widget-user -->
      </div>
  </div>
  <div class="row">
    <div class="col-md-7">
        <div class="box box-solid box-primary">
            <div class="box-header bg-blue">
              <h3 class="box-title"><i class="fa fa-star" aria-hidden="true"></i>&nbsp; Favorite's Algorithm</h3>
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <ul class="nav nav-pills nav-stacked">
              <?php foreach($listMateri->result() as $c) { ?>
                <li><a href="<?php echo base_url().'General/learnAlgo/'.$c->idMateri ?>"><?php echo $c->Nama ?>
                  <span class="pull-right">
                    <span class="text-green">(<?php echo $c->JumView ?> views)</span>
                  </span>
                  <br/><span class="text-blue">by: 
                  <?php 
                    $userTemp = new User();
                    $r = $userTemp->getUser($c->Author);
                    echo $userTemp->getNama();
                  ?>    
                    </span>
                  </a>
                </li>
              <?php } ?>

                <li><a href="<?php echo base_url().'General/listMateri' ?>" class="text-blue" style="text-align: center">More Result <span class="fa fa-angle-double-right"></span></a>
                </li>
              </ul>
            </div>
            <!-- /.footer -->
          </div>

          <!-- /.nav-tabs-custom -->
        <div class="box box-solid box-success">
            <div class="box-header bg-green">
              <h3 class="box-title"><i class="fa fa-fire" aria-hidden="true"></i>&nbsp; Hot Forum's Thread</h3>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-pills nav-stacked">

              <?php foreach($listForum->result() as $c){ ?>
                <li><a href="<?php echo base_url().'General/viewForum/'.$c->idForum ?>">[<?php echo $c->Tipe ?>] <?php echo $c->Nama ?>
                  <span class="pull-right">
                     <?php $j = 0; while($j < 5) {?>
                       <?php if($j < $c->Rate) { ?>
                         <span class="fa fa-star checked"></span>
                       <?php }else{ ?>
                         <span class="fa fa-star"></span>
                     <?php } $j++; }?>
                   </span>
                  <br/><span class="text-green">by: 
                  <?php 
                    $userTemp = new User();
                    $r = $userTemp->getUser($c->Author);
                    echo $userTemp->getNama(); 
                  ?>
                  </span>
                  <span class="pull-right" style="color: #8a8a8a "><?php echo $c->TglPost ?></span>
                  </a>
                </li>
              <?php } ?>

                <li><a href="<?php echo base_url().'General/listForum' ?>" class="text-blue" style="text-align: center">More Result <span class="fa fa-angle-double-right"></span></a>
                </li>
              </ul>
            </div>
            <!-- /.footer -->
          </div>
    </div>
    <div class="col-md-5">

          <!-- DIRECT CHAT PRIMARY -->
          <div class="box box-solid box-primary direct-chat direct-chat-primary">
            <div class="box-header bg-blue">
              <h3 class="box-title"><i class="fa fa-comment" aria-hidden="true"></i>&nbsp; Chat</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <ul class="direct-chat-messages class" id="received" style="height:400px" >
                
              </ul>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <form action="#" method="post">
                <div class="input-group">
                  <?php if(!isset($user)) { ?>
                  <input name="name" id="nickname" value="Anonymous" placeholder="Your Nickname ..." class="form-control"  type="text">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-random"></i></button>
                      </span>
                  <?php }else{ ?>
                  <input name="name" id="nickname" value="<?php echo $user->getNama() ?>" class="form-control"  type="text" disabled>
                  <span class="input-group-btn">
                      <button disabled class="btn btn-success btn-flat"><i class="fa fa-random"></i></button>
                  </span>
                  <?php } ?>
                </div>
                <br/>
                <div class="input-group">
                  <input name="message" id="message" placeholder="Type Message ..." class="form-control" type="text">
                      <span class="input-group-btn">
                        <button type="submit" id="submit" class="btn btn-primary btn-flat">Send</button>
                      </span>
                </div>
              </form>
            </div>
            <!-- /.box-footer-->
          </div>
          <!--/.direct-chat -->
    </div>
  </div>
    </section>

     <script src="<?php echo base_url() ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<script>
$('document').ready(function(){
  $('#message').keypress(function (e) {
    if (e.which == 13) {
      e.preventDefault();
      $('#submit').trigger('click');
    }
  });
});

var request_timestamp = 0;
 
var setCookie = function(key, value) {
  var expires = new Date();
  expires.setTime(expires.getTime() + (5 * 60 * 1000));
  document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
}
 
var getCookie = function(key) {
  var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
  return keyValue ? keyValue[2] : null;
}
 
var guid = function() {
  function s4() {
    return Math.floor((1 + Math.random()) * 0x10000).toString(16).substring(1);
  }
  return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();
}
 
if(getCookie('user_guid') == null || typeof(getCookie('user_guid')) == 'undefined'){
  var user_guid = guid();
  setCookie('user_guid', user_guid);
}
 
 
// https://gist.github.com/kmaida/6045266
var parseTimestamp = function(timestamp) {
  var d = new Date( timestamp * 1000 ), // milliseconds
    yyyy = d.getFullYear(),
    mm = ('0' + (d.getMonth() + 1)).slice(-2),  // Months are zero based. Add leading 0.
    dd = ('0' + d.getDate()).slice(-2),     // Add leading 0.
    hh = d.getHours(),
    h = hh,
    min = ('0' + d.getMinutes()).slice(-2),   // Add leading 0.
    ampm = 'AM',
    timeString;
      
  if (hh > 12) {
    h = hh - 12;
    ampm = 'PM';
  } else if (hh === 12) {
    h = 12;
    ampm = 'PM';
  } else if (hh == 0) {
    h = 12;
  }
 
  timeString = yyyy + '-' + mm + '-' + dd + ', ' + h + ':' + min + ' ' + ampm;
    
  return timeString;
}

var sendChat = function (message, callback) {
  $.getJSON('<?php echo base_url(); ?>api/send_message?message=' + message + '&nickname=' + $('#nickname').val() + '&guid=' + getCookie('user_guid'), function (data){
    callback();
  });
}
 
var append_chat_data = function (chat_data) {
  chat_data.forEach(function (data) {
    var is_me = data.guid == getCookie('user_guid');
    if(is_me){

      var html = `<!-- Message to the right -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right">`+data.nickname+`</span>
                    <span class="direct-chat-timestamp pull-left">`+parseTimestamp(data.timestamp)+`</span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="<?php echo base_url() ?>dist/img/anon.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    `+data.message+`
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->`;
    }else{
      var html = `<!-- Message. Default to the left -->
                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">`+data.nickname+`</span>
                    <span class="direct-chat-timestamp pull-right">`+parseTimestamp(data.timestamp)+`</span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="<?php echo base_url() ?>dist/img/avatar.png" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    `+data.message+`
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->`;
    $('#received').animate({ scrollTop: $('#received').height()}, 1000);
    }
    $("#received").html( $("#received").html() + html);
  });
  
}
 
var update_chats = function () {
  if(typeof(request_timestamp) == 'undefined' || request_timestamp == 0){
    var offset = 60*15; // 15min
    request_timestamp = parseInt( Date.now() / 1000 - offset );
  }
  $.getJSON('<?php echo base_url(); ?>api/get_messages?timestamp=' + request_timestamp, function (data){
    append_chat_data(data); 
 
    var newIndex = data.length-1;
    if(typeof(data[newIndex]) != 'undefined'){
      request_timestamp = data[newIndex].timestamp;
    }
  });      
}

$('#submit').click(function (e) {
  e.preventDefault();
  
  var $field = $('#message');
  var data = $field.val();
 
  $field.addClass('disabled').attr('disabled', 'disabled');
  sendChat(data, function (){
    $field.val('').removeClass('disabled').removeAttr('disabled');
  });

  $('#received').animate({ scrollTop: $('#received').height()}, 1000);
});
 

 
setInterval(function (){
  update_chats();
}, 1500);
</script>
