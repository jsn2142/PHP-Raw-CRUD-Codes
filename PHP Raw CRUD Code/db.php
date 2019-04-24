<!DOCTYPE html>
<html>
<head></head>
<body>
<?php
        
        
       $link= mysqli_connect("localhost", "root", "", "jsn2142");
        if($link===false)
        {
            die("ERROR: Could Not Connect." .mysqli_connect_error());
        }
        $sql= "CREATE TABLE users(
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            username VARCHAR(30) NOT NULL,
            password VARCHAR(3000) NOT NULL,
            email VARCHAR(30) NOT NULL
        )";
        
        if (mysqli_query($link, $sql))
        {
            echo "DataBase Created Successfully!";
        }
        else
        {
            echo "ERROR. Could not execute $sql.".mysqli_error($link);
        } 
        mysqli_close($link);
    
    ?>
</body>
</html>