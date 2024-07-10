<?php
session_start();
session_unset();
session_destroy();

header("Location:loginphp");
?>
<?php
session_start();

if(isset($_POST['logout_btn']))
{
    session_destroy();
    unset($_SESSION['username']);
    header('Location: login.php');
}

?>