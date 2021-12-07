<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>
	*{
		text-align: center;
	}
</style>
<?php
$servername = "localhost";
$username = "roots";
$password = "";
$dbname = "geojio";
$name=$_POST['username'];
$password=$_POST['password'];
$Latitude=$_POST['Latitude'];
$Longitude=$_POST['Longitude'];
$Referal =$_POST['Referal_Code'];
$phno=$_POST['phno'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
}

$ref=rand(0000,9999);







$sql = "SELECT Referal_Code,KarmaPoints FROM details";
$result = $conn->query($sql);

if ( !empty($result->num_rows) && $result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {

            if($row["Referal_Code"]==$Referal){
                $kp=$row["KarmaPoints"];
                $sql = "INSERT INTO `details`(`UserName`, `Password`, `Phno`, `Latitude`, `Longitude`,`Referal_Code`,`KarmaPoints`) VALUES ('$name','$password','$phno','$Latitude','$Longitude','$ref',0)";
                $sql1= "UPDATE details SET KarmaPoints=$kp+100 WHERE Referal_Code=$Referal";
                $sql2= "UPDATE details SET KarmaPoints=100 WHERE UserName='$name'";

                if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
                        echo "<div class='alert alert-success' role='alert'>  Sucesfully Registered </div><script>location.href='index.php'</script>";
                } else {
                        echo "<div class='alert alert-danger' role='alert'>  wUnsucesfully Registered </div><script>location.href='registration.php'</script>";
                }
        }
        else{
                if($row["Referal_Code"]==$Referal){
                        $sql = "INSERT INTO `details`(`UserName`, `Password`, `Phno`, `Latitude`, `Longitude`,`Referal_Code`,`KarmaPoints`) VALUES ('$name','$password','$phno','$Latitude','$Longitude','$ref',0)";
                        if ($conn->query($sql) === TRUE) {
                                echo "<div class='alert alert-success' role='alert'>  Sucesfully Registered </div><script>location.href='index.php'</script>";
                        } else {
                                echo "<div class='alert alert-danger' role='alert'>  Unsucesfully Registered </div><script>location.href='registration.php'</script>";
                        }
                }
        }
} 
}

$conn->close();
?>