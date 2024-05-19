<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if form fields are set
    if (isset($_POST['name'], $_POST['email'], $_POST['date'], $_POST['time'], $_POST['people'], $_POST['special_request'])) {

        // Connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hotel";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Process form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $people = $_POST['people'];
        $special_request = $_POST['special_request'];

        // Insert data into the database
        $sql = "INSERT INTO data2 (name, email, date, time, people, special_request) VALUES ('$name', '$email', '$date', '$time', '$people', '$special_request')";

        if ($conn->query($sql) === TRUE) {
            echo "Reservation successfully submitted!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close connection
        $conn->close();
    } else {
        echo "One or more form fields are not set.";
    }
}
?>
