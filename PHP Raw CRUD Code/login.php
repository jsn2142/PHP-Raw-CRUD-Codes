<?php include('logger.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="author" content="Jesan Rahman">
        <meta name="keywords" content="video game, review, game solution">
        <link rel="stylesheet" href="./css/layout.css">
        <title>JSN2142 | Log In</title>
    </head>
    <body>
        
        <header>
            <div class="container cusfont">
                <div id="branding">
                    <h1><a href="home.html" class="cusfont"><span class="highlight cusfont">JSN</span>2142</a></h1>
                </div>
                    <nav>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="signup.php">Sign Up</a></li>
                            <li class="current"><a href="login.php">Log In</a></li>
                            <li><a href="home.php">Posts</a></li>
                        </ul>
                    </nav>               
            </div>
        </header>
        
        <section id="login">
            <div class="container container2">
                <h1>Log In</h1>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    
                    <?php include('errors.php'); ?>
                    
                    <input type="username" placeholder="Enter Username" name="username"><br>
                    <input type="password" placeholder="Enter password" name="password"><br>
                    <button type="submit" class="button_3" name="log_in">Log in</button>
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
        
        <footer><a href="home.php">JSN2142</a>. Copyright &copy; 2018</footer>
    </body>
</html>