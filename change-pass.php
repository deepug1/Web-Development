<?php
session_start();
include "db_connection.php";
if (isset($_SESSION["id"]) && isset($_SESSION["username"]) && (isset($_POST["password"]) 
      && isset($_POST["new_password"]) && isset($_POST["new_confpass"])))
    {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        
        $pass = validate($_POST["password"]);
        $new_pass =validate( $_POST["new_password"]);
        $new_confpass =validate( $_POST["new_confpass"]);


        if(empty($pass)){
            header("Location: Change_password.php?error=Old Password is required&$user_data");
            exit();
        }
        else if (empty($new_pass)) {
            header("Location: Change_password.php?error=New Password is required&$user_data");
            exit();
        }
        else if (empty($new_confpass)) {
            header("Location:Change_password.php?error=Confirm New Password&$user_data");
            exit();
        }
        else if ($new_pass !== $new_confpass) {
            header("Location:Change_password.php?error=The Confirmation Password does not match&$user_data");
            exit();
        }
        else{
            // Hashing the password
            $pass = md5($pass);
            $new_pass = md5($new_pass);
            $id= $_SESSION['id'];

            
            $sql = "SELECT password FROM users WHERE id = '".$id."' AND password='$pass' ";
            $result = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($result)===1) {
               
                $sql2="UPDATE `users` SET `password` = '$new_pass' WHERE `users`.`id` = '$id'";

                $result2=mysqli_query($conn,$sql2);
                if($result2){
                    header("Location: Change_password.php?success=SuccessFully Changed the Password");
                    exit();
                }
                else{
                    header("Location: Change_password.php?error=Incorrect Old Password");
                    exit();
                }
            }
        }
    }
else{
    header("Location:index.php");
    exit();
}