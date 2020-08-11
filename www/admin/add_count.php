<?php
require 'config.php';

function add_count()
{

    require 'config.php';

    if(isset($_POST["count_name"])){
        $count_name = mysqli_real_escape_string($conn, $_POST["count_name"]);
    }
    else{
        $count_name = "NA";
    }

    if(isset($_POST["count"])){
        $count = mysqli_real_escape_string($conn, $_POST["count"]);
    }
    else{
        $count = "NA";
    }

    // insert records in product table
    $sql ="INSERT INTO counts_config (count_name,count) VALUES ('$count_name','$count')";
    $result = mysqli_query($conn,$sql);

    

}
add_count();
header("Location: count_config.php");

?>