<?php
$con=mysqli_connect("localhost","root","","facebook");
if(isset($_POST["submit"]))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $phonenumber=$_POST["phonenumber"];
}
$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["password"];
$phonenumber=$_POST["phonenumber"];
    if(!$con)
    {
        echo "Not connected";
        die();
    }
    else{
        $sql="insert into user values('$phonenumber','$name','$email','$password')";
        $res=mysqli_query($con,$sql);
        if($res)
        {
            echo "1 row created";
        }
        else
        {
            echo "Not created";
        }
    }
?>