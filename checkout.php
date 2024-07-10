<?php
session_start();
include "db_connection.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucky Snacks</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>
<div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.html"><img src="Images/logo.png" width="200px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="products.php">Product</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li>
                        <div class="dropdown">
                            <a href="userprofile.php" class="dropbtn"><h4>Hello, <?php echo $_SESSION["name"]; ?></h4></a>
                            <div class="dropdown-content">
                                <a href="viewprofile.php"><h4>View Profile</h4></a>
                                <a href="userprofile.php"><h4>Update Profile</h4></a>
                                <a href="Change_password.php"><h4>Change Password</h4></a>
                                <a href="order_history.php"><h4>Order History</h4></a>
                            </div>
                        </div>
                    </li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
            <a href="cart.php"><img src="Images/Cart.png" width="50px" height="40px"></a>
            <img src="Images/menu-icon.png" class="menu-icon" onclick="menutoggle()">
        </div>
</div>
</div>
<!-- Notes -->
<div class="contact">
    <div class="content">
        <h1 class="title">Note Before Buying Products</h1>
        <p>Before buying the products make sure that you had enter correct address 
            for Home delivery.
        </p>
    </div>
</div>
<!-- Checkout Details -->
<!-- <div class="checkout-details"> -->

<div class="userprofile">
    <div class="small-conatiner">
        <div class="conatiner">
            <div class="row">
                <div class="col-2">
                    <div class="form-user-profiles">
                        <form action="#" name="" method="POST">
                            <?php
                                $sql="INSERT INTO 'orders_items'('id','code','products_name','quantity','weight','total_price') 
                                    VALUES()  ";
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="Footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <img src="images/logo.png" width="200px">
            </div>
            <div class="footer-col-2">
                <h3>Address:</h3>
                <p>Plot No. 18,Bhavani Nagar,</br>Zenith Co-op.Hsg.Soc, Shop-12/13,<br>Marol,Andheri(E),Mumbai-59</p>
            </div>
            <div class="footer-col-3">
                <h3>Terms & Conditions</h3>
                <ul>
                    <li>How to Buys</li>
                    <li>Returns & Exchange</li>
                    <li>Delivery</li>
                </ul>
            </div>
            <div class="footer-col-4">
                <h3>Follow Us</h3>
                <ul>
                    <li>Facbook</li>
                    <li>Instagram</li>
                    <li>Twitter</li>
                </ul>
            </div>
            
        </div>
        <hr>
        <p class="copyright">Copyright2021-Lucky Snacks</p>
    </div>
</div>

<!-- JS for Toggle Menu -->
<script>
    var MenuItems=document.getElementById("MenuItems");
    MenuItems.style.maxHeight="0px";

    function menutoggle(){
        if(MenuItems.style.maxHeight=="0px")
        {
            MenuItems.style.maxHeight="210px";
        }
        else
        {
            MenuItems.style.maxHeight="0px";
        }
    }
</script>
</body>
</html>