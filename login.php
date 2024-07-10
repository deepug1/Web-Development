<?php
session_start();
include "db_connection.php";


if (isset($_POST["uname"]) && isset($_POST["password"]))
{
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uname =validate($_POST["uname"]);
    $pass = validate($_POST["password"]);

    if(empty($uname)){
        header("Location: index.php?error=User Name is required");
        exit();
    }
    else if (empty($pass)) {
        header("Location: index.php?error=Password is required");
        exit();
    }
    else{
        // Hashing the password
        $pass = md5($pass);
        // $verify_status=0;
        $sql2 = "SELECT * FROM users WHERE username='$uname'AND password='$pass' ";
        $result2  = mysqli_query($conn, $sql2);

        if(mysqli_num_rows($result2)==1) {
            $row=mysqli_fetch_assoc($result2);
            if ($row["username"]==$uname && $row["password"]==$pass && $row["verify_status"]==1){
                $_SESSION["username"]= $row["username"];
                $_SESSION["name"]= $row["name"];
                $_SESSION["id"]= $row["id"];
                header("Location: home.php");
                exit();
            }
            else{
                header("Location: index.php?error=User is not register");
                exit();
            }
        }
        else{
            header("Location: index.php?error=Incorrect User Name or Password");
            exit();
        }
    }
}
else{
    header("Location: index.php");
    exit();
}

?>