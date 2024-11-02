<!DOCTYPE html>
<html>
<head>
    <title>Food Selection</title>
</head>
<body>
    <h2>Select Your Food Choices</h2>
    <form action="save_food.php" method="post">
        <label for="breakfast">Breakfast:</label>
        <input type="checkbox" id="breakfast" name="meals[]" value="breakfast">
        <br><br>
        <label for="lunch">Lunch:</label>
        <input type="checkbox" id="lunch" name="meals[]" value="lunch">
        <br><br>
        <label for="coffee">Coffee:</label>
        <input type="checkbox" id="coffee" name="meals[]" value="coffee">
        <br><br>
        <label for="snacks">Snacks:</label>
        <input type="checkbox" id="snacks" name="meals[]" value="snacks">
        <br><br>
        <label for="dinner">Dinner:</label>
        <input type="checkbox" id="dinner" name="meals[]" value="dinner">
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
