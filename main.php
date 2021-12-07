<?php 
$name=$_POST['username'];
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geojio";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT KarmaPoints,Referal_Code FROM details WHERE UserName='$name'";
$result0 = $conn->query($sql);

if ($result0 !== false && $result0->num_rows > 0){
  while($row0 = $result0->fetch_assoc()) {
    $kp=$row0["KarmaPoints"];
    $rp=$row0["Referal_Code"];
  }
} 
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/style.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
  <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <meta name="viewport" content= "width=device-width, user-scalable=no">
  <style>
    *,
:before,
:after {
  box-sizing: border-box;
}

html {
  color: black;
  font-size: bold;
}

@-webkit-keyframes fadeInScale {
  0% {
    opacity: 0;
    transform: scale(0) translateY(50%);
  }
  90% {
    transform: scale(1.05);
  }
  100% {
    opacity: 1;
    transform: scale(1) translateY(0);
  }
}

@keyframes fadeInScale {
  0% {
    opacity: 0;
    transform: scale(0) translateY(50%);
  }
  90% {
    transform: scale(1.05);
  }
  100% {
    opacity: 1;
    transform: scale(1) translateY(0);
  }
}
.container {
  position: absolute;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.card {
  position: relative;
  width: 30em;
  background-color: #292929;
  transition: all 0.3s ease-in-out;
}
.card:hover {
  box-shadow: 0 10px 20px 10px rgba(0, 0, 0, 0.2);
}

.card__link {
  display: block;
  padding: 1em;
  text-decoration: none;
}

.card__icon {
  position: absolute;
  width: 4em;
  height: 4em;
  transition: all 0.3s ease-in-out;
}
.card__icon .card__header-title1 {
   position: absolute;
right: 0px;
}
.card:hover .card__icon {
  opacity: 0;
  transform: scale(0);
}

.card__media {
  padding: 2em 0;
}
.card__media svg path {
  opacity: 0;
  transition: all 0.3s ease-in-out;
  transform-origin: center center;
}
.card:hover .card__media svg path {
  -webkit-animation: fadeInScale 0.3s ease-in-out forwards;
          animation: fadeInScale 0.3s ease-in-out forwards;
}
.card:hover .card__media svg path:nth-child(2) {
  -webkit-animation-delay: 0.1s;
          animation-delay: 0.1s;
}
.card:hover .card__media svg path:nth-child(3) {
  -webkit-animation-delay: 0.2s;
          animation-delay: 0.2s;
}

.card__header {
  position: relative;
}

.card__header-title {
  margin: 0 0 0.25em;
  color: white;
}

.card__header-meta {
  margin: 0;
  color: #999;
}

.card__header-icon {
  opacity: 0;
  position: absolute;
  right: 0;
  top: 50%;
  margin-top: -1em;
  transform: translateX(-20%);
  width: 2em;
  height: 2em;
  transition: all 0.3s ease-in-out;
}
.card:hover .card__header-icon {
  opacity: 1;
  transform: translateX(0);
}
  </style>
</head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-firebase icon'></i>
      <div class="logo_name">Performance tracker</div>
      <i class='bx bx-menu' id="btn" ></i>  
    </div>
    <ul class="nav-list">
      <li>
        <i class='bx bx-search' ></i>
        <input type="text" placeholder="Search...">
        <span class="tooltip">Search</span>
      </li>
      <li>
        <a href="#" onclick="nearby()">
          <i><span class="iconify" data-icon="ic:twotone-near-me"></span></i>
          <span class="links_name" onclick="nearby()">Near By</span>
        </a>
        <span class="tooltip" onclick="nearby()">Near By</span>
      </li>
      
      <li>
       <a href="#" onclick="commingsoon()">
        <i><span class="iconify" data-icon="bx:bx-sitemap"></span></i>
        <span class="links_name" onclick="items()">Item List</span>
      </a>
      <span class="tooltip" onclick="items()">Items List</span>
    </li>

    <li>
     <a href="#"  onclick="Points()">
      <i class='bx bx-trending-u'><span class="iconify" data-icon="grommet-icons:scorecard"></span></i>        
      <span class="links_name"  onclick="Points()">Karma Points  </span>
    </a>
    <span class="tooltip">Karma Points  </span>
  </li>

    <li>
     <a href="#" onclick="commingsoon()">
      <i><span class="iconify" data-icon="bx:bx-list-plus"></span></i>        
      <span class="links_name"  onclick="Points()">Products</span>
    </a>
    <span class="tooltip">Products</span>
  </li>

    <li>
     <a href="#" onclick="commingsoon()">
      <i><span class="iconify" data-icon="codicon:settings"></span></i>        
      <span class="links_name"  onclick="Points()">Settings  </span>
    </a>
    <span class="tooltip">Settings</span>
  </li>

<li class="profile">
 <div class="profile-details">
   <!--<img src="profile.jpg" alt="profileImg">-->
   <div class="name_job">
     <div class="name"><?php echo($name);  ?></div>
     <div class="job">TouchIT</div>
   </div>
 </div>
 <i class='bx bx-log-out' id="log_out" onclick="location.href='../index.php'"></i>
</li>
</ul>
</div>
</div>
<form method="post" action="all.php" style="display:none;">
  <input type="text" name="name"value="<?php echo($name); ?>">  
  <input type="submit" id="allsubmit">
</form>
<script>
  function nearby() {
    document.getElementById("allsubmit").click();
  }
</script>






<section  style="height: 100%;width: 100%;position: absolute;top: 0px;left:0px;" class="home-section">
    <div style="position: absolute;top:30%;left: 45%;margin: auto;font-size: 3em;"id="welcomename">
    <h1>welcome</h1>
    <?php echo($name)?>
  </div>







<div class="container" style="display: none;position: absolute;top: 15%;left: 40%;" id="points">
  <article class="card">
    <a href="#" class="card__link">
        <h1 style="text-align: right;color: grey;font-size: 1.5em;">Karma Points <span style="color: white; font-size: 2.3em;"><?php echo($kp)?></span></h1>
    
      <!-- Icon -->
      <div class="card__icon">


        <svg viewbox="0 0 1129 994">
          <g fill="none" fill-rule="nonzero" stroke="#999" stroke-width="41">
            <path d="M564.5 212.437L95.67 873.5h937.66L564.5 212.437z"/>
            <path d="M564.5 407.47L163.638 973.5h801.724L564.5 407.47z"/>
            <path d="M564.5 35.409L39.699 774.5H1089.3L564.5 35.409z"/>
          </g>
        </svg>
        
      </div>

      <!-- Media -->
      <div class="card__media">
        <svg viewbox="0 0 1129 994">
          <g fill="none" fill-rule="nonzero" stroke="#F5F5F5" stroke-width="41">
            <path d="M564.5 212.437L95.67 873.5h937.66L564.5 212.437z"/>
            <path d="M564.5 407.47L163.638 973.5h801.724L564.5 407.47z"/>
            <path d="M564.5 35.409L39.699 774.5H1089.3L564.5 35.409z"/>
          </g>
        </svg>
      </div>

      <!-- Header -->
      <div class="card__header">
        
        <h3 class="card__header-title">Referal Code - <?php echo($rp)?></h3>
        <p class="card__header-meta">Get More Points</p>
        <div class="card__header-icon">
          <svg viewbox="0 0 28 25">
            <path fill="#fff" d="M13.145 2.13l1.94-1.867 12.178 12-12.178 12-1.94-1.867 8.931-8.8H.737V10.93h21.339z"/>
          </svg>
        </div>
      </div>
      
    </a>
  </article>
</div>













<div id="commingsoon" style="display:none">
      <div style="position: absolute;top:0%;left: 0%;margin: auto;font-size: 3em;">
    <h1>Comming Soon....</h1>
  </div>

</div>








<script type="text/javascript">


  function Points(){
    document.getElementById('points').style.display='block';
    document.getElementById('commingsoon').style.display='none';  
    document.getElementById('welcomename').style.display='none';  
  }

function commingsoon(){
  document.getElementById('commingsoon').style.display='block';
    document.getElementById('points').style.display='none';
    document.getElementById('welcomename').style.display='none';  

}
</script>
</section> 

<script src="./js/script.js"></script>
</body>
</html>
