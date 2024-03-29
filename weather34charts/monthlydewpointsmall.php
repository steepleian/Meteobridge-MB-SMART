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
	if ($tempunit=='C' && $windunit == 'mph') {$conv= '1';}
	else if ($windunit == 'mph') {$conv= '(1.8) +32';}
	else if ($windunit == 'm/s') {$conv= '1';}
	else if ($windunit == 'km/h'){$conv= '1';}
	$interval = 1;
	if ($windunit == 'mph') {$interval= '0.5';}
	else if ($windunit == 'm/s') {$interval= '1';}
	else if ($windunit == 'km/h'){$interval= '1';}	
	$weatherfile = date('F');	
    echo '
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Dewpoint Month CHART</title>	
		<script src=../js/jquery.js></script>
		<script src=canvasJs.js></script>
	';	
	?>
    <br>
    <script type="text/javascript">
		// today temperature
        $(document).ready(function () {
		var dataPoints1 = [];
		var dataPoints2 = [];
		$.ajax({
			type: "GET",
			url: "<?php echo date('Y');?>/<?php echo $weatherfile;?>.csv",
			dataType: "text",
			cache:false,
			success: function(data) {processData1(data),processData2(data);}
		});
	
	function processData1(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			//hi
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData.length >7)
					dataPoints1.push({label: rowData[0],y:parseFloat(rowData[3]*<?php echo $conv ;?>)});
			}
		}
		requestTempCsv();}function requestTempCsv(){}

	function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			//lo
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData.length >7)
					dataPoints2.push({label: rowData[0],y:parseFloat(rowData[4]*<?php echo $conv ;?>)});
				
			}
			drawChart(dataPoints1 , dataPoints2 );
		}
	}

		function drawChart( dataPoints1 , dataPoints2 ) {
		var chart = new CanvasJS.Chart("chartContainer2", {
		 backgroundColor: "rgba(40, 45, 52,.4)",
		 animationEnabled: false,
		 margin: 0,
		
		
		title: {
            text: " ",
			fontSize: 0,
			fontColor:' #ccc',
			fontFamily: "arial",
        },
		dataPointWidth: 10,
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
		    labelFontSize: 7,
			labelFontColor:' #aaa',
			lineThickness: 0.5,
			gridThickness: 1,	
			titleFontFamily: "arial",	
			labelFontFamily: "arial",
			minimum:-0.5,	
			interval:1,
			intervalType:"date",
			xValueType: "dateTime",	
			crosshair: {
			enabled: true,
			snapToDataPoint: true,
			color: "#9aba2f",
			labelFontColor: "#F8F8F8",
			labelFontSize:8,
			labelMaxWidth: 60,
			labelBackgroundColor: "#FF8841",
		}
			
			},
			
		axisY:{
		title: "",
		titleFontColor: "#aaa",
		titleFontSize: 8,
        titleWrap: false,
		margin: 8,
		lineThickness: 0.5,		
		gridThickness: 1,		
        includeZero: false,
		interval:<?php if ($tempunit=='F'){echo 10 ;} else echo '5';?>,
		maximum:<?php if ($tempunit=='F'){echo 90 ;} else echo '35';?>,
		//minimum:'auto',
		gridColor: "#333",
		labelFontSize: 8,
		labelFontColor:' #aaa',
		titleFontFamily: "arial",
		labelFontFamily: "arial",
		labelFormatter: function ( e ) {
        return e.value .toFixed(0) + "°<?php echo $tempunit ;?>" ;  
         },		 
		 crosshair: {
			enabled: true,
			snapToDataPoint: true,
			color: "#9aba2f",
			labelFontColor: "#F8F8F8",
			labelFontSize:8,
			labelMaxWidth: 60,
			labelBackgroundColor: "#FF8841",
		}	
      },
	  
	  legend:{
      fontFamily: "arial",
      fontColor:"#ccc",
  
 },
		
		
			data: [
		{
			type: "column",
			indexLabelLineThickness: 0,       
       		indexLabel: "{y}",
	   		indexLabelFontSize: 9,
	   		indexLabelFontColor: "#fff",	  
	   		indexLabelMaxWidth: 60,
			indexLabelMaxHeight: 60,
	   		indexLabelFontWeight: "bold",
       		indexLabelWrap: true,
	   		indexLabelPlacement: "outside",			
			color:"#ec5519",
			markerSize:0,
			showInLegend:false,
			legendMarkerType: "circle",
			lineThickness: 0,
			markerType: "circle",
			lineThickness: 0,
			markerType: "circle",
			name:" Hi Dewpoint °<?php echo $tempunit;?>",
			dataPoints: dataPoints1,
			yValueFormatString: "##.#",
			
		},
		{
			
			type: "line",
			indexLabelLineThickness: 0,       
       		indexLabel: "{y}",
	   		indexLabelFontSize: 8,
	   		indexLabelFontColor: "#fff",	  
	   		indexLabelMaxWidth: 60,
			indexLabelMaxHeight: 60,
	   		indexLabelFontWeight: "bold",
       		//indexLabelWrap: true,
	   		indexLabelPlacement: "inside",
			//indexLabelOrientation:"vertical",
            lineDashType: "dash",
			color:"#44a6b5",
			markerSize:3,
			showInLegend:false,
			legendMarkerType: "circle",
			lineThickness: 1,
			markerType: "circle",
			name:" Lo Dewpoint °<?php echo $tempunit;?>",
			dataPoints: dataPoints2,
			yValueFormatString: "##.#",
			
		}

		]
		});

		chart.render();
	}
}); </script>
<body>
<div id="chartContainer2" style="width:auto;height:125px;padding:0;margin-top:-25px;border-radius:3px;border: 1px solid rgba(245, 247, 252,.02); box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.6);-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;backgroundColor:rgba(40, 45, 52,.4)"></div></div></body></html>