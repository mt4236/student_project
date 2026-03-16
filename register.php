<?php
include "db.php";

if(isset($_POST['register'])){

$name=$_POST['name'];
$email=$_POST['email'];
$password=password_hash($_POST['password'],PASSWORD_DEFAULT);

if($name=="" || $email=="" || $_POST['password']==""){
echo "All fields required";
}else{

$sql="INSERT INTO users(name,email,password) VALUES('$name','$email','$password')";
mysqli_query($conn,$sql);

echo "Registration successful";
}

}
?>

<link rel="stylesheet" href="css/style.css">

<div class="container">

<h2>Register</h2>

<form method="POST">

<input type="text" name="name" placeholder="Name">

<input type="email" name="email" placeholder="Email">

<input type="password" name="password" placeholder="Password">

<button name="register">Register</button>

</form>

<a href="login.php">Login</a>

</div>