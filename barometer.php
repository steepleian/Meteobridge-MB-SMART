<?php 

	####################################################################################################
	#	CREATED FOR HOMEWEATHERSTATION MB SMART TEMPLATE 											   #
	# https://weather34.com/homeweatherstation/index.html 											   # 
	# 	                                                                                               #
	# 	Release: July 2019						  	                                                   #
	# 	                                                                                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################


//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include_once('common.php');include_once('livedata.php');
# 27th Jan 2019 file edited by Ken True based on barometer units for non standard configurations by lightmaster https://www.wxforum.net/index.php?topic=36011.0
header('Content-type: text/html; charset=utf-8');?>
<meta http-equiv="Content-Type: text/html; charset=UTF-8" />
<style>
.weather34barometerarrowactual{-webkit-transform:rotate(<?php 
if ($weather["barometer_units"]=='mb' OR $weather["barometer_units"]=="hPa"){echo $weather["barometer"]*0.02953*50.6;}else if ($weather["barometer_units"]=='inHg'){echo $weather["barometer"]*50.6;}?>deg);
transform:rotate(<?php if ($weather["barometer_units"]=='mb' OR $weather["barometer_units"]=="hPa"){echo $weather["barometer"]*0.02953*50.6;}else if ($weather["barometer_units"]=='inHg'){echo $weather["barometer"]*50.6;}?>deg);}
.weather34barometerarrowmin{-webkit-transform:rotate(<?php 
if ($weather["barometer_units"]=='mb' OR $weather["barometer_units"]=="hPa" ){echo $weather["barometer_min"]*0.02953*50.6;}else if ($weather["barometer_units"]=='inHg'){echo $weather["barometer_min"]*50.6;}?>deg);
transform:rotate(<?php if ($weather["barometer_units"]=='mb' OR $weather["barometer_units"]=="hPa" ){echo $weather["barometer_min"]*0.02953*50.6;}else if ($weather["barometer_units"]=='inHg'){echo $weather["barometer_min"]*50.6;}?>deg);}
.weather34barometerarrowmax{-webkit-transform:rotate(<?php 
if ($weather["barometer_units"]=='mb' OR $weather["barometer_units"]=="hPa" ){echo $weather["barometer_max"]*0.02953*50.6;}else if ($weather["barometer_units"]=='inHg'){echo $weather["barometer_max"]*50.6;}?>deg);
transform:rotate(<?php if ($weather["barometer_units"]=='mb' OR $weather["barometer_units"]=="hPa" ){echo $weather["barometer_max"]*0.02953*50.6;}else if ($weather["barometer_units"]=='inHg'){echo $weather["barometer_max"]*50.6;}?>deg);}
valuetextba{font-size:1em}valuetextbc{font-size:1.1em}valuetexttr{font-size:8px}
</style>
<div class="moduleupdatetime"><span><?php if(file_exists($livedata)&&time()- filemtime($livedata)>300)echo '<offlinenew></offlinenew> Offline';else echo "<onlinenew></onlinenew> ".$weather["time"];?></div> 
<div class='maxpressure'><a class="weather34tipmax" data-weather34tipmax="<?php echo "Max ".$weather["thb0seapressymax"]." ".$weather["barometer_units"]."&nbsp; ".$weather["thb0seapressyearmaxtime"]?>">
<?php echo '<valuetext>Max ('.$weather["thb0seapressmaxtime"].')<br><maxred>',$weather["barometer_max"],'&nbsp;</maxred><pressureunits>',$weather["barometer_units"],' </pressureunits></supmb></valuetext></div>';?></a></div>
<div class='minpressure'><a class="weather34tipmin" data-weather34tipmin="<?php echo "Min ".$weather["thb0seapressymin"]." ".$weather["barometer_units"]."&nbsp; ".$weather["thb0seapressyearmintime"]?>">
<?php echo '<valuetext>Min ('.$weather["thb0seapressmintime"].')<br><minblue>',$weather["barometer_min"],'&nbsp;</minblue><pressureunits>',$weather["barometer_units"],' </pressureunits></valuetext></div>';?></a>
</div>
<div class="trendpressure">
<?php  echo "<valuetexttr>&nbsp;Tendency (hr)<valuetexttr>";
if ($weather["barometer_trend"] < 0) {echo '<fall> '.$fallingsymbol.'&nbsp;</fall><valuetextba>';
echo number_format($weather["barometer_trend"],2), '</valuetextba><pressureunits>';}
else if ($weather["barometer_trend"] > 0) {
echo '<rising><rise> '.$risingsymbol.'&nbsp;</rise><valuetextba>';echo number_format($weather["barometer_trend"],2), ' </valuetextba>';}
else echo '<ogreen> '.$steadysymbol.'</ogreen><valuetextba>'.number_format($weather["barometer_trend"],2).'</valuetextba></div>';?></valuetext>
</div>
<div class="barometerconverter">
<?php echo "";
if ($weather["temp_units"]=='C'){echo "<div class=barometerconvertercircleblue>" .number_format($weather["barometer"]*0.029529983071445,2),"<smallrainunit>inHg</smallrainunit>";}
else if ($weather["temp_units"]=='F'){echo "<div class=barometerconvertercircleblue>".round($weather["barometer"]*33.863886666667,1),"<smallrainunit>hPa</smallrainunit>";}
?></div></div>
<div class=barometerpos>
<div class="homeweathercompass2" >
<div class="homeweathercompass-line2">
<div class="weather34barometerarrowactual"></div>
<div class="weather34barometerarrowmin"></div>
<div class="weather34barometerarrowmax"></div>
</div>
<div class="text2"><?php if ($weather["barometer_trend"]>20){echo '<div class="pressuretext"> <ogreen>Steady</ogreen> </div>';}
else if ($weather["barometer_trend"] < 0) {
echo '<div class="pressuretext"> <oblue>'.$lang['Falling'].'</oblue> <fall> '.$fallingsymbol.'</fall></div>';}
else if ($weather["barometer_trend"] > 0) {
echo '<div class="pressuretext"> <oorange>'.$lang['Rising'].'</orange> <rise> '.$risingsymbol.' </rise></div>';}
else echo '<div class="pressuretext"> <ogreen>'.$lang['Steady'].'</ogreen> </div>';?>
<?php echo "<darkgrey>".$weather["barometer"],"&nbsp;<span>".$weather["barometer_units"]."</span>";?>
</div></div></div>


