<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>
	*{
		text-align: center;
	}
</style><?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geojio";
$name=$_POST['username'];
$password=$_POST['password'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM details WHERE UserName='$name' and Password='$password'";
 
if($res = $conn->query($sql)){
    if($res->num_rows > 0){
        echo "<div class='alert alert-success' role='alert'>  Sucesfully Logined </div>";
        echo "<form method='POST' action='clk.php' style='display:none'><input type='text' name='username' value='$name'> <input type='submit' id='submit'></form>";
        $result="true";
        echo "<script>setTimeout(function(){ document.getElementById('submit').click(); }, 1000);</script>";

    } 
    else{
        echo "<div class='alert alert-danger' role='alert'>  Unsucesfully Logined </div>";
        $result="false";
        echo "<script>setTimeout(function(){ location.href='index.php'; }, 1000);</script>";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " 
                                    . $conn->error;
}
  
$conn->close();
?>