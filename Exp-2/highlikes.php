<html>
    <head>
        <style>
            h1{
                margin-top:15%;
                color:blue;
            }
        </style>
    <body>
        <center>
        <h1>HIGHEST LIKES</h1>
        </center>
</body>
</html>
<?php
session_start();
$con=mysqli_connect("localhost","root","","facebook");
$sql="select * from images where likes=(select max(likes) from images)";
$res=mysqli_query($con,$sql);
if(isset($res))
{
while($row=mysqli_fetch_array($res))
{
    $imageURL='uploads/'.$row['image'];
    echo '<center><table border="1" cellpadding="10px"><tr><th>IMAGE</th><th><img src="'.$imageURL.'" alt="no image" height="100" width="100"></tr></th>';
    echo "<br>";
    echo '<tr><th>E-mail of user</th><th>'.$row['email'].'</th></tr>';
    echo '<tr><th>LIKES</th><th>'.$row['likes'].'</table></center>';
}
}
?>