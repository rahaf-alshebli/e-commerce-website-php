<?php
require_once "./includes/connection.php";

if (isset($_SESSION['login'])) {
    header("Location: accountpage.php");
} else {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Book Store</title>

    <link href="./includes/bootstrap-5.2.1-dist/css/style.css" rel="stylesheet">

    <!-- CSS only -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>

<body>
    <?php include_once "./includes/header.php"; ?>
    <section id="loginHome mt-5" style="height: 50vh;margin-top:50px;">
        <div class="loginContainer">
            <div class="container">
                <div class="Title">
                    <h2>Login</h2>
                </div>
                <form class="loginForm" action="" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email Address" aria-describedby="emailHelp" pattern="[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+" title="Example: name@email.com" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="pass" placeholder="Your Password" id="exampleInputPassword1" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Keep me Logged in</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a class="btn btn-secondary" href="register.php">Register</a>
                </form>
            </div>
        </div>
        <?php
        if (isset($_POST['email'])) {

            $email =  $_POST['email'];
            $password = $_POST['pass'];

            $SELECT = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $result = $conn->query($SELECT);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    //echo "id: " . $row["Role"] ."<br>";
                    $_SESSION["Role"] = $row["role"];
                    if ($row["role"] == "Admin") {
                        $_SESSION['login'] = $_POST['email'];
                        $_SESSION['username'] = $row["username"];
        ?>
                        <script>
                            window.location.href = "admin/index.php";
                        </script>
                    <?php
                        die();
                    }
                    if ($row["role"] == "user") {
                        $_SESSION['login'] = $_POST['email'];
                        $_SESSION['username'] = $row["username"];
                        echo $_SESSION['login'];
                    ?>
                        <script>
                            window.location.href = "accountpage.php";
                        </script>
        <?php
                        die();
                    }
                }
                // output data of each row
                $host = $_SERVER['HTTP_HOST'];
                $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                header("location:http://$host$uri/$extra");
                exit();
            } else {
                if (isset($_POST['email'])) {
                    echo "<script>alert('Invalid Email and / or password');</script>";
                    $extra = "./index.php";
                    $host  = $_SERVER['HTTP_HOST'];
                    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                    //header("location:http://$host$uri/$extra");
                    exit();
                }
            }
        }
        ?>
    </section>
    <?php
    include "./includes/footer.php";
    ?>
</body>

</html>