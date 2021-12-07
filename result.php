<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geojio";

$lat=$_POST["lat"];
$lng=$_POST["lng"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO peopleInfo (Latitude, Longitude)
VALUES ($lat,$lng)";

if ($conn->query($sql) === TRUE) {
  echo "<br><br>
        <form action='all.php' method='post'>
        Latitude:  <input type=text value='$lat' name='lat'></input> <br><br>
        Longitude: <input type=text value='$lng' name='lng'></input>
        <input type='submit' id='back'>
        </form>
        <script>
        
          document.getElementById('back').click();
        
        </script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  }
$conn->close();
?>