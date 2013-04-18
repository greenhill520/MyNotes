var gid;
$(document).ready(function(){
	gid = $('#all').attr('title');
	$("#adminLi").load("gAdminLi.php",{type:"main",page:0,method:"view",id:gid},proListen);
	$('#title').live("click",getMain);
	$("#note").live("click",getNote);
	$("#user").live("click",getUser);
	$("#infoEdit").live("click",infoEdit);
 }
);	

function proListen () {
	$("#select").live( "click",function(event){
		if (document.getElementById("select").checked == true ) {
			toggleAll(true);
		}
		else {
			toggleAll(false);
		}
	});
	$("#remove").live( "click",remove);
	$(".delete img").live("click",removeOne);
	$(".bottom a").live("click", function(event){
		$("#adminLi").load("gAdminLi.php",{type:$('.selected').attr('id'),
		page: $(this).attr('title'),method:"view",id:$('#all').attr('title')});
	});
}

function getMain(event) {
	$(".selected").removeClass("selected");
	$(this).addClass("selected");
	$("#adminLi").load("gAdminLi.php",{type:"main",page:0,id:gid});
	return false;
}


function getNote(event) {
	$("#pro").show();
	$(".selected").removeClass("selected");
	$(this).addClass("selected");
	$("#adminLi").load("gAdminLi.php",{type:"note",page:0,id:gid});
	return false;
}

function getUser(event) {
	$("#pro").show();
	$(".selected").removeClass("selected");
	$(this).addClass("selected");
	$("#adminLi").load("gAdminLi.php",{type:"user",page:0,id:gid});
	
	return false;	
}

function remove(event) {
	var eleRem=" ";
  $(":checked").each(function() { 
	eleRem += $(this).attr('title').toString();
	eleRem += " ";
  });
	$("#adminLi").load("gAdminLi.php",{type: $(".selected").attr('id'),page:0,rms:eleRem
	,id:gid,method:"remove"}, function(){
   		$("#adminLi").before("<span id='removePrompt'>删除成功</span>");
		setTimeout("$('#removePrompt').remove();",2000);
   });
} // remove

function removeOne(event) {
	$("#adminLi").load("gAdminLi.php",{type: $(".selected").attr('id'),page:0,
	id:gid,method:"removeOne",rmele:$(this).attr('id')}, function(){
   		$("#adminLi").before("<span id='removePrompt'>删除成功</span>");
		setTimeout("$('#removePrompt').remove();",2000);
   });
}
/**
 * toggle check all to-do
 * @param {boolean} doSelect
 */
function toggleAll(state) {
	$(':checkbox').each(function(box) {
		if (box < $(':checkbox').length - 1) {
			document.getElementById(box).checked = state;
		}
	});
}

function infoEdit(event) {
	$(".selected").removeClass("selected");
	$(this).addClass("selected");
	$("#adminLi").load("infoEdit.php",{id:gid},function(event){
		$("#submit").live("click",function(){
			$("#adminLi").load("gAdminLi.php",{type:"main",page:0,
			id:gid,method:"infoEdit",info:$('textarea').val()});
		});
	});
}

