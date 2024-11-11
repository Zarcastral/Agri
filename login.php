<?php
include('connection.php'); // Ensure this is included at the top

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'];
    $pass = $_POST['pass'];

    // Prepare SQL query to fetch the username and hashed password from the database
    $sqli = $con->prepare("SELECT * FROM userstb WHERE username = ?");
    $sqli->bind_param("s", $username);

    // Execute the query
    $sqli->execute();
    $result = $sqli->get_result();

    // Check if user exists
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();  // Fetch the user data
        $hashedPassword = $row['pass']; // Get the hashed password from the database

        // Verify the entered password with the stored hashed password
        if (password_verify($pass, $hashedPassword)) {
            // Password matches, redirect to users page
            header("Location: main.php");
            exit();
        } else {
            // Password does not match, redirect to login with error
            header("Location: index.php?error=1"); // Invalid password
            exit();
        }
    } else {
        // Username not found, redirect to login with error
        header("Location: index.php?error=1"); // Invalid username
        exit();
    }
}
