<!DOCTYPE html>
<html lang="en" >
<head>
 <meta charset="UTF-8">
 <title>CodePen - User Profile Card Animation</title>
 <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700'>
 <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'><link rel="stylesheet" href="./style.css">
 
   <?php
   include('simple_html_dom.php');
   $cse=file_get_html("https://www.hackerrank.com/leaderboard?page=1&track=algorithms&type=practice");
for($i=0;$i<1;$i++){
         error_reporting(0);
         }
   ?>
</head>
<body>

            <h2 style="color: black;font-size: 1.3em;font-weight: bold;">
               <?php for($i=0;$i<1000;$i++){
               echo $cse->find('.h2-style',$i)->innertext; }?>
   ?>

               </h2>
            
   </body>
   </html>
