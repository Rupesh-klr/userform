<?php
$server="localhost";
$user="root";
$password="";
$db="login";
$con = mysqli_connect($server,$user,$password,$db);
if($con){
echo '<script> console.log("Connection Sucessfull..."); </script> ';

    
}else{
    ?>
    <script>
        console.log("Connection Failed...");
        </script>

    <?php

}
?>