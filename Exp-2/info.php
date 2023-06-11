<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin-top: 20px;
  font-family: Arial, Helvetica, sans-serif;
  background-color: #f0f2f5;
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
  margin-bottom:90px;
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
</style>
</head>
<body>
<center><h1><?php  session_start(); echo "Welcome ".$_SESSION['name']; ?></h1></center>
<div class="topnav">
  <a href="index.php">Feed</a>
  <a href="post.php">Your posts</a>
  <a href="upload.php">upload</a>
  <a class="active" href="info.php">Personal Information</a>
  <a href="about.php">About</a>
<div class="logout">
<a href="logout.php"><button style="background-color:darkblue; color:white; font-size:18px; padding:5px; border-radius:10px; width:100px;";id="lg">Logout</button></a>
</div>
</div>
<div style="padding-left:16px">
    <?php
        $con=mysqli_connect("localhost","root","","facebook");
        $eid=$_SESSION["email"];
        $phonenumber;
        $rows=mysqli_query($con,"select * from user where email='$eid'");
        echo "<center><br><br><table border=1 cellspacing=0 cellpadding=6>";
        while($row=mysqli_fetch_array($rows))
        {
            echo "<tr><th>User-Name</th><th>Email</th><th>Password</th><th>Phone Number</th></tr>";
            echo "<tr><th>".$row["name"]."</th><th>".$row["email"]."</th><th>".$row["password"]."</th><th>".$row["phonenumber"]."</th></tr>";
        }
        echo "</center> </table>";
    ?>
</div>

</body>
</html>
