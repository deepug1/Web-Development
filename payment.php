<?php
session_start();
include "db_connection.php";

if (isset($_SESSION["id"]) && isset($_SESSION["username"]) 
   && isset($_POST['checkout']) && isset($_SESSION['cart_item'])){
    $name=$_POST['name'];
    $phone_no=$_POST['phone_no'];
    $address=$_POST['address'];
    $payment=$_POST['COD'];
    $products="";
    $total_price=0;
    $quantity="";
    $weight="";
    $transaction_id=rand(00000000,99999999);
    $username=$_SESSION['username'];
    $status="Pending";
   

    foreach($_SESSION['cart_item'] as $keys => $item){
        $products .= $item['products_name']. ' /';
        $quantity .= $item['quantity']. ' /';
        $weight .= $item['weight']. ' /';
        $product_price = $item['price'] * $item['quantity'];
        $total_price = $total_price + $product_price;
    }
    $total_price2= number_format($total_price,2);

    $sql="INSERT INTO `ordered`(`name`, `phone_no`, `address`, `payment`, `username`, `total_price`, `quantity`, `products_name`, `weight`,`transaction_id`,`status`) 
                       VALUES ('$name','$phone_no','$address','$payment','$username','$total_price','$quantity','$products','$weight','$transaction_id','$status')";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("Location: Order.php?success=Your Order had been placed Successfully!!");
        unset($_SESSION['cart_item']);
        exit();
    }
    else{
        header("Location: Order.php?error=Unfortunately your order is failed!!");
            exit();
    }
   }

?>