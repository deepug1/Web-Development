<?php
session_start();
include "db_connection.php";
// include "contact.php"
if (isset($_POST["uname"]) && isset($_POST["email"])  && isset($_POST["mssg"]))
{
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname =validate($_POST["uname"]);
    $email = validate($_POST["email"]);
    $mssg = validate($_POST["mssg"]);


    if(empty($uname) || empty($email) || empty($mssg)){
        header("Location: contact.php?error=All field are requires");
    }
    else{

        $sql4 = "INSERT INTO contact_form(username,email,mssg) VALUES ('$uname','$email','$mssg') ";
        $result4 = mysqli_query($conn, $sql4);
        if ($result4){
            header("Location: contact.php?success=Your message has been sent! Soon Response will be given via Email ID");
            exit();
           }
       else{
            header("Location: contact.php?error=Unknown error occur.");
            exit();
           }
        }
    }
else{
    header("Location: home.php");
    exit();
}

?>