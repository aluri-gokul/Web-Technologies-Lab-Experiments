<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="30">
<style>
      body {
        margin-top: 20px;
        font-family: Arial, Helvetica, sans-serif;
        background-color: lightcyan;
      }
      
      .topnav {
        overflow: hidden;
        background-color: lightskyblue;
        border: 3px solid lightskyblue;
        border-radius: 0px;
      }
      
      .topnav a {
        float: left;
        color: black;
        text-align: center;
        padding: 14px 20px;
        text-decoration: none;
        font-size: 17px;
        height: 25px;
        justify-content: center;
      }
      
      .topnav a:hover {
        background-color: white;
        color: black;
      }
      
      .logout {
        justify-content: right;
        display: flex;
      }
      
      #lg {
        margin-right: 20px;
        margin-top: 0px;
        margin-bottom: 50px;
        padding: 5px;
        align-self: center;
        background: #1877f2;
        border: none;
        border-radius: 5px;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        width: 100px;
      }
      
      #lg:hover {
        background: #196fe0;
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
  <a href="logout.php"><button style="background-color:darkblue; color:white; font-size:18px; padding:5px; border-radius:10px; width:100px;" id="lg">Logout</button></a>
</div>
</div>
<center><h1>YOUR FEED</h1></center>
<div style="padding-left:5px" margin-top="0px">
    <?php

        $con=mysqli_connect("localhost","root","","facebook");
        $eid=$_SESSION['email'];
        $a=mysqli_query($con,"select * from activeusers");
        echo "<div style='width:400px; margin-top:2px; border:2px solid black; width:250px; border-radius:5px;background-color:azure;box-shadow: 2px 2px 5px rgba(0,0,0,0.3);'>";
          echo "<center><h3 style='color:darkgreen; text-align:left; margin-left:15px;'>&#128994;<u>ACTIVE USERS</u></h2></center>";
        while($r=mysqli_fetch_array($a))
        {
          echo "<ul><li>";
          echo $r['name'];
          echo "</li><br></ul>";
          
        }
        $rows=mysqli_query($con,"select * from images");
        echo "</div>";
        echo "<div style='margin-top:-120px;'>";
        while($row=mysqli_fetch_array($rows))
        {
          $image_id = $row["post_id"];
          echo "<div align='center' style='background-color:azure; border-radius:5px;box-shadow: 2px 2px 5px rgba(0,0,0,0.3); width:400px; margin-left:35.8%; padding:15px;'>";
          $s="select user.name from user inner join images on (user.email=images.email and images.post_id='$image_id')";
          $f=mysqli_query($con,$s);
          while($g=mysqli_fetch_array($f)){
          echo "<h3>".$g['name']."</h3>";
          }
          //            $image_id = $row["post_id"];
          $sql1="select user.name,comments.comment from user inner join comments on (user.email=comments.email and comments.post_id='$image_id')";
          //$sql1="select * from comments where post_id='$image_id'";
          $a=mysqli_query($con,$sql1);
          $s=mysqli_query($con,"select count(comment_id) from comments where post_id='$image_id'");
          while($re=mysqli_fetch_array($s))
          {
             $count=$re['count(comment_id)'];
          }
          echo "<br>";
            $imageURL = 'uploads/'.$row["image"];
            echo '<img src="'.$imageURL.'" alt="no image" height=350 width=350 style="border-radius:25px";>';
            echo "<br><br>";
            echo "<h4>Description:&ensp;".$row["description"]."</h4>";
            echo "<form method='post' action='like.php'>";
            echo "<input type='hidden' name='image_id' value='" .$row["post_id"]."'/>";
            echo "<div style='display:flex'; justify-content:center';>";
            echo "<div>";
            echo "&ensp;&ensp;&ensp;&ensp;<input style='background-color: red; color: #fff; border: none; padding:10px; border-radius:2px; font-size: 16px;margin-left:-28px;' type='submit' value=&#10084;&ensp;$row[likes] />";
            echo "</form>";
            echo "</div>";
            echo "<div style='margin-top:6px;'>"; 
            echo "<form method='post' action='post.php'>";
            echo "&ensp;&ensp;&ensp;&ensp;&ensp;<input type='hidden' name='image_id' value='" . $row["post_id"] . "'/>";
            echo "<input type='text-area' placeholder='comment on the pic' style='height:30px; width:160px; border:2px solid black; border-radius:10px;margin-right:-52px;' name='comment'>";
            echo "&ensp;<input style='background-color:black ; color: #fff; width:75px; padding:5px; border-radius:20px; font-size: 14px; margin-right:5px;margin-left:105px;' type='submit' name='sub' value='Comment'>";

          
            echo "</form>";

            echo "<form method='post'>";
            echo "<button name='co' style='border:none; color:#fff; border-radius:10px; background-color:blue; padding:5px;width:35px; font-size:16px; margin-left:144px;margin-top:-45px;'>$count</button>";
            echo "</div>";
            echo "</div>";
            echo "</form>";

            while($p=mysqli_fetch_array($a))
            {
              $x=$p['name']." commented ".$p['comment'];
            
            if(isset($_POST['co'])){
              echo "<div style='background-color:lightsteelblue; padding:8px;'>";
              echo "<div style='background-color:azure; padding:8px; border-radius:10px;'>";
              echo $x;
              echo "</div>";
              echo "<br>";
              echo "</div>";
            }
          }
            echo "</div>";
            
            echo "<br><br>";
            
        }
        echo "</div>";
        if(isset($_POST["sub"]))
        {
          $image_id=$_POST["image_id"];
          $user_id=$_SESSION["email"];
          $comment=$_POST["comment"];
          $sql="insert into comments(post_id,email,comment) values('$image_id','$user_id','$comment')";
          if(mysqli_query($con,$sql)){
          }
          else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
          }
          echo '<script>window.location.replace("index.php");</script>';
       }
         
    ?>
</div>
</body>
</html>
