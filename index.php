<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>index Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='styles.css'>
    <script src='main.js'></script>
</head>
<body>
    
<!-- <script >
    var x = document.cookie.split(";");
    console.log(x);
    document.addEventListener("DOMContentLoaded", () => {
    chrome.extension.sendMessage({action: "ping"}, function(resp) {
        console.log(JSON.stringify(resp));
    });
});
    </script> -->
    <?php
    
    require 'redis/Autoload.php';
    Predis\Autoloader::register();
    $redis = new Predis\Client();

     //$redis = new Predis\Client()  or die("Cannot load Redis module.");
     $redis->connect('127.0.0.1', 6379);
    //  if ( $redis->get('fristname')=="Yes") {
        
        // echo "user is login\n<br>",$_COOKIE['fristname'];
        // $user_data = unserialize($redis->get($_COOKIE['fristname'])); 
        // echo $user_data,$redis->get($_COOKIE['fristname']);  
        //  if ($_COOKIE['token'] == $user_data['token']) {                 
        //      echo "Welcome, " . $user_data['firstname'] . ' ' . $user_data['email'] . "<br>"
        //           . "Your token is " . $user_data['token']; 
        //  } 
        // }
        // else{
        //     echo "your need to login";
        // }
    // echo "val".$_GET['checkeid'].$_GET['checkeid1'];
        // $mapprefer=$_SESSION['mapprefer']; 
        
        // if($mapprefer=="Yes"){
        //     '<script>checked();console.log("lkjhk");</script>';
        // }
    ?>
    <header class="header-nav">
        <div class="d-flex ">
            <div class="col d-flex  mr-6" id="userlogoutbtn1">
                <a href="#" class="mr-6 mas">
                    <h1 width="90px">HOME</h1>
                </a>
            </div>
            <div class="col d-flex align-items-end" >
                
                <!-- <div class="d-flex head-user-profile " id="userlogoutbtn2" >
                    <ul class="account-links-group d-flex ">
                        <li class="nav-link  login-btn">
                            <a class="nav-link   text-primary text-center px-4" href="login.php">Login</a>
                        </li>
                        <li class="nav-link  signup-btn">
                            <a class="nav-link btn btn-primary text-white px-4" href="sign up.php">Sign up</a>
                        </li>
                    </ul>
                </div> -->
           <?php
           include 'header.php';
           headershow();?>     
            </div>
            <!-- <div class="d-flex " id="userloginbtns" style="visibility: hidden;">
                <div class="dropdown">
                    <button class="dropbtn btn-secondary  btn-lg  dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="" alt=" "> 
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="dropdownMenu2">
                        <li><a class="dropdown-item active " href="profile.php">My profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="gallery.php">Gallery</a></li>
                        <li><a class="dropdown-item" href="#">log out</a></li>
                    </ul>
                </div>
            </div>  
        </div> -->
        
    </header>
    <main>
        <h1>index ups</h1> <?php 
    echo "<h1>php proragerm codes</h1>";
    ?>
    <script src='main.js'>
        const dataBaseFromLocalStorage = JSON.parse(localStorage.getItem("myDataBase"))
        if (dataBaseFromLocalStorage) {
        myDataBase = dataBaseFromLocalStorage
        console.log(myDataBase);
        if(myDataBase==="Yes"){
            console.log("234567890987654");
            checked();
        }
    }
    </script>
	
    <?php if (isset($_GET['error'])): ?>
		<p><?php echo $_GET['error']; ?></p>
	<?php endif ?>
    <div class="container-fluid">
        <div class="col">
            <div class=" d-flex imgessaver  justify-content-center">
        <form action="upload.php"   class="col-sm-9 col-md-8 border border-dark p-4 m-5"
           method="post"
           enctype="multipart/form-data">

           <input type="file" 
                  name="my_image" style=" max-width: 75%;">

           <input type="submit" 
           class="   justify-content-center"
                  name="submit"
                  value="Upload">
     	
        </form>
    </div>
        </div>
</div>
    
     
    </main>
</body>
</html>