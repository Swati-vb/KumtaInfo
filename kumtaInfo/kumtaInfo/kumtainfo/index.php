<?php
 session_start();
 require_once "functions.php" ;
 $con=connect_my_db();   
 $uname=$_POST['user'];
 $pwd=$_POST['pass'];
 $cpwd=$_POST['cpass'];
 $sql="select * from users where email='$uname' AND pwd='$pwd' limit 1";

 if(isset($_POST['login']))
  {
    if(mysqli_error($con))
    echo "<br>Error = ".mysqli_error($con);
    $result=mysqli_query($con,$sql);
    $login=mysqli_num_rows($result)==1&&(!preg_match('/([\'"])/', $_POST['pass']));
    if($login)
      {
        $userinfo=mysqli_fetch_assoc($result);
        $_SESSION['userid']=$userinfo['id'];
        $_SESSION['user']=$_POST['desg'];
        header("location:home.php");
        exit();
      } 
    if(!$login)
      {
        echo '<script type="text/javascript"> alert("You Have Entered Incorrect Email/Password !!!"); </script>'; 
      }
  }
  if(isset($_POST['sign']))
  {
    $exist = mysqli_query($con, "SELECT * FROM users WHERE email = '{$uname}'");
    $insert="INSERT INTO users(email,pwd,desg)VALUES ('$uname','$pwd','1')";
    if(mysqli_num_rows($exist) > 0)
    {
        echo '<script type="text/javascript"> alert("Username already exist!!!"); </script>';
    }
    elseif($pwd===$cpwd)
    {
        $signup=mysqli_query($con,$insert);
        $result=mysqli_query($con,$sql);
        $userinfo=mysqli_fetch_assoc($result);
        $_SESSION['userid']=$userinfo['id'];
        $_SESSION['user']=$_POST['desg'];
        header("location:home.php");
        if(!$signup)
        {
            echo mysqli_error($con);
        }
    }
    else
    {
        echo '<script type="text/javascript"> alert("Password Mismatch!!!"); </script>'; 
    }
    if(mysqli_error($con))
    echo "<br>Error = ".mysqli_error($con);
  }
?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="mycss.css">
        <style>
                .fix{position:absolute;}.lft{left:2%;} .top{top:7%;}
                .row{width:100%;}
                .col{width:33.33%; float:left; padding-bottom: 2%; font-size: 25px;}
                .col a{text-decoration:none; color:blue;}
            </style>
        </head>
    <body>
        <center>
            <div id="login">
                <header class="loghead">
                    <h1>Log In</h1> 
                </header>  
                don't have an account? <a href="agree.html"><u> Sign Up </u></a> 
                <hr class="hr">
                <form method="POST">
                    <div class="padding">            
                        <label for="user">Username :</label>            
                        <input type="text" id="user" name="user" placeholder="User Name" />
                    </div>
                    <div class="padding">
                        <label for="pass">Password :</label>
                        <input type="password" id="pass" name="pass" placeholder="Password" />
                    </div>
                    <div class="padding">
                        <input type="submit" class="mybtn" value="Login" name="login">
                    </div>
                    <br>
                </form>   
            </div>
        </center>
    </body>
</html>