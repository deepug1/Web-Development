<?php
session_start();
include "db_connection.php";
if (isset($_SESSION["id"]) && isset($_SESSION["username"]) && isset($_SESSION['cart']))

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



    
   


    <div class="small-container">
            <div class="row row2">
                <h2 class="title">All Products</h2>
             </div>
             <div class="row">

                   <?php

                   $sql3 ="SELECT * FROM table_products";
                   $result3 = mysqli_query($conn,$sql3);

                   if(!empty($result3)){
                    while($row3=mysqli_fetch_array($result3)){ ?>
                    
                    
                    
                    <div class="card">
                    <form action="cart.php?action=add&pid=<?= $row3['id']; ?>" method="post">
                    <h3><?=$row3['products_name']; ?></h3>
                    <img src="Images/<?= $row3['image'] ?>" alt="<?= $row3['products_name'] ?>" class="products-image">
                    <p class="price">Rs. <?=$row3['price']; ?></p>
                    <div class="weight"><?=$row3['weight']; ?></div>
                    <div class="quantity">
                    <input type="number" value="1" name="quantity">
                    </div>
                    <p><button type="submit">Add to Cart</button></p>

                    </form>
                    </div>
                                        
                    <?php }
                }else{
                    echo "No Products are available";
                }
                ?>
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