<?php
session_start();
$con=mysqli_connect('localhost','root','','facebook');
$name=$_SESSION['name'];
$res=mysqli_query($con,"delete from activeusers where name='$name'");
unset($_SESSION['name']);
unset($_SESSION['email']);
session_destroy();
header('location:homepage.php');
?>