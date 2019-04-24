<?php
        
        
       $link= mysqli_connect("localhost", "root", "", "jsn2142");
        if($link===false)
        {
            die("ERROR: Could Not Connect." .mysqli_connect_error());
        }
        $sql= "DROP TABLE users";
        
        if (mysqli_query($link, $sql))
        {
            echo "Table Deleted Successfully!";
        }
        else
        {
            echo "ERROR. Could not execute $sql.".mysqli_error($link);
        } 
        mysqli_close($link);
?>
