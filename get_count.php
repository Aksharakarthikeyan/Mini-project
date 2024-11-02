<!DOCTYPE html>
<html>
<head>
    <title>Food Counts</title>
</head>
<body>
    <h2>Food Counts</h2>
       <br>
    <form action="" method="post">
        <input type="submit" name="reset" value="Reset">
    </form>

    <h3>Current Counts</h3>
    <?php
    // Assuming you have a MySQL database setup with the following credentials
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $db_name = "base";

    // Create a connection
    $conn = mysqli_connect($hostname, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if reset button is clicked
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reset'])) {
        // SQL query to truncate (reset) the table
        $sql_reset = "TRUNCATE TABLE food";
        if (mysqli_query($conn, $sql_reset)) {
            echo "<p>Table data has been reset successfully.</p>";
        } else {
            echo "Error resetting table: " . mysqli_error($conn);
        }
    }

    // Query to get the count of '1's for each column
    $sql = "SELECT SUM(breakfast) AS breakfast_count,
                   SUM(lunch) AS lunch_count,
                   SUM(coffee) AS coffee_count,
                   SUM(snacks) AS snacks_count,
                   SUM(dinner) AS dinner_count
            FROM food";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Display the counts
        $row = mysqli_fetch_assoc($result);
        echo "Breakfast Count: " . $row['breakfast_count'] . "<br>";
        echo "Lunch Count: " . $row['lunch_count'] . "<br>";
        echo "Coffee Count: " . $row['coffee_count'] . "<br>";
        echo "Snacks Count: " . $row['snacks_count'] . "<br>";
        echo "Dinner Count: " . $row['dinner_count'] . "<br>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
    ?>
</body>
</html>
