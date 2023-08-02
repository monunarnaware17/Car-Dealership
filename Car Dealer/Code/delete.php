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
        #fld1{
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
    <a href="update.php">Update</a>
    <a class="active" href="delete.php">Delete</a>
    </div>
    <form id="form" action="" method="POST">
        <div id="fld1">
            <label><strong>UID</strong></label>
            <input name="uid" id="uid" type="text"  placeholder="enter UID of row to delete">
        
            <button type="submit" name="sbt">SUBMIT</button>
        </div>
    </form>

    <?php
        include("main.php");
        function updationErrorHandler($pathdirectory="delete.php")
        {
            $refresh = '5';
            echo '<script>alert("Unknown Error")</script>';
            echo "<meta http-equiv=\"refresh\" content=\"$refresh;url=$pathdirectory\" />";
        }
        function successful_Deletion($pathdirectory="delete.php")
        {
            $refresh = '2';
            echo '<script>alert("Data Deleted Successfully")</script>';
            echo "<meta http-equiv=\"refresh\" content=\"$refresh;url=$pathdirectory\" />";
        }
        if(isset($_POST['sbt'])){
            try{
                $connection = new mysqli($servername,$username,$password,$dbname);
                if($connection->connect_error){
                    die("Connection Failed: $connection->connect_error");
                }
                $uid = $_POST['uid'];
                $ins = "delete from $tbci where UID='$uid'";
                mysqli_query($connection,$ins);
                $connection->close();
                successful_Deletion();
            }
            catch(Exception $e){
                updationErrorHandler();
            }
        }
        
    ?>
</body>
</html>