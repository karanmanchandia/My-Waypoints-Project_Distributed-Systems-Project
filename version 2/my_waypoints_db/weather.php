<!DOCTYPE html> <!--HTML5 declaration-->
<html>
    <head>
        <title>Google Map</title>   
       <style>
       html,
body {
  height: 100%;
  margin: 0px;
  padding: 0px;
}

#map {
  height: 100%;
}

#userIp {
  height: 25px;
  width: 25%;
  background-color: white;
  color: black;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  border: 1px solid transparent;
  margin-top: 10px;
  border-radius: 1px;
  box-shadow: 0 2px 6px lightslategrey;
  text-indent: 5px;
}
       
       
       
       </style>
    </head>
    <body>
        <input id="userIp" class="controls" type="text" placeholder="Enter a location"> <!-- creating searchbox -->
        <div id="map"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEzeHHRm_iDhmgjqsPRvPVqvtmZX_QbqM&v=3&libraries=places&callback=initMap" async defer></script>
    
    <script>
    function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), { //Initializing the google map
    center: {
      lat: 13.000269,
      lng: 77.574641
    }, //initial position of the map
    zoom: 11 //initial zoom value
  });

  //receiving input from the HTML search box 
  var input = document.getElementById('userIp');
  //autocomplete function helps the user to autofill the search box 
  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);

  //positioning the search box towards the top left corner of the map
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  var infowindow = new google.maps.InfoWindow(); //initializing the infowindow object
  var marker = new google.maps.Marker({ //initializing the marker object
    map: map
  });

  marker.addListener('click', function() { //adding a listener for the click event
    infowindow.open(map, marker); //opens the infowindow on mouse click
  });

  autocomplete.addListener('place_changed', function() { //close the infowindow
    infowindow.close();
    var place = autocomplete.getPlace(); //returns if the input location is not found
    if (!place.geometry) {
      return;
    }

    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport); //does no change
    } else {
      map.setCenter(place.geometry.location); //position the marker after receiving the location from the user
      map.setZoom(17); //sets the zoom of the map to 17
    }

    // Set the position of the marker using the place ID and location.
    marker.setPlace({
      placeId: place.place_id,
      location: place.geometry.location
    });
    marker.setVisible(true);	
    var disp_data = updateOpenWeatherData(place.geometry.location, infowindow, place.name, place.formatted_address);
  });
}
/*
* Update Open Weather Data
* Fetch the data from open weather data service 
* Update the info window object
* 
*/
var updateOpenWeatherData = function (place, infowindow, name, address) {
   //Calling the weather api 
   var openWeatherMapKey = "d6f3cfaff318f1cdbd19b7bde0259f64";
   var base_url = "http://api.openweathermap.org/data/2.5/weather";
   var url = base_url + "?lat=" + place.lat() + "&lon=" + place.lng() + "&appid=" + openWeatherMapKey + "&units=metric";
   console.log("Fetch from service: " + url);
   var data = new XMLHttpRequest();
   data.open("GET", url, true);
   data.onload = function (e) {
     if (data.readyState === 4) {
       if (data.status === 200) {
         var weather_data = JSON.parse(data.response);
         var disp_data = "<strong>" + name + "</strong><br/>" + address + "<br/>" +
           "<strong>Weather: </strong>" + weather_data.weather[0].main + "<br/>" +
           "<strong>Temperature: </strong>" + weather_data.main.temp + "&deg;C<br/>" +
           "<strong>Min temperature: </strong>" + weather_data.main.temp_min + "&deg;C<br/>" +
           "<strong>Max temperature: </strong>" + weather_data.main.temp_max + "&deg;C<br/>" +
           "<strong>Humidity: </strong>" + weather_data.main.humidity + "%<br/>";

         //Set infowindow data
         infowindow.setContent('<div style= "text-align:left; ">' + disp_data + '</div>');

       } else {
         console.error(data.statusText);
       }
     }
   };
   data.onerror = function (e) {
     console.error(data.statusText);
   };
   data.send(null);
}
    
    </script>
    </body>
</html>
