<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geojio";

$name=$_POST['name'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// Distance from New York to London

$sql0 = "SELECT * FROM details where UserName='$name'";
$result0 = $conn->query($sql0);
if ($result0 !== false && $result0->num_rows > 0){
  while($row0 = $result0->fetch_assoc()) {
    $lat1=$row0["Latitude"];
    $lng1= $row0["Longitude"];
  }
} 
else{
  
}

$sql = "SELECT * FROM details";
$result = $conn->query($sql);

?>



<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css'><link rel="stylesheet" href="css/all.css">

</head>
<body>
  <div class="container" ng-app="formvalid">
    <div class="panel" data-ng-controller="validationCtrl">
      <div class="panel-heading border">    
        <h2>
        </h2>
      </div>
      <div class="panel-body">
        <table class="table table-bordered bordered table-striped table-condensed datatable" ui-jq="dataTable" ui-options="dataTableOpt">
          <thead>
            <tr>
              <th>Name</th>

              <th>KiloMeter</th>

            </tr>
          </thead>
          <tbody>
            <?php         
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {

              if($row["Latitude"] == $lat1 && $row["Longitude"] == $lng1){
                 
              }
                else{
                $latitudeTo = $row["Latitude"];
                      $longitudeTo = $row["Longitude"];
                ?>
                <tr>
                  <td><?php  echo ( $row["UserName"]); ?></td>  
                  <td><?php 
                  $sql11 = "SELECT Latitude,Longitude FROM peopleinfo";
                  $result11 = $conn->query($sql11);
                  $earthRadius = 3958.75;

                  if ($result11->num_rows > 0) {
                    // output data of each row
                    while($row1 = $result11->fetch_assoc()) {

                    $pi = pi(); 
                    $x = sin($lat1 * $pi/180) * 
                    sin($latitudeTo * $pi/180) + 
                    cos($lat1 * $pi/180) * 
                    cos($latitudeTo * $pi/180) * 
                    cos(($longitudeTo * $pi/180) - ($lng1 * $pi/180)); 
                    $x = atan((sqrt(1 - pow($x, 2))) / $x); 
                    $results=((1.852 * 60.0 * (($x/$pi) * 180)) / 1.609344)* 1.609344; 
                    echo(number_format($results,1));
                  } } 
                ?></td>
                </tr><?php }} }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- partial -->
      <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.0.0/ui-bootstrap-tpls.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/angular-ui-utils/0.1.1/angular-ui-utils.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js'></script>
      <script src='https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js'></script>
      <script  src="js/all.js"></script>

    </body>
    </html>
