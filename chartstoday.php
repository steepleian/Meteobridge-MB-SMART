<?php include('livedata.php');
// extras added November 2017//
date_default_timezone_set($TZ);
$date = date_create();
$id=00;
//disable error logging if you get server errors
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);ini_set("display_errors","off");
$weatherchartfile = "weather34charts/".date('jMY').".csv";
//ID,time,outsideTemp,barometer,raintoday,UV,windgustmph,windSpeedAvg,radiation,dewpoint,rainrate,direction,date,indoortemp,indoorhumidity
$weather34chartdata   = $id.",".date('H:i').",".$meteobridgeapi[2].",".$meteobridgeapi[10].",". $meteobridgeapi[9].",".$meteobridgeapi[43].",".$meteobridgeapi[6].",".$meteobridgeapi[5].",".$meteobridgeapi[45].",".$meteobridgeapi[4].",".$meteobridgeapi[8].",".$meteobridgeapi[7].",".$meteobridgeapi[22].",".$meteobridgeapi[23].",".date('j M').""."\r\n";
$output=$weatherchartfile;
$fp = fopen($weatherchartfile, 'a'); 
fwrite($fp,$weather34chartdata); 
fclose($weatherchartfile);
?>

