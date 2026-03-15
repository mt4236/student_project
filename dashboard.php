<?php
session_start();
include "db.php";

if(!isset($_SESSION['user'])){
header("Location: login.php");
}
?>

<link rel="stylesheet" href="css/style.css">

<div class="container">

<h2>Student List</h2>

<a href="add_student.php">Add Student</a>
<a href="logout.php">Logout</a>

<table>

<tr>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Photo</th>
<th>Action</th>
</tr>

<?php

$sql="SELECT * FROM students";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>

<td>
<img src="uploads/<?php echo $row['photo']; ?>" width="50">
</td>

<td>

<a href="edit_student.php?id=<?php echo $row['id']; ?>">Edit</a>

<a href="delete_student.php?id=<?php echo $row['id']; ?>">Delete</a>

</td>

</tr>

<?php } ?>

</table>

</div>