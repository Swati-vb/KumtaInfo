<?php 
    session_start(); 
    require_once "functions.php" ;
    $con=connect_my_db();

    $result=mysqli_query($con,"SELECT * FROM users where id=".$_SESSION['userid']);
    if(isset($_POST['delete']))
    {
        $savedid=$_POST['delete'];
        $delete=mysqli_query($con,"DELETE from saved where id=$savedid");
    }
?>
<html>
    <head>
    <title>Saved Informations</title>
        
        <link rel="stylesheet" href="mycss.css">
    </head>
    <body>
        <div>
            <h1>Saved Informations</h1>
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
                if($con==0)
                {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $query=mysqli_query($con,"SELECT * FROM saved where userid=".$_SESSION['userid']);
                if($query)
                {
                    if($result && mysqli_num_rows($result)>0)
                    {
                        while($row = mysqli_fetch_assoc($query))
                        {
                            $uid=$row['userid'];
                            $category=$row['category'];
                            $details=mysqli_query($con,"SELECT * FROM info where id=".$row['catid']);
                            while($row1 = mysqli_fetch_assoc($details))
                            {
            ?>
                            <br>
                            <div class="row">
                                <div class="col-25">
                                    <img src="./<?php echo $row1['image']; ?>" class="icon" width="260px" height="200px" alt="Faculty Images">
                                </div>
                                <div class="col-70">
                                    <label style="font-weight:bold;"><?php echo $row1['name']; ?></label><br>
                                    <label><?php echo $row1['adrs']; ?></label><br>
                                    <label><?php echo $row1['cntct']; ?></label><br>
                                </div>                               
                                <form method="post">                      
                                    <button name="delete" value=<?php echo $row['id']; ?> class="dropbtn rit col-5"> Delete </button>       
                                </form>                                         
                            </div><hr>  
                    <?php 
                            }
                        }
                    }
                }
                if($query==0)
                {
                    echo "No Saved Informations Found !!!";
                }
            ?>   
        </div>
    </body>
</html>    