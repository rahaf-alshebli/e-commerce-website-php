<?php

    include('includes/header.php');
    include("./includes/connect.php");

    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");

    $data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
    <div id="wrapper">
        <?php include("./includes/sidebar.php");; ?>

        <!-- begin of content  -->
        <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <?php include('./includes/navbar-top.php'); ?>
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>

                <!-- Content Row -->
                <h2 class="text-center mt-5"> Edit User </h2>
                <form action="update-validate.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id" aria-describedby="id" name="id" value="<?php echo $id; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" aria-describedby="usrname" name="username" value="<?php echo $data['username']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Firstname</label>
                        <input type="text" class="form-control" id="fname" name="fname" aria-describedby="fname" value="<?php echo $data['first_name']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="pass" class="form-label">Lastname</label>
                        <input type="text" class="form-control" id="lname" aria-describedby="lname" name="lname" value="<?php echo $data['last_name']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="pass" class="form-label">Password</label>
                        <input type="password" class="form-control" id="pass" name="pass" aria-describedby="pass" value="<?php echo $data['password']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $data['address']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="telephone" class="form-label">telephone</label>
                        <input type="telephone" class="form-control" id="telephone" name="telephone" aria-describedby="telephone" value="<?php echo $data['telephone']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label> <br>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="email" value="<?php echo $data['email']; ?>"/>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label> <br>
                        <select class="form-control" name="role" id="id">
                            <option value="" hidden>--Choose Role--</option>
                            <option value="user">User</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to Edit this User?')">Edit Changes</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>