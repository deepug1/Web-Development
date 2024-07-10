<?php
include "db_connection.php";
session_start();
// Delete Products
if(isset($_POST['cancel-order'])){
    $id = $_POST['delete_id'];

    $sql = "DELETE FROM ordered WHERE id='$id' ";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        header("Location: cancel-order.php?error=Orders is deleted Successfully!!!");
        exit();
    }
    else
    {
        header("Location: cancel-order.php?error=Order is NOT deleted");
        exit();
    }    
}
?>
<?php
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
<!-- Ordered items -->
<div class="ordered">
    <div class="small-conatiner">
        <h2 class="title">Ordered Details</h2>
        <div class="order-container">
            <div class="row">
                <div class="details">
                    <div class="col-1">
                        
                        <?php if (isset($_GET["error"])) { ?>
                                <p class="error"><?php echo $_GET["error"]; ?></p>
                                <?php } ?>
                
                                <?php if (isset($_GET["success"])) { ?>
                                        <p class="success"><?php echo $_GET["success"]; ?></p>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
