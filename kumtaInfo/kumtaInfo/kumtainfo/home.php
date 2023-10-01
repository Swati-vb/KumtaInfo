<?php
session_start(); 
require_once "functions.php" ;
$con=connect_my_db();
$result=mysqli_query($con,"SELECT * FROM users where id=".$_SESSION['userid']);
if(isset($_POST['logout'])) 
{
session_destroy();
header('Location: index.php');
}
if(!$result)
{
    header('Location: index.php');
}
?>
<html>
    <head>
        <title>Kumata-Info</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="mycss.css">

    </head>
<body>
    <br>
    <div>
        <h1>Kumta-Info</h1>
        <!-- -------------------------       navbar start       ------------------------------ -->
            <div>
                <div class="navbar col-60" >
                    <a href="info.php?c=Hotels">Hotels</a> 
                    <a href="info.php?c=Medicalshops">Pharmacy</a>                            
                    <a href="info.php?c=Travels">Travels</a>
                    <a href="info.php?c=Hospitals">Hospitals</a>
                    <a href="info.php?c=Education">Education</a>   
                    <a href="info.php?c=Tourism">Tourism</a>                                              
                </div>                   
            </div>   
        <!-- -------------------------        navbar end        ------------------------------ -->
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn navrit" onclick="closeNav()">&times;</a>
            <?php
            if($result && mysqli_num_rows($result)>0)
            {
                $userinfo=mysqli_fetch_assoc($result);
                
                if($userinfo['desg']==1)
                {
            ?>
            <a href="contact.php">Contact Us</a>
            <a href="pp.html">Privacy Policy</a>
            <a href="saved.php">Saved Informations</a>
            <a href="tnc.html">Terms & Conditions</a><hr>
            <?php 
                }
                elseif($userinfo['desg']==2)
                {
            ?>
            <a href="messages.php">Messages</a>
            <a href="pp.html">Privacy Policy</a>
            <a href="tnc.html">Terms & Conditions</a>
            <a href="upload.php">Upload Informations</a><hr>
            <?php 
                }
            }
            ?>

            <form method="post">
                <button class="logout" name="logout">Log Out</button>
            </form><hr>
        </div>   
        <span class="fix lft top" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
    </div> <br><br>
        <div class="info padding">
            <p>Welcome to kumtainfo, your 'one stop shop' where you are assisted with day-to-day and exclusive planning and purchasing activities.<br>
             We take pride in our iconic customer support number, +91 9876543210 and the fact that we own a strong hold on local business information in whole Kumta.</p>
            <p>Our service extends from providing address and contact details of business establishments around the kumta, to making orders and reservations for leisure, medical, financial, travel and domestic purposes.<br>
             We enlist business information across varied sectors like Hotels, Restaurants, Auto Care, Home Decor, Personal and Pet Care, Fitness, Insurance, Real Estate, Sports, Schools, etc. from all over the kumta.</p> 
        </div>    <br>
    <center>          
        <!-- footer -->
        <div class="footer subpart">
            <div class="colmn">
                <h4>All Categories</h4><br>
                <a href="info.php?c=hotels">Hotels</a><br>
                <a href="info.php?c=medicalshops">Medical Shops</a><br>
                <a href="info.php?c=travels">Travels</a><br>
                <a href="info.php?c=hospitals">Hospitals</a><br>
                <a href="info.php?c=education">Education</a><br>
                <a href="info.php?c=tourism">Tourist Places</a><br>
            </div>
            <div class="colmn">
                <h4>Information</h4><br>
                <a href="contact.php">Contact Us</a><br>
                <a href="pp.html">Privacy Policy</a><br>
                <a href="tnc.html">Terms & Conditions</a><br>
            </div>
            <div class="colmn">
                <h4>Account</h4><br>
                <a href="saved.php">Saved info</a><br>
            </div>            
        </div><br><br>
        <div class="copy">
            <p >&copy; Copyrights <a href=""><b>Kumta Info</b></a>. All Rights Reserved. </p>
        </div>
    </center>    
    <script>
        //side navbar
        function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("Sidenav").style.display = "none";
        }

        function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("Sidenav").style.display = "block";
        }

        // closable tabs 

      function closetabs(tabsName) 
      {
        var i;
        var x = document.getElementsByClassName("box");
        for (i = 0; i < x.length; i++) 
        {
          x[i].style.display = "none";  
        }
        document.getElementById("bokon").style.display = "block";
      }
      
      function openTabs(tabsName) 
      {
        var i;
        var x = document.getElementsByClassName("tabs");
        for (i = 0; i < x.length; i++) 
        {
          x[i].style.display = "none";  
        }
        document.getElementById(tabsName).style.display = "block"; 
      }

    </script>
</body>
</html>