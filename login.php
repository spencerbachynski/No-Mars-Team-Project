<?php
ob_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Mars Clothing</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <header>
        <div class="nav-container">
            <div class="logo">
                <a href="index.php"><img src="https://img.memerial.net/page/2781/mars-has-no-life.jpg" ></a>
            </div>


            <div class="hamburger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>

            <nav class="nav-bar">
                <ul>
                    <li><a href="index.php" class="active">No Mars</a></li>
                    <li><a href="Category.php" class="#category">Category</a></li>
                    <li><a href="Products.php" class="#products">Products</a></li>
                    <li><a href="New.php" class="#news">News</a></li>
                </ul>
            </nav>
            </div>
        </div>
    </header>

    <div class="poggers">
        <form id="login" action="login.php" method="post" enctype="multipart/form-data">
        <h2>Login</h2>
        <div class="input-box">
        <input type="text" placeholder="Enter your email" id="email" name="email">
        </div>
        <div class="input-box">
        <input type="password" placeholder="Enter your password" id="pswd" name="pswd">
        </div>
        <br>
        <div class="input-box button">
        <input type="submit" name="submit" value="submit">
        </div>
        </form>

        <h2>Don't have an account? <a href="http://www2.cs.uregina.ca/~trinh23t/nomarsteam/signup.php"> Sign up here </a> </h2>
    </div>

    <div class="footer">
            <div class="footer-box">
                <div class="footer-i f1">
                    <h4>Contact</h4>
                    <label>Street: 3737 Wascana Pkwy</label><br>
                    <label>City: Regina</label><br>
                    <label>State: Saskatchewan</label><br>
                    <label>Zip Code: S4S 0A2</label><br>
                    <label>Phone number: 306-123-4569</label><br>
                    <label>Mobile Number: 306-654-9321</label><br>
                </div>
<br>
                <div class="footer-i f2">
                    <h4>Visit Us</h4>
                    <label>Getting Here</label><br>
                    <label>Our Supporters</label><br>
                    <label>Seating Charts</label><br>
                    <label>Staff Directory</label><br>
                    <label>Current Season</label><br>
                    <label>Donor Events</label><br>
                </div>
<br>
                <div class="footer-i f3">
                    <h4>Recent Posts</h4>
                    <label>Breaking Down Barriers</label><br>
                    <label>A Celebration of Success</label><br>
                    <label>A world of opportunities</label><br>
                    <br>
                </div>

                <div class="footer-i f4">
                    <h4>No Mars Clothes</h4>
                    <label>We are a group of 3 people designing our own clothes with unique styles and motivation. I hope we get us support for maximum growth</label><br>
                    <br>
                    <input type="text" placeholder="Email Address">
                    <button><i class="fa-solid fa-share"></i></button>
                    <div class="social-media">
                        <a href="https://github.com/"><i class="fa-brands fa-github"></i></a>
                        <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://twitter.com/"><i class="fa-brands fa-twitter"></i></a> 
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="No Mar.js"> </script> 
</body>
</html>

<?php

if ($_POST['submit'])
{
    $email = trim($_POST["email"]);
    $password = trim($_POST["pswd"]);


    $db = new mysqli("mysqlusr.cs.uregina.ca", "trinh23t", "nomarsteam", "trinh23t-0");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }

    $q = "SELECT email, password FROM User WHERE (email='$email') AND (password='$password')";
    $result = $db->query($q);
    
    if($row = $result->fetch_assoc())
    {
        session_start();
        $_SESSION["email"] = $row["email"];
        header("Location: indexloggedin.php");
        $db->close();
        exit();
    }
    else
    {
        $error = ("The email/password combination was incorrect.");
        $db->close();
    }
    }

?>