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
    <script src='main.js'></script>
</head>
<body>
    

<?php 

session_start(); 


include 'dbconnect.php';
if (isset($_POST['submit'])) 
{
    $useremail = $_POST["loginemail"];
    $password = $_POST["loginpassword"];


    $query = "SELECT email FROM users WHERE email = '$useremail' AND password = '$password'";

    $result = mysql_query($query) or die ("Failed Query of " . $query);


    while($row = mysql_fetch_assoc($result))
    {
            $_SESSION["user"] = $username;
    }
}
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
                <label  for="emailInput ">Email address</label>
                <input type="email" class="form-control" name="loginemail" placeholder="Enter email" required>
                <label id="email_warn" style="color: #da2424;"></label>
            </div>
                <div class="form-group " id="pass-div">
                    <label for="passwordInput">Password</label>
                    <input type="password" class="form-control" name="loginpassword" placeholder="Password" required>
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
    
        
        </main>
</body>
</html>