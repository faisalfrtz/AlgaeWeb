<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Chat-Example | CodeIgniter</title>
	
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
 
		
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	
	<!-- http://bootsnipp.com/snippets/4jXW -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chat.css" />
	  <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url() ?>plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url() ?><?php echo base_url() ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url() ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/additional.css">
	
	
	<script type="text/javascript">	  
		$( document ).ready ( function () {
			
			$('#nickname').keyup(function() {
				var nickname = $(this).val();
				
				if(nickname == ''){
					$('#msg_block').hide();
				}else{
					$('#msg_block').show();
				}
			});
			
			// initial nickname check
			$('#nickname').trigger('keyup');
		});
		
		
	</script>
	<script>
	$('#msg_block').show();
	</script>
 
</head>
<body>
 
 
<!--  
<div class="container">
    <div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<span class="glyphicon glyphicon-comment"></span> Chat
			</div>
			<div class="panel-body">
				<ul class="chat direct-chat-messages" id="receivedss">
					
				</ul>
			</div>
			<div class="panel-footer">
				<div class="clearfix">
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon">
								Nickname:
							</span>
							<input id="nickname" type="text" class="form-control input-sm" placeholder="Nickname..." />
						</div>
					</div>
					<div class="col-md-9" id="msg_block">
						<div class="input-group">
							<input id="messagess" type="text" class="form-control input-sm" placeholder="Type your message here..." />
							<span class="input-group-btn">
								<button class="btn btn-warning btn-sm" id="submitsss">Send</button>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</div> -->

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
                  <input name="name" id="nickname" value="Anonymous" placeholder="Your Nickname ..." class="form-control"  type="text">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-random"></i></button>
                      </span>
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
 <script src="<?php echo base_url() ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url() ?>bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url() ?>plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<!-- <script src="<?php // echo base_url() ?>sparkline/jquery.sparkline.min.js"></script> -->
<!-- jvectormap -->
<script src="<?php echo base_url() ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url() ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>dist/js/app.min.js"></script>
<script>
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
		mm = ('0' + (d.getMonth() + 1)).slice(-2),	// Months are zero based. Add leading 0.
		dd = ('0' + d.getDate()).slice(-2),			// Add leading 0.
		hh = d.getHours(),
		h = hh,
		min = ('0' + d.getMinutes()).slice(-2),		// Add leading 0.
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
		var name = $('#nickname').val();
		if(is_me){

			var html = `<!-- Message to the right -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right">`+name+`</span>
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
		}
		$("#received").html( $("#received").html() + html);
/*		$('#received').animate({ scrollTop: $('#received').height()}, 1000);*/
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
});
 
$('#message').keyup(function (e) {
	if (e.which == 13) {
		$('#submit').trigger('click');
	}
});
 
setInterval(function (){
	update_chats();
}, 1500);
</script>
 
</body>
</html>