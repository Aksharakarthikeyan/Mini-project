<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Information Form</title>
</head>
<body>
    <h1>User Information Form</h1>
    <form method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="branch">Branch:</label><br>
        <input type="text" id="branch" name="branch" required><br><br>

        <label for="semester">Semester:</label><br>
        <input type="text" id="semester" name="semester" required><br><br>

        <label for="going_to">Going to:</label><br>
        <input type="text" id="going_to" name="going_to" required><br><br>

        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" required><br><br>

        <label for="time">Time:</label><br>
        <input type="time" id="time" name="time" required><br><br>

        <input type="submit" value="Submit">
    </form>

    <?php
    // Assuming you have a MySQL database setup with the following credentials
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

    // Process form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $branch = $_POST["branch"];
        $semester = $_POST["semester"];
        $going_to = $_POST["going_to"];
        $date = $_POST["date"];
        $time = $_POST["time"];

        // Prepare a SQL insert statement
        $sql = "INSERT INTO gate_pass (name, branch, semester, going_to, date, time)
                VALUES ('$name', '$branch', '$semester', '$going_to', '$date', '$time')";

        if ($conn->query($sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error inserting record: " . $conn->error;
        }
    }
    mysqli_close($conn);
    ?>
</body>
</html>
