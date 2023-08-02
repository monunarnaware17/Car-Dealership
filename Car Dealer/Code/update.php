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
            text-align: center;
            background-color:#DAA520;
            margin-top: 50px;
            margin-bottom: 10px;
            margin-left: 500px;
            margin-right: 500px;
            border:#b8860b;
            border-style: groove;   
            border-width: 2mm;
        }
        #slt{
            margin-top: 20px;
            margin-bottom: 10px;
        }
        #fld1,#fld2{
            margin-top: 20px;
            margin-bottom: 10px;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electric Car Dealership</title>
</head>
<body background="images\Forza Horizon 4.png">
    <div class="topnav">
    <a href="insert.php">Add Car</a>
    <a href="display.php">Display</a>
    <a class="active" href="update.php">Update</a>
    <a href="delete.php">Delete</a>
    </div>
    <form id="form" action="" method="POST">
        <div id="slt">
        <label><strong>To Update</strong></label>
        <select name='slt'>
            <option value="Manufacturer">Manufacturer</option>
            <option value="Model">Model</option>
            <option value="Batter_capacity">Battery Capacity</option>
            <option value="Max_power">Max Power</option>
            <option value="car_range">Car Range</option>
            <option value="Battery_warranty">Battery Warranty</option>
            <option value="Acceleration_time">Acceleration Time</option>
            <option value="Charging_Time">Charging Time</option>
            <option value="Size">Type</option>
            <option value="ncap_rating">NCAP Rating</option>
            <option value="Price">Price</option>
            <option value="Availability">Availability</option>
        </select>
        </div>
        <div id="fld1">
            <label><strong>UID</strong></label>
            <input name="uid" id="uid" type="text"  placeholder="enter UID of row to update">
        </div>
        <div id="fld2">
            <label><strong>Updated Value</strong></label>
            <input name="nv" id="nv" type="text"  placeholder="enter new value here"><br><br>
            <button type="submit" name="sbt">SUBMIT</button>
        </div>
        
    </form>

    <?php
        include("main.php");
        function updationErrorHandler($pathdirectory="update.php")
        {
            $refresh = '5';
            echo '<script>alert("Unknown Error")</script>';
            echo "<meta http-equiv=\"refresh\" content=\"$refresh;url=$pathdirectory\" />";
        }
        function successful_Updation($pathdirectory="update.php")
        {
            $refresh = '2';
            echo '<script>alert("Data Updated Successfully")</script>';
            echo "<meta http-equiv=\"refresh\" content=\"$refresh;url=$pathdirectory\" />";
        }
        if(isset($_POST['sbt'])){
            try{
                $connection = new mysqli($servername,$username,$password,$dbname);
                if($connection->connect_error){
                    die("Connection Failed: $connection->connect_error");
                }
                $select = $_POST['slt'];
                $uid = $_POST['uid'];
                $val = $_POST['nv'];
                if($select=='Manufacturer' or $select=='Model' or $select='Size' or $select=='Availability')
                    $ins = "update $tbci set $select= '$val' where UID='$uid'";
                    mysqli_query($connection,$ins);
                    if($val=='Sold'){
                        $del = "delete from $tbci where UID='$uid";
                        mysqli_query($connection,$del);
                    }
                else
                    $ins = "update $tbci set $select= $val where UID='$uid'";
                    mysqli_query($connection,$ins);
                
                $connection->close();
                successful_Updation();
            }
            catch(Exception $e){
                updationErrorHandler();
            }
        }
        
    ?>
</body>
</html>