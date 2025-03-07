
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
            <h6 class="m-0 font-weight-bold text-primary"> Edit User Details </h6>
        </div>
        <div class="card-body">

        <?php

            if(isset($_POST['edit_btn'])){
                $id = $_POST['edit_id'];
                $sql22 = "SELECT * FROM `user_profile_details` WHERE id='$id' ";
                $result22 = mysqli_query($conn, $sql22);
                foreach($result22 as $row13){
        ?>
           <form action="code.php" method="POST">

                <?php if (isset($_GET["error"])) { ?>
                        <p class="error"><?php echo $_GET["error"]; ?></p>
                <?php } ?>
                <?php if (isset($_GET["success"])) { ?>
                        <p class="success"><?php echo $_GET["success"]; ?></p>
                    <?php } ?>

                <input type="hidden" name="edit_id" value="<?php echo $row13['id']; ?>">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="edit_name" value="<?php echo $row13['name']; ?>" class="form-control"
                        placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="edit_username" value="<?php echo $row13['username'];?>" class="form-control"
                        placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="edit_email" value="<?php echo $row13['email'];?>"
                        class="form-control" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label>Phone No.</label>
                    <input type="text" name="edit_phone_no" value="<?php echo $row13['phone_no']; ?>"
                        class="form-control" placeholder="Enter Phone No.">
                </div>
                <div class="form-group">
                    <label>Gender</label>
                        <select name="edit_gender" class="form-control">
                            <option value="<?php echo $row13["gender"]; ?>" class="form-control">Male</option>
                            <option value="<?php echo $row13["gender"];?>" class="form-control">Female</option>
                            <option value="<?php echo $row13["gender"];?>" class="form-control">Other</option>
                        </select>
                </div>
                <div class="form-group">
                    <label>DOB</label>
                        <input type="date" 
                            id="DOB" 
                            name="edit_DOB" 
                            class="form-control"
                            placeholder="DD-MM-YYYY"
                            value="<?php echo $row13["DOB"]; ?>">
                </div>
                <div class="form-group">
                    <label>Locality</label>
                    <input type="text" name="edit_locality" value="<?php echo $row13['locality']; ?>"
                        class="form-control" placeholder="Enter Locality">
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="edit_city" value="<?php echo $row13['city']; ?>"
                        class="form-control" placeholder="Enter City">
                </div>
                <div class="form-group">
                    <label>State</label>
                    <input type="text" name="edit_state" value="<?php echo $row13['state']; ?>"
                        class="form-control" placeholder="Enter State">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="edit_address" value="<?php echo $row13['address']; ?>"
                        class="form-control" placeholder="Enter Address">
                </div>
                <a href="userdetails.php" class="btn btn-danger"> CANCEL </a>
                <button type="submit" name="updatebtn2" class="btn btn-primary"> Update </button>
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