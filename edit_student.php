<?php
session_start();
include "db.php";

// 1️⃣ Make sure user is logged in
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

// 2️⃣ Get student ID from URL
if(!isset($_GET['id'])){
    header("Location: dashboard.php");
    exit();
}

$id = $_GET['id'];

// 3️⃣ Fetch current student data
$sql = "SELECT * FROM students WHERE id=$id";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 0){
    echo "Student not found!";
    exit();
}

$student = mysqli_fetch_assoc($result);

// 4️⃣ Handle form submission
if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Handle photo upload if a new file is chosen
    if($_FILES['photo']['name'] != ""){
        $photo = $_FILES['photo']['name'];
        $tmp = $_FILES['photo']['tmp_name'];
        move_uploaded_file($tmp,"uploads/".$photo);

        $sql_update = "UPDATE students SET name='$name', email='$email', phone='$phone', address='$address', photo='$photo' WHERE id=$id";
    } else {
        $sql_update = "UPDATE students SET name='$name', email='$email', phone='$phone', address='$address' WHERE id=$id";
    }

    mysqli_query($conn, $sql_update);

    header("Location: dashboard.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>Edit Student</h2>

    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="name" value="<?php echo $student['name']; ?>" placeholder="Name" required>
        <input type="email" name="email" value="<?php echo $student['email']; ?>" placeholder="Email" required>
        <input type="text" name="phone" value="<?php echo $student['phone']; ?>" placeholder="Phone" required>
        <textarea name="address" placeholder="Address" required><?php echo $student['address']; ?></textarea>

        <!-- Show current photo -->
        <?php if($student['photo'] != ""){ ?>
            <p>Current Photo:</p>
            <img src="uploads/<?php echo $student['photo']; ?>" width="100">
        <?php } ?>

        <p>Change Photo (optional):</p>
        <input type="file" name="photo">

        <button name="update">Update Student</button>
    </form>

    <br>
    <a href="dashboard.php">Back to Dashboard</a>
</div>

</body>
</html>