<?php
include "db_connection.php";

if(isset($_POST['otpsubmit'])){
    $otp=$_POST['OTP'];
    $verify_otp="SELECT otp,verify_status FROM users WHERE otp='$otp' LIMIT 1";
    $verify_otp_query=mysqli_query($conn,$verify_otp);
    if(mysqli_num_rows($verify_otp_query)>0){
        $row= mysqli_fetch_array($verify_otp_query);
        if($row['verify_status']=="0"){
            $click=$row['otp'];
            $update_otp="UPDATE users SET verify_status='1' WHERE otp='$click' LIMIT 1";
            $update_otp_query=mysqli_query($conn,$update_otp);
            if($update_otp_query){
                header("Location: index.php?success=Your account had been created&$user_data");
                exit();
            }
            else{
                header("Location: OTP.php?error=Verification Failed&$user_data");
                exit();
            }
        }
        else{
            header("Location: index.php?error=Email already verified&$user_data");
            exit();
        }
    }
    else{
        header("Location: OTP.php?error=OTP does not matched&$user_data");
        exit();
    }
}
else{
    header("Location: OTP.php?error=Enter your OTP&$user_data");
    exit();
}

?>