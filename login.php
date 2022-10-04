<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='styles.css'>

</head>
<style>
    .error{
        color:red;
    }
</style>
<body>
<?php
echo "";
// session_start();
// $val1="lk;kj";
// $val1 = $_GET['$val1'];


?>
    

    <header class="header-nav">
        <div class="d-flex ">
            <div class="col d-flex mr-6">
                <a href="index.php" class="mr-6 mas">
                    <h1 width="90px">HOME</h1>
                </a>
            </div>
        </div>
    </header>
   <?php
   $eamilerror=$passworderror="";
    $nameerr=$passworderror="";
    $flag=TRUE;
        $loginemail=$loginpassword="";
        if($_SERVER["REQUEST_METHOD"] == "POST" )
        {
            $loginemail=fun1($_POST["loginemail"]);
            $loginpassword=fun1($_POST["loginpassword"]);
          echo ("hkhjjjj");
        }
        function fun1($data)
        {
            $data=trim($data);
            $data=stripcslashes($data);
            $data=htmlspecialchars($data);
            return $data;

        }

        // if(!filter_var($loginemail,FILTER_VALIDATE_EMAIL)){
        //     $nameerr="tHE EMAIL IS INCORRECT";
        // }
        
        if(empty($_POST["loginemail"])){
            $eamilerror="enter Valid email address";
            $flag=FALSE;
        }else{
            $loginemail=fun1($_POST["loginemail"]);
            if (!filter_var($loginemail,FILTER_VALIDATE_EMAIL)){
                $eamilerror="THE EMAIL IS INCORRECT";
                $flag=FALSE;
               // <span class="error"><?php echo $eamilerror;</span>
  
            }
        }
        if($flag){
           
        
                    // if (isset($_POST['submit'])) 
                    // {
                    //     $useremail = $_POST["loginemail"];
                    //     $password = $_POST["loginpassword"];
                    //     $query = "SELECT email FROM users WHERE email = '$useremail' AND password = '$password'";
                    //     $result = mysql_query($query) or die ("Failed Query of " . $query);
                    //     echo "hello",$query;
                    //     while($row = mysql_fetch_assoc($result))
                    //     {
                    //             $_SESSION["user"] = $username;
                    //     }
                    // }
                    if($flag){
            
                        $servername = "localhost";
                        $dbusername = "root";
                        $password = "";
                        $dbname = "login";
                        $conn = new mysqli($servername, $dbusername, $password, $dbname);
                        // $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        }
            
                        $sql = "SELECT * FROM guvi Where email='".$loginemail."'";
                        $result = $conn->query($sql);
            
                        if ($result->num_rows > 0) {
                        
                            $checked=FALSE;
                            $username="Frist name already exist.";
                        while($row = $result->fetch_assoc()) {
                            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                                echo $loginpassword."pass".$row['password']."<br>";
                                $ver=password_verify($loginpassword,$row['password']);
                                    if($ver){
                                        echo "correct and verified";
                                       // session_start();
                                        // //session_register(mapprefer);
                                        // $a=$_POST['field-name'];
                                        // $_SESSION['mapprefer']="Yes";
                                        // $_SESSION['userlogine'] ="Yes";
                                        // $_SESSION['val1'] ="Yes";
                                        // $_COOKIE['varname'] ="Yes";
                                        require 'redis/Autoload.php';
                                        Predis\Autoloader::register();
                                        $redis = new Predis\Client();
                                        $redis->set('fristname', 'Yes');
                                        $redis->set('useremailid', $loginemail);
                                        
                                        echo $redis->get('fristname');
                                        echo $redis->get('useremailid');
                                     
                                        setcookie("refferidlogin", "Yes");
                                        $session_token      = bin2hex(openssl_random_pseudo_bytes(16));
                                        $row['token'] = $session_token;

                                        setcookie('token', $session_token, time()+3600);
                                        setcookie('username', $row["firstname"], time()+3600);
//                                       $redis = new Redis()  or die("Cannot load Redis module.");; 
                                        //$redis->connect('127.0.0.1', 6379);

                                        $redis_key = $row["id"];
                                        $redis_username = $row["firstname"];
                                        $redis_email = $row["email"];

                                        $redis->set($redis_key, serialize($row)); 
                                        $redis->set($redis_key, serialize($redis_username)); 
                                        $redis->set($redis_key, serialize($redis_email)); 
                                        $redis->expire($redis_key, 3600); 
                                        // if(!isset($_COOKIES[$cooki_name])) {
                                        //     print("| "."");
                                        // }

                                        echo '<script >
                                            console.log("welcome");
                                            localStorage.setItem("myDataBase", JSON.stringify("es"))
                                                location.href = "index.php";
                                                </script>';
                                    }
                        }
                        }else{
                            $flag=FALSE;
                            $eamilerror="user doesn't  exist.";
                        }
        }
        echo "ghj";
    }
   ?>
    <main role="main" class="container card text-center mt-5 border-success signin-related-page" id="sign-in-page">
        
            
            <div class="col">
                <h1  class="movecenter">login</h1>
                <h1 class="movecenter">Welcome Back..!</h1>
                <div class="col-xl-12 ">
                    <div class="google-sign-in  align-self-center" data-onsuccess="onSignIn">
                        <a href="#" class="btn border-primary">
                        <i class="icon-google  float-center"></i> Login with Google
                        </a>
                        <div class="alternative-login-message m-3"><span><strong> OR LOGIN WITH EMAIL</strong></span></div>
                    </div>
        
                    <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" id="login_form">
            <div class="form-group mt-3 " id="email-div">
                <label  for="emailInput ">Email address</label><span class="error" >  * </span> 
                <span class="error"><?php echo $eamilerror;?></span>
                <input type="email" class="form-control" id="loginemail" name="loginemail" placeholder="Enter email">
                <label id="email_warn" style="color: #da2424;"></label>
            </div>
                <div class="form-group " id="pass-div">
                    <label for="passwordInput">Password</label><span class="error" >  * </span> 
                    <input type="password" class="form-control" id="loginpassword" name="loginpassword" placeholder="Password" required>
                </div>
                <p id="pass_warn" style="color: #da2424;text-align: center;"></p>
                <div class="form-check">
                    <a class="float-right" href="#">Forgot password?</a>
                </div>
            <div class="btn-wrap">
                <button type="submit" class="btn ms-5 m-3 btn-primary" id="login_button">Login</button>
            </div>
            <p class="ms-2 secondary-link">Don’t have an account? <a href="sign up.php">Sign up</a></p>
        </form>
                </div>
            </div>
            <?php 
            
        echo '<script>var demo=document.getElementById("loginemail"); demo.value="'.$loginemail.'";</script>';
        echo '<script>var demo=document.getElementById("loginpassword"); demo.value="'.$loginpassword.'";</script>';
            echo "name",$loginemail,"<br> password:",$loginpassword;
            ?>
    
        
        </main>
</body>
</html>