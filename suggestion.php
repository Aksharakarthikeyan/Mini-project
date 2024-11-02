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

    // Get the suggestion from the POST request
    $suggestion = $_POST['suggestion'];

    // Prepare a SQL query to insert the suggestion into a table called 'suggestion'
    $stmt = $conn->prepare("INSERT INTO suggestion (sug) VALUES (?)");
    $stmt->bind_param("s", $suggestion);

    // Execute the query
    if ($stmt->execute()) {
        echo "Suggestion inserted successfully";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Suggestion Box</title>
    <style>
        body {
    font-family: Arial, sans-serif;
}

.suggestion-box {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

h2 {
    margin-top: 0;
}

textarea {
    width: 100%;
    height: 100px;
    margin-bottom: 10px;
    padding: 5px;
    border-radius: 3px;
    border: 1px solid #ccc;
}

button {
    padding: 5px 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

#status {
    margin-top: 10px;
    font-style: italic;
    color: #888;
}

    </style>
    <script>
    function submitSuggestion() {
    var suggestion = document.getElementById('suggestion-text').value;
    if (suggestion.trim() === '') {
        document.getElementById('status').textContent = 'Please enter a suggestion.';
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'suggestion.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('status').textContent = 'Suggestion submitted successfully!';
            document.getElementById('suggestion-text').value = '';
        }
    };
    xhr.send('suggestion=' + encodeURIComponent(suggestion));
}
    </script>
</head>
<body>
    <div class="suggestion-box">
        <h2>Leave a Suggestion</h2>
        <textarea id="suggestion-text" placeholder="Enter your suggestion here"></textarea>
        <button onclick="submitSuggestion()">Submit</button>
        <p id="status"></p>
    </div>
    <script src="script.js"></script>
</body>
</html>
