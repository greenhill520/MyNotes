var g_bMoveLeft=true;
var g_oTimer=null;
var g_oTimerOut=null;

var g_iSpeed=1;
var page_no = 1;
var curr_book=1;
var currentOpacity = 0;
window.onload=function ()
{
	document.getElementById("p1").onclick = f1;
	document.getElementById("p2").onclick = f2;
	document.getElementById("goright").onclick = f3;
	document.getElementById("goleft").onclick = f4;
	v1= document.getElementById("v1");
	v2= document.getElementById("v2");
	v3= document.getElementById("v3");
	v4= document.getElementById("v4");
	
	var oDiv=document.getElementById('roll');
	var oUl=oDiv.getElementsByTagName('ul')[0];
	var aLi=oUl.getElementsByTagName('li');
	var aA=oDiv.getElementsByTagName('a');
	
	var i=0;
	
	var str=oUl.innerHTML+oUl.innerHTML;
	
	oUl.innerHTML=str;
	
	oUl.style.width=aLi[0].offsetWidth*aLi.length+'px';
	
	for(i=0;i<aLi.length;i++)
	{
		aLi[i].onmouseover=function ()
		{
			stopMove();
		};
		
		aLi[i].onmouseout=function ()
		{
			startMove(g_bMoveLeft);
		};
	}
	
	aA[0].onmouseover=function ()
	{
		startMove(true);
	};
	
	aA[1].onmouseover=function ()
	{
		startMove(false);
	};
	
	startMove(true);
};
function f1(){
	page_no++;
	if(page_no == 5) page_no = 1;
	if(page_no == 0) page_no = 4;
	display(page_no);
}
function f2(){
	page_no--;
	if(page_no == 5) page_no = 1;
	if(page_no == 0) page_no = 4;
	display(page_no);
}
function display(no){
	reset();
	if(no == 1) {v1.style.display="inline";fadeIn(v1);}
	if(no == 2) {v2.style.display="inline";fadeIn(v2);}
	if(no == 3) {v3.style.display="inline";fadeIn(v3);}
	if(no == 4) {v4.style.display="inline";fadeIn(v4);}
}
function reset(){
	v1.style.display="none";
	v2.style.display="none";
	v3.style.display="none";
	v4.style.display="none";
}
function f3(){
	if(curr_book == 1){
	document.getElementById("book1").style.left ="-750px";
	document.getElementById("book1").style.position="absolute";
	document.getElementById("book2").style.left ="0px";
	document.getElementById("book2").style.position="relative";
	fadeIn(document.getElementById("book2"));
	}
	if(curr_book ==2){
	document.getElementById("book2").style.left ="-750px";
	document.getElementById("book2").style.position="absolute";
	document.getElementById("book3").style.left ="0px";
	document.getElementById("book3").style.position="relative";
	fadeIn(document.getElementById("book3"));
	}
	if(curr_book==3){
	document.getElementById("book3").style.left ="-750px";
	document.getElementById("book3").style.position="absolute";
	document.getElementById("book1").style.left ="0px";
	document.getElementById("book1").style.position="relative";
	fadeIn(document.getElementById("book1"));
	}
	curr_book++;
	if(curr_book == 4) curr_book=1;
}
function f4(){
	if(curr_book == 1){
	document.getElementById("book1").style.left ="-750px";
	document.getElementById("book1").style.position="absolute";
	document.getElementById("book3").style.left ="0px";
	document.getElementById("book3").style.position="relative";
	fadeIn(document.getElementById("book3"));
	}
	if(curr_book ==2){
	document.getElementById("book2").style.left ="-750px";
	document.getElementById("book2").style.position="absolute";
	document.getElementById("book1").style.left ="0px";
	document.getElementById("book1").style.position="relative";
	fadeIn(document.getElementById("book1"));
	}
	if(curr_book==3){
	document.getElementById("book3").style.left ="-750px";
	document.getElementById("book3").style.position="absolute";
	document.getElementById("book2").style.left ="0px";
	document.getElementById("book2").style.position="relative";
	fadeIn(document.getElementById("book2"));
	}
	curr_book--;
	if(curr_book==0) curr_book=3;
}
function fadeIn(obj){
	if(currentOpacity >= 1) currentOpacity = 0;
	currentOpacity += 0.08;
	obj.style.opacity = currentOpacity;
	if(currentOpacity < 1)
		setTimeout(fadeIn,5,obj);
}
function startMove(bLeft)
{
	g_bMoveLeft=bLeft;
	
	if(g_oTimer)
	{
		clearInterval(g_oTimer);
	}
	g_oTimer=setInterval(doMove, 30);
}

function stopMove()
{
	clearInterval(g_oTimer);
	g_oTimer=null;
}

function doMove()
{
	var oDiv=document.getElementById('roll');
	var oUl=oDiv.getElementsByTagName('ul')[0];
	var aLi=oUl.getElementsByTagName('li');
	
	var l=oUl.offsetLeft;
	
	if(g_bMoveLeft)
	{
		l-=g_iSpeed;
		if(l<=-oUl.offsetWidth/2)
		{
			l+=oUl.offsetWidth/2;
		}
	}
	else
	{
		l+=g_iSpeed;
		if(l>=0)
		{
			l-=oUl.offsetWidth/2;
		}
	}
	
	oUl.style.left=l+'px';
}