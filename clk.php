<?php 
$name=$_POST['username'];
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Neu Times !</title>
  <link rel="stylesheet" href="./clock/clk.css">
<style>
  button{
     border-radius: 1.333333333333333vmin;
  background-color: white;
  box-shadow: -1vmin -1vmin 2vmin -0.5vmin #f9fbfd, 1vmin 1vmin 2vmin grey;
  font-size: 3em;
  padding: 15px;
  z-index: 99999;
  }
    button:active{
     border-radius: 1.333333333333333vmin;
  background-color: white;
  box-shadow:  1vmin 0vmin 5vmin 0vmin grey;
  font-size: 3em;
  padding: 15px;
  z-index: 99999;
  }
</style>
</head>
<body>
    <button style="position: absolute;top: 10%;left: 20%;" onclick="moveon()">MoveOn</button>

<!-- partial:index.partial.html -->
<div class="clock">
  <div class="hr">

    <div class="strip">

      <div class="number">0</div>
      <div class="number">1</div>
      <div class="number">2</div>
    </div>
    <div class="strip">
      <div class="number">0</div>
      <div class="number">1</div>
      <div class="number">2</div>
      <div class="number">3</div>
      <div class="number">4</div>
      <div class="number">5</div>
      <div class="number">6</div>
      <div class="number">7</div>
      <div class="number">8</div>
      <div class="number">9</div>
    </div>
  </div>
  <div class="min">
    <div class="strip">
      <div class="number">0</div>
      <div class="number">1</div>
      <div class="number">2</div>
      <div class="number">3</div>
      <div class="number">4</div>
      <div class="number">5</div>
    </div>
    <div class="strip">
      <div class="number">0</div>
      <div class="number">1</div>
      <div class="number">2</div>
      <div class="number">3</div>
      <div class="number">4</div>
      <div class="number">5</div>
      <div class="number">6</div>
      <div class="number">7</div>
      <div class="number">8</div>
      <div class="number">9</div>
    </div>
  </div>
  <div class="sec">
    <div class="strip">
      <div class="number">0</div>
      <div class="number">1</div>
      <div class="number">2</div>
      <div class="number">3</div>
      <div class="number">4</div>
      <div class="number">5</div>
    </div>
    <div class="strip">
      <div class="number">0</div>
      <div class="number">1</div>
      <div class="number">2</div>
      <div class="number">3</div>
      <div class="number">4</div>
      <div class="number">5</div>
      <div class="number">6</div>
      <div class="number">7</div>
      <div class="number">8</div>
      <div class="number">9</div>
    </div>
  </div>

</div>
<form action="main.php" method="POST" style="display:none">
  <input type="text" name="username" value="<?php echo($name);?>">
  <input type="submit" id="moveon">
</form>

<!-- partial -->
  <script  src="./clock/clk.js"></script>
<script>
    function moveon(){
document.getElementById("moveon").click();
  }
</script>
</body>
</html>
