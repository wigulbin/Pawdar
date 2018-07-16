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
      <script type="text/javascript" src="js/findpet.js.php"></script>
      <link rel="stylesheet" type="text/css" href="css/findpet.css">
   </head>
   <body>
      
      <div class="container-fluid">
         <nav class="navbar navbar-fixed-top my-nav">
            <div class="navbar-header">
               <a href="index.html" class="navbar-brand">
               <i class="fa fa-paw fa-2x first" aria-hidden="true">Pawdar</i>
               </a>
            </div>
            <ul class="nav navbar-nav my-nav-div">
            </ul>
            <ul class="nav navbar-nav my-nav-div navbar-right">
               <li class="my-nav-item"><a href="index.html.php">Home</a></li>
               <li class="my-nav-item"><a href="map.html.php">Pets near you</a></li>
               <li class="my-nav-item"><a href="viewer.html.php">Pet List</a></li>
               <?php
                  if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                     echo '<li class="my-nav-item active signup"><a href="logout.php">Logout</a></li>';
                  }else{
                     echo '<li class="my-nav-item active signup"><a href="signup.html.php">Sign Up | Login</a></li>';
                  }
               ?>
            </ul>
         </nav>
         <div class="container pet-items">
            
            
            <div class="row">
               <form id="pet-form" class="form-group get-pets form-group" role="form">
                  
                  <div id="aspecies" class="form-group col-xs-8 col-md-4">
                     <input placeholder="Enter species of animal" class="form-control" id="animalspecies" type="text" name="animalspecies"/>
                  </div>
                  <div id="abreed" class="form-group col-xs-8 col-md-4">
                     <input placeholder="Enter Breed of animal" class="form-control" id="animalbreed" type="text" name="animalbreed"/>
                  </div>
                  <div id="asize" class="form-group col-xs-8 col-md-4">
                     <select class="form-control" id="animalsize" name="animalsize">
                        <option value="">Any</optino>
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                     </select>
                     </div>
                  <div id="aradius" class="form-group col-md-4">
                     <input placeholder="Enter Radius from your zip" class="form-control" id="radius" type="text" name="radius">
                  </div>
                  <?php
                     if(isset($_SESSION['zipcode']) && !empty($_SESSION['zipcode'])){
                        echo '<input type="hidden" id="zipcode" name="zipcode" value="' . $_SESSION['zipcode'] . '"/>';
                     }else{
                        echo '<input type="hidden" id="zipcode" name="zipcode" value="none"/>';
                        
                     }
                  ?>
                  <div class="col-xs-4">
                     <input class="btn btn-primary" type="submit" value="Submit"/>
                  </div>
               </form>
            </div>
            <div class="container well hide" id="pets">
               <div class="row item">
               </div>
            </div>
            <div class="img hide">
               <img id='loader' class='img-loader' src='img/ajax-loader.gif'></img>
            </div>
         </div>
      </div>
   </body>
</html>