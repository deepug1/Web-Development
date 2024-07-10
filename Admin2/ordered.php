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
            <h6 class="m-0 font-weight-bold text-primary"> Orders ITEMS </h6>
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

                $sql21= "SELECT * FROM `ordered` ORDER BY id DESC";
                $result21= mysqli_query($conn,$sql21);
                
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Phone No:</th>
                            <th>Address</th>
                            <th>Payment</th>
                            <th>Total Price</th>
                            <th>Quantity</th>
                            <th>Products Names</th>
                            <th>Weights</th>
                            <th>Status</th>
                            <th>Change Status</th>
                            <th>Delete Orders</th>

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
                                <td><?php  echo $row21['transaction_id']; ?></td>
                                <td><?php  echo $row21['id']; ?></td>
                                <td><?php  echo $row21['name']; ?></td>
                                <td><?php  echo $row21['username']; ?></td>
                                <td><?php  echo $row21['phone_no']; ?></td>
                                <td><?php  echo $row21['address']; ?></td>
                                <td><?php  echo $row21['payment']; ?></td>
                                <td><?php  echo $row21['total_price']; ?></td>
                                <td><?php  echo $row21['quantity']; ?></td>
                                <td><?php  echo $row21['products_name']; ?></td>
                                <td><?php  echo $row21['weight']; ?></td>
                                <td><?php  echo $row21['status'];?></td>
                                <td>
                                    <form action="code.php" method="POST">
                                        <select name="status" onchange='form.submit()'>
                                            <option value="Pending">Pending</option>
                                            <option value="On it Ways">On it ways</option>
                                            <option  value="Delivered">Delivered</option>
                                        </select>
                                        <input type="hidden" name='id' value='<?php  echo $row21['id']; ?>'>
                                        <input type="submit" name="status">
                                    </form>
                                </td>
                                <td>
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row21['id']; ?>">
                                        <button type="submit" name="delete_orders" class="btn btn-danger"> DELETE</button>
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
<?php
include("includes/script.php");
include("includes/footer.php");
?>