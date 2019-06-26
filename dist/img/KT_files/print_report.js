$(document).ready(function(){
	$("body").css('background', 'none');
	$(".user_account_wrapper").remove();
	$(".settings_wrapper").remove();
	$(".notifications_wrapper").remove();
	$(".feedbacks_wrapper").remove();
	$("#location").remove();
	$("#header").remove();
	$("#pagenav").remove();
	$("#footer").remove();
	$(".LeftContent").remove();
	$("#hideMenu").remove();
	$(".RightContent").css("width","100%");
	$(".RightContent").css("border","none");
	
	//metro ui
	$(".metro #left-content").remove();
	$(".metro #right-content").removeClass("span95");
	$(".metro #right-content").css("width","100%");
	$(".metro .location").remove();
	$("header").remove();
	print();			
	
});