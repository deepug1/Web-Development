<?php
session_start();
include("includes/header.php");
?>
<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <form class="user" action="code.php" method="POST">
                                <div>
                                    <h2 class="text-center">Admin Login</h2>
                                </div>

                                <?php if (isset($_GET["error"])) { ?>
                                        <h3 class="error"><?php echo $_GET["error"]; ?></h3>
                                <?php } ?>

                                <?php if (isset($_GET["success"])) { ?>
                                        <p class="success"><?php echo $_GET["success"]; ?></p>
                                    <?php } ?>

                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-user"
                                        placeholder="Enter Username...">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                     name="password" placeholder="Password...">
                                </div>
                                <hr> 
                                <button type ="submit" name="login_btn" class="btn btn-primary btn-user btn-block">
                                    Login</button>             
                            </form>
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
?>