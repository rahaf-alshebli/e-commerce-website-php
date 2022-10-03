<?php
require_once("includes/connection.php");

// if(!isset($_SESSION['login']))
// {
//     header("location: ../login.php");
// }
// else 
// {

// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Book Store</title>

    <link href="css/style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/includes/bootstrap-5.2.1-dist/css/style.css">
    <script src="bootstrap-5.2.1-dist/js/index.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <style>
        #profileHome {
            width: 100%;
        }

        .profilebackImage {
            width: 100%;
            height: 50vh;
            background: url('./admin/images/user.jpg');
            background-size: cover;
            background-position: center;
        }

        .profileImgContent {
            position: relative;
            top: 50%;
        }

        .profilebackImage .title {
            text-align: center;
        }

        .profilebackImage .title h1 {
            color: #fff;
            font-size: 5rem;

        }

        .profilebackImage .subTitle {
            text-align: center;
        }

        .profilebackImage .subTitle h4 {
            color: #fff;
            font-size: 14px;
        }

        .profileDetailsContent {
            padding: 20px;
        }

        .pDataContainer {
            width: 90%;
            margin: 0 auto;
            display: flex;
        }

        .pDataContainer .leftSide {
            margin: 30px 0;
            width: 20%;
        }

        .pDataContainer .leftSide .container {
            box-shadow: 0 0 4px #dfdfdf;
        }

        .pDataContainer .leftSide .container .row {
            border-bottom: 1px solid #dfdfdf;
            padding: 8px 4px;
            transition: 350ms ease-in-out;
            cursor: pointer;
        }

        .pDataContainer .leftSide .container .row:last-child {
            border-bottom: 0;
        }

        .pDataContainer .leftSide .container .row a {
            color: #000;
            transition: 350ms ease-in-out;
        }

        .pDataContainer .leftSide .container .row a:hover {
            text-decoration: none;
        }

        .pDataContainer .leftSide .container .row:hover {
            background: rgba(233, 255, 35, 0.5);
            transition: 350ms ease-in-out;
        }

        .pDataContainer .rightSide {
            width: 80%;
        }

        .rightContainer {
            padding: 10px 15px;
            width: 95%;
            margin: 0 auto;
        }

        .pDataContainer .rightSide .rightHeading {
            padding: 35px 20px;
        }

        .pDataContainer .rightSide .rightHeading h1 {
            font-size: 20px;
        }

        .pDataContainer .rightSide .rightPara {
            padding: 0 20px;
            width: 80%;
        }

        .rightContainer table {
            margin: 20px 0;
            width: 100%;
            border: 1px solid #dfdfdf;
            border-collapse: collapse;
        }

        .rightContainer table tr td {
            border: 1px solid #dfdfdf;
            padding: 10px 15px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="#">
                    <img class="rounded-circle" height="40" src="./image/bookstore.png" height="15" alt="book Logo" loading="lazy" />
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Baghdad</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="store.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact-us</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <!-- Icon -->
                <a class="text-reset me-3" href="#">
                    <i class="fas fa-shopping-cart"></i>
                </a>

                <!-- Notifications -->
                <div class="dropdown">
                    <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span><img class="rounded-circle" height="25" src="./image/icon.png"> </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="#">Some news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Another news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </div>
                <!-- Avatar -->
                <div class="dropdown">
                    <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <img src="./image/user.png" class="rounded-circle" height="25" alt="Black and White Portrait of a Man" loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <a class="dropdown-item" href="#">My profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Settings</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <section id="profileHome">
        <div class="profileContainer">
            <div class="profilebackImage">
                <div class="profileImgContent">
                    <div class="title">
                        <h1>My Account</h1>
                    </div>
                    <div class="subTitle">
                        <h4>Here you can manage, edit, view your account information.</h4>
                    </div>
                </div>
            </div>
            <div class="profileDetailsContent">
                <div class="pDataContainer">
                    <div class="leftSide">
                        <div class="container">
                            <div class="row"><a href="accountpage.php">Dashboard</a></div>
                            <div class="row"><a href="accountpage.php?profile=orders">Orders</a></div>
                            <div class="row"><a href="accountpage.php?profile=downloads">Downloads</a></div>
                            <div class="row"><a href="accountpage.php?profile=addresses">Addresses</a></div>
                            <div class="row"><a href="accountpage.php?profile=details">Account Details</a></div>
                            <div class="row"><a href="./logout.php">Logout</a></div>
                        </div>
                    </div>
                    <div class="rightSide">
                        <?php
                        if (isset($_SESSION['login'])) {
                            if (isset($_GET['profile'])) {
                                if ($_GET['profile'] == "details") {
                                    $query = mysqli_query($conn, "SELECT * FROM users");
                                    $user = mysqli_fetch_array($query);

                                    $fullname = $user['first_name'] . " " . $user['last_name'];
                        ?>
                                    <div class="rightContainer">
                                        <table>
                                            <tr>
                                                <td>Username</td>
                                                <td><?php echo $user['username']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Name</td>
                                                <td><?php echo $fullname; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?php echo $user['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td><?php echo $user['address']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Telephone</td>
                                                <td><?php echo $user['telephone']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Created At</td>
                                                <td><?php echo $user['created_at']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                <?php
                                }
                            } else {
                                $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $_SESSION['login'] . "'");
                                $user = mysqli_fetch_array($query);

                                $fullname = $user['first_name'] . " " . $user['last_name'];

                                ?>
                                <div class="rightContainer">
                                    <div class="rightHeading">
                                        <h1>Hello <b><?php echo $fullname; ?></b> (not <b><?php echo $user['username']; ?></b>? <a href="./logout.php">Log Out</a>)</h1>
                                    </div>
                                    <div class="rightPara">
                                        <p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details</p>
                                    </div>
                                </div>
                            <?php
                            }
                        } else {
                            ?>
                            <div class="rightContainer">
                                <div class="rightHeading">
                                    <h1>You are not logged in. Please (<a href="../logout.php">Log in</a>)</h1>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="content d-flex align-items-center bg-dark">
        <h2 class="w-100 text-center"></h2>
    </div>
    <!-- Footer -->
    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg><i class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                    </svg><i class="fab fa-twitter"></i></a>

                <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                        <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                    </svg><i class="fab fa-google"></i></a>

                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                    </svg><i class="fab fa-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                    </svg><i class="fab fa-linkedin-in"></i></a>



            </section>
            <!-- Section: Social media -->

            <!-- Section: Form -->
            <section class="">
                <form action="">
                    <!--Grid row-->
                    <div class="row d-flex justify-content-center">
                        <!--Grid column-->
                        <div class="col-auto">
                            <p class="pt-2">
                                <strong>Sign up for our book shop</strong>
                            </p>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-5 col-12">
                            <!-- Email input -->
                            <div class="form-outline form-white mb-4">
                                <input type="email" id="form5Example21" class="form-control" />
                                <label class="form-label" for="form5Example21">Email address</label>
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-auto">
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-outline-light mb-4">
                                Subscribe
                            </button>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </form>
            </section>
            <!-- Section: Form -->

            <!-- Section: Text -->
            <section class="mb-4">

            </section>
            <!-- Section: Text -->

            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Quick Links</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Home</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Contact Us</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">My account</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Cart</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Adults</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Comedy</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Crime and Mystery</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Horror</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Thrillel</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Category</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Biography</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Humor</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Picture Books</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Mystery</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->

                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">Baghdad.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>









    <script src="./includes/bootstrap-5.2.1-dist/js/bootstrap.min.js"></script>
</body>

</html>
</body>

</html>