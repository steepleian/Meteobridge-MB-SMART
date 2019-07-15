# This repository is a beta project for Meteobridge-Weather34-Smart Version *NO MYSQL KNOWLEDGE REQUIRED (expected final release 2020)

# you are strongly advised do not use this template for main viewing it will be many months before it is ready..

# do not forget to run stationcron.php at 30 minute periods as per original for forecast data etc . do read below about running charts and do not mix older code or files with this version..

This version uses new css grid layouts based on 

  display:grid;
  
  grid-template-columns: 236px 236px 236px 236px;
  
  
  grid-gap: 5px;
  
  *does not use bootstrap or any other ready made framework it is developed and built locally using sample of above.

this provides the platform for increasing modules to display for example have small charts displayed in small modules
on main page , increase the total of moduels to 24 and choosing optional layouts.
* important this code may not be supported on old browsers prior to end of 2018.


# New No mysql setup use meteobridge data instead..
How to use this non mysql database version with ease.

*what is the benefit ? 
you have a file with every day ,month,year individually recorded , your data is yours and these files can be used in other 
programs like excel for example,these files can be edited if erroneous data appears .so no learning curve for understanding
how mysql works or is setup , reap the benefit of meteobridge services ,no external cron jobs , no server setup of cron jobs 
just let meteobridge https://www.meteobridge.com/wiki/index.php/Home do it all.. https://www.meteobridge.com/wiki/index.php/Home meteobridge is a feature rich product that totally caters for the weather enthusiast.

important and mostly mis understood mysql database of growing millions of records unless regurlarly maintained can grind your sites to halt over time or cause slow down , its not just about executing a database where it begins to grind when complex routines are called where and the resources of a server get pushed 100% each time called..
siffling through millions of data values is not smart on poorly low cost hosted or configured servers.. non maintained databases are not smart ..

# 3 simple steps 

step 1 setup storing todays data to a CSV file for today charts to read file is chartstoday.php 

1. Goto meteobridge services screen 

2. Goto Select new service

3. Select from the drop down menu HTTP Request

4. Select Perodical in the next menu

5. Click Save at the bottom of the screen

6. Now look for new HTTP request 

7. select every FULL 10 MINUTES

8. NOW INSERT THE URL  example 
# http(s)://weathersomething/chartstoday.php

9. now click save .



step 2 setup storing monthly yearly data to a CSV file for monthly/year charts to read file is charts-month-year.php

1. Goto meteobridge services screen 

2. Goto Select new service

3. Select from the drop down menu HTTP Request

4. Select Specific Time in the next menu

5. Click Save at the bottom of the screen

6. Now look for new HTTP request 

7. select 23:45 (its the nearest the meteobridge will allow you get to the end of the day)

8. NOW INSERT THE URL  example 
# http(s)://weathersomething/charts-month-year.php

9. now click save .


step 3 setting the stationcron.php to run every 30 minutes 

1. Goto meteobridge services screen 

2. Goto Select new service

3. Select from the drop down menu HTTP Request

4. Select periodically in the next menu

5. Click Save at the bottom of the screen

6. Now look for new HTTP request 

7. select 30 minutes 

8. NOW INSERT THE URL  example 
# http(s)://weathersomething/mbdbfiles/stationcron.php

9. now click save .





thats it !!! no mysql to setup just these two files will do all the work .

behind the code ....

simple logic pull data from livedata.php and generate a required values. utilizes meteobridge software ability to 
pull data in many ways. i.e max wind last 10 minutes , rainfall amount last 10 minutes , average windpeed last 10 minutes and so on ....

short example of daily genrated file adds new line every 10 minutes
id,time,temp,barometer,rainfall,maxwind_last10,avgwind_last10,dewpoint,rainfall_last10min,avgdirection_last10min,date,humidity,indoortemp,indoorhumidity,uv,solar,lightning1,lightning2....

0,19:40,28.2,1013.6,0.0,8.0,4.5,15.5,0.0,36.0,24 Jun,46.0,27.6,38,0.2,38.0,3,2

0,19:50,27.9,1013.6,0.0,7.6,4.3,15.9,0.0,42.0,24 Jun,48.0,27.5,38,0.2,33.0,0,0

0,20:00,27.8,1013.6,0.0,8.0,4.4,16.1,0.0,39.0,24 Jun,49.0,27.4,39,0.1,27.0,1,4

<p align="center">
  <img src="https://res.cloudinary.com/brian-underdown/image/upload/v1561432649/nomysql_slsl7v.png" width="550" title="weather34 meteobridge nomysql charts "> 
</p>

<p align="center">
  <img src="https://res.cloudinary.com/brian-underdown/image/upload/v1563167987/stationcron_js0fmg.png" width="550" title="weather34 stationcron.php "> 
</p>



# Meteobridge-Weather34-Beta Smart Version
Github Beta repository for the Meteobridge version of the original weather34 template 
Weather Template for Meteobridge users only 

*The aim is to create the cleanest and most friendly approach to displaying your personal
weather data for your personal use and reap the full potential of meteobridge nanosd and meteobridge pro.

*This template is primed for use with meteobridge NANOSD and Pro unfortunately the smaller TP-LINK is not
fully compatible due to the requirement of being able to retrieve historical values realtime .

*This work is for development use only it is for meteobridge NANO/Pro users and contributors,participants who communicate
ideas and request permission to use.

*This work is not to be used without prior permission , please clearly outline on how you want to use this work.

*This work requires credits to be left intact where work is used ,it has no legal binding warrant but it is ethical
to create a working enviroment to exchange ideas without creating unwanted noise, the community is smaller than you may think..

*THIS VERSION HAS NO MYSQL DEPENDANCY 

*This work means CSS/SVG/PHP .

example of current beta

<p align="center">
  <img src="https://res.cloudinary.com/brian-underdown/image/upload/v1559632919/Beta_aqbm0a.png" width="550" title="weather34 meteobridge beta template "> 
</p>


# Basic Setup guide 
https://weather34.com/homeweatherstation/guides/setup.html


# Weather34 Historic Timeline of design 2014-2019 
https://weather34.com/homeweatherstation/weather34timeline/weather34timeline.html

# Meteobridge Beta Smart Version Screenshot 
<p align="center">
  <img src="https://res.cloudinary.com/brian-underdown/image/upload/v1559467750/col_ddcheg.png" width="550" title="weather34 meteobridge beta template "> 
</p>



# This work is licensed under a Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License. http://creativecommons.org/licenses/by-nc-nd/4.0/
*This work means CSS/SVG/PHP .
