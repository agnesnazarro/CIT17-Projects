<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Demo</title>
</head>
<body>
    <?php
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';

        $mysqli = new mysqli($dbhost, $dbuser, $dbpass);
        
        //Connecting to Database
        if($mysqli->connect_errno ) {
            printf("Connect failed: %s<br />", $mysqli->connect_error);
            exit();
         }
         printf('Connected successfully.<br />');
        
        $mysqli->close();
    ?>
</body>
</html>