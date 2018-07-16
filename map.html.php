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
    <script type="text/javascript" src="js/map.js"></script>
      <link rel="stylesheet" type="text/css" href="css/map.css">
    <style>
     #map_wrapper {
    height: 600px;
}

#map_canvas {
    width: 100%;
    height: 700px;
    margin-top: 10px;
}
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <nav class="navbar navbar-fixed-top my-nav">
         <div class="navbar-header">
            <a href="#" class="navbar-brand">
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
      <?php
          echo "<input type='hidden' id='zipcode' value='".$_SESSION['zipcode']."'/>";
      ?>
    <div class="space container-fluid">
        <h1>Adoption Centers</h1>
        <h3>Get 9 adoption centers, create and account or login to get 10 near you</h3>
    <div id="map_wrapper">
    <div id="map_canvas" class="mapping"></div>
</div>
      
    </div>
    
    </div>
    <script>
    
      
    </script>
    
  </body>
  

</html>