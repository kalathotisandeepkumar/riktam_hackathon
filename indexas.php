<?php 
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geojio";

$conn = new mysqli($servername, $username, $password, $dbname);

$lat=$_POST["lat"];
$lng=$_POST["lng"];





$sql = "SELECT * from peopleInfo";

if ($result = mysqli_query($conn, $sql)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
    
    // Display result
 }
?>



<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/style1.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">

  <h1>Geolocation Demo</h1>

<form action="result.php" method="post">          
        <button type="submit" class="find-me" >Find My Location</button><br><br><br><br>
        Latitude:  <input type='text' value="<php echo($lat) ?>" name="lat" id="latitude"></input> <br><br>
        Longitude: <input type='text' value="<php echo($lng) ?>" name="lng" id="longitude"></input>
  <p class="no-browser-support">Sorry, the Geolocation API isn't supported in Your browser.</p>
  <div class="map-overlay">
    <div id="map"></div>
  </div>
       <br><br> <input type="submit" value="Save Location" /><br><br><br><br>
</form>


</div>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAXn-n3OLXpHJz5x9aua7xrD8IiIhFcdM">
</script>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.25/gmaps.min.js'></script>


<script>
  var findMeButton = $('.find-me');

// Check if the browser has support for the Geolocation API
if (!navigator.geolocation) {

  findMeButton.addClass("disabled");
  $('.no-browser-support').addClass("visible");

} else {

  findMeButton.on('click', function(e) {

    e.preventDefault();

    navigator.geolocation.getCurrentPosition(function(position) {

      // Get the coordinates of the current possition.
      var lat = position.coords.latitude;
      var lng = position.coords.longitude;
      document.getElementById("latitude").value=lat;
      document.getElementById("longitude").value=lng;

      var x=<?php echo($lat) ?>;
      var y=<?php echo($lng) ?>;

      // Create a new map and place a marker at the device location.
      var map = new GMaps({
        el: '#map',
        lat: x,
        lng: y
      });

      map.addMarker({
        lat: x,
        lng: y
      });


    });

  });

document.getElementById("").click();

}

</script>

</body>
</html>
