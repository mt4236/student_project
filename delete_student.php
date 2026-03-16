<?php
include 'db.php';

if(isset($_GET['id'])){

    $id = $_GET['id'];

    // Get photo path from database
    $query = "SELECT photo FROM students WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if($row){
        $photo = $row['photo'];

        // Delete photo file from uploads folder
        if(file_exists($photo)){
            unlink($photo);
        }

        // Delete student record from database
        $delete = "DELETE FROM students WHERE id = $id";
        mysqli_query($conn, $delete);
    }
}

// Go back to dashboard
header("Location: dashboard.php");
exit();
?>
