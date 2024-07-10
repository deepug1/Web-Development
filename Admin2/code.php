<?php
include "../../web-development/db_connection.php";
session_start();

// register_edit button
if(isset($_POST['updatebtn'])){
    $id=$_POST['edit_id'];
    $username=$_POST['edit_username'];
    $name=$_POST['edit_name'];
    $email=$_POST['edit_email'];
    $password=$_POST['edit_password'];

    $sql="UPDATE users SET name = '$name', username = '$username' , email = '$email', password='$password' WHERE id='$id'";
    $result =mysqli_query($conn,$sql);

    if($result)
    {
        header("Location: registereduser.php?success=User is Updated");
        exit();
    }
    else
    {
        header("Location: registereduser.php?error=User is NOT updated");
        exit();
    }    
}

// Registered_user_delete
if(isset($_POST['delete_btn'])){
    $id = $_POST['delete_id'];

    $sql = "DELETE FROM users WHERE id='$id' ";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        header("Location: registereduser.php?success=User is deleted");
        exit();
    }
    else
    {
        header("Location: registereduser.php?error=User is NOT deleted");
        exit();
    }    
}


// Admin Login
if(isset($_POST['login_btn']))
{
    $a_username = $_POST['username']; 
    $a_password = $_POST['password']; 

    $query = "SELECT * FROM `admin` WHERE `username`='$a_username' AND `password`='$a_password' LIMIT 1";
    $query_run = mysqli_query($conn, $query);

   if(mysqli_fetch_array($query_run))
   {
        $_SESSION['username'] = $a_username;
        $_SESSION['passowrd'] = $a_password;
        header('Location: index.php?success=Succesfully Login');
   } 
   else
   {
        header('Location: login.php?error=Username/password is wrong');
   }
    
}

// User details update
if(isset($_POST['updatebtn2'])){
    $id=$_POST['edit_id'];
    $username=$_POST['edit_username'];
    $name=$_POST['edit_name'];
    $email=$_POST['edit_email'];
    $phone_no=$_POST['edit_phone_no'];
    $gender=$_POST['edit_gender'];
    $DOB=$_POST['edit_DOB'];
    $locality=$_POST['edit_locality'];
    $city=$_POST['edit_city'];
    $state=$_POST['edit_state'];
    $address=$_POST['edit_address'];
    
    $sql="UPDATE `user_profile_details` SET `name` = '$name', `username` = '$username', `email` = '$email', `phone_no` = '$phone_no', `gender` = '$gender', `DOB` = '$DOB', `locality` = '$locality', `city` = '$city', `state` = '$state', `address` = '$address' WHERE `user_profile_details`.`id` = '$id'";
    $result =mysqli_query($conn,$sql);

    if($result)
    {
        header("Location: userdetails.php?success=User is Updated");
        exit();
    }
    else
    {
        header("Location: userdetails.php?error=User is NOT updated");
        exit();
    }    
}

// Delete User details
if(isset($_POST['delete_btn2'])){
    $id = $_POST['delete_id'];

    $sql = "DELETE FROM user_profile_details WHERE id='$id' ";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        header("Location: userdetails.php?success=User is deleted");
        exit();
    }
    else
    {
        header("Location: userdetails.php?error=User is NOT deleted");
        exit();
    }    
}



