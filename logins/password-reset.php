<?php
session_start();

$page_title = "Password Reset Form";

?>
<!-- CSS only -->
<body>
<link rel="stylesheet" href="login_form.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <?php
                    if(isset($_SESSION['status']))
                    {
                        ?>
                        <div class="alert alert-success" style="width: 637px; padding: 15px 15px 15px 15px;">
                            <h5><?= $_SESSION['status']; ?></h5>
                        </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                    else if(isset($_SESSION['status_danger']))
                    {
                        ?>
                        <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
                            <h5><?= $_SESSION['status_danger']; ?></h5>
                        </div>
                        <?php
                        unset($_SESSION['status_danger']);
                    }
                    ?>
                

                <div class="card">
                    <div class="card-header">
                        <h5>Reset Password</h5>
                    </div>
                    <div class="card-body p-4">

                        <form action="password-reset-code.php" method="POST">

                            <div class="form-group mb-3">
                                <label>Email Address</label>
                                <input type="text" name="email" class="form-control" placeholder="Enter Email Address">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="password_reset_link" class="btn btn-primary">Send Password Reset Link</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</body>