</span>
<div class="barometerlimits"><div class='weather34-barometerruler'>
<?php if ($weather["barometer_units"]=='mb' OR $weather["barometer_units"]=="hPa"){echo "<weather34-barometerlimitmin><value>950</weather34-barometerlimitmin><weather34-barometerlimitmax><value>1050</weather34-barometerlimitmax>";}
else echo "<weather34-barometerlimitminf><value>28</barometerlimitminf><weather34-barometerlimitmaxf><value>31</weather34-barometerlimitmaxf>";?></div></div></div>
<?php //WEATHER34 pure css UV-Index above 8  pop up alert 
 if ($notifications=='yes' && $weather["uv"]>=8){?><div id="weather34lightningdialog-notify">  <div class="weather34lightningdialog-box">
<div class="weather34lightningbackground-alert"></div><div class="header"> <div class="weather34lightningbackground-alert"></div>
<div class="weather34lightningcontents"><div class="left"><?php echo $notification ?> Notification</div>
<div class="right"><?php echo date ("D H:i")?></div></div></div>
<div class="weather34lightningcontents weather34lightningmain-content">     
<?php echo "UV-Index Caution<br>Reduce Sun Exposure <notifyorange>" .$weather["uv"],"</notifyorange>",$uvisvg?>
<?php ;}?></div></div>
<?php //WEATHER34 pure css temperature heat index above 30c/84F  pop up alert 
 if($notifications=='yes' && anyToC($weather["heat_index"])>=30){?><div id="weather34lightningdialog-notify">  <div class="weather34lightningdialog-box">
<div class="weather34lightningbackground-alert"></div><div class="header"> <div class="weather34lightningbackground-alert"></div>
<div class="weather34lightningcontents"><div class="left"><?php echo $notification ?> Notification</div>
<div class="right"><?php echo date ("D H:i")?></div></div></div>
<div class="weather34lightningcontents weather34lightningmain-content">     
<?php echo "Heat Index Caution<br>Heat Exhaustion <notifyorange>" .$weather["heat_index"],"&deg;",$weather["temp_units"]?>
<?php ;}?></notifyorange></div></div>
<?php //WEATHER34 pure css wind gusts of 40kmh to Gale Force pop up alert 
 if($notifications=='yes' && $weather["wind_speed"]*$toKnots>23){?><div id="weather34lightningdialog-notify">  <div class="weather34lightningdialog-box">
<div class="weather34lightningbackground-alert"></div><div class="header"> <div class="weather34lightningbackground-alert"></div>
<div class="weather34lightningcontents"><div class="left"><?php echo $notification ?> Notification</div>
<div class="right"><?php echo date ("D H:i")?></div></div></div>
<div class="weather34lightningcontents weather34lightningmain-content">     
<?php if($notifications=='yes' && $weather["wind_gust_speed"]*$toKnots>34) {echo "Wind Gusts Reaching <br>Gale Force  <notifyorange>" .$weather["wind_gust_speed"],"</notifyorange> ", $weather["wind_units"];}
else if( $notifications=='yes' && $weather["wind_speed"]*$toKnots>34) {echo "Wind Gusts Reaching <br>Gale Force  <notifyorange>" .$weather["wind_speed"],"</notifyorange> ", $weather["wind_units"];}
else echo "Wind Gusts Becoming Strong Caution Required <notifyorange>" .$weather["wind_speed"],"</notifyorange> ", $weather["wind_units"]?>
<?php ;}?></div></div>

