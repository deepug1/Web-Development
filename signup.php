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
                <li><a href="home.php">Home</a></li>
                    <li><a href="products.php">Product</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="index.php">Account</a></li>
                </ul>
            </nav>
        </div>
    </div>
<!-- Account Page -->
<div class="account-page">
    <div class="container">
        <div class="row">
            <div class="col-1">
                <div class="form-conatainer-register">
                    <div class="form-btn-register">
                        <span>New User Registration</span>
                    </div>
                    <form action="signup-check.php" id="RegisterForm" method="post">


                    <?php if (isset($_GET["error"])) { ?>
                            <p class="error"><?php echo $_GET["error"]; ?></p>
                    <?php } ?>

                    <?php if (isset($_GET["success"])) { ?>
                            <p class="success"><?php echo $_GET["success"]; ?></p>
                        <?php } ?>

                        <h4>Sign Up here</h4>

                        <?php if (isset($_GET["name"])) { ?>
                            <input type="text" 
                                   placeholder="Enter your Full Name" 
                                   name="name" 
                                   value="<?php echo $_GET["name"]; ?>">
                        <?php } else{ ?>
                            <input type="text" 
                                   placeholder="Enter your Full Name" 
                                   name="name">
                        <?php }?>


                        <?php if (isset($_GET["uname"])) { ?>
                            <input type="text" 
                                   placeholder="Choose your User Name" 
                                   name="uname" 
                                   class="username"
                                   value="<?php echo $_GET["uname"]; ?>">
                                   <small class="error"></small>
                        <?php } else{ ?>
                            <input type="text" 
                                   placeholder="Choose your User Name" 
                                   name="uname"
                                   class="username">
                                   <small class=""></small>
                        <?php }?>


                        <?php if (isset($_GET["email"])) { ?>
                            <input type="email" 
                                   placeholder="Enter your email" 
                                   name="email" 
                                   id="email"
                                   value="<?php echo $_GET["email"]; ?>">
                        <?php } else{ ?>
                            <input type="email" 
                                   placeholder="Enter your email" 
                                   name="email"
                                   id="email">
                        <?php }?>


                        <?php if (isset($_GET["password"])) { ?>
                            <input type="password" 
                                   placeholder="Enter your email" 
                                   name="password" 
                                    id='pass'
                                   value="<?php echo $_GET["password"]; ?>">
                        <?php } else{ ?>
                            <input type="password" 
                                   placeholder="Enter your Password" 
                                   name="password" id='pass'>
                                   <?php }?>
                        
                        <?php if (isset($_GET["confpass"])) { ?>
                            <input type="password" 
                                   placeholder="Enter your Confirm Password" 
                                   name="confpass" 
                                   value="<?php echo $_GET["confpass"]; ?>">
                        <?php } else{ ?>
                            <input type="password" 
                                   placeholder="Enter your Confirm Password" 
                                   name="confpass">
                                   <?php }?>
                                <button type="submit" name="OTP" class="btn" onClick="send_otp()">Send OTP</button></br>
                            <a href="index.php">Already had account  Click Here</a>
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
</script>

<!-- Password confirmation -->
<script>
    var pass=document.getElementById("pass");
    var confpass=document.getElementById("confpass");

//  Show Password  
    var pass = document.getElementById('pass');
    function change(){
        if(pass.type=="password"){
            pass.type='text';
        }else{
            pass.type='password';
        }
    }

// Send OTP 
function send_otp(){
    var email=jQuery('#email').val();
    JQuery.ajax({
        url:'OTP.php',
        type:'POST',
        data:'email='+email,
        success:function(result){
            
        }
    )};
}
</script>



</body>
</html>