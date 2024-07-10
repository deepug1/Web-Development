<?php
session_start();
include "db_connection.php";
if (isset($_SESSION["id"]) && isset($_SESSION["username"]))

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

<div class="userprofile">
    <div class="small-conatiner">
        <div class="conatiner">
            <div class="row">
                <div class="col-2">
                    <div class="form-user-profile">

            
                    <?php
                        $username=$_SESSION['username'];
                        $sql22 = "SELECT * FROM `user_profile_details` WHERE username= '$username' ";
                        $result22 = mysqli_query($conn, $sql22);
                        
                        if(mysqli_num_rows($result22))        
                        {
                            while($row13=mysqli_fetch_assoc($result22))
                            {
                        ?>


                    <form action="home.php" method="POST">

                            <?php if (isset($_GET["error"])) { ?>
                                <p class="error"><?php echo $_GET["error"]; ?></p>
                            <?php } ?>
                            <?php if (isset($_GET["success"])) { ?>
                                <p class="success"><?php echo $_GET["success"]; ?></p>
                            <?php } ?>

                        <input type="hidden" name="edit_id" value="<?php echo $row13['id']; ?>">
                        <div class="form-group">
                            <label>Name:</label>
                            <h4><?php echo $row13['name']; ?></h4><br>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <h4><?php echo $row13['username']; ?></h4><br>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <h4><?php echo $row13['email']; ?></h4><br>
                        </div>
                        <div class="form-group">
                            <label>Phone No.</label>
                            <h4><?php echo $row13['phone_no']; ?></h4><br>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <h4><?php echo $row13['gender']; ?></h4><br>
                        </div>
                        <div class="form-group">
                            <label>DOB</label>
                            <h4><?php echo $row13['DOB']; ?></h4><br>
                        </div>
                        <div class="form-group">
                            <label>Locality</label>
                            <h4><?php echo $row13['locality']; ?></h4><br>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <h4><?php echo $row13['city']; ?></h4><br>
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <h4><?php echo $row13['state']; ?></h4><br>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <h4><?php echo $row13['address']; ?></h4><br>
                        </div>
                        <button type="submit" name="backbtn" class="btn" style="width:70%;"> Back </button>
                    </form>
                    <?php
                                    }
                                }
                            else{
                                header("Location: userprofile.php?error=First Update the Profile&$user_data");
                                exit();
                            }       
                    ?>                    
                </div>
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

