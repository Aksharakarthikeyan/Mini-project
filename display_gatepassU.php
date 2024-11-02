<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Search by Name</title>
</head>
<body>
    <h1>Search by Name</h1>
    <form method="get">
        <label for="search_name">Enter Name:</label><br>
        <input type="text" id="search_name" name="search_name" required><br><br>
        <input type="submit" value="Search">
    </form>

    <?php
    // Connect to the database
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $db_name = "base";
    $conn = mysqli_connect($hostname, $username, $password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Process form submission
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["search_name"])) {
        $search_name = $_GET["search_name"];
        $sql = "SELECT * FROM gate_pass WHERE name='$search_name'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>";
                echo "Name: " . $row["name"] . "<br>";
                echo "Branch: " . $row["branch"] . "<br>";
                echo "Semester: " . $row["semester"] . "<br>";
                echo "Going to: " . $row["going_to"] . "<br>";
                echo "Date: " . $row["date"] . "<br>";
                echo "Time: " . $row["time"] . "<br>";
                echo "status: " . $row["status"] . "<br>";
                echo "</p>";
            }
        } else {
            echo "No results found for $search_name";
        }
    }

    $conn->close();
    ?>
