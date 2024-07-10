<?php
session_start();
include "db_connection.php";
if (isset($_SESSION["id"]) && isset($_SESSION["username"])){

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
<center><h1>Welcome to LUCKY SNACKS</h1></center>

<section class="home">
    
    <div class="slide active" style="background-color:#FFF886">
        <div class="row">
            <div class="col-2">
                <h1>LUCKY SNACKS</br></h1>
                <h2>A ROYAL TREAT</h2>
                <p class="desc">"Living the sweet life.Good food is all the sweeter when shared with good friends."
                Here are some healthy, quick, and yummy snacks which help curb hunger, ward off fatigue, and recover faster.
                </p>
            </div>
            <div class="col-2">
                <img src="Images/page.png">
            </div>
        </div>
    </div>

    <div class="slide" style="background-color:#C9FF77">
        <div class="row">
            <div class="col-2">
                <img src="Images/Snacks4.png">
            </div>
            <div class="col-2">
                <h1>Free Delivery at your Door Step</h1>
                <h3 class="desc">Snacks are extremely essential for fitness enthusiasts and athletes, especially 
                    when they are training or playing. A healthy snack not only fuels our body and boosts energy 
                    levels but also provides nutrition in the form of micronutrients to minimise muscle damage, 
                    and amplify athletic performance.</h3>
            </div>
        </div>
    </div>

    <div class="slide" style="background-color:#cbcbff">
        <div class="row">
            <div class="col-2">
                <h1>Gets all products in fresh Quantity.</h1>
                <h3 class="desc">“They provide our body with essential nutrients required during workouts, for energy 
                    metabolism. Some people are in a habit of exercising without consuming sports drink or snacks, but doing so
                     may increase the likelihood of getting ill or injured,” said Aman Puri, founder, 
                     Steadfast Nutrition.</h3>
            </div>
            <div class="col-2">
                <img src="Images/Snacks2.png">
            </div>
        </div>
    </div>
    <div id="next-slide" onClick="next()">▶</div>
    <div id="prev-slide" onClick="prev()">◀</div>
</section>



    <!-- featured products -->
    <div class="small-container">
        <h2 class="title">Products</h2>
        <div class="row">
            <div class="col-4">
                <img src="images/MasalaBananaWafers.jpg">
                <h4>Masala Banana Wafers</h4>
                <p><b>Rs.150/KG</b></p>
            </div>
            <div class="col-4">
                <img src="images/BananaWafers.jpg">
                <h4>Banana Wafers</h4>
                <p><b>Rs.110/KG</b></p>
            </div>
            <div class="col-4">
                <img src="images/LasunMixFarsan.jpg">
                <h4>Lasun Mix Farsan</h4>
                <p><b>Rs.80/KG</b></p>
            </div>
            <div class="col-4">
                <img src="images/PotatoWafers.jpg">
                <h4>Potato Wafers</h4>
                <p><b>Rs.140/KG</b></p>
            </div>
        </div>
    </div>

    <!-- Offers -->
    <div class="offer">
        <div class="small-conatiner">
            <h2 class="title">Offers</h2>
            <div class="row">
                <div class="col-2">
                    <img src="Images/Holi.jpg" class="offer-img">
                </div>
                    <div class="col-2">
                        <h3>Here is a great Festival of all over India...</h3>
                        <p style="font-size:55px;font-weight:bold;color:black">Celebration of HOLI</p>
                        <h3>Offer Valid for 3 Days Only Hurry Up...</h3>
                        <i style="font-size:35px;font-weight:medium;color:black">From March 16 to Sep 19</i><a href="products.php" class="btn">Buy Now</a>
                    </div>
            </div>
        </div>
    </div>

<!-- Branch -->
<div class="branch">
    <div class="small-conatiner">
        <h2 class="title">Branches of Lucky Snacks</h2>
        <div class="row">
            <div class="col-1">
                <center><big>Yashvi Super Market</big></center>
                <p>Shop No.5,Bhawani Tower,Plot No. 18,Marol<br>Maroshi Road,Andheri(E),Mumbai-59</p>
            </div>
            <div class="col-1">
                <center><big>Tanvi Super Market</big></center>
                <p>Shop No.4,Acropolis, Military Road,<br>Andheri(E),Mumbai-59</p>
            </div>
            <div class="col-1">
                <cemnter><big>Prabhat Super Market</big></cemnter>
                <p>Shop No.1/2, Orchid Palace,Marol Military Road,<br>Andheri(E),Mumbai-59</p>
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <center><big>Tanisha Super Market</big></center>
                <p>Shop No.E/6-7,Nahar's Options Shopping Plaza,<br>Nahar Amrit Shakti,Chandivali,Powai,Mumbai-72</p>
            </div>
            <div class="col-1">
                <center><big>Lucky Cleaners</big></center>
                <p>Plot No. 18,Bhavani Nagar,Zenth Hsg,Shop No. 26<br>Marol,Andheri(E),Mumbai-59</p>
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
<script>
    let slides = document.querySelectorAll('.home .slide');
    let index = 0;
    function next(){
        slides[index].classList.remove('active');
        index = (index + 1) % slides.length;
        slides[index].classList.add('active');
    }
    function prev(){
        slides[index].classList.remove('active');
        index = (index - 1 + slides.length) % slides.length;
        slides[index].classList.add('active');
    }
</script>
</body>
</html>

<?php
}else{
    header("Location:index.php");
    exit();
}





















