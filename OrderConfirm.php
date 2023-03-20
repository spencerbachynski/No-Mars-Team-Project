<?php
    session_start();
    if (!isset($_SESSION["email"]))
    {
        header("Location: index.php");
        exit();
    }
    else
    {
        $email = $_SESSION["email"];
        $price = $_SESSION["productprice"];
        $image = $_SESSION["ProductImage"];
        $name = $_SESSION["ProductName"];
        $address = $_SESSION["address"];
        $orderid = $_SESSION["OrderID"];
        $userid = $_SESSION["UserID"];

        
        $db = new mysqli("localhost", "username", "password", "database");
        if ($db->connect_error) {
            die ("Connection failed: " . $db->connect_error);
        }
    }

    $q1 = "Select OrderReceive FROM Orders WHERE OrderID = '$orderid' AND UserID = '$userid'";
    $r1 = $db->query($q1);

    while ($row = mysqli_fetch_assoc($r1))
    {
        $_SESSION["OrderReceive"] = $row["OrderReceive"];
    }


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
                <a href="indexloggedin.php"><img src="https://img.memerial.net/page/2781/mars-has-no-life.jpg" ></a>
            </div>


            <div class="hamburger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>

            <nav class="nav-bar">
                <ul>
                    <li><a href="indexloggedin.php" class="active">No Mars</a></li>
                    <li><a href="Categoryloggedin.php" class="#category">Category</a></li>
                    <li><a href="Productsloggedin.php" class="#products">Products</a></li>
                    <li><a href="logout.php" class ="#logout">Logout</a></li>
                </ul>
            </nav>
            </div>
        </div>
    </header>

    <div class="poggers">
    <h2>Thank you for purchasing the <?php echo $name?> </h2>
    <div>
        <image src="<?php echo $image ?>" class="smaller"></image>
    </div>
    <h2>Your order will be arriving at <?php echo $address ?> on the date <?php echo $_SESSION["OrderReceive"] ?> .</h2>
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