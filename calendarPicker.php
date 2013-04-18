
<div>
<link rel=stylesheet href="css/jquery.calendarPicker.css" type="text/css" media="screen">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.calendarPicker.js"></script>
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>

<div id="dsel1" style="width:240px"></div><br>

<span id="wtf"></span>

<script type="text/javascript">
  var calendarPicker1 = $("#dsel1").calendarPicker({
    monthNames:["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    dayNames: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
    callback:function(cal) {
      //do nothing
    }});
</script>
</div>