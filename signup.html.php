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
    <script type="text/javascript" src="js/login_script.js"></script>
    <link rel="stylesheet" type="text/css" href="css/signup_style.css">
</head>

<body>
    <div class="container-fluid bgimg">
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
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        <br>
            <br>
        <div class="container bg">
            <h1>Sign Up</h1>
            <span class="sign-in">Have an account? <a href="#" data-toggle="modal" data-target="#myModal2">Login in</a></span>
        
        
            <br>
            <br>
            <div class="row bi">
                <div>
                    <form class="form-horizontal" id="my-form" method="GET" action="php/signup.php">
                        <div class="form-group col-xs-6" id="fnamediv">
                            <label class="col-sm-2" for="fname">First Name:</label>
                            <div class="col-sm-10" id="fnamediv2">
                                <input required type="text" class="form-control" id="fname" name="fname">
                            </div>
                        </div>
                        <div class="form-group col-xs-6" id="lnamediv">
                            <label class="col-sm-2" for="lname">Last Name:</label>
                            <div class="col-sm-10" id="lnamediv2">
                                <input required type="text" class="form-control" id="lname" name="lname">
                            </div>
                        </div>
                        <div class="form-group col-xs-6" id="passworddiv">
                            <label class="col-sm-2" for="password">Password:</label>
                            <div class="col-sm-10" id="passworddiv2">
                                <input required type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="form-group col-xs-6" id="cpassworddiv">
                            <label class="col-sm-2" for="cpassword">Confirm Password:</label>
                            <div class="col-sm-10" id="cpassworddiv2">
                                <input required type="password" class="form-control" id="confirm_password" name="confirm_password">
                            </div>
                        </div>
                        <div class="form-group col-xs-6" id="emaildiv">
                            <label class=" col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10" id="emaildiv2">
                                <input required type="text" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        
                        <div class="form-group col-xs-6">
                            <label class="col-sm-2" for="zip">Zip code:</label>
                            <div class="col-sm-10" id="zipdiv">
                                <input type="text" class="form-control" id="zip" name="zip">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="check-term">I agree to terms&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#myModal">Show me!</a></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <div class="">
                                    <button type="submit" class="col-sm-3 btn btn-default">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Showing you...</h4>
                            </div>
                            <div class="modal-body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal" id="modal-submit">I agree</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <!-- Trigger the modal with a button -->
        
        <!-- Modal -->
        <div id="myModal2" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" id="login1" role="form">
                        <div class="form-group col-xs-12" id="emaildiv">
                            <label class=" col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10" id="emaildiv2">
                                <input required type="text" class="form-control" id="loginemail" name="loginemail">
                            </div>
                        </div>
                        <div class="form-group col-xs-12" id="passworddiv">
                            <label class="col-sm-2" for="password">Password:</label>
                            <div class="col-sm-10" id="passworddiv2">
                                <input required type="password" class="form-control" id="loginpassword" name="loginpassword">
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-sm-6">
                                <div class="">
                                    <button form="login1" type="submit" class="col-sm-3 btn btn-default">Submit</button>
                                </div>
                            </div>
                        </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
        
          </div>
        </div>
        </div>
       
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
    </div>
<div class="footer">
         <div class="container">
            <p>Will Gulbin 2017</p>
         </div>
      </div>
</body>

</html>