<?php //WEATHER34 pure css temperature  below 0c/32F  pop up alert 
 if($notifications=='yes' && anyToC($weather["temp"])<0){?><div id="weather34lightningdialog-notify">  <div class="weather34lightningdialog-box">
<div class="weather34lightningbackground-alert"></div><div class="header"> <div class="weather34lightningbackground-alert"></div>
<div class="weather34lightningcontents"><div class="left"><?php echo $notification ?> Notification</div>
<div class="right"><?php echo date ("D H:i")?></div></div></div>
<div class="weather34lightningcontents weather34lightningmain-content"><?php echo $freezing."Temperature Caution<br>Below Freezing <notifyblue>" .$weather["temp"],"&deg;",$weather["temp_units"]?>
<?php ;}?></notifyblue></div></div>

<?php //WEATHER34 pure css near freezing dewpoint below 0c/32F  pop up alert 
 if($notifications=='yes' && anyToC($weather["dewpoint"])<0){?><div id="weather34lightningdialog-notify">  <div class="weather34lightningdialog-box">
<div class="weather34lightningbackground-alert"></div><div class="header"> <div class="weather34lightningbackground-alert"></div>
<div class="weather34lightningcontents"><div class="left"><?php echo $notification ?> Notification</div>
<div class="right"><?php echo date ("D H:i")?></div></div></div>
<div class="weather34lightningcontents weather34lightningmain-content"><?php echo $freezing."Dewpoint Caution<br>Below Freezing <notifyblue>" .$weather["dewpoint"],"&deg;",$weather["temp_units"]?>
<?php ;}?></notifyblue></div></div>


