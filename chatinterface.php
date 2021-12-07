<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="messanger.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-database.js"></script>

<link rel="stylesheet" href="css/normalize.css">

    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.min.css'>

        <link rel="stylesheet" href="css/messanger.css">

<input type="text" value="<?php echo $username;?>" id="uservalue" style="display: none;">

<script>
      var uservalue = document.getElementById("uservalue").value;

  // Your web app's Firebase configuration
var firebaseConfig = {
    apiKey: "AIzaSyAabHu2VgSVbtfvc8A0GZJN84HXIUKlw48",
    authDomain: "messanger-2d527.firebaseapp.com",
    databaseURL: "https://messanger-2d527-default-rtdb.firebaseio.com",
    projectId: "messanger-2d527",
    storageBucket: "messanger-2d527.appspot.com",
    messagingSenderId: "637004004470",
    appId: "1:637004004470:web:c9743f8ccf8980eab73357"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

  firebase.database().ref("messages").on("child_removed", function (snapshot) {
    document.getElementById("message-" + snapshot.key).innerHTML = "This message has been deleted";
  });

  function deleteMessage(self) {
    var messageId = self.getAttribute("data-id");
    firebase.database().ref("messages").child(messageId).remove();
  }

  function sendMessage() {
    var message = document.getElementById("message").value;
    var uservalue = document.getElementById("uservalue").value;
    firebase.database().ref("messages").push().set({
      "message": message,
      "sender": myName
    });
    return false;
  }
</script>
    <title>Peppo</title>
<style>
    figure.avatar {
    bottom: 0px !important;
  }
  .btn-delete {
    background: red;
    color: white;
    border: none;
    margin-left: 10px;
    border-radius: 5px;
  }
    .fixed-bottom {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: lightseagreen;
        color: white;
        text-align: center;
        padding: 25px;
        font-size: 20px;
    }

</style>
<style>

body {
  height: 100vh;
  overflow: hidden;
  background-color: #faf8f5;
}


#canvas {
  width: 100%;
  max-width: 100%;
  height: 100%;
  display: block;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  z-index: -999999;
  
  cursor: pointer;
}


#canvas,#front {
  display: none;
}
</style>
 </head>
 <body >
  <canvas id="canvas"></canvas>
  <div >
<img id="front" src="https://www.pixel4k.com/wp-content/uploads/2020/02/color-powder-spray_1580590024.jpg">
</div>
      <div id="center-text">
          <h1>Peppo</h1>
          <p>I smile whenever, I get a mesage from you.❤️</p>
        </div> 
      <div id="body"  > 
        
            <div id="chat-circle" class="btn btn-raised"  onclick="scrollWin()">
                    <img src="https://image.flaticon.com/icons/png/512/1489/1489954.png" width="150%" onclick="scrollWin()">
              </div>
              <div class="chat-box">
                <div class="chat-box-header">
                  Peppo's Room
                  <span class="chat-box-toggle"><i class="material-icons">X</i></span>
                </div>
                <div class="chat-box-body" >
                  
                  <div class="chat-logs" id="aaa">
                  <div class="chat" id="aaa">
                        <div class="messages" id="aaa">
                          <div class="messages-content" id="aaa"></div>

                        </div>
                  </div>
                  </div><!--chat-log -->
                </div>
                <div class="chat-input">      
                    <div class="message-box" id="message-box">
                          <textarea type="text" value="" class="message-input" id="message" placeholder="Type message..."></textarea>
                          <a href="#end" type="submit" id="chat-submit" class="message-submit"  onclick="scrollWin()"> Send</a>
                        </div>
                </div>
              </div>
      </div>




<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>





<script id="rendered-js" >
const canv = document.getElementById("canvas"),
ctx = canv.getContext("2d"),
img = document.getElementById("front"),
imgMask = new Image();

 imgMask.src = "http://res.cloudinary.com/dkcygpizo/image/upload/v1505176018/codepen/watercolor-effect-2.png";
//imgMask.src = "https://res.cloudinary.com/dkcygpizo/image/upload/v1505176017/codepen/cloud-texture.png";

let speed = 0;
let requestId;

function draw() {
  speed += 30;

  const maskX = (canv.width - (70 + speed)) / 2,
  maskY = (canv.height - (40 + speed)) / 2;

  ctx.clearRect(0, 0, canv.width, canv.height);
  ctx.globalCompositeOperation = "source-over";

  ctx.drawImage(imgMask, maskX, maskY, 70 + speed, 40 + speed);

  ctx.globalCompositeOperation = "source-in";
  ctx.drawImage(img, 0, 0, 10000, 10000);

  requestId = window.requestAnimationFrame(draw);
}

img.onload = () => {
  canv.width = img.naturalWidth;
  canv.height = img.naturalHeight;

  setTimeout(() => {
    canv.style.display = "block";
    draw();
  }, 0);
};

//# sourceURL=pen.js
    </script>


















 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!-- Optional JavaScript -->

</script>
 <script>
  
  $("#chat-circle").click(function() {    
    $("#chat-circle").toggle('scale');
    $(".chat-box").toggle('scale');
  })
  
  $(".chat-box-toggle").click(function() {
    $("#chat-circle").toggle('scale');
    $(".chat-box").toggle('scale');
  })
  

    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.concat.min.js'></script>

        <script src="js/messanger.js?v=<?= time(); ?>"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>