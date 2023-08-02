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
        #tb{
            background-color:#DAA520;
            margin-top: 50px;
            margin-bottom: 10px;
            margin-left: 100px;
            border:#b8860b;
            border-style: groove;   
            border-width: 3mm;
        }
        #d0{
            float:inline-end;
            padding-top: 5%;
            padding-bottom: 23%;
            margin: 100px;
            margin-top: 50px;
            margin-left: 500px;
            margin-right: 500px;
            margin-bottom: 100%;
        }
        select {
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
    <a href="insert.php">Add Car</a>
    <a class="active" href="display.php">Display</a>
    <a href="update.php">Update</a>
    <a href="delete.php">Delete</a>
    </div><br><br><br><br>
    <div name="d0">
    <form id="form" name="form" action="" method="POST">
            <label>Select by</label><br>
            <select name="s1" id="s1">
                <option value=full>Full Table</option>
                <option value="uid">UID</option>
                <option value="manu">Manufacturer</option>
                <option value="model">Model</option>
                <option value="pgt">Price(Greater than)</option>
                <option value="plt">Price(Less than)</option>
            </select>
            <input type="text" default="none" name="cond" placeholder="type condition here">
            <button type="submit" name="sbt">SUBMIT</button>
        </form>
    </div>

    <?php
        include("main.php");
        function displayErrorHandler($pathdirectory="display.php")
        {
            $refresh = '5';
            echo '<script>alert("Unknown Error")</script>';
            echo "<meta http-equiv=\"refresh\" content=\"$refresh;url=$pathdirectory\" />";
        }
        function display($result){
            if ($result->num_rows>0) {
                echo '<table id="tb" border="1" cellspacing="2" cellpadding="2"> 
                <tr> 
                    <td> <font face="Arial">UID</font> </td> 
                    <td> <font face="Arial">Manufacturer</font> </td> 
                    <td> <font face="Arial">Model</font> </td> 
                    <td> <font face="Arial">Battery Capacity</font> </td> 
                    <td> <font face="Arial">Max Power</font> </td> 
                    <td> <font face="Arial">Car Range</font> </td>
                    <td> <font face="Arial">Battery Warranty</font> </td> 
                    <td> <font face="Arial">Acceleration Time</font> </td>
                    <td> <font face="Arial">Charging Time</font> </td>
                    <td> <font face="Arial">Type</font> </td>    
                    <td> <font face="Arial">NCAP Rating</font> </td> 
                    <td> <font face="Arial">Price</font> </td> 
                </tr>';
                while($row = $result->fetch_assoc()) {
                    echo'<tr>
                    <td><font face="Arial">'.$row["UID"].'</td>
                    <td><font face="Arial">'.$row["Manufacturer"].'</td>
                    <td><font face="Arial">'.$row["Model"].'</td>
                    <td><font face="Arial">'.$row["Battery_capacity"].'</td>
                    <td><font face="Arial">'.$row["Max_Power"].'</td>
                    <td><font face="Arial">'.$row["Car_Range"].'</td>
                    <td><font face="Arial">'.$row["Battery_Warranty"].'</td>
                    <td><font face="Arial">'.$row["Acceleration_Time"].'</td>
                    <td><font face="Arial">'.$row["Charging_Time"].'</td>
                    <td><font face="Arial">'.$row["Size"].'</td>
                    <td><font face="Arial">'.$row["ncap_rating"].'</td>
                    <td><font face="Arial">'.$row["Price"].'</td>
                    </tr>';
                }
            } 
            else
                echo "0 results";
        }
        if(isset($_POST['sbt'])){
            try{
                $connection = new mysqli($servername,$username,$password,$dbname);
                if($connection->connect_error){
                    die("Connection Failed: $connection->connect_error");
                }
                $filter = $_POST['s1'];
                if($filter=='full'){
                    $ins = "select * from $tbci";
                    $rs = mysqli_query($connection,$ins);
                    display($rs);
                }
                else if($filter=='uid'){
                    $condition = $_POST['cond'];
                    $ins = "select * from $tbci where UID=$condition";
                    $rs = mysqli_query($connection,$ins);
                    display($rs);
                }
                else if($filter=='manu'){
                    $condition = $_POST['cond'];
                    $ins = "select * from $tbci where Manufacturer='$condition'";
                    $rs = mysqli_query($connection,$ins);
                    display($rs);
                }
                else if($filter=='model'){
                    $condition = $_POST['cond'];
                    $ins = "select * from $tbci where Model='$condition'";
                    $rs = mysqli_query($connection,$ins);
                    display($rs);
                }
                else if($filter=='pgt'){
                    $condition = $_POST['cond'];
                    $ins = "select * from $tbci where Price>$condition";
                    $rs = mysqli_query($connection,$ins);
                    display($rs);
                }
                else if($filter=='plt'){
                    $condition = $_POST['cond'];
                    $ins = "select * from $tbci where Price<$condition";
                    $rs = mysqli_query($connection,$ins);
                    display($rs);
                }
                $connection->close();
            }
            catch(Exception $e){
                displayErrorHandler();
            }
        }
    ?>
</body>
</html>