<?php

//extract($_GET);

//print_r($_POST);

$username="";
if(isset($_POST['username'])){
	$username=$_POST['username'];
}

$password="";

if(isset($_POST['password'])){

$password=$_POST['password'];

}

$count=0;

try{

$con=new PDO("mysql:host=localhost; dbname=base","root","");


$sql="select * from user where user_id='$username' and password='$password'";
header("location:main.php");

$stmt=$con->prepare($sql);

$stmt->execute();

$stmt->setFetchMode (PDO::FETCH_ASSOC);

$result=$stmt->fetchAll();

if(count($result)) { 
	$count=1;

}

}catch(PDOException $e) {

echo $e->getMessage();

}

if($count) {

echo "Logged In";
}
else{
	header("Location: login.php?error=Password Mismatch");
}


?>