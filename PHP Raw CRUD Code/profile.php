<?php include('logger.php'); ?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="author" content="Jesan Rahman">
        <meta name="keywords" content="video game, review, game solution">
        <link rel="stylesheet" href="./css/layout.css">
        <?php
        echo "<title>JSN2142 | " . $_SESSION['username'] ."</title>";
        ?>
    </head>
    <body>
        <header>
            <div class="container cusfont">
                <div id="branding">
                    <h1><a href="index.php" class="cusfont"><span class="highlight cusfont">JSN</span>2142</a></h1>
                </div>
                    <nav>
                        <ul>
                            <li><a href="home.php">Posts</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </nav>               
            </div>
        </header>
        <section id="profile">
            <div class="container">
               <br><h2> Welcome <?= $_SESSION['username'] ?> ! </h2>
                <?php
                    $link = mysqli_connect("localhost", "root", "", "jsn2142");
                    if($link === false)
                    {
                        die("ERROR: Could not connect. " . mysqli_connect_error());
                    }
                    $username= $_SESSION['username'];
                    $sql = "SELECT username, firstname, lastname, email FROM users WHERE username='$username'";
                    if($results = mysqli_query($link, $sql))
                    {
                        
                        
                        if(mysqli_num_rows($results) == 1)
                        {
                            while($row = mysqli_fetch_array($results))
                            {
                                echo "<table>";
                                echo "<tr>";
                                echo "<th>Name: </th>";
                                echo "<td>". $row['firstname']." ". $row['lastname'] ."</td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th>Email: </th>";
                                echo "<td>". $row['email'] ."</td>";
                                echo "</tr>";
                                echo "</table>";
                            }
                            
                        }
                    }
                ?>
            </div>
        </section>
        <section class="titles">
            <div class="container">
                <h1>Post a Game Review</h1>
                
                <form method="post" action="profile.php">
                    <input type="text" placeholder="Game Title" name="gametitle"><br>
                    <p>Select a Category: </p>
                    <select name="category">
                        <option value="Action">Action</option>
                        <option value="Sci-fi">Sci-Fi</option>
                        <option value="Horror">Horror</option>
                        <option value="RPG">RPG</option>
                        <option value="Arcade">Arcade</option>
                        <option value="Puzzle">Puzzle</option>
                    </select><br>
                    <textarea rows="10" cols="70" name="description"></textarea><br>
                    <button type="submit" class="button_3" name="submitpost">Submit Post</button>
                </form>
            </div>
        </section>
            
            
        <section class="posts">
            <div class="container">
                <?php
                $link= mysqli_connect("localhost", "root", "", "jsn2142");
                if($link === false)
                {
                    die("Error. Could not connect".mysqli_connect_error());
                }
                $id="";
                $username = $_SESSION['username'];
                $sql = "SELECT id FROM users WHERE username='$username'";
                $id_temp = mysqli_query($link, $sql);
                $row = mysqli_fetch_array($id_temp);
                $id = $row['id'];
                $sql = "SELECT gametitle, category, description FROM posts WHERE id='$id'";
                $result = mysqli_query($link, $sql);
                if(empty($_SESSION['username']))
                {
                    echo "error";
                }
                elseif(mysqli_num_rows($result) >= 1 && $row['id']==$id)
                {
                    while($rows = mysqli_fetch_array($result))
                    {
                    echo "<table class='post_table'>";
                    echo "<tr>";
                    echo "<th>Title:</th>";
                    echo "<td>". $rows['gametitle'] ."</td>";
                    echo "</tr><br>";
                    echo "<tr>";
                    echo "<th>Category: </th>";
                    echo "<td>". $rows['category'] ."</td>";
                    echo "</tr><br>";
                    echo "<tr>";
                    echo "<th>Description: </th>";
                    echo "<td>". $rows['description'] ."</td>";
                    echo "</tr><br>";
                    echo "</table>";
                    $_SESSION['description']=$rows['description'];
                    echo "<form method='post' action='profile.php'><button type='submit' class='button_2' name='deletepost'>Delete Post</button></form>";
                    
                    }
                }
                
                ?>
            </div>    
        </section>
        <br>
        <footer><a href="index.php">JSN2142</a>. Copyright &copy; 2018</footer>
    </body>
</html>