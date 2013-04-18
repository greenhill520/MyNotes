$(document).ready(function(){
	$("#adminLi").load("adminLi.php",{type:"main",page:0,method:"view"},proListen);
	$("#title").addClass("selected");
	$("#title").live("click",getMain);
	$("#topic").live("click",getTopic);
	$("#note").live("click",getNote);
	$("#comment").live("click",getComment);
	$("#group").live("click",getGroup);
	$("#user").live("click",getUser);
	$(".edEle a").live("click",getDetail);
	$("#add").live("click",add);
	
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
	$("#add").live( "click",add);
	$(".bottom a").live("click", function(event){
		$("#adminLi").load("adminLi.php",{type:$('.selected').attr('id'),page: $(this).attr('title'),method:"view"});
	});
}

function getMain(event) {
	$("#pro").show();
	$(".selected").removeClass("selected");
	$(this).addClass("selected");
	$("#adminLi").load("adminLi.php",{type:"main",page:0});
	return false;
}

function getTopic(event) {
	$("#pro").show();
	$(".selected").removeClass("selected");
	$(this).addClass("selected");
	$("#adminLi").load("adminLi.php",{type:"topic",page:0}
	);
	return false;
}

function getNote(event) {
	$("#pro").show();
	$(".selected").removeClass("selected");
	$(this).addClass("selected");
	$("#adminLi").load("adminLi.php",{type:"note",page:0});
	return false;
}

function getComment(event) {
	$("#pro").show();
	$(this).addClass("selected");
	$(".selected").removeClass("selected");
	$(this).addClass("selected");
	$("#adminLi").load("adminLi.php",{type:"comment",page:0});
	return false;
}

function getGroup(event) {
	$("#pro").show();
	$(".selected").removeClass("selected");
	$(this).addClass("selected");
	$("#adminLi").load("adminLi.php",{type:"group",page:0});
	return false;
}

function getUser(event) {
	$("#pro").show();
	$(".selected").removeClass("selected");
	$(this).addClass("selected");
	$("#adminLi").load("adminLi.php",{type:"user",page:0});
	return false;
}

function getDetail(event) {
	$("#pro").hide();
	var objid = $(this).attr('title');
	var objTy = $(".selected").attr('id');
	$("#adminLi").load("view.php",{type:objTy, id:objid},function(event){
		$("#edbt").live("click", edit);
		$("#bkbt").live("click",{place:"adminiLi.php"},back);
		$("#rmbt").live("click",function(event){
			$("#adminLi").load("adminLi.php",{type:objTy,method:"removeOne",id:objid},function(){
		   		$("#adminLi").before("<span id='removePrompt'>删除成功！</span>");
				setTimeout("$('#removePrompt').remove();",2000);
				});
		});
	});
		
	return false;	
}
/**
 * add a to-do
 * @param {Event} event
 */
function add(event) {
	$("#adminLi").load("add.php",{type: $(".selected").attr('id')},
	function(){
		$("#edbt").hide();
		$("#rmbt").hide();
   });
} // addToDo

/**
 * add a to-do
 * @param {Event} event
 */
function remove(event) {
	var eleRem=" ";
  $(":checked").each(function(box) { 
	eleRem += $(this).next("a").attr('title').toString();
	eleRem += " ";
  });
	$("#adminLi").load("adminLi.php",{type: $(".selected").attr('id'),page:0,rms:eleRem,method:"remove"},
   function(){
   		$("#adminLi").before("<span id='removePrompt'>删除成功！</span>");
		setTimeout("$('#removePrompt').remove();",2000);
   });
} // remove

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

function edit(event) {
	$("#adminLi").load("edit.php",{type:$(".selected").attr('id'),id:$('#content').attr('title')},
	function(){
		$("#edbt").hide();
		$("#rmbt").live("click",function(event){
			$("#adminLi").load("adminLi.php",{type:objTy,method:"removeOne",id:objid},function(){
		   		$("#adminLi").before("<span id='removePrompt'>删除成功！</span>");
				setTimeout("$('#removePrompt').remove();",2000);
				});
		});	
		$("#bkbt").live("click",function(event){
			$("#adminLi").load("view.php",{type:objTy,id:objid} );
			});
		}
		);
}
function back(event) {
	$("#adminLi").load("view.php",{
		type: $(".selected").attr('id'),
		id: $('form').attr('id')},function(){
		$("#edbt").show();
		$("#rmbt").live("click",remove);
		$(".value").show();
		$(".edit").hide();
		$(".imgUp").hide();		
		});
}
