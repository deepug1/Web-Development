<?php
session_start();
include "db_connection.php";
include "products.php";

if(isset($_POST['add_to_cart'])){
    if(isset($_SESSION['cart'])){   
    }else{
        $session_array= array(
            'id'=> $_GET['id'],
            'products_name' => $_POST['products_name'],
            'price' => $_POST['price'],
            'quality' => $_POST['quality']
        );

        $_SESSION['cart'][]=$session_array;
    }
}

?>