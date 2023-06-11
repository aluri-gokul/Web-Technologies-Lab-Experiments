<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin-top: 20px;
  font-family: Arial, Helvetica, sans-serif;
  background-color: lightblue;
}
.topnav {
  overflow: hidden;
  background-color:lightskyblue;
  border:3px solid black;
  border-radius:20px;
}

.topnav a {
  float: left;
  color: black;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
  font-size: 17px;
  height:25px;
  justify-content: center;
}

.topnav a:hover {
  background-color: white;
  color: black;
}

.logout{
  justify-content: right;
  display: flex;
}
button{
  margin-right:20px;
  margin-top: 0px;
  margin-bottom:50px;
  padding: 5px;
  align-self: center;
  background: #1877f2;
  border: none;    
  border-radius: 5px;
  color: #fff;
  font-size:16px;
  font-weight: bold;
  width:100px;
}
button:hover{
  background: #196fe0;
}
form {
  display: flex;
  flex-direction: column;
  align-items: center;
}

label {
  margin: 10px 0;
}

input[type="file"] {
  margin-bottom: 20px;
}

textarea {
  height: 100px;
  resize: none;
  margin-bottom: 20px;
}

input[type="submit"] {
  padding: 10px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
  background-color: #3E8E41;
}   

</style>
</head>
<body>
<center><h1><?php  session_start(); echo "Welcome ".$_SESSION['name']; ?></h1></center>
<div class="topnav">
  <a class="active" href="index.php">Feed</a>
  <a href="post.php">Your posts</a>
  <a href="upload.php">upload</a>
  <a href="info.php">Personal Information</a>
  <a href="about.php">About</a>
  <div class="logout">
  <a href="logout.php"><button style="background-color:darkblue; color:white; font-size:18px; padding:5px; border-radius:10px; width:100px;";id="lg">logout</button></a>
</div>
</div>
<center><h2>PHOTO UPLOAD</h2></center>
<div style='background-color:bisque;margin-top:40px;margin-left:525px;margin-right:525px;padding:25px;border-radius:20px;'>
<form action="" method="POST" enctype="multipart/form-data">
  <label for="image" style='font-size:24px;color:darkblue;'>Upload Image:</label>
  <input type="file" id="image" name="file" accept="image/*" required>
  <label for="description">Description:</label>
  <textarea id="description" name="description" required style='border:2px solid black;border-radius:10px;'></textarea>
  <input type="submit" name="submit" value="Upload">
</form>
</div>
<?php
    $con=mysqli_connect("localhost","root","","facebook");
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $eid=$_SESSION["email"];
        $file_name = $_FILES['file']['name'];
        $file_tmp_name = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_type = $_FILES['file']['type'];
        $description = $_POST['description'];
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (!in_array($file_ext, $allowed_types)) {
          echo "<script>alert('Only JPG, JPEG, PNG, and GIF files are allowed.')</script>;";
        exit;
        }
        $target_dir = "uploads/";
        $target_file = $target_dir.basename($file_name);
        move_uploaded_file($file_tmp_name, $target_file);
        $sql = "INSERT INTO images(email,image,description) VALUES ('$eid','$file_name', '$description')";
        if ($con->query($sql) === TRUE) {
          echo "<script>alert('File uploaded successfully.')</script>";
        }
        else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>
</body>
</html>
