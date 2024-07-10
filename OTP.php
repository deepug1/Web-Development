<?php
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
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.html"><img src="Images/logo.png" width="200px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                <li><a href="index.html">Home</a></li>
                    <li><a href="products.html">Product</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="index.php">Account</a></li>
                </ul>
            </nav>
        </div> 
    </div>

<!-- OTP Page -->
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <div class="form-conatainer">
                        <div class="form-btn">
                            <span>OTP Verification</span>
                        </div>
                        <form action="otp_verify.php" id="OTPForm" method="post">

                            <?php if (isset($_GET["error"])) { ?>
                                    <p class="error"><?php echo $_GET["error"]; ?></p>
                                <?php } ?>
                                <?php if (isset($_GET["success"])) { ?>
                                    <p class="success"><?php echo $_GET["success"]; ?></p>
                                <?php } ?>
                                
                            <h4>Check your Email</h4>
                            <input type="int" placeholder="Enter your OTP" name="OTP">
                            <button type="submit" class="btn" name="otpsubmit">Submit</button>
                            <a href="signup.php">Back</a>
                            
                        </form>
                    </div>
                </div>
            </div>
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
    </script>


</body>
</html>
