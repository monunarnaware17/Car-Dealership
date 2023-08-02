<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Dealership</title>
</head>
<body>


    <?php 
    $servername= "localhost";
    $username = "root";
    $password = "satraa17";
    $dbname = "car_dealer_inventory";
    $tbci = "current_inventory";
    
    function update($dataarr,$colarr,$condition=""){
        global $connection, $tbci;
        $ct=count($dataarr);
        for($i=0;$i>=$ct;$i++){
            $ins="update $tbci set  $colarr[$i] = $dataarr[$i] $condition;";
            mysqli_query($connection,$ins);
        }
    }
    function delete_record($uid,$tbci){
        global $connection;
        $ins="delete from $tbci where uid=$uid";
        mysqli_query($connection,$ins);
    }
    ?>
</body>
</html>