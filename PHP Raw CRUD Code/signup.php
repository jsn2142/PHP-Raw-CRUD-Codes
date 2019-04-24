<?php include('logger.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="author" content="Jesan Rahman">
        <meta name="keywords" content="video game, review, game solution">
        <link rel="stylesheet" href="./css/layout.css">
        <title>JSN2142 | Sign In</title>
    </head>
    <body>
        
        <header>
            <div class="container cusfont">
                <div id="branding">
                    <h1><a href="index.php" class="cusfont"><span class="highlight cusfont">JSN</span>2142</a></h1>
                </div>
                    <nav>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li class="current"><a href="signup.php">Sign Up</a></li>
                            <li><a href="login.php">Log In</a></li>
                            <li><a href="home.php">Posts</a></li>
                        </ul>
                    </nav>               
            </div>
        </header>
        
        <section id="signup">
            <div class="container">
                <h1>Sign Up!</h1>
                <form method="post" action="signup.php" >
                    <?php include('errors.php'); ?>
                    <input type="email" placeholder="Enter Email" pattern="/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/" name="email"><br>
                    <input type="firstname" placeholder="Enter Firstname" name="firstname"><br>
                    <input type="lastname" placeholder="Enter Lastname" name="lastname"><br>
                    <input type="username" placeholder="Enter Username" name="username"><br>
                    <input type="password" placeholder="Enter Password"  name="password"><br>
                    <input type="password" placeholder="Confirm Password" name="password2"><br>
                    <button type="submit" class="button_3" name="signup">Register</button><br>
                    <br>
                    
                </form>
            </div>
        </section>
        <br><br><br><br><br><br>
        
        <section id="boxes">
            <div class="container">
                <div class= "box">
                    <img src="./images/gp.png" alt="No Image">
                    <h3>GamePlay Videos</h3>
                    <p>We offer gameplay videos!</p>
                </div>
                <div class= "box">
                    <img src="./images/review.jpg" alt="No Image">
                    <h3>GamePlay Reviews</h3>
                    <p>You post the honest reviews for the games!</p>
                </div>
                <div class= "box">
                    <img src="./images/forum.jpg" alt="No Image">
                    <h3>Forum</h3>
                    <p>Check out our forum for all the video-game related discussions!</p>
                </div>
            </div>
        </section>
        <footer><a href="index.php">JSN2142</a>. Copyright &copy; 2018</footer>
    </body>
</html>