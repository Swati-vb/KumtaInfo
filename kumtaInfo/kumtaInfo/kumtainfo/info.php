<?php 
    session_start(); 
    require_once "functions.php" ;
    $con=connect_my_db();

    $result=mysqli_query($con,"SELECT * FROM users where id=".$_SESSION['userid']);
    $uid=$_SESSION['userid'];
    $category=$_GET['c'];
    $catid=$_POST['save'];
    if(isset($_POST['save']))
    {
        $save=mysqli_query($con,"INSERT INTO saved( userid,category,catid) VALUES ( '$uid','$category','$catid')");
        if(!$save)
        {
            echo mysqli_error($con);
        }
    }
    if(isset($_POST['delete']))
    {
        $savedid=$_POST['delete'];
        $delete=mysqli_query($con,"DELETE from info where id=$savedid");
        if(!$delete)
        {
            echo mysqli_error($con);
        }
    }
?>
<html>
    <head>
        <title><?php echo $category; ?></title>
        
        <link rel="stylesheet" href="mycss.css">
    </head>
    <body>
        <div>
            <h1><?php echo $category; ?></h1>
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
            <?php
                if(!$con)
                {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $query=mysqli_query($con,"SELECT * FROM info where category='$category'");
                if($query)
                {
                    if($result && mysqli_num_rows($result)>0)
                    {
                        $userinfo=mysqli_fetch_assoc($result);
                        
                        if($userinfo['desg']==1)
                        {
                            while($row = mysqli_fetch_assoc($query))
                            {
                        ?>
                            <br>
                            <div class="row">
                                <div class="col-25">
                                    <img src="./<?php echo $row['image']; ?>" class="icon" width="260px" height="200px" alt="Faculty Images">
                                </div>
                                <div class="col-70">
                                    <label style="font-weight:bold;"><?php echo $row['name']; ?></label><br>
                                    <label><?php echo $row['adrs']; ?></label><br>
                                    <label><?php echo $row['cntct']; ?></label><br>
                                </div>                               
                                <form method="post">                      
                                    <button name="save" value=<?php echo $row['id']; ?> class="dropbtn rit col-5"> Save </button>       
                                </form>                                         
                            </div>
                            <br><hr>  
                    <?php 
                            }
                        }
                        elseif($userinfo['desg']==2)
                        {
                            while($row = mysqli_fetch_assoc($query))
                            {
                    ?> 
                                <div class="row">
                                <div class="col-25">
                                    <img src="./<?php echo $row['image']; ?>" class="icon" width="260px" height="200px" alt="Faculty Images">
                                </div>
                                <div class="col-70">
                                    <label style="font-weight:bold;"><?php echo $row['name']; ?></label><br>
                                    <label><?php echo $row['adrs']; ?></label><br>
                                    <label><?php echo $row['cntct']; ?></label><br>
                                </div>        
                                <form method="post">                      
                                    <!-- <button name="edit" class="dropbtn rit col-5"> edit </button>   -->                             
                                    <button name="delete" value=<?php echo $row['id']; ?> class="dropbtn rit col-5"> delete </button>     
                                </form>                                         
                            </div><hr>
                    <?php 
                            }
                        }
                        else header('Location: index.php');
                    }
                }
                else
                {
                    echo "no hotels found";
                }
            ?>   
        </div>
        <!-- footer -->
        <center>
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
    </body>
</html>    