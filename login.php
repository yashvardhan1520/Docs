<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check user credentials in the database.
    $conn = new mysqli("localhost", "root", "1520", "project");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Login successful!";
    } else {
        echo "Invalid email or password.";
    }

    $conn->close();
}
?>
