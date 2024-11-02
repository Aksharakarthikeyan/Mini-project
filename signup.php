<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "base";

$conn = mysqli_connect($hostname,$username,$password,$db_name);

if(!$conn)
{
    echo"connection failed";
}

if(isset($_POST['submit'])){

$username = $_POST['username'];

$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE user_id = '$username'";

$result=mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);

if($num > 0){

echo '<script>alert("username already exists!")</script>';

}

else{

$insert= "INSERT INTO user (user_id,password) VALUES('$username', '$password')";

mysqli_query($conn, $insert);

header("location:login.php");

}

}

?>

<html>

<head>
<link rel="stylesheet" href="style1.css">

<title>Signup page</title>
</head>

<body>
    
<div class="main">

<form action="" method="POST">

<h1>SIGNUP</h1>

<input type="usename" name="username" required placeholder="enter your user name"><br>

<input type="password" name="password" required placeholder="Enter Password"><br>

<button type="submit" name="submit">SIGNUP</button><br><br>

Have an account?&nbsp;<a href="http://localhost/test/login.php">Login Here</a>

</form>

</div>

</body>

</html>