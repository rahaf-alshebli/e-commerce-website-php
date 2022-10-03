<?php
include('includes/header.php');
?>

<?php


include("./includes/connect.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {


  if (isset($_POST['submit'])) {
    $productName = $_POST['productName'];
    $discrption = $_POST['description'];
    $sku = $_POST['sku'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $image = time() . '-' . $_FILES['image']['name'];

    // the image to a specific folder first and this folder for example called (images)

    $target_dir = "images/";
    $target_file = $target_dir . basename($image);




    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
      $sql = "INSERT INTO products(name,description,SKU,category,image,author,price) 
       VALUES('$productName','$discrption','$sku','$category','$image','$author','$price')";


      //if the data has been saved in the database , redirect the user to the main page
      if (mysqli_query($conn, $sql)) {
        header("Refresh:0");
      }
    }
  }
}


?>

<div id="wrapper">
  <?php include('./includes/sidebar.php'); ?>


  <!-- begain of content  -->

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
        <h2 class="text-center mt-5"> Add User </h2>
        <form action="" method="POST" enctype="multipart/form-data">

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
                      window.location.href = "userspanel.php";
                  </script>
                <?php
              }
              else 
              {
                  ?>
                  <script>
                      window.alert("Someone already have with this email, please Try an different email");
                      setTimeout(function(){ window.location.href = "userspanel.php"; }, 2000);           
                  </script>

                  <?php
              } 
              $stmt->close();
              $conn->close();
          }
        ?>

        <!-- Content Row -->

        <div class="row">



          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">




            </div>








          </div>

        </div>
        <!-- /.container-fluid -->

        <h2 class="text-center mt-5"> Users </h2>
        <div class="container-fluid">
          <table class="table table-striped " style="width: 100%;">
            <thead>
              <tr>
                <th>id</th>
                <th>username</th>
                <th>email</th>
                <th>address</th>
                <th>telephone</th>
                <th>created_at</th>
                <th>modified_at</th>
                <th>role</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            <tbody>
              <?php
              $sqltable = "SELECT * FROM users WHERE role NOT IN ('Super Admin')";
              if ($result = mysqli_query($conn, $sqltable)) {
                if (mysqli_num_rows($result) > 0) {

                  while ($row = mysqli_fetch_array($result)) {
                    $id = $row['id'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $address = $row['address'];
                    $tel = $row['telephone'];
                   // $discount_id  = $row['discount_id'];
                    $created_at = $row['created_at'];
                    $modified_at = $row['modified_at'];
                    $role = $row['role'];
                    //$image =  $row['image'];
                    //<td>  <img src='./images/$image' width='150vw' height='150hw'>  </td>-->
                    echo "<tr>
                            <td> $id  </td>
                            <td> $username </td>
                            <td> $email </td>
                            <td> $address </td>
                            <td> $tel  </td>
                            <td> $created_at</td>
                            <td> $modified_at</td>
                            <td> $role</td>";
                   //echo ' <td> <a href="read.php?id=' . $row['id'] . '" ><span class="fa fa-eye"></span></a> </td>';
                  echo '<td> <a href="update.php?id=' . $row['id'] . '"> <span class="fa fa-eye"></span></a></td>';
                  echo '<td> <a href="delete.php?id=' . $row['id'] . '" onclick="return confirm(\'Are you sure you want to delete this User?\')"><span class="fa fa-trash"></span></a></td>';

                    echo "</tr>";
                  }

                  mysqli_free_result($result);
                } else {
                  echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                }
              } else {
                echo "Oops! Something went wrong. Please try again later.";
              }
              ?>
            </tbody>
            </thead>

          </table>
        </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2022</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
  </div>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>


  </div>




  <?php include('./includes/footer.php'); ?>