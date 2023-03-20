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

        
        $db = new mysqli("mysqlusr.cs.uregina.ca", "trinh23t", "nomarsteam", "trinh23t-0");
        if ($db->connect_error) {
            die ("Connection failed: " . $db->connect_error);
        }
    }


    if($_POST['submit'])
    {
    function add_week()
    {
        $current = time();
        $week = 604800;
        $oneweekahead = $current + $week;
        $oneweekdate = date('Y-m-d', $oneweekahead);
        return $oneweekdate;
    }

    $OrderReceive = add_week();

    $q2 = "SELECT ProductID from Product WHERE Productname = '$name'";
    $r2 = $db->query($q2);

    while ($row = mysqli_fetch_assoc($r2))
    {
        $_SESSION["ProductID"] = $row["ProductID"];
    }

    $q3 = "SELECT UserID from User WHERE Email = '$email'";
    $r3 = $db->query($q3);

    while ($row = mysqli_fetch_assoc($r3))
        {
            $_SESSION["UserID"] = $row["UserID"];
        }

    $productid = $_SESSION["ProductID"];
    $userid = $_SESSION["UserID"];

    $address = $_POST["address"];

    $_SESSION["address"] = $address;

    $q1 = "INSERT INTO Orders (OrderShip, OrderReceive, ProductID, UserID) VALUES (NOW(), '$OrderReceive', '$productid', '$userid')";
    $r1 = $db->query($q1);


        $q1 = "SELECT OrderID FROM Orders WHERE UserID = '$userid' AND ProductID = '$productid'";
        $r1 = $db->query($q1);

    while ($row = mysqli_fetch_assoc($r1))
    {
        $_SESSION["OrderID"] = $row["OrderID"];
    }

    $q4 = "UPDATE Product Set ProductStock = ProductStock - 1 WHERE ProductID = '$productid' AND ProductStock > 0";
    $r4 = $db->query($q4);


    header("Location: OrderConfirm.php");
    exit();

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
        <form method="post" enctype="multipart/form-data" id="checkout">
        <h2>Payment</h2>
        <div class="input-box">
        <input type="text" placeholder="Enter your credit/debit card" id="card" name="card">
        <label id="card_msg" class="err_msg"></label>
        </div>
        <br>
        <div class="input-box">
        <input type="text" placeholder="Enter your CVV (Ex. 123)" id="cvv" name="cvv">
        <label id="cvv_msg" class="err_msg"></label>
        </div>
        <br>
        <div class="input-box">
        <input type="text" placeholder="Enter your Address" id="address" name="address">
        </div>
        <br>
        <div class="input-box">
        <input type="text" placeholder="Enter your Postal Code" id="pcode" name="pcode">
        </div>
        <br>
        <div class="input-box button">
        <input type="submit" name="submit" value="Pay Now">
        </div>
        </form>
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
</body>
<script type="text/javascript" src="No Mar.js"> </script> 
</html>