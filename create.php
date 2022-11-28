<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student Create</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Add 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Student No</label>
                                <input type="text" name="student_id" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>First Name</label>
                                <input type="text" name="firstname" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Middle Name</label>
                                <input type="text" name="middlename" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Last Name</label>
                                <input type="text" name="lastname" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="Gender">Gender</label>
                                    <input type="radio" name="gender" value="male"> Male
                                    <input type="radio" name="gender" value="female"> Female
                                    <input type="radio" name="gender" value="other"> Other
                            </div>
                            <div class="mb-3">
                                <label for="Birthday">Birth Date</label>
                                <input type="date" id="Birthday" name="birthday">
                            </div>
                            <div class="mb-3">
                                <label for="Strand">Strand</label>
                                <label for="Strand" name = "Strand"></label>
                                <select class="Strand" name="Strand">
                                    <option value="0"></option>
                                    <option value="STEM">STEM</option>
                                    <option value="ABM">ABM</option>
                                    <option value="ICT">ICT</option>
                                    <option value="GAS">GAS</option>
                                    <option value="TVL">TVL</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Year Level</label>
                                <input type="text" name="yrlvl" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Section</label>
                                <input type="text" name="section" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="Day">Day</label>
                                <label for="Day" name = "Day"></label>
                                <select class="Day" name="Day">
                                    <option value="0"></option>
                                    <option value="Sunday">Sunday</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>              
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>City</label>
                                <input type="text" name="city" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Province</label>
                                <input type="text" name="province" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Postcode</label>
                                <input type="text" name="postcode" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Telephone No</label>
                                <input type="text" name="telno" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Mobile no</label>
                                <input type="text" name="mobileno" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="Role">Role</label> <span id="btk"> <input type="text" placeholder="" name="role" value="Student" readonly></span>
                            </div>
                            




                            <div class="card-body">

                            <div class="mb-3">
                                <label>Parent No</label>
                                <input type="text" name="parent_id" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>First Name</label>
                                <input type="text" name="pfirstname" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Middle Name</label>
                                <input type="text" name="pmiddlename" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Last Name</label>
                                <input type="text" name="plastname" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="Gender">Gender</label>
                                    <input type="radio" name="pgender" value="male"> Male
                                    <input type="radio" name="pgender" value="female"> Female
                                    <input type="radio" name="pgender" value="other"> Other
                            </div>
                            <div class="mb-3">
                                <label for="Birthday">Birth Date</label>
                                <input type="date" id="Birthday" name="pbirthday">
                            </div>
                            <div class="mb-3">
                                <label>Address</label>
                                <input type="text" name="paddress" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>City</label>
                                <input type="text" name="pcity" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Province</label>
                                <input type="text" name="pprovince" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Postcode</label>
                                <input type="text" name="ppostcode" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Telephone No</label>
                                <input type="text" name="ptelno" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Mobile no</label>
                                <input type="text" name="pmobileno" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="pemail" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="text" name="ppassword" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="Role">Role</label> <span id="btk"> <input type="text" placeholder="" name="prole" value="Parent" readonly></span>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_student" class="btn btn-primary">Save Student</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>