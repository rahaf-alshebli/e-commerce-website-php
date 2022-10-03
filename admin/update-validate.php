<?php
    include("./includes/connect.php");

    if(isset($_POST['username']))
    {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $tel = $_POST['telephone'];
        $lastmod = date('Y-m-d h:i:s A');
        $role = $_POST['role'];
    }
    if(mysqli_connect_error())
    {
        die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else
    {
        $update = mysqli_query($conn, "UPDATE users SET username = '$username', password = '$pass', first_name = '$fname', last_name = '$lname', address = '$address', telephone = '$tel', email = '$email', modified_at = '$lastmod', role = '$role' WHERE id = '$id'");

        if($update)
        {
            ?>
            <script>
                alert("User Updated Successfully");
                window.location.href = "userspanel.php";
            </script>
            <?php
        }
        else 
        {
            ?>
            <script>
                alert("Failed to update User, please try again");
                window.location.href = "userspanel.php";
            </script>
            <?php
        }
    }   
?>