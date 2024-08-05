<?php

$firstname = $_POST["fname"];
$mobile = $_POST["mobile"];
$review = $_POST["review"];
$rating = $_POST["rating"];
$reference = $_POST["refnumber"];
$conn = mysqli_connect('localhost','root', '', 'database_new','3307') or die("connection failed");
$sql = "INSERT INTO database_MJ(First_name, Mobile, Review, Rating, ReferenceNumber) VALUES ('{$firstname}','{$mobile}','{$review}','{$rating}','{$reference}' )";
$result = mysqli_query($conn, $sql) or die("Query Failed");
header("location:  http://localhost/database%20form/thankyou.html?rating=on");
mysqli_close($conn);

?>