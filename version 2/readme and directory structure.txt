                                                                    My Waypoints
                                                              Directory Structure and Readme
Brief Project Discription:
This project aims to create a distributed web application to augment the information about the travel routes, that is provided by typical map applications.
The web application will augment the travel route information by displaying weather at the starting point and the destination as well as, at the towns and 
cities along the route.

Project Directory Structure:
The project has two phases, Phase 1 is without database and Phase 2 is with the database.

  Project Deliverables:
  There are two deliverable folders 
  1) Phase 1
       --my_waypoints
         --index.php
         --jquery1.11.1.min.js
         --test.php
         --weather.php
  
  2) Phase 2 
       --my_waypoints_db 
         --check.php
         --connect.php
         --index.php
         --jquery1.11.1.min.js
         --update.php
         --weather.php

How to Deploy and Run:
Below are the steps to deploy and run the code files for My Waypoints project:

1) Download Xampp/Lampp from https://www.apachefriends.org/download.html
2) Install Xampp on your system. 
   [Note: I have here considered that Xampp is used. Same steps would follow for Lampp]
3) Open Xampp and click on start buttons to start sql and apache services in the welcome window and wait till they turn green.
4) navigate to the local disk where operating system programs are installed
5) Search for Xampp files.
6) Inside the Xampp folder open the htdocs folder.
7) Copy and Paste both the submitted files my_waypoints and my_waypoints_db in the Xampp/htdocs folder.
8) Open browser and load localhost/phpmyadmin
9) As the localhost/phpmyadmin page opens click in Databases tab.
10) Enter the new database name as my_waypoints and click on create button.
11) Click on import tab and then click on choose file button.
12) A file selection window will pop up.
13) Select the directions.sql file that is present in the submitted my_waypoints_db folder and click on ok.
14) Click on Go button on the import tab.
15) On your web browser load localhost/my_waypoints to run the Phase 1 of the project.
16) Similarly,On your web browser load localhost/my_waypoints_db to run the Phase 2 of the project.
17) Enter the Start and End city name and press enter. The route will be displayed on the map and the directions on the left section of the my waypoints
    page. 
18) Click on load weather button present on the top right section of the page to load the weather.

Note:internet connection is needed.

APIs Used:
1) Maps API: https://developers.google.com/maps/web-services/client-library
   This API provides maps data to our distributed web application. 
2) Weather API: https://openweathermap.org/api
   This API provides weather data to our distributed web application. 


