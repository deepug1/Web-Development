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

<div class="small-conatiner">
    <div class="row">
        <div class="col-1">
        
        <table>
        
            <tr>
                <th>Transaction No.</th>
                <th>Products_Ordered</th>
                <th>Weights</th>
                <th>Quantity</th>
                <th>Payment Mode</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
            <?php
            if(isset($_SESSION['username'])){
                $username=$_SESSION['username'];
                $sql22 = "SELECT * FROM `ordered` WHERE username='$username' ORDER BY id DESC";
                $result22 = mysqli_query($conn, $sql22);
                
                if(!empty($result22)){
                    while($row13=mysqli_fetch_array($result22)){ ?>

            <tr>
                <td><?php echo $row13['transaction_id'] ?></td>
                <td><?php echo $row13['products_name'] ?></td>
                <td><?php echo $row13['weight'] ?></td>
                <td><?php echo $row13['quantity'] ?></td>
                <td><?php echo $row13['payment'] ?></td>
                <td><?php echo $row13['total_price'] ?></td>
                <td><?php echo $row13['status'] ?></td>
                <td> <?php 
                        if($row13['status']=="Delivered"){
                            ?>
                            <form action="cancel-order.php" method="post">
                            <input type="hidden" name="delete_id" value="<?php echo $row13['id']; ?>">
                        </form>
                        <?php
                        }
                        else{
                            ?>
                            <form action="cancel-order.php" method="post">
                            <input type="hidden" name="delete_id" value="<?php echo $row13['id']; ?>">
                            <button type="submit" name="cancel-order" class="btn-cancel">Cancel your Order</button>
                        </form>
                        <?php
                        }
                    ?>
                   
                </td>
            </tr>
            <?php
                } 
            }
            else{
                header("Location:order_history.php?error=No Orders Found");
                exit();
            }
            }
        ?>
        </table>
        

        </div>
    </div>
</div>