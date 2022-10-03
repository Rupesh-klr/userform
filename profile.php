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
    var x = document.cookie.split(";");
    console.log(x);
    </script>
</head>
<body>

    <?php
        $mapprefer=$_SESSION['mapprefer']; 
        $var_value = $_COOKIE['varname'];
        $val2=$_SESSION['userlogine'];
        echo $mapprefer,$var_value,$val2;
        
        if($mapprefer){
            '<script>checked();console.log("lkjhk");</script>';
        }
    ?>
    <header class="header-nav">
        <div class="d-flex ">
            <div class="col d-flex  mr-6">
                <a href="index.php" class="mr-6 mas">
                    <h1 width="90px">HOME</h1>
                </a>
            </div>
            <div class="col d-flex align-items-end" >
                
                <div class="d-flex head-user-profile " >
                    <ul class="account-links-group d-flex ">
                        <li class="nav-link  login-btn">
                            <a class="nav-link   text-primary text-center px-4" href="login.php">Login</a>
                        </li>
                        <li class="nav-link  signup-btn">
                            <a class="nav-link btn btn-primary text-white px-4" href="sign up.php">Sign up</a>
                        </li>
                    </ul>
                </div>
                
            </div>
            <div class="d-flex " id="userloginbtn" ">
                <div class="dropdown">
                    <button class="dropbtn btn-secondary  btn-lg  dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="" alt=" "> 
                    <!-- <?php echo $username;?> -->
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="dropdownMenu2">
                        <li><a class="dropdown-item active " href="profile.php">My profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="gallery.php">Gallery</a></li>
                        <li><a class="dropdown-item" href="#"  onclick="unlogout()">log out</a></li>
                    </ul>
                </div>
            </div>  
        </div>
    </header>
    <main>

    </main>
</body>
</html>