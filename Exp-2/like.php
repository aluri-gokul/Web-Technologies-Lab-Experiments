<?php
session_start();
$conn=mysqli_connect('localhost','root','','facebook');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$image_id = $_POST["image_id"];
$user_id = $_SESSION["email"];

// Check if the user has already liked the image
$sql = "select * from likes where email='$user_id'and post_id='$image_id' " ;
$result = $conn->query($sql);
$rowcount = mysqli_num_rows( $result );
if ($rowcount > 0) {
  // User has already liked the image
} 
else {
    // Increment the like count for the image
    $sql = "UPDATE images SET likes=likes+1 WHERE post_id=" . $image_id;
    if ($conn->query($sql) === TRUE) {
        header('location:index.php');
    } 
    else {
        echo "Error adding like: " . $conn->error;
    }

    // Add a record to the likes table to record the user's like
    $sql = "INSERT INTO likes(email,post_id) VALUES ('$user_id',$image_id)";
    if ($conn->query($sql) === TRUE) {

    } 
    else {
        echo "Error recording like: " . $conn->error;
    }
}

$conn->close();
?>
