<?php
session_start();
if(!$_SESSION['username']){
    header("Location:login.php");
}
include("../../web-development/db_connection.php");
include("includes/header.php");
include("includes/navbar.php");

?>
<div class="container-fluid">

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Enquiry Information</h6>

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
        
            $sql21= "SELECT * FROM `contact_form` ";
            $result21= mysqli_query($conn,$sql21);
        ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email </th>
                        <th>Message</th>
                        <th>SEND RESPONSE</th>
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
                            <td><?php  echo $row21['username']; ?></td>
                            <td><?php  echo $row21['email']; ?></td>
                            <td><?php  echo $row21['mssg']; ?></td>
                            <td>
                                <form action="sendMail.php" method="post">
                                    <input type="hidden" name="edit_id" value="<?php echo $row21['id']; ?>">
                                    <button type="submit" name="edit_btn" class="btn btn-success">Send Message</button>
                                </form>
                            </td>
                            <td>
                                <form action="code.php" method="post">
                                    <input type="hidden" name="delete_id" value="<?php echo $row21['id']; ?>">
                                    <button type="submit" name="delete_btn01" class="btn btn-danger"> DELETE</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                        } 
                    }
                    else {
                        echo "No Mesaages are available";
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
                </div>

</div>

<?php
include("includes/script.php");
include("includes/footer.php");
?>
