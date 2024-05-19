<?php
// Establish database connection (assuming you have $servername, $username, $password, $dbname)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$email = $_POST['email'];
$password = $_POST['password'];

// Validate user credentials
$sql = "SELECT * FROM user1 WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($password === $row['password']) {
        echo "Sign In successful!";
    } else {
        echo "Invalid password";
    }
} else {
    echo "User not found";
}

// Close database connection
$conn->close();
?>