<?php //earthquakes magnitude 6+
date_default_timezone_set($TZ);
$json_string=file_get_contents('jsondata/eqnotification.txt');
$parsed_json=json_decode($json_string,true);$magnitude = array();$eqtitle = array();$depth = array();$time = array();$lati = array();$longi = array();$eventime = array();
for ($i = 0; $i < 100; $i++) {
$magnitude[$i]=$parsed_json{$i}{'magnitude'};$eqtitle[$i]=$parsed_json{$i}['title'];$depth[$i]=$parsed_json{$i}['depth'];$time[$i]=$parsed_json{$i}['date_time'];
$lati[$i]=$parsed_json{$i}['latitude'];$longi[$i]=$parsed_json{$i}['longitude'];$eventime[$i]=date($timeFormatShort, strtotime($time[$i]) );$eqdist[$i] = round(distance($lat, $lon, $lati[$i], $longi[$i])) ;
}
//WEATHER34 pure css earthquake >6.5 pop up alert 
 if($notifications=='yes' && $magnitude[0]>6.5){?><div id="weather34lightningdialog-notify">  <div class="weather34lightningdialog-box">
<div class="weather34lightningbackground-alert"></div><div class="header"> <div class="weather34lightningbackground-alert"></div>
<div class="weather34lightningcontents"><div class="left"><?php echo $notification ?> Notification</div>
<div class="right"><?php echo date ("D H:i")?></div></div></div>
<div class="weather34lightningcontents weather34lightningmain-content">     
<?php echo "Earthquake <br>Strong  <notifyorange>" .$magnitude[0],"</notifyorange> ", $eqtitle[0]," ",$eventime[0];?>
<?php ;}?>
<?php
if($notifications=='yes' && $magnitude[1]>6.5){?><div id="weather34lightningdialog-notify">  <div class="weather34lightningdialog-box">
<div class="weather34lightningbackground-alert"></div><div class="header"> <div class="weather34lightningbackground-alert"></div>
<div class="weather34lightningcontents"><div class="left"><?php echo $notification ?> Notification</div>
<div class="right"><?php echo date ("D H:i")?></div></div></div>
<div class="weather34lightningcontents weather34lightningmain-content">     
<?php echo "Earthquake <br>Strong  <notifyorange>" .$magnitude[1],"</notifyorange> ", $eqtitle[1]," ",$eventime[1];?>
<?php ;}?>
<?php
if($notifications=='yes' && $magnitude[2]>6.5){?><div id="weather34lightningdialog-notify">  <div class="weather34lightningdialog-box">
<div class="weather34lightningbackground-alert"></div><div class="header"> <div class="weather34lightningbackground-alert"></div>
<div class="weather34lightningcontents"><div class="left"><?php echo $notification ?> Notification</div>
<div class="right"><?php echo date ("D H:i")?></div></div></div>
<div class="weather34lightningcontents weather34lightningmain-content">     
<?php echo "Earthquake <br>Strong  <notifyorange>" .$magnitude[2],"</notifyorange> ", $eqtitle[2]," ",$eventime[2];?>
<?php ;}?>
<?php
if($notifications=='yes' && $magnitude[3]>6.5){?><div id="weather34lightningdialog-notify">  <div class="weather34lightningdialog-box">
<div class="weather34lightningbackground-alert"></div><div class="header"> <div class="weather34lightningbackground-alert"></div>
<div class="weather34lightningcontents"><div class="left"><?php echo $notification ?> Notification</div>
<div class="right"><?php echo date ("D H:i")?></div></div></div>
<div class="weather34lightningcontents weather34lightningmain-content">     
<?php echo "Earthquake <br>Strong  <notifyorange>" .$magnitude[3],"</notifyorange> ", $eqtitle[3]," ",$eventime[3];?>
<?php ;}?>
<?php
if($notifications=='yes' && $magnitude[4]>6.5){?><div id="weather34lightningdialog-notify">  <div class="weather34lightningdialog-box">
<div class="weather34lightningbackground-alert"></div><div class="header"> <div class="weather34lightningbackground-alert"></div>
<div class="weather34lightningcontents"><div class="left"><?php echo $notification ?> Notification</div>
<div class="right"><?php echo date ("D H:i")?></div></div></div>
<div class="weather34lightningcontents weather34lightningmain-content">     
<?php echo "Earthquake <br>Strong  <notifyorange>" .$magnitude[4],"</notifyorange> ", $eqtitle[4]," ",$eventime[4];?>
<?php ;}?>
<?php
if($notifications=='yes' && $magnitude[5]>6.5){?><div id="weather34lightningdialog-notify">  <div class="weather34lightningdialog-box">
<div class="weather34lightningbackground-alert"></div><div class="header"> <div class="weather34lightningbackground-alert"></div>
<div class="weather34lightningcontents"><div class="left"><?php echo $notification ?> Notification</div>
<div class="right"><?php echo date ("D H:i")?></div></div></div>
<div class="weather34lightningcontents weather34lightningmain-content">     
<?php echo "Earthquake <br>Strong  <notifyorange>" .$magnitude[5],"</notifyorange> ", $eqtitle[5];?>
<?php ;}?>
<?php
if($notifications=='yes' && $magnitude[6]>6.5){?><div id="weather34lightningdialog-notify">  <div class="weather34lightningdialog-box">
<div class="weather34lightningbackground-alert"></div><div class="header"> <div class="weather34lightningbackground-alert"></div>
<div class="weather34lightningcontents"><div class="left"><?php echo $notification ?> Notification</div>
<div class="right"><?php echo date ("D H:i")?></div></div></div>
<div class="weather34lightningcontents weather34lightningmain-content">     
<?php echo "Earthquake <br>Strong  <notifyorange>" .$magnitude[6],"</notifyorange> ", $eqtitle[6]," ",$eventime[6];?>
<?php ;}?>
</div></div>