<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>My WayPoints</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      #right-panel {
        height: 100%;
        float: right;
        width: 390px;
        overflow: auto;
      }
      #map {
        margin-right: 400px;
      }
      #floating-panel {
        background: #fff;
        padding: 5px;
        font-size: 14px;
        font-family: Arial;
        border: 1px solid #ccc;
        box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
        display: none;
      }
      @media print {
        #map {
          height: 500px;
          margin: 0;
        }
        #right-panel {
          float: none;
          width: auto;
        }
      }
    </style>
  </head>
  <body>
  <h1 align="center" style="background-color:DodgerBlue;">MY WAYPOINTS</h1>
  <h3 align="center" style="background-color:DodgerBlue;">Augmenting the Travel Route Information</h3>
  <h6 align="right";">Developed By Karan Manchandia (karanman)</h6>
    <div id="floating-panel">
    <!--source address-->
      <strong>Start:</strong>
      <input type="text" id="start"/>
      
        
      <br>
      <!--destination address-->
      <strong>End:</strong>
      <input type="text" id="end"/>
      
    </div>
    <div id="right-panel">
    
    <button class="btn btn-success" onclick="loadWeather()">load weather</button>
    <div id="weather">
    </div>
    <div id="weather2">
    </div>
    </div>
    <div id="map"></div>
    <script src="jquery-1.11.1.min.js"></script>
    <script>
    var autocomplete,autocomplete2;
function loadWeather(){
  
    var startt = document.getElementById('start').value;
        var endd = document.getElementById('end').value;

address="";
         //Calling the weather api 
   var openWeatherMapKey = "d6f3cfaff318f1cdbd19b7bde0259f64";
   var base_url = "http://api.openweathermap.org/data/2.5/weather?&units=imperial";
   var url = "http://api.openweathermap.org/data/2.5/weather?q="+startt+"&units=imperial&appid=d6f3cfaff318f1cdbd19b7bde0259f64";
   console.log("Fetch from service: " + url);
   var data = new XMLHttpRequest();
   data.open("GET", url, true);
   data.onload = function (e) {
     if (data.readyState === 4) {
       if (data.status === 200) {
         var weather_data = JSON.parse(data.response);
         var disp_data = "<strong>Place</strong><br/>" + startt + "<br/>" +
           "<strong>Weather: </strong>" + weather_data.weather[0].main + "<br/>" +
           "<strong>Temperature: </strong>" + weather_data.main.temp + "&deg;F<br/>" +
           "<strong>Min temperature: </strong>" + weather_data.main.temp_min + "&deg;F<br/>" +
           "<strong>Max temperature: </strong>" + weather_data.main.temp_max + "&deg;F<br/>" +
           "<strong>Humidity: </strong>" + weather_data.main.humidity + "%<br/>";

         //display data to the user
         document.getElementById('weather').innerHTML=disp_data;
        

       } else {
         console.error(data.statusText);
       }
     }
   };
   data.onerror = function (e) {
     console.error(data.statusText);
   };
   data.send(null);

   var url2 = "http://api.openweathermap.org/data/2.5/weather?q="+endd+"&units=imperial&appid=ed1a67fff8efc8c340a706478c72b9ab";
   console.log("Fetch from service: " + url2);
   var data2 = new XMLHttpRequest();
   data2.open("GET", url2, true);
   data2.onload = function (e) {
     if (data2.readyState === 4) {
       if (data2.status === 200) {
         var weather_data2 = JSON.parse(data2.response);
         var disp_data2 = "<strong>Place</strong><br/>" + endd + "<br/>" +
           "<strong>Weather: </strong>" + weather_data2.weather[0].main + "<br/>" +
           "<strong>Temperature: </strong>" + weather_data2.main.temp + "&deg;F<br/>" +
           "<strong>Min temperature: </strong>" + weather_data2.main.temp_min + "&deg;F<br/>" +
           "<strong>Max temperature: </strong>" + weather_data2.main.temp_max + "&deg;F<br/>" +
           "<strong>Humidity: </strong>" + weather_data2.main.humidity + "%<br/>";

         //display data to the user
         document.getElementById('weather2').innerHTML=disp_data2;
         
        

       } else {
         console.error(data2.statusText);
       }
     }
   };
   data2.onerror = function (e) {
     console.error(data2.statusText);
   };
   data2.send(null);
        
}


//google maps api callback
      function initMap() {
        var infowindow = new google.maps.InfoWindow();
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 41.85, lng: -87.65}
        });
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById('right-panel'));

        var control = document.getElementById('floating-panel');
        control.style.display = 'block';
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        document.getElementById('start').addEventListener('change', onChangeHandler);
        document.getElementById('end').addEventListener('change', onChangeHandler);
      }
//directions on the map
https://maps.googleapis.com/maps/api/directions/json?origin=Chicago,IL&destination=Los+Angeles,CA&waypoints=Joplin,MO|Oklahoma+City,OK&key=AIzaSyD2y-9SB-J0l-JuA1Get9bipcDZe7O10m4
      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var start = document.getElementById('start').value;
        var end = document.getElementById('end').value;
        directionsService.route({
          origin: start,
          destination: end,
          provideRouteAlternatives: true,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
            console.log('');
            
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });

}

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-SsGYbKQOCNxo7isToUf1ii6CUeyiXrE&callback=initMap">
    </script>
  </body>
</html>
