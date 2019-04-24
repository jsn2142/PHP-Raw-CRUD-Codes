<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="author" content="Jesan Rahman">
        <meta name="keywords" content="video game, review, game solution">
        <link rel="stylesheet" href="./css/layout.css">
        <title>JSN2142 | Home</title>
    </head>
    <body>
        <header>
            <div class="container cusfont">
                <div id="branding">
                    <h1><a href="index.php" class="cusfont"><span class="highlight cusfont">JSN</span>2142</a></h1>
                </div>
                    <nav>
                        <?php 
                        if(!empty($_SESSION['username']))
                        {
                            echo"<ul>
                            <li class='current'><a href='home.php'>Home</a></li>
                            <li><a href='profile.php'>Profile</a></li>
                            <li><a href='logout.php'>Logout</a></li>
                            </ul>";
                        }
                        else
                        {
                            echo"<ul>
                            <li><a href='index.php'>Home</a></li>
                            <li><a href='signup.php'>Sign Up</a></li>
                            <li><a href='login.php'>Log In</a></li>
                            <li class='current'><a href='home.php'>Posts</a></li>
                            </ul>";
                        }
                            ?>
                    </nav>               
            </div>
        </header>
        <section class="posts">
            <div class="container">
                <?php
                
                $link = mysqli_connect("localhost", "root", "", "jsn2142");
                if($link === false)
                {
                    die("ERROR. Could nt connect to the server.". mysqli_connect_error());
                }
                if(!empty($_SESSION['username']))
                {
                    echo"<h2>Welcome Home ". $_SESSION['username'] .".</h2>";
                }
                
                $sql="SELECT * FROM users INNER JOIN posts ON users.id = posts.id";
                $result=mysqli_query($link, $sql);
                ?>
                
                <?php  while($row_post=mysqli_fetch_array($result)): ?>
                    <table class="post_table">
                        <tr>
                            <th><?php echo $row_post['username']; ?></th>
                            <td>Title: <?php echo $row_post['gametitle']; ?><br>Category: <?php echo $row_post['category']; ?><br><?php echo $row_post['description']; ?></td><br><br>
                        </tr>
                        
                    </table>
                
                <?php endwhile; ?>
                
            </div>
        </section>
        
        <footer><a href="index.php">JSN2142</a>. Copyright &copy; 2018</footer>
    </body>
</html>