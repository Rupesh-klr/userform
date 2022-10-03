<?php session_start();?>
<?php
// $server="localhost";
// $user="root";
// $password="";
// $db="login";
// $con = mysqli_connect($server,$user,$password,$db);
// if($con){echo '<script> console.log("Connection Sucessfull..."); </script> ';
// }else{echo "<script>console.log('Connection Failed...');</script>" ;}
// 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO useres (frist, email, pass_word)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
//  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 