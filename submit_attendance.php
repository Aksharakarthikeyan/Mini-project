<?php
session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "base";
$conn = mysqli_connect($hostname, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_POST['user_id'];
$status = $_POST['status'];

// Check if the user_id exists in the user table
$query = "SELECT * FROM user WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $existing_status = $row['status'];
    if ($existing_status == 'Present' || $existing_status == 'Absent') {
        // User already marked, show message using JavaScript
        echo "<script>alert('Attendance for this user has already been marked and cannot be changed.');</script>";
    } else {
        // User found and not marked yet, update the status
        $update_sql = "UPDATE user SET status = '$status' WHERE user_id = '$user_id'";
        if (mysqli_query($conn, $update_sql)) {
            echo "<p>Attendance marked successfully.</p>";
        } else {
            echo "Error updating attendance: " . mysqli_error($conn);
        }
    }
} else {
    echo "User not found.";
}

mysqli_close($conn);
?>
