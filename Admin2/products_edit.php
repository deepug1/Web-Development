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
            <h6 class="m-0 font-weight-bold text-primary">Edit Products</h6>
        </div>
        <div class="card-body">

        <?php

            if(isset($_POST['edit_btn'])){
                $id = $_POST['edit_id'];
                $sql22 = "SELECT * FROM `table_products` WHERE id='$id' ";
                $result22 = mysqli_query($conn, $sql22);
                foreach($result22 as $row13){
        ?>
           <form action="code.php" method="POST" enctype="multipart/form-data">

                <?php if (isset($_GET["error"])) { ?>
                        <p class="error"><?php echo $_GET["error"]; ?></p>
                <?php } ?>
                <?php if (isset($_GET["success"])) { ?>
                        <p class="success"><?php echo $_GET["success"]; ?></p>
                    <?php } ?>

                <input type="hidden" name="edit_id" value="<?php echo $row13['id']; ?>">
                <div class="form-group">
                    <label>Code</label>
                    <input type="text" name="edit_code" value="<?php echo $row13['code']; ?>" class="form-control"
                        placeholder="Enter Code">
                </div>
                <div class="form-group">
                    <label>Images</label>
                    <input type="file" name="image" value="<?php echo $row13['image'];?>" class="form-control">
                    <input type="hidden" name="image_old" value="<?php echo $row13['image'];?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Products Name</label>
                    <input type="text" name="edit_products_name" value="<?php echo $row13['products_name'];?>"
                        class="form-control" placeholder="Enter Name of the products">
                </div>
                <div class="form-group">
                    <label>Weight</label>
                    <input type="text" name="edit_weight" value="<?php echo $row13['weight']; ?>"
                        class="form-control" placeholder="Enter weight">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="edit_price" value="<?php echo $row13['price']; ?>"
                        class="form-control" placeholder="Enter Price">
                </div>
                <a href="addproducts.php" class="btn btn-danger"> CANCEL </a>
                <button type="submit" name="updatebtn_products" class="btn btn-primary"> Update </button>
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