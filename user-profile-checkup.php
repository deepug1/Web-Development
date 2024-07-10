<?php

session_start();
include "db_connection.php";
// include "userprofile.php";

if (isset($_POST["name"]) 
     && isset($_POST["uname"])
     && isset($_POST["email"]) 
     && isset($_POST["phone_no"]) 
     && isset($_POST["gender"])
     && isset($_POST["DOB"]) 
     && isset($_POST["locality"]) 
     && isset($_POST["city"])
     && isset($_POST["state"]) 
     && isset($_POST["address"])
     && isset($_SESSION["id"]) 
     && isset($_SESSION["username"])
     && isset($_POST['update']))

     {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $uname=validate( $_POST["uname"]);
        $phone_no= validate($_POST["phone_no"]);
        $email= validate($_POST["email"]);
        $name= validate($_POST["name"]);
        $gender= validate($_POST["gender"]);
        $DOB= validate($_POST["DOB"]);
        $locality= validate($_POST["locality"]);
        $city= validate($_POST["city"]);
        $state= validate($_POST["state"]);
        $address= validate($_POST["address"]);
    
        $user_data = 'uname='. $uname. '&name='. $name;
        echo $user_data;
    
        if(empty($uname)){
            header("Location: userprofile.php?error=User Name is required&$user_data");
            exit();
        }
        else if (empty($phone_no)) {
            header("Location: userprofile.php?error=Phone Number is required&$user_data");
            exit();
        }
        else if (empty($email)) {
            header("Location: userprofile.php?error=Email is required&$user_data");
            exit();
        }
        else if (empty($gender)) {
            header("Location: userprofile.php?error=Select gender&$user_data");
            exit();
        }
        else if (empty($name)) {
            header("Location: userprofile.php?error=Enter Full name&$user_data");
            exit();
        }
        else if (empty($DOB)) {
            header("Location: userprofile.php?error=Enter Date of Birth&$user_data");
            exit();
        }
        else if (empty($city)) {
            header("Location: userprofile.php?error=Enter your city&$user_data");
            exit();
        }
        else if (empty($state)) {
            header("Location: userprofile.php?error=Enter your state&$user_data");
            exit();
        }
        else if (empty($locality)) {
            header("Location: userprofile.php?error=Enter your locality&$user_data");
            exit();
        }
        else{
           
            $sql8 = "SELECT * FROM `user_profile_details` ";
            $result8 = mysqli_query($conn, $sql8);
    
            if(mysqli_num_rows($result8) < 0) {
                header("Location: userprofile.php?error=The User Name is taken already. Try another&$user_data");
                exit();
            }else{
               $sql9 =  "INSERT INTO `user_profile_details` (`name`, `username`, `email`, `phone_no`, `gender`, `DOB`, `locality`, `city`, `state`, `address`) 
               VALUES ('$name', '$uname', '$email', '$phone_no', '$gender', '$DOB', '$locality', '$city', '$state', '$address')";
                       
               $result9 = mysqli_query($conn, $sql9);
               if ($result9){
                header("Location: viewprofile.php?success=Your account has been Updated");
                exit();
               }
               else{
                header("Location: userprofile.php?error=Somebody had already taken email.&$user_data");
                exit();
               }
            }
     
            }
        }
else{
    header("Location: userprofile.php");
    exit();
}


// // User details update
if(isset($_POST['backbtn'])){
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


















?>