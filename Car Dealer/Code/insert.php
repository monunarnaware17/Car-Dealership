<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .topnav{
            background-color:#DAA520;
            border: #b8860b;
        }
        .topnav a{
            float: left;
            background-color:#DAA520;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
            border: #b8860b;
            border-radius: 20%;
            border-style:groove;
        }
        .topnav a:hover{
            background-color: #b8860b;
            color: black;
        }
        .topnav a.active {
            background-color:yellow;
            color:#1A2226;
        }




        #form{
            background-color:#DAA520;
            padding-top: 5%;
            padding-bottom: 23%;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 700px;
            margin-right: 20px;
            border-radius: 25%;
            border:#b8860b;
            border-style: groove;
            border-width: 3mm;
        }
        #d0{
            margin-left: 50px;
            margin-right: 50px;
        }
        #d00{
            float:inline-end;
            margin-top: 10px;
            margin-left: 50px;
            margin-right: 50px;
        }
        #d1,#d2,#d3,#d4,#d5,#d6,#d7,#d8,#d9,#d10,#d11,#d12{
            float:left;
            margin-left: 10px;
            margin-right: 5px;
            font-weight:bolder;
        }
        #sbt{
            float:left;
            margin-left: 50px;
            margin-right: 50px;
            margin-bottom: 50px;
            text-align: center;
        }
        input {
        background-color: #1A2226;
        border: none;
        border-bottom: 2px solid #ECF0F5;
        border-top: 0px;
        border-radius: 0px;
        font-weight: bold;
        outline: 0;
        margin-bottom: 20px;
        padding-left: 0px;
        color: #ECF0F5;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electric Car Dealership</title>
</head>
<body background="images\Forza Horizon 4.png">
    <div class="topnav">
    <a class="active" href="insert.php">Add Car</a>
    <a href="display.php">Display</a>
    <a href="update.php">Update</a>
    <a href="delete.php">Delete</a>
    </div>
    <form action="" method="POST" id="form">
        <center><h1 name="h1">Add New Car Details</h1></center><br>
        <div id="d0">
            <div id="d1">
                <label><strong>UID</strong></label><br>
                <input type="text" name="uid" placeholder="Unique ID number">
            </div>
            <div id="d2">
                <label><strong>Manufacturer Name</strong></label><br>
                <input type="text" name="manu">
            </div>
            <div id="d3">
                <label><strong>Model</strong></label><br>
                <input type="text" name="model">
            </div>
            <div id="d4">
            <label><strong>Battery Capacity</strong></label><br>
            <input type="number" step=0.1 name="bc" min=0.0 placeholder="in KWh">
            </div>
            <div id="d5">
                <label><strong>Max Power</strong></label><br>
                <input type="number" step=0.1 name="mp" placeholder="Brake Horse Power" min=0.0>
            </div>
            <div id="d6">
                <label><strong>Car Range</strong></label><br>
                <input type="number" step=0.1 name="cr" min=0.0 placeholder="in KM">
            </div>
        </div><br>
        <div id="d00">
            <div id="d7">
                <label><strong>Battery Warranty</strong></label><br>
                <input type="number" name="bw" placeholder="in years">
            </div>
            <div id="d8">
                <label><strong>Acceleration Time</strong></label><br>
                <input type="number" step=0.1 name="at" placeholder="0-100km/h">
            </div>
            <div id="d9">
                <label><strong>Charging Time</strong></label><br>
                <input type="number" min=0 name="ct" placeholder="in hours">
            </div>
            <div id="d10">
                <label><strong>Type</strong></label><br>
                <input type="text" name="siz">
            </div>
            <div id="d11">
                <label><strong>NCAP Rating</strong></label><br>
                <input type="number" name="nr" min=1 max=5>
            </div>
            <div id="d12">
                <label><strong>Price</strong></label><br>
                <input type="number" name="pr" min=0.0 placeholder="in Lakhs">
            </div>
        </div><br>      
        <button type="submit" name="sbt">SUBMIT</button>
    </form>
    
</body>
    


    <?php
        include("main.php");
        function insertionErrorHandler($pathdirectory="insert.php")
        {
            $refresh = '5';
            echo '<script>alert("Enter appropriate UID")</script>';
            echo "<meta http-equiv=\"refresh\" content=\"$refresh;url=$pathdirectory\" />";
        }
        function successful_Insertion($pathdirectory="insert.php")
        {
            $refresh = '2';
            echo '<script>alert("Data Entered Successfully")</script>';
            echo "<meta http-equiv=\"refresh\" content=\"$refresh;url=$pathdirectory\" />";
        }
        if(isset($_POST['sbt'])){
            try{
                $connection = new mysqli($servername,$username,$password,$dbname);
                if($connection->connect_error){
                    die("Connection Failed: $connection->connect_error");
                }
                $uid = $_POST['uid'];
                $manu = $_POST['manu']; $model = $_POST['model']; $bc = $_POST['bc'];
                $mp = $_POST['mp']; $cr = $_POST['cr']; $bw = $_POST['bw']; $at = $_POST['at'];
                $ct = $_POST['ct']; $siz = $_POST['siz']; $nr = $_POST['nr']; $pr = $_POST['pr'];
                $ava = "In Stock";
                mysqli_query($connection,"insert into $tbci values('$uid','$manu','$model',$bc,$mp,$cr,$bw,$at,$ct,'$siz',$nr,$pr,'$ava')");
                $connection->close();
                successful_Insertion();
            }
            catch(Exception $e){
                insertionErrorHandler();
            }
        }
    ?>
</body>
</html>