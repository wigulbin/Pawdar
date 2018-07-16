<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <?php
            $servername = "mydbinstance.cccytcqpsiqq.us-west-2.rds.amazonaws.com";
            $username = "admin";
            
            //REMOVED
            $password = null;
            
            $dbname = "mydb";
            
            try {
                //$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $mysqli = new mysqli($servername, $username, $password, $dbname);
                echo "Email: ". "<br>Password: ";
                
            /*
                // prepare sql and bind parameters
                $stmt = $conn->prepare("SELECT user WHERE email=? AND password=?");
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                
                echo "Hi<br>";
            
                // insert a row*/
                $email = $_REQUEST['email'];
                $password = $_REQUEST['password'];
                echo "Email: ".$email . "<br>Password: ".$password;
                //echo $stmt;
               // echo "Hi<br>";
                $stmt = $mysqli->prepare("SELECT zipcode FROM user WHERE email=? AND user_password=?");
                
                
                $stmt->bind_param("ss", $email, $password);
                //$stmt->bind_param("s", $password);
               
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($user_zipcode);
                $stmt->fetch();
                $rows = $stmt->num_rows();
                if($rows){
                    
                    $_SESSION["zipcode"] = $user_zipcode;
                    $_SESSION["user"] = $email;
                }
                $stmt->free_result();
                $stmt->close();
                $mysqli->close();
                echo "New records created successfully";
                print_r($_SESSION);
                }
            catch(PDOException $e)
                {
                echo "Error: " . $e->getMessage();
                }
            $conn = null;
            
            
            ?>
        <a href="/signup.html">Back</a>
    </body>
</html>
