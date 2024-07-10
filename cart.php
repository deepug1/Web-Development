<?php
session_start();
include "db_connection.php";


if(!empty($_GET['action'])){
    switch($_GET['action']){
        // add products to cart
        case 'add':
            if(!empty($_POST['quantity'])){
                $pid=$_GET['pid'];
                $sql3="SELECT * FROM table_products WHERE id=".$pid;
                $result3=mysqli_query($conn,$sql3);
                while($product =mysqli_fetch_array($result3)){
                    $itemArray=[
                        $product['code']=>[
                            'products_name'=>$product['products_name'],
                            'code' =>$product['code'],
                            'quantity'=>$_POST['quantity'],
                            'price'=>$product['price'],
                            'image'=>$product['image'],
                            'weight'=>$product['weight']
                        ]
                    ];
                     // var_dump($itemArray);
                    if(isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])){
                        if(in_array($product['code'], array_keys($_SESSION['cart_item']))){
                            foreach($_SESSION['cart_item'] as $key=>$value){
                                if($product['code']==$key){
                                    if(empty($_SESSION['cart_item'][$key]['quantity'])){
                                        $_SESSION['cart_item'][$key]['quantity']=0;
                                    }
                                    $_SESSION['cart_item'][$key]['quantity'] += $_POST['quantity'];
                                }
                            }
                        }else{
                            $_SESSION['cart_item'] += $itemArray;
                        }
                    
                    }else{
                        $_SESSION['cart_item']=$itemArray;
                    }
                }
            }
            break;
        case 'remove':
            if(!empty($_SESSION['cart_item'])){
                foreach($_SESSION['cart_item'] as $key => $value){
                    if($_GET['code'] == $key){
                        unset($_SESSION['cart_item'][$key]);
                    }
                    if(empty($_SESSION['cart_item'])){
                        unset($_SESSION['cart_item']);
                    }
                }
            }
            break;

        case 'empty':
            unset($_SESSION['cart_item']);
            break;
    }
}

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
<h2  class="title">Your Cart</h2>



<div class="small-container-cart-page">
    <div class="row1">
    <?php
    $total_quantity=0;
    $total_price=0;
    ?>
        <div class="col-2">
        <table class="table">
                <tr>
                    <th>Code</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Qauntity</th>
                    <th>Weight</th>
                    <th>Items Price</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                </tr>

                <?php
                if(isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])){
                    foreach($_SESSION['cart_item'] as $item){
                        $item_price=$item['quantity']*$item['price'];
                    ?>
                <tr>
                    <td><?= $item['code']?></td>
                    <td> <img src="Images\<?= $item['image']?>"> </td>
                    <td><?= $item['products_name']?></td>
                    <td><?= $item['quantity']?></td>
                    <td><?= $item['weight']?></td>
                    <td>Rs.<?= number_format($item['price'],2)?></td>
                    <td>Rs.<?= number_format($item_price,2)?></td>
                    <td><a href="cart.php?action=remove&code=<?= $item['code']; ?>" name="remove">Remove</a></td>
                </tr>

                <?php 
                $total_quantity +=$item['quantity'];
                $total_price +=($item['price']*$item['quantity']);
            }
        }
                if(isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])){
                    ?>
                    <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right"><?=$total_quantity ?></td>
                    
                    <td colspan="3" align="right">Rs.<?=number_format($total_price,2); ?></td>
                </tr>
                <tr>
                    <td colspan="3"> <a href="products.php" class="Continue_shopping">Continue-shopping</a></td>
                    <td colspan="4"> <a href="cart.php?action=empty" class="remove">Remove All</a></td>
                </tr>

            <?php  }

                ?>
               
            </table>
        </div>
    </div>
</div>
<div class="small-container">
    <div class="row">
        <div class="col-1-checkout">
            <?php
            if(isset($_SESSION['cart_item']) && count($_SESSION['cart_item'])>0){
                ?>
                <div class="form-conatainer" style="height:500px;">
                <h3>Enter details</h3>
                <form action="payment.php" method="POST">

                <div class="form-group">
                    <label for=" ">Name:</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for=" ">Phone No:</label>
                    <input type="text" class="form-control" name="phone_no" required>
                </div>
                <div class="form-group">
                    <label for="">Address :</label>
                    <textarea name="address" id="" cols="5" rows="3" required></textarea>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="COD" name="COD" style="width:15px;" required>
                    <label class="form-check-label" name="COD">
                        Cash On Delivery
                    </label>
                </div>

                    <button class="checkout" id="checkout" name="checkout">Check Out</button>

                </form>
            </div>
            <?php
                }else{
                   echo "Cart is Empty";
                }
            ?>
            </br>

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

</body>
</html>