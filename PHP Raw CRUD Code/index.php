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
                            <li class='current'><a href='index.php'>Home</a></li>
                            <li><a href='signup.php'>Sign Up</a></li>
                            <li><a href='login.php'>Log In</a></li>
                            <li><a href='home.php'>Posts</a></li>
                            </ul>";
                        }
                            ?>
                    </nav>               
            </div>
        </header>
        
        <section id="showcase">
            <div class="container cusfont2">
                <div class="carousel">
                <h1>Game Reviews</h1>
                  <img class="mySlides" src="images/witcher3.jpg">
                  <img class="mySlides" src="images/batmanarkhamknight.png" >
                  <img class="mySlides" src="images/battlefield1.jpg">
                    <div class="display-bottomleft">
                    Welcome to our Forum
                    </div>
                </div>
            </div>
        </section>
        
        
        <script>
            var myIndex = 0;
            carousel();

            function carousel() 
            {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
                x[myIndex-1].style.display = "block";  
                setTimeout(carousel, 3000); // Change image every 3 seconds
            }
        </script>
        
        
        
        <section id="newsletter">
            <div class="container">
                <?php if(empty($_SESSION['username'])): ?>
                <h1>Log on To Our Website to Post More<br> Gameplay Videos And Reviews</h1>
                <form>
                    <input type="email" placeholder="Enter Email...">
                    <button type="submit" class="button_1">Log in</button>
                </form>
                <?php endif; ?>
            </div>
        </section>
        
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