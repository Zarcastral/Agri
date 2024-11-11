<?php
include('connection.php');

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Sanitize user inputs
$fname = htmlspecialchars($_POST['fname']);
$lname = htmlspecialchars($_POST['lname']);
$roles = htmlspecialchars($_POST['role']);
$username = htmlspecialchars($_POST['username']);
$contact = htmlspecialchars($_POST['contact']);
$barangay = htmlspecialchars($_POST['barangay']);
$password = htmlspecialchars($_POST['password']);

// Check if username already exists
$sql = "SELECT username FROM userstb WHERE username = '$username'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    echo 'username_taken';
} else {
    // Insert new user data
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO userstb (fname, lname, username, user_roles, contact_num, barangay, pass) 
            VALUES ('$fname', '$lname', '$username', '$roles', '$contact', '$barangay', '$hashedPassword')";

    if ($con->query($sql) === TRUE) {
        echo 'success';
    } else {
        echo "error_inserting_user: " . $con->error; // More specific error output
    }
}

$con->close();
