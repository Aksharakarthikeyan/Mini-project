<!DOCTYPE html>
<html>
<head>
    <title>suggestion result</title>
</head>
<body>
    <h3>students suggestion</h3>
    <?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $db_name = "base";
    $conn = mysqli_connect($hostname,$username,$password,$db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the reset button is clicked
    if (isset($_POST['reset'])) {
        // SQL query to truncate (reset) the table
        $sql_reset = "TRUNCATE TABLE suggestion";
        if (mysqli_query($conn, $sql_reset)) {
            echo "<p>Table data has been reset successfully.</p>";
        } else {
            echo "Error resetting table: " . mysqli_error($conn);
        }
    }

    $sql = "SELECT * FROM suggestion";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)) {
        echo "<h2>" . $row["sug"] . "</h2>";
    }

    mysqli_close($conn);
    ?>
    <form method="post">
        <input type="submit" name="reset" value="Reset Data">
    </form>
</body>
</html>

