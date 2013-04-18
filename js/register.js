window.onload = function(){
	document.getElementById("login_name").onfocus = a("prompt1");
	document.getElementById("login_name").onblur = b("prompt1");
	document.getElementById("user_name").onfocus = a("prompt2");
	document.getElementById("user_name").onblur = b("prompt2");
	document.getElementById("password").onfocus = a("prompt3");
	document.getElementById("password").onblur = b("prompt3");
}
function a(x){
	return function(){
		document.getElementById(x).style.display = "inline";
		document.getElementById(x).style.fontSize = "12px";
	}
};

function b(x){
	return function(){
		document.getElementById(x).style.display = "none";
	}
}