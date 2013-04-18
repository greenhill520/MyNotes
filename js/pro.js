var usrId,isMe,isFri,myId;

$().ready(function(){
	var person = $('#userHead').attr('title');
	if (person.substring(0,1)=="o"){
		usrId = person.substring(1,person.length);
		if (usrId.substring(usrId.length-1,usrId.length) == "f") {
			usrId = usrId.substring(0,usrId.length-1);
			isFri = true;
		}
		else {
			var myIds = usrId.split("u");
			usrId = myIds[0];
			myId = myIds[1];
			isFri = false;
			$("#note").hide();
		}
		isMe = false;
	} 
	else {
		usrId = person;
		isMe = true;
	}

	init();
	
	$("#homeTab").live("click",getHome);	
	$("#note").live("click",getNote);
	$("#comment").live("click",getComment);
	$("#group").live("click",getGroup);
	$("#friend").live("click",getFriend);
});

function init() {	
	$(".selected").removeClass("selected");
	$("#homeTab").addClass("selected");
	$("#content").load("proMessage.php", {method:"main",id:usrId,isme:isMe}, function(){
		if (!isMe) { 
			$("#edInfo").hide();
			$("#edPass").hide();		
		}		
		else {
			$("#addFri").hide();
		}
		if (!isMe && isFri){
			$("#addFri").hide();
		}
	});
	

	$("#edInfo").live("click", function(event){
		$("#myMess").load("proMessage.php", {
			pro: "editInfo",
			id: usrId,
			method:"editInfo"
		},function(){
			$(".editLi").remove();
		});
		return false;
	});
	$("#edPass").live("click", function(event){
		$("#myMess").load("proMessage.php", {
			pro: "changePass",
			id: usrId,
			method:"changePass"
		}, function(){
			$(".editLi").remove();
		});
		return false;
	});
	$("#addFri").live("click", function(event){
		$("#myMess").load("proMessage.php", {
			pro: "addFri",id: usrId, mId:myId,method:"main"},function(){
				$(".editLi").remove();
				$("#note").show();
			});
		return false;
	});
	
	$(".bottom a").live("click", function(event){
		$("#content").load("myFocus.php", {
			method: $('.selected').attr('id'),
			id: usrId,
			page: $(this).attr('title'),
			type: $('.selected').attr('id'),
			isme: isMe
		});
	});
		
}
function getHome(event) {
	init();
	return false;
}

function getNote(event) {
	$(".selected").removeClass("selected");
	$(this).addClass("selected");
	$("#content").load("myFocus.php",{
		method: 'note',
		id: usrId,
		page: 0,
		type: 'note',
		isme: isMe
	}) ;	
	return false;
}

function getComment(event) {
	$(this).addClass("selected");
	$(".selected").removeClass("selected");
	$(this).addClass("selected");
	$("#content").load("myFocus.php",{
		method: 'comment',
		id: usrId,
		page: 0,
		type: 'comment',
		isme: isMe
	});	
	return false;
}

function getGroup(event) {
	$(".selected").removeClass("selected");
	$(this).addClass("selected");
	$("#content").load("myFocus.php",{
		method: 'group',
		id: usrId,
		page: 0,
		type: 'group',
		isme: isMe
	});	
	return false;
}

function getFriend(event) {
	$(".selected").removeClass("selected");
	$(this).addClass("selected");
	$("#content").load("myFocus.php",{
		method: 'friend',
		id: usrId,
		page: 0,
		type: 'user',
		isme: isMe
	}) ;	
	return false;	
}
