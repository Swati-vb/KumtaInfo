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
        <title>Sign Up</title>
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
            <div id="signup">
                <header class="loghead">
                    <h1>Sign Up</h1> 
                </header> 
                already have an account? <a href="index.php"><u> Log In </u></a> 
                <hr class="hr">
                <form method="POST">
                    <div class="padding">            
                        <label for="user">Username :</label>            
                        <input type="text" id="user" name="user" placeholder="User Name" />
                    </div>
                    <div class="padding">
                        <label for="pass">Enter Password :</label>
                        <input type="password" id="pass" name="pass" placeholder="Password" /></br>
                    </div>
                    <div class="padding">    
                        <label for="pass">Confirm Password :</label>
                        <input type="password" id="rpass" name="cpass" placeholder="Re-Enter the Password" />
                    </div>
                    <div class="padding">
                        <input type="submit" class="mybtn" value="SignUp" name="sign">
                    </div>
                    <br>
                </form>    
            </div>
        </center>
    </body> 

</html>