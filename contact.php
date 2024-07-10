<?php
session_start();
include "db_connection.php";
// include "contact.php"


if (isset($_SESSION["id"]) && isset($_SESSION["uname"]))
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


<!-- Contact US -->
<div class="contact">
    <div class="content">
        <h2 class="title">Contact US</h2>
        <p>If you have any enquiry about bills payments, products, items not their  and any types of conditions. Plese
            free to contact us in the contact form given below. You can either mail us and submit ur message. Even call
            the Owner of this shop. Thank You!. Keep Shopping 
        </p>
    </div>
</div>
<div class="small-conatiner">
<div class="container">
    <div class="row">
        <div class="col-2">
            <div class="contactInfo">
                <div class="box">
                    <div class="contact-icon"><img src="Images/Address.png">
                        <div class="contact-text">
                            <h3>Address</h3>
                            <p>Plot No. 18,Bhavani Nagar,</br>Zenith Co-op.Hsg.Soc, Shop-12/13,<br>Marol,Andheri(E),Mumbai-59</p>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="contact-icon"><img src="Images/Call.png" alt="">
                        <div class="contact-text">
                            <h3>Phone</h3>
                            <p>+91 98708 83824</p>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="contact-icon"><img src="Images/Mail.png" alt="">
                        <div class="contact-text">
                            <h3>Email</h3>
                            <p>luckysnacks59@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="contact-Form">
                <form action="contact_form.php" id="ContactForm" method="post">

                <?php if (isset($_GET["error"])) { ?>
                            <p class="error"><?php echo $_GET["error"]; ?></p>
                    <?php } ?>

                    <?php if (isset($_GET["success"])) { ?>
                            <p class="success"><?php echo $_GET["success"]; ?></p>
                        <?php } ?>

                    <h2>Send Message</h2>


                    <div class="inputbox"> 
                    <span>User Name</span>
                    <?php if (isset($_GET["uname"])) { ?>
                            <input type="text" 
                                   placeholder="Enter your User Name" 
                                   name="uname" 
                                   value="<?php echo $_GET["uname"]; ?>">
                        <?php } else{ ?>
                            <input type="text" 
                                   placeholder="" 
                                   name="uname">
                        <?php }?>
                    </div>


                    <div class="inputbox">
                    <span>Email</span>
                    <?php if (isset($_GET["email"])) { ?>
                            <input type="email" 
                                   placeholder="" 
                                   name="email" 
                                   value="<?php echo $_GET["email"]; ?>">
                        <?php } else{ ?>
                            <input type="email" 
                                   placeholder="" 
                                   name="email">
                        <?php }?>
                    </div>


                    <div class="inputbox">
                        <span>Type your Message here...</span></br>
                        <?php if (isset($_GET["mssg"])) { ?>
                            <textarea  name="mssg" 
                                    value="<?php echo $_GET["mssg"]; ?>"></textarea>
                        <?php } else{ ?>
                            <textarea name="mssg"></textarea>
                        <?php }?>

                    </div>
                    <div class="inputbox">
                        <button>Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Maps -->
<div class="container">
    <div class="row">
    <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Lucky%20Snacks&t=k&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        <a href="https://wimip.net/nordvpn-coupon">nordvpn coupon</a><br>
        <style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style>
        <a href="https://www.embedgooglemap.net"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style>
    </div></div>
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