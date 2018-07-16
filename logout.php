<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <?php
            // remove all session variables
            session_unset(); 
        
            // destroy the session 
            session_destroy(); 
            
            header("Location: index.html.php", true, 301);
            exit();
        ?>
    </body>
</html>