// Products details
if(isset($_POST['btnaddproduct'])){
    $id=$_POST['id'];
    $code=$_POST['code'];
    $image=$_FILES['image']['name'];
    $products_name=$_POST['products_name'];
    $weight=$_POST['weight'];
    $price=$_POST['price'];

    $allowed_extension = array('gif','png','jpg','jpeg');
    $store = $_FILES['image']['name'];
    $file_extension = pathinfo($store,PATHINFO_EXTENSION);
    if(!in_array($file_extension,$allowed_extension)){
        header("Location:addproducts.php?error=Only Images allowed are jpeg, png, jpg");   
    }
    else{
        if(file_exists("../Images/".$_FILES['image']['name'])){
            $store=$_FILES['image']['name'];
            header("Location:addproducts.php?error=Image Already exists.$store");
        }
        else{
            $query="INSERT INTO `table_products` (`id`, `code`, `image`, `products_name`, `weight`, `price`) 
                VALUES ('$id', '$code', '$image', '$products_name', '$weight', '$price')";
            $query_run=mysqli_query($conn,$query);

            if($query_run){
                move_uploaded_file($_FILES['image']["tmp_name"], "../Images/".$_FILES["image"]["name"]);
                header("Location:addproducts.php?success=Products added successfully");
            }
            else{
                header("Location:addproducts.php?error=Products not added");   
            }
        }
    }
}


    














// edit Products
if(isset($_POST['updatebtn_products'])){
    $edit_id=$_POST['edit_id'];
    $edit_code=$_POST['edit_code'];

    $new_image=$_FILES['image']['name'];
    $old_image=$_POST['image_old'];

    $edit_products_name=$_POST['edit_products_name'];
    $edit_weight=$_POST['edit_weight'];
    $edit_price=$_POST['edit_price'];

    if($new_image != ''){
        $update_filename = $_FILES['image']['name'];
    }
    else{
        $update_filename = $old_image;
    }
    
    if($_FILES['image']['name'] != ''){
        if(file_exists("../Images/".$_FILES['image']['name'])){
            $store = $_FILES['image']['name'];
            header("Location:products_edit.php?success=Image Already Exits");
        }
    }
    else{
        $sql="UPDATE `table_products` SET `code` = '$edit_code', `image` = '$update_filename', `products_name` = '$edit_products_name', `weight` = '$edit_weight', `price`='$edit_price' 
               WHERE `table_products`.`id` = '$edit_id'";
        $result =mysqli_query($conn,$sql);

        if($result){
            if($_FILES['image']['name'] != ''){
                move_uploaded_file($_FILES['image']['tmp_name'], "../Images/".$_FILES['image']['name']);
                unlink("../Images/".$old_image);
            }
            header("Location:addproducts.php?success=Products updated successfully");
        }
        else{
            header("Location:addproducts.php?error=Products not updated");   
        }

    }
}




















// Delete Products
if(isset($_POST['delete_btn3'])){
    $id = $_POST['delete_id'];
    $del_image=$_POST['del_image'];

    $sql = "DELETE FROM table_products WHERE id='$id' ";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        unlink("../Images/".$del_image);
        header("Location: addproducts.php?success=Product is deleted");
        exit();
    }
    else
    {
        header("Location: addproducts.php?error=Product is NOT deleted");
        exit();
    }    
}

// Enquiry Message Delete
if(isset($_POST['delete_btn01'])){
    $id = $_POST['delete_id'];

    $sql = "DELETE FROM contact_form WHERE id='$id' ";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        header("Location: contact.php?success=Enquiry message is deleted");
        exit();
    }
    else
    {
        header("Location: contact.php?error=Enquiry message is NOT deleted");
        exit();
    }    
}

// Status Pending,complete, on it ways
if(isset($_POST['status'])){
    $status=$_POST['status'];
    $id=$_POST['id'];
    $sql="UPDATE `ordered` SET status='$status' WHERE id='$id'";
    $result= mysqli_query($conn,$sql);
    if($result){
        header("Location: ordered.php?success=Status had been changed");
            exit();
    }
    else{
        header("Location: ordered.php?error=Status not change");
            exit();
        }
}





// Enquiry Message Delete
if(isset($_POST['delete_orders'])){
    $id = $_POST['delete_id'];

    $sql = "DELETE FROM ordered WHERE id='$id' ";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        header("Location: ordered.php?success=Orders is deleted plz");
        exit();
    }
    else
    {
        header("Location: ordered.php?error=Orders is NOT deleted");
        exit();
    }    
}

?>