<?php 

    require_once("./includes/connect.php");

    $id = $_GET['id'];

    if(mysqli_connect_error())
    {
        die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else
    {
        $delete = mysqli_query($conn, "DELETE FROM users WHERE id = $id");

        if($delete)
        {
            ?>
            <script>
                alert("User Deleted Successfully");
                window.location.href = "userspanel.php";
            </script>
            <?php
        }

        else 
        {
            ?>
            <script>
                alert("Failed to Delete User. please try again!");
                window.location.href = "userspanel.php";
            </script>
            <?php
        }
    }
?>