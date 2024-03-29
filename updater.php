<?php  

	####################################################################################################
	#	CREATED FOR HOMEWEATHERSTATION MB SMART TEMPLATE 											   #
	# https://weather34.com/homeweatherstation/index.html 											   # 
	# 	                                                                                               #
	# 	Release: July 2019						  	                                                   #
	# 	                                                                                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################

include('settings1.php');?>
<script src="js/jquery.js"></script>
<script Defer>
//update the modules
//update the modules position 1
var refreshId;$(document).ready(function(){position1()});function position1(){$.ajax({cache:false,success:function(a){$("#position1").html(a);<?php if ($notifyRefresh > 0) {
	echo 'setTimeout(position1,' . 160000*$indoorRefresh.')';
} ?>},
  contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
  type:"GET",url:"<?php echo $position1 ;?>"})};  
  
//update the modules position 2
var refreshId;$(document).ready(function(){indoor()});function indoor(){$.ajax({cache:false,success:function(a){$("#position2").html(a);<?php if ($indoorRefresh > 0) {
	echo 'setTimeout(indoor,' . 60000*$indoorRefresh.')';
} ?>},
  contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
  type:"GET",url:"<?php echo $position2 ;?>"})};  
  
 // position 3
var refreshId;$(document).ready(function(){earthquake()});function earthquake(){$.ajax({cache:false,success:function(a){$("#position3").html(a);<?php if ($eqRefresh > 0) {
    echo 'setTimeout(earthquake,' . 1000*$eqRefresh.')';
} ?>},type:"GET",url:"<?php echo $position3 ?>"})}; 
  
  
// position 4
var refreshId;$(document).ready(function(){notification()});function notification(){$.ajax({cache:false,success:function(a){$("#position4").html(a);<?php if ($notifyRefresh > 0) {
    echo 'setTimeout(notification,' . 1000*$notifyRefresh.')';
} ?>},type:"GET",url:"<?php echo $position4 ;?>"})};

// outdoor temp
var refreshId;$(document).ready(function(){temperature()});function temperature(){$.ajax({cache:false,success:function(a){$("#temperature").html(a);<?php if ($tempRefresh > 0) {
    echo 'setTimeout(temperature,' . 1000*$tempRefresh.')';
} ?>},type:"GET",url:"<?php echo $temperaturemodule;?>"})};
//current conditions icon
var refreshId;$(document).ready(function(){currentsky()});function currentsky(){$.ajax({cache:false,success:function(a){$("#currentsky").html(a);<?php if ($skyRefresh > 0) {
    echo 'setTimeout(currentsky,' . 1000*$skyRefresh.')';
} ?>},type:"GET",url:"<?php echo $currentconditions ;?>"})};
/// wind speed / direction 
var refreshId;$(document).ready(function(){windspeed()});function windspeed(){$.ajax({cache:false,success:function(a){$("#windspeed").html(a);<?php if ($windSpeedRefresh > 0) {
    echo 'setTimeout(windspeed,' . 1000*$windSpeedRefresh.')';
} ?>},type:"GET",url:"windspeeddirection.php"})};     
//barometer
var refreshId;$(document).ready(function(){barometer()});function barometer(){$.ajax({cache:false,success:function(a){$("#barometer").html(a);<?php if ($baroRefresh > 0) {
    echo 'setTimeout(barometer,' . 1000*$baroRefresh.')';
} ?>},type:"GET",url:"barometer.php"})};
// moonphase
var refreshId;$(document).ready(function(){moonphase()});function moonphase(){$.ajax({cache:false,success:function(a){$("#moonphase").html(a);<?php if ($moonRefresh > 0) {
    echo 'setTimeout(moonphase,' . 1000*$moonRefresh .')';
} ?>},type:"GET",url:"<?php echo $sunoption?>"})};
// rainfall
var refreshId;$(document).ready(function(){rainfall()});function rainfall(){$.ajax({cache:false,success:function(a){$("#rainfall").html(a);<?php if ($rainRefresh > 0) {
    echo 'setTimeout(rainfall,' . 1000*$rainRefresh.')';
} ?>},type:"GET",url:"rainfall.php"})};
// position12
var refreshId;$(document).ready(function(){solar()});function solar(){$.ajax({cache:false,success:function(a){$("#solar").html(a);<?php if ($solarRefresh > 0) {
    echo 'setTimeout(solar,' . 1000*$solarRefresh.')';
} ?>},type:"GET",url:'<?php echo $position12?>'})};

//last module
var refreshId;$(document).ready(function(){dldata()});function dldata(){$.ajax({cache:false,success:function(a){$("#dldata").html(a);<?php if ($daylightRefresh > 0) { echo 'setTimeout(dldata,' . 1000*$daylightRefresh.')';  } ?>}, type:"GET",url:"<?php echo $positionlastmodule?>"})}; 
//current 3dy forecast
var refreshId;$(document).ready(function(){currentfore()});function currentfore(){$.ajax({cache:false,success:function(a){$("#currentfore").html(a);setTimeout(currentfore,360000)},type:"GET",url:"<?php echo $position6?>"})};</script>
<script>
var clockID;
var yourTimeZoneFrom=<?php echo $UTC?>;
var d=new Date();
var weekdays=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
var months=["Jan","Feb","March","April","May","June","July","Aug","Sep","Oct","Nov","Dec"];
var tzDifference=yourTimeZoneFrom*60+d.getTimezoneOffset();
var offset=tzDifference*60*1000;
function UpdateClock(){
var e=new Date(new Date().getTime()+offset);
var c=e.getHours()<?php if ($clockformat == '12') { echo '% 12 || 12';} else { echo '% 24 || 24';}?>;
<?php if($clockformat=='12') {echo "if(e.getHours()<12){amorpm=' am'}else{amorpm=' pm'}";} else {echo "amorpm='';";}?>
var a=e.getMinutes();var g=e.getSeconds();var f=e.getFullYear();var h=months[e.getMonth()];var b=e.getDate();
var suffix = "";switch(b) {case 1: case 21: case 31: suffix = 'st'; break;case 2: case 22: suffix = 'nd'; break;case 3: case 23: suffix = 'rd'; break;default: suffix = 'th';}
var i=weekdays[e.getDay()];
if(a<10){a="0"+a}if(g<10){g="0"+g}if(c<10){c="0"+c}
document.getElementById("theTime").innerHTML="<weather34thetime>"+i+" "+b+suffix+" "+h+" "+f+" &nbsp;"+c+":"+a+":"+g+amorpm}
function StartClock(){clockID=setInterval(UpdateClock,500)}
function KillClock(){clearTimeout(clockID)}
window.onload=function(){StartClock()};
</script>