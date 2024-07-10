<?php
session_start();
if(!$_SESSION['username']){
    header("Location:login.php");
}
include("../../web-development/db_connection.php");
include("includes/header.php");
include("includes/navbar.php");
?>

<!-- Modal -->
<div class="modal fade" id="AddProducts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST" enctype="multipart/form-data">      
        <div class="modal-body">
            <div class="form-group">
                <label>ID</label>
                <input type="text" name="id" class="form-control" placeholder="Enter ID" require>
            </div>
            <div class="form-group">
                <label>Code</label>
                <input type="text"  name="code" class="form-control" placeholder="Enter Code" require>
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" name="image" id="products_image" class="form-control" accept="image/*">
            </div>
            <div class="form-group">
                <label>Products Name</label>
                <input type="text" name="products_name"class="form-control" placeholder="Enter Product Name" require>
            </div>
            <div class="form-group">
                <label>Weight</label>
                <input type="text" name="weight"class="form-control" placeholder="Enter Weights" require>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control" placeholder="Enter Price" require>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="btnaddproduct"class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Products 
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#AddProducts">
                Add Products
                </button>
            </h6>
            
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
            
                $sql21= "SELECT * FROM `table_products`";
                $result21= mysqli_query($conn,$sql21);
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Weight</th>
                            <th>Price</th>

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
                                <td><?php  echo $row21['code']; ?></td>
                                <td><?php  echo '<img src="../Images/'.$row21['image'].' "width="150px;" height="150px;" >' ?></td>
                                <td><?php  echo $row21['products_name']; ?></td>
                                <td><?php  echo $row21['weight']; ?></td>
                                <td><?php  echo $row21['price']; ?></td>
                                <td>
                                    <form action="products_edit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $row21['id']; ?>">
                                        <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row21['id']; ?>">
                                        <input type="hidden"name="del_image" value="<?php echo $row21['image']; ?>">
                                        <button type="submit" name="delete_btn3" class="btn btn-danger"> DELETE</button>
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
                
    
<?php
include("includes/script.php");
include("includes/footer.php");
?>