<?php
session_start();
include("includes/header.php");
include("includes/navbar.php");
?>
<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
                   

        </div>
        <!-- End of Main Content -->

<?php
include('../../web-development/db_connection.php');
?>

<div class="container-fluid">

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">User Details </h6>
        <?php if (isset($_GET["error"])) { ?>
                        <p class="error"><?php echo $_GET["error"]; ?></p>
                <?php } ?>

                <?php if (isset($_GET["success"])) { ?>
                        <p class="success"><?php echo $_GET["success"]; ?></p>
                    <?php } ?>
    </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <?php
        
            $sql21= "SELECT * FROM `user_profile_details` ";
            $result21= mysqli_query($conn,$sql21);
        ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email </th>
                        <th>Phone No.</th>
                        <th>Gender</th>
                        <th>DOB</th>
                        <th>Locality</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Address</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(mysqli_num_rows($result21)>0)        
                    {
                        while($row21=mysqli_fetch_assoc($result21))
                        {
                    ?>
                        <tr>
                            <td><?php  echo $row21['id']; ?></td>
                            <td><?php  echo $row21['name']; ?></td>
                            <td><?php  echo $row21['username']; ?></td>
                            <td><?php  echo $row21['email']; ?></td>
                            <td><?php  echo $row21['phone_no']; ?></td>
                            <td><?php  echo $row21['gender']; ?></td>
                            <td><?php  echo $row21['DOB']; ?></td>
                            <td><?php  echo $row21['locality']; ?></td>
                            <td><?php  echo $row21['city']; ?></td>
                            <td><?php  echo $row21['state']; ?></td>
                            <td><?php  echo $row21['address']; ?></td>
                            <td>
                                <form action="users_edit.php" method="post">
                                    <input type="hidden" name="edit_id" value="<?php echo $row21['id']; ?>">
                                    <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                </form>
                            </td>
                            <td>
                                <form action="code.php" method="post">
                                    <input type="hidden" name="delete_id" value="<?php echo $row21['id']; ?>">
                                    <button type="submit" name="delete_btn2" class="btn btn-danger"> DELETE</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                        } 
                    }
                    else {
                        echo "No Record Found";
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
</div>
                </div>
                </div>





<?php
include("includes/script.php");
include("includes/footer.php");

?>