<?php 
    include "./includes/connection.php";
    include "./includes/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Book Store</title>

    <link href="../css/style.css" rel="stylesheet">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <script>
        function pass()
        {
            var firstpass = document.form.pass.value;
            var secondpass = document.form.cpass.value;
            if(firstpass == secondpass)
            {
                return true;
            }
            else
            {
                alert("Passwords doesn't match.\n Please check and Re-Enter the password");
                return false;
            }
        }
    </script>
</head>
<body>
    <section id="registerHome">
        <div class="registerContainer">
        <div class="container">
            <div class="Title"><h2>Register</h2></div>
            <form action="" method="POST" class="registerForm">

                <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" aria-describedby="usrname" name="username">
                </div>

                <div class="mb-3">
                <label for="firstname" class="form-label">Firstname</label>
                <input type="text" class="form-control" id="fname" name="fname" aria-describedby="fname">
                </div>

                <div class="mb-3">
                <label for="pass" class="form-label">Lastname</label>
                <input type="text" class="form-control" id="lname" aria-describedby="lname" name="lname">
                </div>

                <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input type="password" class="form-control" id="pass" name="pass" aria-describedby="pass">
                </div>

                <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address">
                </div>

                <div class="mb-3">
                <label for="telephone" class="form-label">telephone</label>
                <input type="telephone" class="form-control" id="telephone" name="telephone" aria-describedby="telephone">
                </div>

                <div class="mb-3">
                <label for="email" class="form-label">Email</label> <br>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="email" />
                </div>

                <div class="mb-3">
                <label for="role" class="form-label">Role</label> <br>
                <select class="form-control" name="role" id="id">
                    <option value="" hidden>--Choose Role--</option>
                    <option value="user">User</option>
                    <option value="Admin">Admin</option>
                </select>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <?php
            if(isset($_POST['username']))
            {
                $username = $_POST['username'];
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['telephone'];
                $created = date('Y-m-d h:i:s A');
                $lastmod = date('Y-m-d h:i:s A');
                $role = $_POST['role'];

                if(mysqli_connect_error())
                {
                    die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
                }
                else
                {
                    $SELECT = "SELECT email FROM users WHERE email = ? LIMIT 1";
                    $INSERT = "INSERT INTO users (username, password, first_name, last_name, address, telephone, email, created_at, modified_at, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                }

                // Prepare Statement
                $stmt = $conn->prepare($SELECT);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->bind_result($email);
                $stmt->store_result();
                $rnum = $stmt->num_rows;

                if($rnum==0)
                {
                $stmt->close();

                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("ssssssssss", $username, $pass, $fname, $lname, $address, $tel, $email, $created, $lastmod, $role);
                $stmt->execute();

                ?>
                    <script>
                        window.alert("Registered Successfully");
                        window.location.href = "login.php";
                    </script>
                <?php
                }
                else 
                {
                    ?>
                    <script>
                        window.alert("Someone already have with this email, please Try an different email");
                        setTimeout(function(){ window.location.href = "register.php"; }, 2000);           
                    </script>

                    <?php
                } 
                $stmt->close();
                $conn->close();
            }
        ?>
        <br>
    </section>
</body>
</html>













<?php 
include "./includes/footer.php";
?>