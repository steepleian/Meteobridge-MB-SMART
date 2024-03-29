<?php
	
	####################################################################################################
	#	CREATED FOR HOMEWEATHERSTATION MB SMART TEMPLATE 											   #
	# https://weather34.com/homeweatherstation/index.html 											   # 
	# 	                                                                                               #
	# 	built on CanvasJs  	                                                                           #
	#   canvasJs.js is protected by CREATIVE COMMONS LICENCE BY-NC 3.0  	                           #
	# 	free for non commercial use and credit must be left in tact . 	                               #
	# 	                                                                                               #
	# 	Release: July 2019						  	                                                   #
	# 	                                                                                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
	
	
	include('preload.php');
	$conv = 1;
	if ($pressureunit  == "hPa"){$conv= '1';}
	else if ($pressureunit == 'inHg') {$conv= '0.02953';}	
	$int = 1;
	if ($pressureunit == 'hPa') {$int= 1;}
	else if ($pressureunit == 'inHg') {$int= 0.25;}
	$ymax = 1;
	if ($pressureunit == 'hPa') {$ymax= '1045';}
	else if ($pressureunit == 'inHg') {$ymax= '31.6';}		
	$limit = '0';
	if ($pressureunit == 'inHg') {$limit= '20';}
	else if ($pressureunit  == "hPa") {$limit= '930';}
    echo '
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>OUTDOOR Barometer CHART</title>	
		<script src=../js/jquery.js></script>
		
	';
	$weatherfile =date('Y')."/".date('jMY');?>
	?>
    <br>	
	<script type="text/javascript">
	// today barometer
        $(document).ready(function () {

	var dataPoints1 = [];
	var dataPoints2 = [];
	$.ajax({
			type: "GET",
			url: "<?php echo $weatherfile?>.csv",
			dataType: "text",
			cache:false,
			success: function(data) {processData1(data),processData2(data);}
		});
	
	function processData1(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[3] ><?php echo $limit;?>)
					dataPoints1.push({label:rowData[1],y:parseFloat(rowData[3]*<?php echo $conv;?>)});		}
		}
		requestTempCsv();}function requestTempCsv(){}

		function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[3] ><?php echo $limit;?>)
					dataPoints2.push({label:rowData[1],y:parseFloat(rowData[3]*<?php echo $conv;?>)});
				
			}
			drawChart(dataPoints1 );
		}
	}

	
	function drawChart( dataPoints1) {
		var chart = new CanvasJS.Chart("chartContainer2", {
		backgroundColor: "rgba(40, 45, 52,.4)",
		animationEnabled: false,
		 
		title: {
            text: " ",
			fontSize: 0,
			fontColor:' #aaa',
			fontFamily: "arial",
        },
		toolTip:{
			   fontStyle: "normal",
			   cornerRadius: 4,
			   backgroundColor: "rgba(40, 45, 52,1)",	
			   fontColor: '#aaa',	
			   fontSize: 11,	   
			   toolTipContent: " x: {x} y: {y} <br/> name: {name}, label:{label} ",
			   shared: true, 
 },
		axisX: {
			gridColor: "#333",
		    labelFontSize:7,
			labelFontColor:' #c0c0c0',
			lineThickness: 1,
			gridThickness: 1,	
			gridDashType: "dot",
			titleFontFamily: "arial",	
			labelFontFamily: "arial",	
			interval: 12,
   			intervalType: "hour",
			minimum:0,
			crosshair: {
			enabled: true,
			snapToDataPoint: true,
			color: "#009bab",
			labelFontColor: "#F8F8F8",
			labelFontSize:8,
			labelBackgroundColor: "#009bab",
			labelMaxWidth: 60,
		}
			},
			
		axisY:{
		title: "",
		titleFontColor: "#aaa",
		titleFontSize: 0,
        titleWrap: false,
		margin: 2,
		lineThickness: 1,		
		gridThickness: 1,	
		interval: <?php echo $int ;?>,	
        includeZero: false,
		gridColor: "#333",
		gridDashType: "dot",
		labelFontSize: 8,
		labelFontColor:' #c0c0c0',
		titleFontFamily: "arial",
		labelFontFamily: "arial",
		labelFormatter: function ( e ) {
        return e.value .toFixed(<?php if ($pressureunit=='inHg'){echo '1';} else echo '0';?>);  
         },		 
		 crosshair: {
			enabled: true,
			snapToDataPoint: true,
			color: "#009bab",
			labelFontColor: "#fff",
			labelFontSize:8,
			labelBackgroundColor: "#ff832f",
			labelMaxWidth: 60,
			valueFormatString:"##.#",
		}	
      },
	  
	  legend:{
      fontFamily: "arial",
      fontColor:"#aaa",
  
 },
		
		
		data: [
		{
			type: "spline",
			color:"#44a6b5",
			markerSize:0,
			showInLegend:false,
			legendMarkerType: "triangle",
			lineThickness: 1,
			markerType: "circle",
			name:"Barometer",
			dataPoints: dataPoints1,
			yValueFormatString:"#0.# °",
			markerBorderColor: 'red',
			dataPoints: dataPoints1,
			
			yValueFormatString: "##.## <?php echo $pressureunit ;?>",
		},
		{
			//not using in daily barometer
		}

		]
		});

		chart.render();
		
	}
});</script>
<body>
<div id="chartContainer2" style="width:auto;height:125px;padding:0;margin-top:-25px;border-radius:3px;border: 1px solid rgba(245, 247, 252,.02); box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.6);-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;background:rgba(40, 45, 52,.4)"></div></div></body></html>