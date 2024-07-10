<?php
session_start();
include "db_connection.php";
if (isset($_SESSION["id"]) && isset($_SESSION["username"]) && isset($_SESSION['transaction_id']))

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

<!-- Ordered items -->
<div class="ordered">
    <div class="small-conatiner">
        <h2 class="title">Ordered Details</h2>
        <div class="order-container">
            <div class="row">
                    <?php
                    if(isset($_SESSION['username'])){
                        $username=$_SESSION['username'];
                        // $transaction_id=$_SESSION['transaction_id'];
                        $sql22 = "SELECT * FROM `ordered` WHERE username='$username' ORDER BY id DESC LIMIT 1 ";
                        $result22 = mysqli_query($conn, $sql22);
                        
                        if($result22){
                            foreach($result22 as $row13){
                    ?>

                <div class="details">
                    <div class="col-3">
                    <?php if (isset($_GET["error"])) { ?>
                            <p class="error"><?php echo $_GET["error"]; ?></p>
                            <?php } ?>
            
                            <?php if (isset($_GET["success"])) { ?>
                                    <p class="success"><?php echo $_GET["success"]; ?></p>
                            <?php } ?>

                            <h4><?php echo $row13['name'] ?></h4><br>
                            <h4><?php echo $row13['username'] ?></h4><br>
                            <h4><?php echo $row13['phone_no'] ?></h4><br>
                            <h5>Transaction No.:</h5>
                            <h4><?php echo $row13['transaction_id'] ?></h4><br>
                            <label>Address:</label>
                            <h4><?php echo $row13['address'] ?></h4><br>
                            <h2>Rs. <?php echo $row13['total_price']?></h2>
                            <a href="home.php"><button class="btn-home">Home</button></a>
                        </div>
                </div>
                <div class="orders">
                    <div class="col-3">
                        <h4 class="title">Ordered Products</h4>
                        <label>Payment Methods:</label>
                        <h4><?php echo $row13['payment'] ?></h4><br>
            
                        <label>Quantity & Weight</label>
                        <h4><?php echo $row13['quantity'] ?></h4>
                        <h4><?php echo $row13['weight'] ?></h4><br>
            
                        <label>Produts</label>
                        <h4><?php echo $row13['products_name'] ?></h4><br><br>
                        <form action="cancel-order.php" method="post">
                        
                            <input type="hidden" name="delete_id" value="<?php echo $row13['id']; ?>">
                            <button type="submit" name="cancel-order" class="btn-cancel">Cancel your Order</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
                            } 
                        }
                        }else{
                            header("Location: userprofile.php?error=User Name is required&$user_data");
                            exit();
                        }
                    ?>
        </div>
    </div>
</div>
