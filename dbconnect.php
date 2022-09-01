<?php
$server="localhost";
$user="root";
$password="";
$db="login";
$con = mysqli_connect($server,$user,$password,$db);
if($con){
    ?>
    <script>
        console.log("Connection Sucessfull...");
        </script>

    <?php
}else{
    ?>
    <script>
        console.log("Connection Failed...");
        </script>

    <?php

}
?>