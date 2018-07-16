<?php
    session_start();
?>
<!DOCTYPE html>
<html>
   <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://use.fontawesome.com/f1a64e0a26.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
      <script type="text/javascript" src="js/script.js"></script>
      <link rel="stylesheet" type="text/css" href="css/style.css">
   </head>
   <body>
      <div class="container-fluid">
         <button class="fixed-button btn btn-default" id="fixed-button"><i class="fa fa-arrow-up fa-2x" aria-hidden="true"></i></button>
      <nav class="navbar navbar-fixed-top my-nav">
         <div class="navbar-header">
            <a href="index.html" class="navbar-brand">
              <i class="fa fa-paw fa-2x first" aria-hidden="true">Pawdar</i>
            </a>
         </div>
         <ul class="nav navbar-nav my-nav-div">
            
         </ul>
         <ul class="nav navbar-nav my-nav-div navbar-right">
            <li class="my-nav-item active"><a href="index.html.php">Home</a></li>
            <li class="my-nav-item"><a href="map.html.php">Pets near you</a></li>
            <li class="my-nav-item"><a href="viewer.html.php">Pet List</a></li>
            <?php
               
            ?>
            <?php
                if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                    echo '<li class="my-nav-item active signup"><a href="logout.php">Logout</a></li>';
                }else{
                    echo '<li class="my-nav-item active signup"><a href="signup.html.php">Sign Up | Login</a></li>';
                }
                
            ?>
         </ul>
      </nav>
         <div class="row bgimg">
              <div class="title-center">
                 <button class="more-info btn btn-default">More Info</button>
                 <h3>Find a pet near you!</h3>
              </div>
              
                 <div class="container">
                    <div class="row">
                       <div class="col-xs-3 col-xs-offset-3 item-list">
                          <a href="map.html.php"><i id="scroll-to-nav" class="fa fa-map-o fa-4x fa-inverse" aria-hidden="true"></i></a>
                          
                       </div>
                       <div class="col-xs-3 col-xs-offset-2">
                          <a href="viewer.html.php"><i id="scroll-to-nav" class="fa fa-list fa-4x fa-inverse" aria-hidden="true"></i></a>
                          
                       </div>
                    </div>
                 </div>
                 
              
         </div>
         <br>
         <div class="row" id="scroll-to">
            
            <div class="col-xs-4"></div>
            <div class="col-xs-4">
               <div>
                  <div class="col-xs-4"></div>
                  <i class="fa fa-paw fa-5x fa-rotate-180 first" aria-hidden="true"></i>
                  <br>
                  <div class="col-xs-6"></div>
                  <i class="fa fa-paw fa-5x fa-rotate-180 second" aria-hidden="true"></i>
                  <br>
                  <div class="col-xs-4"></div>
                  <i class="fa fa-paw fa-5x fa-rotate-180 third" aria-hidden="true"></i>
                  <br>
                  <i class="fa fa-paw fa-5x fa-rotate-180 fourth" aria-hidden="true"></i>
                  <div class="col-xs-6"></div>
               </div>
               <hr>
               <div>
                  <h1>What is Pawdar?</h1>
                  <br>
                  <p>Pawdar is a webservice that was developed to allow you to have an easy way to find pets to adopt. This is done by finding pets near your location and finding nearby shelters that carry pets that you want.</p>
                  <br>
               </div>
               <hr>
               <div class="col-xs-4"></div>
                  <div></div>
                  <i class="fa fa-paw fa-5x fa-rotate-180 first" aria-hidden="true"></i>
                  <br>
                  <div class="col-xs-6"></div>
                  <i class="fa fa-paw fa-5x fa-rotate-180 second" aria-hidden="true"></i>
                  <br>
                  <div class="col-xs-4"></div>
                  <i class="fa fa-paw fa-5x fa-rotate-180 third" aria-hidden="true"></i>
                  <br>
                  <i class="fa fa-paw fa-5x fa-rotate-180 fourth" aria-hidden="true"></i>
                  <div class="col-xs-6"></div>
               <div>
                  <h1>How does Pawdar work?</h1>
                  <br>
                  <p>This service works by pulling information from the RescueGroups API such as pet location, species, and other data and displaying that to you in an organized fashion. This tool also makes use of the google maps api to show adoption centers nearby to you</p>
               </div>
            </div>
            <div class="col-xs-4"></div>
         </div>
      </div>
      <hr>
      <div class="footer">
         <div class="container">
            <p>Will Gulbin 2017</p>
         </div>
      </div>
   </body>
   
</html>