<?php
include "db.php";

if(isset($_POST['add'])){

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];

$photo=$_FILES['photo']['name'];
$tmp=$_FILES['photo']['tmp_name'];

move_uploaded_file($tmp,"uploads/".$photo);
    
$sql="INSERT INTO students(name,email,phone,address,photo)
VALUES('$name','$email','$phone','$address','$photo')";

mysqli_query($conn,$sql);

header("Location: dashboard.php");

}
?>

<link rel="stylesheet" href="css/style.css">

<div class="container">

<h2>Add Student</h2>

<form method="POST" enctype="multipart/form-data">

<input type="text" name="name" placeholder="Name">

<input type="email" name="email" placeholder="Email">

<input type="text" name="phone" placeholder="Phone">

<textarea name="address" placeholder="Address"></textarea>

<input type="file" name="photo">

<button name="add">Add Student</button>

</form>

</div>