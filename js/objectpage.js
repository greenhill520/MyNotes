var showornot = 1;
var hasvoted = 1;
var xmlHttp;

$(document).ready(function(){
  $("#moreabstact").click(function(){
  $("#hideabstruct").slideToggle();
  if(showornot == 1){
  	$("#moreabstact").attr("src","./images/shownull.png");
	showornot = 0;
  }else{
  	$("#moreabstact").attr("src","./images/showall.png");
	showornot = 1;
  }
  
  });
  
  $("#morenotes").click(function(){
  $("#hidenotes").slideDown();
  });
  
  $("#morecomments").click(function(){
  $("#hidecomments").slideDown();
  });
  
  $(".text_vote1").mouseover(function(){
	$(".text_vote1").css("background","url('./images/vote.png')");
  });
  
  $(".text_vote1").mouseout(function(){
  $(".text_vote1").css("background","url('./images/notvote.png')");
  });
  
  $("#note,#note2").click(function(){
  $("#writenote").slideToggle();
  });
  
  $("#comment,#comment2").click(function(){
  $("#writecomment").slideToggle();
  });
  
  $("#label").click(function(){
  $("#writelabel").slideToggle();
  });
});

function showHint(str1,str2){

	if(hasvoted == 1){
		$score = $("#votes").text();
		$("#votes").text(parseInt($score)+1);
		$("#vote_txt").text("已投票");
		
		xmlHttp=GetXmlHttpObject();
		if (xmlHttp==null){
			alert ("Browser does not support HTTP Request");
			return;
		}
			var url="votepost.php";
			url=url+"?score="+(parseInt(str1)+1);
			url=url+"&id="+str2;
			xmlHttp.open("GET",url,true);
			xmlHttp.send(null);
	}
	hasvoted = 0;
}

function GetXmlHttpObject()	{
	var xmlHttp=null;
	try	{
		// Firefox, Opera 8.0+, Safari
		xmlHttp=new XMLHttpRequest();
	}
	catch (e){
	// Internet Explorer
		try	{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e){
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}

