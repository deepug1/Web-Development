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

<!-- Forget Password Page -->
<div class="account-page">
    <div class="container">
        <div class="row">
            <div class="col-1">
                <div class="form-conatainer-register">
                    <div class="form-btn-register">
                        <span>Change Password</span>
                    </div>
                    <form action="change-pass.php" id="PasswordForm" method="post">
                    <?php if (isset($_GET["error"])) { ?>
                            <p class="error"><?php echo $_GET["error"]; ?></p>
                    <?php } ?>

                    <?php if (isset($_GET["success"])) { ?>
                            <p class="success"><?php echo $_GET["success"]; ?></p>
                        <?php } ?>

                        <h4>Change your Password</h4><br>

                        <?php if (isset($_GET["password"])) { ?>
                            <input type="password" 
                                   placeholder="Enter your Old Password" 
                                   name="password" 
                                   id="pass"
                                   value="<?php echo $_GET["password"]; ?>">
                        <?php } else{ ?>
                            <input type="password" 
                                   placeholder="Enter your Old Password" 
                                   name="password" id="pass">
                                   <?php }?>

                        <div class="checkbox">
                            <input type="checkbox" onclick="change()">
                            <label>Show Password</label>
                        </div>


                        <?php if (isset($_GET["password"])) { ?>
                            <input type="password" 
                                   placeholder="Enter your New Password" 
                                   name="new_password" 
                                   id="pass"
                                   value="<?php echo $_GET["password"]; ?>">
                        <?php } else{ ?>
                            <input type="password" 
                                   placeholder="Enter your New Password" 
                                   name="new_password" id="pass">
                                   <?php }?>
                                   
                        
                        <?php if (isset($_GET["confpass"])) { ?>
                            <input type="password" 
                                   placeholder="Enter your Confirm New Password" 
                                   name="new_confpass" 
                                   value="<?php echo $_GET["confpass"]; ?>">
                        <?php } else{ ?>
                            <input type="password" 
                                   placeholder="Enter your Confirm New Password" 
                                   name="new_confpass">
                                   <?php }?>
                        

                        <button type="submit" class="btn">Update</button></br>
                        <a href="index.php"><h4>Back</h4></a>
                        
                    </form>
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
            MenuItems.style.maxHeight="200px";
        }
        else
        {
            MenuItems.style.maxHeight="0px";
        }
    }

    //  Show Password  
    var pass = document.getElementById('pass');
    function change(){
        if (pass.type =="password"){
            pass.type='text';
        }else{
            pass.type="password";
        }
    }
</script>

</body>
</html>

<?php
}else{
    header("Location:index.php");
    exit();
}
