<?php
session_start();

$page_title = "Password Change Update";
?>
<body>
<link rel="stylesheet" href="login_form.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="cold-md-6">

                <?php
                    if(isset($_SESSION['status']))
                    {
                        ?>
                        <div class="alert alert-success" style="width: 40rem; margin-left: 325px;">
                            <h5><?= $_SESSION['status']; ?></h5>
                        </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                    else if(isset($_SESSION['status_danger']))
                    {
                        ?>
                        <div class="alert alert-danger" style="width: 40rem; margin-left: 325px;">
                            <h5><?= $_SESSION['status_danger']; ?></h5>
                        </div>
                        <?php
                        unset($_SESSION['status_danger']);
                    }
                    ?>
                
            <div class="card" style="width: 40rem; margin-left: 325px; height: 23rem;">
                <div class="card-header">
                    <h5>Change Password</h5>
                </div>
                <div class="card-body p-4">

                    <form action="password-reset-code.php" method="POST">
                        <input type="hidden" name="password_token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];} ?>">

                        <div class="form-group mb-3">
                            <label>Email Address</label>
                            <input type="text" name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];} ?>" class="form-control" placeholder="Enter Email Address">
                        </div>
                        <div class="form-group mb-3">
                            <label>New Password</label>
                            <input type="password" name="new_password" class="form-control" placeholder="Enter New Password">
                        </div>
                        <div class="form-group mb-3">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" placeholder="Enter Confirm Password">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" name="password_update" class="btn btn-primary w-100">Update Password</button>
                        </div>

                    </form>
            
                </div>
            </div>

        </div>
    </div>
</div>
