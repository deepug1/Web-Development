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


<!-- User Profile Details -->
<div class="userprofile">
    <div class="small-conatiner">
        <div class="conatiner">
            <div class="row">
                <div class="col-2">
                    <div class="form-user-profile">
                        <div class="contact-text">
                            <span>Profile Details</span>
                        </div>
                        <form action="user-profile-checkup.php" id="UserProfileForm" method="post">


                            <h4>Update Your Profile</h4>
                            <div class="user-details">
                                <?php if (isset($_GET["error"])) { ?>
                                        <p class="error"><?php echo $_GET["error"]; ?></p>
                                <?php } ?>

                                <?php if (isset($_GET["success"])) { ?>
                                        <p class="success"><?php echo $_GET["success"]; ?></p>
                                <?php } ?>

                                <label>Name:</label>
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

                                

                                <label>Username:</label>
                                <?php if (isset($_GET["uname"])) { ?>
                                <input type="text" 
                                   placeholder="Choose your User Name" 
                                   name="uname" 
                                   value="<?php echo $_GET["uname"]; ?>">
                                <?php } else{ ?>
                                    <input type="text" 
                                        placeholder="Choose your User Name" 
                                        name="uname">
                                <?php }?>


                                <label>Email:</label>
                                <?php if (isset($_GET["email"])) { ?>
                                <input type="email" 
                                    placeholder="Enter your email" 
                                    name="email" 
                                    value="<?php echo $_GET["email"]; ?>">
                                <?php } else{ ?>
                                    <input type="email" 
                                        placeholder="Enter your email" 
                                        name="email">
                                <?php }?>

                                <label>Phone No:</label>
                                <?php if (isset($_GET["phone_no"])) { ?>
                                <input type="text" 
                                    placeholder="Enter your Phone No." 
                                    name="phone_no" 
                                    value="<?php echo $_GET["phone_no"]; ?>">
                                <?php } else{ ?>
                                    <input type="text" 
                                        placeholder="Enter your Phone No." 
                                        name="phone_no">
                                <?php }?>

                            </div>

                                <div class="col-1">
                                    <label for="gender">Gender:</label>
                                    <?php if (isset($_GET["gender"])) { ?>
                                    <select name="gender" class="">
                                        <option value="">--Select--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <?php } else{ ?>
                                        <select name="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <?php }?>
                                    
                                    <label>DOB:</label>
                                    <?php if (isset($_GET["DOB"])) { ?>
                                        <input type="date" 
                                           id="DOB" 
                                           name="DOB" 
                                           class="DOB"
                                           placeholder="DD-MM-YYYY"
                                           value="<?php echo $_GET["DOB"]; ?>">
                                    <?php } else{ ?>
                                        <input type="date" 
                                           id="DOB" 
                                           name="DOB" 
                                           class="DOB"
                                           placeholder="DD-MM-YYYY">
                                    <?php }?>
                
                                </div>
                                <div class="form-2">

                                    <label>Locality:</label>
                                    <?php if (isset($_GET["locality"])) { ?>
                                    <input type="text" 
                                        placeholder="Enter your Locality" 
                                        name="locality" 
                                        value="<?php echo $_GET["locality"]; ?>">
                                    <?php } else{ ?>
                                        <input type="text" 
                                            placeholder="Enter your Locality" 
                                            name="locality">
                                    <?php }?>

                                    <label>City:</label>
                                    <?php if (isset($_GET["city"])) { ?>
                                    <input type="text" 
                                        placeholder="Enter your City" 
                                        name="city" 
                                        value="<?php echo $_GET["city"]; ?>">
                                    <?php } else{ ?>
                                        <input type="text" 
                                            placeholder="Enter your City" 
                                            name="city">
                                    <?php }?>

                                    <label>State:</label>
                                    <?php if (isset($_GET["state"])) { ?>
                                    <input type="text" 
                                        placeholder="Enter your State" 
                                        name="state" 
                                        value="<?php echo $_GET["state"]; ?>">
                                    <?php } else{ ?>
                                        <input type="text" 
                                            placeholder="Enter your State" 
                                            name="state">
                                    <?php }?>

                                    <label>Address:</label>
                                    <?php if (isset($_GET["address"])) { ?>
                                        <textarea name="address" 
                                                  rows="4" 
                                                  value="<?php echo $_GET["address"]; ?>">
                                        </textarea>
                                    <?php } else{ ?>
                                        <textarea name="address" 
                                                  rows="4">
                                        </textarea>
                                    <?php }?>

                                    <button type="submit" name="update" class="btn">Update</button></br>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


