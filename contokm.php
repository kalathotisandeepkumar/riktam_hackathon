<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geojio";

$lat1=$_POST["lat"];
$lng1=$_POST["lng"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Latitude,Longitude FROM peopleinfo";
$result = $conn->query($sql);
$earthRadius = 3958.75;

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $latitudeTo = $row["Latitude"];
     $longitudeTo = $row["Longitude"];
     echo($latitudeTo."<br>");
     echo($longitudeTo."<br>"."<br>");

echo lat_long_dist_of_two_points($lat1,$lng1,$latitudeTo,$longitudeTo).' Kilometer'."\n"; 

     echo ("<br><br><br>  ");
   }
 }

  else {

  echo "";
}
$conn->close();


?>

<?php
function lat_long_dist_of_two_points($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo){ 
$pi = pi(); 
$x = sin($latitudeFrom * $pi/180) * 
sin($latitudeTo * $pi/180) + 
cos($latitudeFrom * $pi/180) * 
cos($latitudeTo * $pi/180) * 
cos(($longitudeTo * $pi/180) - ($longitudeFrom * $pi/180)); 
$x = atan((sqrt(1 - pow($x, 2))) / $x); 
echo(round(((1.852 * 60.0 * (($x/$pi) * 180)) / 1.609344)* 1.609344,2)); 
} 
// Distance from New York to London
?>