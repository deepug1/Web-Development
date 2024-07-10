<?php
session_start();
if(!$_SESSION['username']){
    header("Location:login.php");
}
include("../../web-development/db_connection.php");
include("includes/header.php");
include("includes/navbar.php");


?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                       <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <a href="registereduser.php">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Total Registered Users</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                        $sql25="SELECT 'id' FROM users ORDER BY id";
                                                        $result25=mysqli_query($conn,$sql25);

                                                        $row25= mysqli_num_rows($result25);
                                                        echo '<h4> Total Users: '.$row25.'</h4>';
                                                    ?>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-auto">
                                        <i class="fa fa-users  fa-2x text-black-200" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="ordered.php">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Ordered items</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                        $sql24="SELECT 'id' FROM ordered ORDER BY id";
                                                        $result24=mysqli_query($conn,$sql24);

                                                        $row24= mysqli_num_rows($result24);
                                                        echo '<h4> Total Orders: '.$row24.'</h4>';
                                                    ?>
                                                </div>
                                                </a>
                                            </div>
                                        <div class="col-auto">
                                        <i class="fa fa-list-alt  fa-2x text-black-200" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="contact.php"><div class="text-xs font-weight-bold text-info text-uppercase mb-1">Messages
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                    $sql23="SELECT 'id' FROM contact_form ORDER BY id";
                                                    $result23=mysqli_query($conn,$sql23);

                                                    $row23= mysqli_num_rows($result23);
                                                    echo '<h4> Enquiry: '.$row23.'</h4>';
                                                ?>
                                            </div>
                                            </div>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fa fa-envelope fa-2x text-black-200" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <a href="addproducts.php"><div class="text-xs font-weight-bold text-info text-uppercase mb-1">Products
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                    $sql23="SELECT 'id' FROM table_products ORDER BY id";
                                                    $result23=mysqli_query($conn,$sql23);

                                                    $row23= mysqli_num_rows($result23);
                                                    echo '<h4> Overall Products: '.$row23.'</h4>';
                                                ?>
                                            </div>
                                            </div>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

<?php
include("includes/script.php");
include("includes/footer.php");
?>





