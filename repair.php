<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webapp";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}




$room = $_POST['room'];
$name = $_POST['name'];
$email = $_POST['email'];
$day = $_POST['day'];
$comment = $_POST['comments'];


$sql = "INSERT INTO repair (room, name, email, day,comment)
VALUES ('$room', '$name', '$email','$day','$comment')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

header("Location: http://localhost/web-app/home.html");
die();

mysqli_close($conn);
?>