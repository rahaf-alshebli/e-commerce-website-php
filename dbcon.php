

<?php
$conn = new mysqli('localhost','root','','e-commerce-website-php');
if ($conn->connect_error) {
    die('Error : ('. $conn->connect_errno .') '. $conn->connect_error);
}
?>