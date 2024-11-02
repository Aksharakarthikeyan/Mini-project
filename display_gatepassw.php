<?php
// Connect to the database
$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "base";

// Create a connection
$conn = mysqli_connect($hostname, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and status from the form
    $username = $_POST["username"];
    $status = $_POST["status"];

    // Update the status in the database
    $update_sql = "UPDATE gate_pass SET status='$status' WHERE name='$username'";
    if ($conn->query($update_sql) === TRUE) {
        echo "Status updated successfully for $username";
    } else {
        echo "Error updating status: " . $conn->error;
    }
}

// Query the database for data from the gate_pass table
$sql = "SELECT * FROM gate_pass";
$result = $conn->query($sql);

// Display data
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>";
        echo "Name: " . $row["name"] . "<br>";
        echo "Branch: " . $row["branch"] . "<br>";
        echo "Semester: " . $row["semester"] . "<br>";
        echo "Going to: " . $row["going_to"] . "<br>";
        echo "Date: " . $row["date"] . "<br>";
        echo "Time: " . $row["time"] . "<br>";

        // Add a form for each student to update status
        echo "<form method='post'>";
        echo "<input type='hidden' name='username' value='" . $row["name"] . "'>";
        echo "<label for='status'>Status:</label><br>";
        echo "<select id='status' name='status' required>";
        echo "<option value='Approved'>Approved</option>";
        echo "<option value='Not approved'>Not approved</option>";
        echo "</select><br><br>";
        echo "<input type='submit' value='Update Status'>";
        echo "</form>";

        echo "</p>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
