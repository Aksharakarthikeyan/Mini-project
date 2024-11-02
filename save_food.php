<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a MySQL database setup with the following credentials
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $db_name = "base";

    // Create a connection
    $conn = mysqli_connect($hostname,$username,$password,$db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the selected meals
    $selected_meals = $_POST['meals'];

    // Initialize variables for meals
    $breakfast = 0;
    $lunch = 0;
    $coffee = 0;
    $snacks = 0;
    $dinner = 0;

    // Set the corresponding variable to 1 if the meal is selected
    foreach ($selected_meals as $meal) {
        if ($meal === 'breakfast') {
            $breakfast = 1;
        } elseif ($meal === 'lunch') {
            $lunch = 1;
        } elseif ($meal === 'coffee') {
            $coffee = 1;
        } elseif ($meal === 'snacks') {
            $snacks = 1;
        } elseif ($meal === 'dinner') {
            $dinner = 1;
        }
    }

    // Prepare SQL statement to update the food table
    $sql = "INSERT INTO food (breakfast, lunch, coffee, snacks, dinner) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiii", $breakfast, $lunch, $coffee, $snacks, $dinner);

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "Food choices saved successfully!";
    } else {
        echo "Error updating food choices: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
