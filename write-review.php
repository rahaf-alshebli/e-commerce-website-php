<?php

// connect to db
include 'includes/dbcon.php';

$name = $_POST['name'];
$email = $_POST['email'];
$rating = $_POST['rating'];
$comment = $_POST['comment'];
$product_id = $_GET['id'];

// validate name, email, rating, comment, id

if (empty($name)){
    die('Please enter your name');
}
if (empty($email)){
    die('Please enter your email');
}
if (empty($comment)){
    die('Please enter your comment');
}
if (empty($rating)){
    die('Please enter your rating');
}


//prepare and bind

$stmt = $conn->prepare("INSERT INTO comments (name, email, comment, rating, product_id) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $comment, $rating, $product_id);
$stmt->execute();

mysqli_close($conn);

header("Location: single-product.php?id= $product_id");


