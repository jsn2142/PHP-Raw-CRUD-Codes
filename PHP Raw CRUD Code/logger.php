<?php 
    session_start();
    $errors= array();
   
    $firstname= $lastname= $username= $password= $password2= $email= $gender= $address="";
    $id= $gametitle= $category= $description= "";

    $link= mysqli_connect("localhost", "root", "", "jsn2142");
    if($link===false)
    {
        die("ERROR: Could Not Connect." .mysqli_connect_error());
    }
    

    //logout
    if(isset($_POST['logout']))
    {
        session_destroy();
        unset($_SESSION['username']);
        header("location: login.php");
    }

    //signup   
    if(isset($_POST['signup']))
    {
        $_SESSION['message'] = '';
        $_SESSION['success'] = '';    
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			if($_POST['password']==$_POST['password2'])
            {    
                if(empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["username"]) || empty($_POST["email"]))
                {
                    array_push($errors, "Some fields are still empty!");
                }
                else
                {
                    $username= mysqli_real_escape_string($link, $_POST["username"]);
                    $firstname= mysqli_real_escape_string($link, $_POST["firstname"]);
                    $lastname= mysqli_real_escape_string($link, $_POST["lastname"]);
                    $password= md5($_POST["password"]);
                    $email = mysqli_real_escape_string($link, $_POST["email"]);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                    {
                        array_push($errors, "Invalid email format!");
                    }
                    else
                    {
                        $email= mysqli_real_escape_string($link, $_POST["email"]);
                    }
                    
                    if(!empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["username"]) && !empty($_POST["email"]))
                    {
                        $_SESSION['firstname'] = $firstname;
                        $_SESSION['lastname'] = $lastname;
                        $sql= "INSERT INTO users(firstname, lastname, username, password, email) VALUES ('$firstname', '$lastname','$username', '$password', '$email')";
                        
                        if(mysqli_query($link, $sql))
                        {
                            $_SESSION['username'] = $username;
                            $_SESSION['message']="Registration successful! Added $username to database.";
                            header("location: profile.php");
                        }
                        else
                        {
                            $_SESSION['message'] = "Registration Failed!";
                        }
                        mysqli_close($link);  
                    }   
                }  
            }	
            else
            {
                array_push($errors, "Passwords didn't match!");
            }
		}
        else
        {
            $_SESSION['message'] = "Two Passwords did not match!";
        }
        }

    //login

            if(isset($_POST['log_in']))
            {
                $username= mysqli_real_escape_string($link, $_POST['username']);
                $password= mysqli_real_escape_string($link, $_POST['password']);
                /*$username= test_input($_POST["username"]);
                $password= test_input($_POST["password"]);*/
                
                if(empty($username))
                {
                    array_push($errors, "username not found");
                }
                if(empty($password))
                {
                    array_push($errors, "password not found");
                }
                if(count($errors)==0)
                {
                    
                   
                    $password= md5($password);
                    $sql = "SELECT * FROM users WHERE username='$username' AND password= '$password'";
                    $results=mysqli_query($link, $sql);
                    $count=mysqli_num_rows($results);
                                          
                    if($count==1)
                    {
                        $_SESSION['username']=$username;
                        $_SESSION['success']="You are logged in successfully!";
                        header('location: profile.php');
                    }
                    else
                    {
                        array_push($errors, "Wrong username or password.");
                    }
                }                
            }
    //submit post

    if(isset($_POST['submitpost']))
    {
        $gametitle= mysqli_real_escape_string($link, $_POST['gametitle']);
        $category= mysqli_real_escape_string($link, $_POST['category']);
        $description= mysqli_real_escape_string($link, $_POST['description']);
        if(!empty($gametitle) && !empty($category) && !empty($description))
        {
            $username=$_SESSION['username'];
            $sql="SELECT id FROM users WHERE username='$username'";
            $id_temp=mysqli_query($link, $sql);
            $row = mysqli_fetch_array($id_temp);
            $id= $row['id'];
            $gametitle= mysqli_real_escape_string($link, $_POST['gametitle']);
            $category= mysqli_real_escape_string($link, $_POST['category']);
            $description= mysqli_real_escape_string($link, $_POST['description']);
            //$result=mysqli_query($link, $sql);
            $sql="INSERT INTO posts(id, gametitle, category, description) VALUES ('$id', '$gametitle', '$category', '$description')" ;
            if(mysqli_query($link, $sql))
            {
               $_SESSION['message']="Posted Succesfully!";
            }
            else
            {
               $_SESSION['message']="Posting Failed";
            }
            mysqli_close($link);
        }
        
    }
    
    //delete post
    if(isset($_POST['deletepost']))
    {  
            $description="";
            $description=$_SESSION['description'];
            $sql="SELECT pid FROM posts WHERE description='$description'";
            $result=mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result);
            $pid= $row['pid'];
            //$result=mysqli_query($link, $sql);
            $sql="DELETE FROM posts WHERE pid='$pid'" ;
            if(mysqli_query($link, $sql))
            {
               $_SESSION['message']="Deleted Succesfully!";
            }
            else
            {
               $_SESSION['message']="Deleting Failed";
            }
            mysqli_close($link);
           
        
        
    }
		
	?>
       