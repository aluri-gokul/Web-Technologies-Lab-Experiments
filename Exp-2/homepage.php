<html>
    <head>
        <style>
            body {
            background-color: lightskyblue;
            border: 10%;
        }
    #total {
        display: flex;
        justify-content: center;
    }

    #image {
        margin-left: 1px;
        padding: 3px;
    }

    #heading {
        margin-left: 40%;
        margin-top: 25px;
        background-color: white;
        width: 380px;
        padding: 3px;
        border: 2.5px solid white;
        border-radius: 20px;
    }

    #title {
        font-size: 54px;
        font-family: klavika;
        display: contents;
        color: rgb(28, 28, 104);
        margin-left: 25%;
    }

    #tab {
    margin-left: 25%;
    margin-top: 95px;
    height: 400px;
    background-color: lightblue;
    padding: 5px;
    border-radius: 20px;
    box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.3);
}

    p {
        margin-top: 0px;
        text-align: center;
        font-size: 17px;
    }

    a:hover {
        color: red;
    }

    table {
  margin-left: 25px;
  margin-right: 25px;
  background-color: azure;
  padding: 20px;
  border-radius: 20px;
  box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.3);
}

    th {
        padding: 10px;
    }

    #sub:hover {
        background-color: black;
    }

    label {
        font-weight: bold;
        margin-bottom: 10px;
    }

    input[type="password"],
    input[type="email"] {
        padding: 5px;
        margin-bottom: 10px;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        background-color: white;
    }

    div {
        display: flex;
        justify-content: center;
        margin-top: 30px;
        padding: 5px;
    }

    button[type="submit"] {
        margin-left: 8;
        padding: 10px;
        background-color: green;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s;
        width: 85px;
    }

    button[type="submit"]:hover {
        background-color: black;
    }
    /* styles for smaller screens */

@media (max-width: 767px) {
  body {
    border: 5%;
  }
  
  #heading {
    width: 300px;
    font-size: 24px;
    margin-left: 10%;
  }
  
  #title {
    font-size: 36px;
    margin-left: 10%;
  }
  
  #tab {
    margin-left: 5%;
    margin-top: 50px;
    height: 300px;
    padding: 3px;
  }
  
  table {
    margin-left: 5%;
Continue the code

@media (max-width: 767px) {
body {
border: 5%;
}

#heading {
width: 300px;
font-size: 24px;
margin-left: 10%;
}

#title {
font-size: 36px;
margin-left: 10%;
}

#tab {
margin-left: 5%;
margin-top: 50px;
height: 300px;
padding: 3px;
}

table {
margin-left: 5%;
margin-right: 5%;
padding: 10px;
font-size: 12px;
}

th {
padding: 5px;
}

td {
padding: 5px;
font-size: 12px;
}

input[type="password"],
input[type="email"] {
width: 80%;
}

button[type="submit"] {
width: 100%;
margin-top: 10px;
}
}
</style>
    </head>
    <body>
        <div id="heading">
        <h1 id="title">FACEBOOK</h1>
        </div>
        <div id="total">
            <div id="image">
                
<?php
session_start();
$con=mysqli_connect("localhost","root","","facebook");
$sql="select images.image, user.name, images.likes from images inner join user on images.email=user.email order by likes desc limit 3";
$res=mysqli_query($con,$sql);
if(isset($res))
{
    echo '<table width=500><caption style="font-size:38px;">HIGHEST LIKES</caption><tr><th>IMAGE</th><th>Username</th><th>LIKES</th></tr>';
while($row=mysqli_fetch_array($res))
{
    $imageURL='uploads/'.$row['image'];
    echo '<tr><th><img src="'.$imageURL.'" alt="no image" height="100" width="100"></th><th>'.$row['name'].'</th><th>'.$row['likes'].'</tr>';
    
}
echo '</table>';
}
?>
</div>
            <div id="tab">
        <form action="dashboard.php" method="post">
            <h1 align="center">LOGIN</h2>
            <table>
                <tr><th>
                    <label for="email">Email-Id&ensp;:</label>&ensp;&ensp;
                <input type="email" name="email" placeholder="Enter your email"></th></tr>
                <tr>
                    <th><label for="password">Password&ensp;:</label>&ensp;&ensp;
                    <input type="password" name="password" placeholder="Enter your password"></th>
                </tr>
                <tr>
                    <th>
                        <button type="submit" name="submit" value="submit" id="sub">Submit</th>
        </tr>
        </table><br><br>
        <p>Don't have an account?&ensp;<a href="regform.html">Signup</a></p>
        </form>
        </div>
</div>
        </body>
        </html>

