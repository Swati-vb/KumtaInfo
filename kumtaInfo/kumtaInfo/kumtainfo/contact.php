<?php
 session_start();
 require_once "functions.php" ;
 $con=connect_my_db();

 if(isset($_POST['contact']))
  {
      $name=$_POST['name'];
      $email=$_POST['email'];
      $message=$_POST['message'];

      $insert = "INSERT INTO messages(`name`,`email`,`messages`) VALUES ('$name','$email','$message')";
      $insert=mysqli_query($con,$insert);
      if(!$insert)
      {
        echo mysqli_error($con);
      }
  }
  ?>
<html>
    <head>
        <title>Contact Us</title>
        
        <link rel="stylesheet" href="mycss.css">
    </head>    
    <body>
        <center>
            <div id="contactus">
                <header class="conhead">
                    <h1>Contact Us</h1>
                </header>
                <label class="yellow"> Email : kumtainfo@gmail.com </label>
                <hr class="hr">
        <!-- -------------------------       navbar start       ------------------------------ -->
        <div>
                <div class="navbar col-60" >
                    <a href="home.php">Home</a>
                    <a href="info.php?c=Hotels">Hotels</a> 
                    <a href="info.php?c=Medicalshops">Pharmacy</a>                            
                    <a href="info.php?c=Travels">Travels</a>
                    <a href="info.php?c=Hospitals">Hospitals</a>
                    <a href="info.php?c=Education">Education</a>   
                    <a href="info.php?c=Tourism">Tourism</a>                                              
                </div>                   
            </div>   
        <!-- -------------------------        navbar end        ------------------------------ -->
                <form method="post"><br>
                    <div class="row">
                        <div class="col-25">
                            <label for="name">Name</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="name" name="name" placeholder="Your name..">
                        </div>
                        
                    </div><br><br><br>
                    <div class="row">
                        <div class="col-25">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="email" name="email" placeholder="Your Email ID..">
                        </div>
                    </div><br><br><br>                
                    <div class="row">
                        <div class="col-25">
                            <label for="message">Message</label>
                        </div>
                        <div class="col-75">
                            <textarea id="message" name="message" placeholder="Write Message Here.." style="height:100px"></textarea>
                        </div>
                    </div><br><br><br>            
                    <div class="padding">
                        <input type="submit" class="con" style="float:left;" value="Submit" name="contact">
                    </div>                
                </form>
            </div>
        </center>
    </body>
</html>