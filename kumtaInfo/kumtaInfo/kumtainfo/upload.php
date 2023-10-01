<?php 
    session_start(); 
    require_once "functions.php" ;
    $con=connect_my_db();

    if(isset($_POST['upload']))
    {	
        $name = $_POST['name'];
        $adrs = $_POST['adrs'];
        $pno = $_POST['pno'];
        $cat = $_POST['category'];
        $file = $_FILES["image"];
        $img = "$cat/" . $file["name"]; 
        $files = scandir($cat);
        $insert=mysqli_query($con,"INSERT into info (name,adrs,cntct,image,category) VALUES ('$name','$adrs','$pno','$img','$cat')");
        $res= move_uploaded_file($file["tmp_name"], "$cat/" . $file["name"]);
        if($res==0)
        {
            echo mysqli_error($res);
        }
    }
?>
<html>
    <head>
        <title>Upload</title>
        <link rel="stylesheet" href="mycss.css">
        <style>
            a{color:white;}
            input[type=text],[type=number], select, textarea { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; resize: vertical; }
            label { padding: 12px 12px 12px 0; display: inline-block; }
            .right{float:right; padding-right:8%; padding-top:2%;}
            input[type=file], select { width: 50%; padding: 12px; border: 1px rgb(255, 81, 0);box-shadow: 0px 1px 2px 0px rgba(0,0,0,1.0); border-radius: 4px; }
            input[type=submit]{color:black; background:chartreuse;border-radius: 5px;padding:25%;}
            input[type=submit]:hover{background: blue; color:white;}
            .container { border-radius: 5px; padding: 20px; padding-left: 5%; }
            .col-15 { float: left; width: 15%; margin-top: 6px; }
            .col-65 { float: left; width: 65%; margin-top: 6px; }
            .row:after { content: ""; display: table; clear: both; }
        </style>
    </head>
    <body>        
        <center>
            <div >
            <h1>Upload Details</h1>
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
                <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-15">
                          <label for="class">Catagory</label>
                        </div>
                          <div class="col-65">
                            <select name="category">
                                <option selected disabled>Select Catagory</option>
                                <option name="category" value="hotels">Hotels</option>
                                <option name="category" value="medicalshop">Medical Shop</option>
                                <option name="category" value="travels">Travels</option>
                                <option name="category" value="hospitals">Hospitals</option>
                                <option name="category" value="education">Education</option>
                                <option name="category" value="tour">Tourism</option>                              
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-15">
                            <label for="name">Enter Name</label>
                        </div>
                        <div class="col-65">
                            <input type="text" name="name" id="name" placeholder="Enter the Name" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-15">
                            <label for="adrs">Address</label>
                        </div>
                        <div class="col-65">
                            <input type="text" name="adrs" id="adrs" placeholder="Enter the Address" />
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-15">
                            <label for="pno">Contact Number</label>
                        </div>
                        <div class="col-65">
                            <input type="text" name="pno" id="pno" placeholder="Enter The Phone Number" />
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-15">
                            <label for="image">Select Image</label>
                        </div>
                        <div class="col-65"><br>
                            <input type="file" name="image"/>
                        </div><br>
                        <div class="right">
                            <input type="submit" name="upload" value="Upload" />
                        </div>
                    </div>  
                </form>
            </div>
        </center>    
    </body>
</html>                