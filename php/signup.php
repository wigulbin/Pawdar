<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <?php
        
        $servername = "mydbinstance.cccytcqpsiqq.us-west-2.rds.amazonaws.com";
        $username = "admin";
        $password = null;
        $dbname = "mydb";
        
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            // prepare sql and bind parameters
            $stmt = $conn->prepare("INSERT INTO user (first_name, last_name, email, tphone, user_password, zipcode, city, state) 
            VALUES (:firstname, :lastname, :email, :tphone, :password, :zipcode, :city, :state)");
            $stmt->bindParam(':firstname', $first);
            $stmt->bindParam(':lastname', $last);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':tphone', $tphone);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':zipcode', $zip);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':state', $state);
            
        
            // insert a row
            $first = $_REQUEST['fname'];
            $last = $_REQUEST['lname'];
            $password = $_REQUEST['password'];
            $email = $_REQUEST['email'];
            $tphone = $_REQUEST['tphone'];
            $city = $_REQUEST['city'];
            $state = $_REQUEST['state'];
            $zip = $_REQUEST['zip'];
            $stmt->execute();
        
            
        
            echo "New records created successfully";
            }
        catch(PDOException $e)
            {
            echo "Error: " . $e->getMessage();
            }
        $conn = null;
        ?>
    </body>
</html>
