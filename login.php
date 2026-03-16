<?php
session_start();
include "db.php";

if(isset($_POST['login'])){

$email=$_POST['email'];
$password=$_POST['password'];

$sql="SELECT * FROM users WHERE email='$email'";
$result=mysqli_query($conn,$sql);

$user=mysqli_fetch_assoc($result);

if($user && password_verify($password,$user['password'])){

$_SESSION['user']=$user['id'];
header("Location: dashboard.php");

}else{

echo "Invalid login";

}

}
?>

<link rel="stylesheet" href="css/style.css">

<div class="container">

<h2>Login</h2>

<form method="POST">

<input type="email" name="email" placeholder="Email">

<input type="password" name="password" placeholder="Password">

<button name="login">Login</button>

</form>

<a href="register.php">Register</a>

</div>