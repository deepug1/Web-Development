
<?php
session_start();
include("includes/header.php");
include("includes/navbar.php");
include('../../web-development/db_connection.php');
?>


<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Edit User </h6>
        </div>
        <div class="card-body">

        <?php

            if(isset($_POST['edit_btn'])){
                $id = $_POST['edit_id'];
                $sql22 = "SELECT * FROM `users` WHERE id='$id' ";
                $result22 = mysqli_query($conn, $sql22);
                foreach($result22 as $row22){
        ?>
            <form action="code.php" method="POST">

                     <?php if (isset($_GET["error"])) { ?>
                            <p class="error"><?php echo $_GET["error"]; ?></p>
                    <?php } ?>

                    <?php if (isset($_GET["success"])) { ?>
                            <p class="success"><?php echo $_GET["success"]; ?></p>
                        <?php } ?>

                <input type="hidden" name="edit_id" value="<?php echo $row22['id'] ?>">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="edit_name" value="<?php echo $row22['name'] ?>" class="form-control"
                            placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="edit_username" value="<?php echo $row22['username']?>" class="form-control"
                            placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="edit_email" value="<?php echo $row22['email'] ?>"
                            class="form-control" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="edit_password" value="<?php echo $row22['password'] ?>"
                            class="form-control" placeholder="Enter Password">
                    </div>
                    <a href="registereduser.php" class="btn btn-danger"> CANCEL </a>
                    <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>
            </form>
        <?php
                }
            }
        ?>
        </div>
    </div>
</div>
        </div>
<?php
include("includes/script.php");
include("includes/footer.php");

?>