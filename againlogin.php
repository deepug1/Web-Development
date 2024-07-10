<?php
session_start();
include "db_connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


function sendemail_verify($email,$otp){
    $mail = new PHPMailer(true);
    // $mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->SMTPAuth   = true; 

    $mail->Host       = 'smtp.gmail.com';
    $mail->Username   = 'aniketgami64@gmail.com';                     //SMTP username
    $mail->Password   = '10255825';  

    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587; 

    $mail->setFrom('aniketgami@gmail.com',"Lucky Sncaks");
    $mail->addAddress($email);

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email Verification for Lucky Snacks';

    $email_template="<h3>Welcome to the Lucky Snacks...</h3><br>
    <h3>Please Enter the verification code in the website for continuing the shopping</h3><br>
    <h3>Please Don't Share your OTP with someone else in Call/Message</h3><br>
                <h3>Your OTP is <b>$otp</b></h3>";

    $mail->Body = $email_template;
    $mail->send();
    // echo "Message had been sent";
}


if (isset($_POST["uname"]) && isset($_POST["password"])
     && isset($_POST["email"]) && isset($_POST["confpass"]) && isset($_POST["name"]))
{
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $uname =validate( $_POST["uname"]);
    $pass = validate($_POST["password"]);
    $email = validate($_POST["email"]);
    $name = validate($_POST["name"]);
    $confpass = validate($_POST["confpass"]);
    $otp=rand(00000,99999);


    // $user_data = 'uname='. $uname. '&name='. $fname;
    // echo $user_data;

    if(empty($uname)){
        header("Location: signup.php?error=User Name is required&$user_data");
        exit();
    }
    else if (empty($pass)) {
        header("Location: signup.php?error=Password is required&$user_data");
        exit();
    }
    else if (empty($email)) {
        header("Location: signup.php?error=Email is required&$user_data");
        exit();
    }
    else if (empty($confpass)) {
        header("Location: signup.php?error=Confirm Password need to be enter&$user_data");
        exit();
    }
    else if (empty($name)) {
        header("Location: signup.php?error=Enter Full name&$user_data");
        exit();
    }
    else if ($pass !== $confpass) {
        header("Location: signup.php?error=The Confirmation Password does not match&$user_data");
        exit();
    }
    else{
        // Hashing the password
        $pass = md5($pass);
        $sql = "SELECT * FROM users WHERE email='$email' AND verify_status='0' ";
        $result = mysqli_query($conn, $sql);
       
        if(mysqli_num_rows($result)==1) {
            $sql2 = "UPDATE INTO users(username,password,name,email,otp) VALUES ('$uname', '$pass', '$name', '$email','$otp')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2){
                sendemail_verify("$email","$otp");
                echo "sent";
             header("Location: OTP.php?success=We've sent a verification code to your email ID");
             exit();
            }
            else{
             header("Location: signup.php?error=The Email is already Register.&$user_data");
             exit();
            }
        }
    }
    }
else{
    header("Location: signup.php");
    exit();
}

?>
