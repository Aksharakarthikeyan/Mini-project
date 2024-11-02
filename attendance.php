<!DOCTYPE html>
<html>
<head>
    <title>Mark Attendance</title>
</head>
<body>
    <h1>Mark Attendance</h1>
    <form method="post" action="submit_attendance.php">
        <label for="user_id">User ID:</label>
        <input type="text" id="user_id" name="user_id" required><br><br>
        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
        </select><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
