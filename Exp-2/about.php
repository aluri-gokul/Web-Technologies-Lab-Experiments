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
</style>
</head>
<body>
<center><h1><?php  session_start(); echo "Welcome ".$_SESSION['name']; ?></h1></center>

<div class="topnav">
  <a href="index.php">Feed</a>
  <a href="post.php">Your posts</a>
  <a href="upload.php">upload</a>
  <a href="info.php">Personal Information</a>
  <a class="active" href="about.php">About</a>
<div class="logout">
<a href="logout.php"><button style="background-color:darkblue; color:white; font-size:18px; padding:5px; border-radius:10px; width:100px;";id="lg">Logout</button></a>
</div>
</div>
<div style="padding-left:16px">
    <p>Facebook helps you connect and share with the people in your life.</p>
</div>

</body>
</html>

