<?php
        
        
       $link= mysqli_connect("localhost", "root", "", "jsn2142");
        if($link===false)
        {
            die("ERROR: Could Not Connect." .mysqli_connect_error());
        }
        $sql= "CREATE TABLE posts(
            pid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            id INT NOT NULL,
            gametitle VARCHAR(30) NOT NULL,
            category VARCHAR(30) NOT NULL,
            description VARCHAR(300000) NOT NULL
        )";
        
        if (mysqli_query($link, $sql))
        {
            echo "Table Created Successfully!";
        }
        else
        {
            echo "ERROR. Could not execute $sql.".mysqli_error($link);
        } 
        mysqli_close($link);
    
?>
