<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <!-- <meta http-equiv="refresh" content="0; url=index.html"> -->
    <title>Sign up Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
   <link rel='stylesheet' type='text/css' media='screen' href='styles.css'>
    <script src='main.js'></script>
    <style>
       .error{
        color:red;
    }
    </style>
</head>
<body>
    
<?php 
        $passerror=$repasserror=$username=$loginemailerror=$mobile_error="";
        $friname=$lasname="";
        $loginemail= $password=$repassword=$moblienumber= $passw= $repass="";
        $saveedbtn=0;
        // include 'dbconnect.php';
    // if(isset($_POST['submit'])){
    //     $friname= mysqli_real_escape_string($con,$_POST['firstName']);
    //     $lasname= mysqli_real_escape_string($con,$_POST['lastName']);
    //     $email= mysqli_real_escape_string($con,$_POST['emailInput']);
    //     $password= mysqli_real_escape_string($con,$_POST['passwordInput']);
    //     $repassword= mysqli_real_escape_string($con,$_POST['repasswordInput']);
    //     $moblienumber= mysqli_real_escape_string($con,$_POST['mobileNumberInput']);
    //     $passw=password_hash($password,PASSWORD_BCRYPT);
    //     $repass=password_hash($repassword,PASSWORD_BCRYPT);
    //     echo "hello";
    //     $emalquery="select * from login where email='$email'";
    //     $query= mysqli_query($con,$emalquery);

    //     $emailcout = mysqSli_num_rows($query);
        
    //     if ($emailcount>0){
    //         echo "email already exist";
    //     }else{
    //         if($password==$repassword){
    //             $insertquery="insert into guvi(id, firstname, lastname, email, password, repassword, mobile) values('$friname','$lasname','$email','$passw','$repass','$moblienumber') ";
    //             $iquery=mysqli_query($con,$insertquery);
    //             if ($iquery){
    //                 $saveedbtn=2;
    //             }else{
    //                 $saveedbtn=1;
    //             }
    //         }else{
    //             echo "password not same..";
    //         }
    //     }
    // }
    if($saveedbtn==2){
        echo "inserted Sucessfull...";
    }elseif ($saveedbtn==1) {
        echo "not inserted..";
    }
    function fun1($data)
        {
            $data=trim($data);
            $data=stripcslashes($data);
            $data=htmlspecialchars($data);
            return $data;

        }

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {   $checked=True;
        
        if ($checked){
            $friname=fun1($_POST["firstName"]);
            $lasname= fun1($_POST["lastName"]);
            $email= fun1($_POST["loginemail"]);
            $password= fun1($_POST["passwordInput"]);
            $repassword= fun1($_POST["repasswordInput"]);
            $moblienumber= fun1($_POST["mobileNumberInput"]);
            $passw= password_hash($password,PASSWORD_BCRYPT);
            $repass= password_hash($repassword,PASSWORD_BCRYPT);
            //$repass= password_hash($repassword,PASSWORD_DEFAULT);

        }
       
        if (empty($_POST["firstName"])){
            $checked=FALSE;
            $username="Frist name is Requied";
        }
        if (!is_numeric($moblienumber) ){
            $checked=FALSE;
            $mobile_error="ENTER only numbers.";
        }
        if(strlen($moblienumber)!=10){
            $checked=FALSE;
            $mobile_error.="With only 10 digit.";
        }
            //$ver=password_verify("hg",$passw);
            if (strlen($password) <= '8') {
                $checked=FALSE;
                $passerror = "Your Password Must Contain At Least 8 Characters!";
            }
            elseif(!preg_match("#[0-9]+#",$password)) {
                $checked=FALSE;
                $passerror = "Your Password Must Contain At Least 1 Number!";
            }
            elseif(!preg_match("#[A-Z]+#",$password)) {
                $checked=FALSE;
                $passerror = "Your Password Must Contain At Least 1 Capital Letter!";
            }
            elseif(!preg_match("#[a-z]+#",$password)) {
                $checked=FALSE;
                $passerror= "Your Password Must Contain At Least 1 Lowercase Letter!";
            } 
        
        if($password!=$repassword){
            $checked=FALSE;
            $repasserror="Enter same password.<br>Password not matched!";
        }
        if(empty($_POST["loginemail"])){
            $checked=FALSE;
            $loginemailerror="Enter Valid email address";
        }else{
           if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
            $checked=FALSE;
            $loginemailerror = "You Entered An Invalid Email Format!"; 
            }
        }
        if($checked){
            
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

            $sql = "SELECT * FROM guvi Where firstname='".$friname."'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            
                $checked=FALSE;
                $username="Frist name already exist.";
            // while($row = $result->fetch_assoc()) {
            //     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            }
            } else {
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

                $sql = "SELECT * FROM guvi Where email='".$email."'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            
                $checked=FALSE;
                $loginemailerror="Email already exist with an account.";
            // while($row = $result->fetch_assoc()) {
            //     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            
            }
                $conn->close();
                $checked=FALSE;
            }
        
        

        if($checked){

            $servername = "localhost";
            $dbusername = "root";
            $password = "";
            $dbname = "login";
            $conn = new mysqli($servername, $dbusername, $password, $dbname);
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            $sql = "INSERT INTO guvi (firstname, lastname, email, password, repassword, mobile)
            VALUES ('$friname', '$lasname', '$email','$passw','$repassword','$moblienumber')";
            if ($conn->query($sql) === TRUE) {
            $conn->close();
            echo '<script type="text/javascript">
            console.log("hkhl");
                    location.href = "login.php";
                    </script>';
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            $conn->close();
            }
        }
    }
 
?>
    <header class="header-nav">
        <div class="d-flex" >
            <div class="col d-flex mr-6" >
                <a href="index.php" class="mr-6 mas">
                    <h1 width="90px">HOME</h1>
                </a>
            </div>
            <div class="d-flex "  style="visibility:hidden;">
                <div class="dropdown">
                    <button class="dropbtn btn-secondary  btn-lg  dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="" alt=" "> 

                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="dropdownMenu2">
                        <li><a class="dropdown-item active " href="#">My profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Gallery</a></li>
                        <li><a class="dropdown-item" href="#">log out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <main role="main" class="container card text-center mt-5 border-success signin-related-page" id="sign-in-page">
        <h1>Sign up</h1>
        <h1 class="movecenter">Welcome to my Page..!</h1>
       
        <div class="google-sign-in" data-onsuccess="onSignIn">
            <a id="google-button" class="btn btn-outline-google border-primary">
                 <i class="icon-google float-left border-success "></i> Sign-up with Google
            </a>
            <div class="alternative-login-message m-3"> 
            <span><strong>OR Sign-up with Email</strongOR></span>
            </div>
        </div>
        <div class="col">
        <span class="error" ><strong> * REQURIED</strong></span>            
        <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <div class="form-group ">
                    <label for="firstName">First Name  </label><span class="error" > * <?php echo $username ;?></span>
                    <input id="fristname" type="text" class="form-control" name="firstName" placeholder="Enter name" >
                    <div class="text-success">
                        <p>*This name and your email is only be used to login to account.</p>
                    </div>
                    <div class="invalid-feedback">
                        Please Enter a valid First Name
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input id="lastname" type="text" class="form-control" name="lastName" placeholder="Enter name">
                    <div class="invalid-feedback">
                        Please Enter a valid Last Name
                    </div>
                </div>
                
                <div class="form-group" id="emailgroup">
                    <label for="emailInput">Email address</label><span class="error" > * <?php echo $loginemailerror; ?></span>
                    <input id="loginemail" type="email" class="form-control" name="loginemail" placeholder="Enter email" >
                    
                </div>
                <div class="form-group">
                    <label for="passwordInput">Password</label><span class="error" > * <?php echo $passerror ;?></span>
                    <input id="password" type="password" class="form-control" name="passwordInput" placeholder="Password" required>
                    <span class="fa fa-fw fa-eye passToggle" id="togglePassword" aria-hidden="true">
                    </span>
                    <div class="invalid-feedback w-75">
                        <span>Password must satisfy conditions below.</span>
                    </div>
                    <ul class="label-grey password-cond hide" style=" display: none;">
                        <li class="min-char"><small>Password length should be between 5-12 characters</small></li>
                        <li class="one-num"><small>At least one numeral</small></li>
                        <li class="one-alpha"><small>At least one alphabet</small></li>
                    </ul>
                </div>
                
                <div class="form-group">
                    <label for="passwordInput">confirm Password</label><span class="error" > * <?php echo $repasserror; ?></span>
                    <input id="repassword" type="password" class="form-control" name="repasswordInput" placeholder="Password" required>
                    <span class="fa fa-fw fa-eye passToggle" id="togglePassword" aria-hidden="true">
                    </span>
                </div>
                <div class="form-group ">
                    <label for="mobileNumberInput">Mobile number:</label><span class="error" > * <?php echo $mobile_error ;?></span>
                    <input type="tel" id="mobileNumberInput" class="form-control float-right" name="mobileNumberInput" placeholder="Mobile number" maxlength="20" minlength="10" required>
                    <div class="invalid-feedback">
                        Please Enter a valid Mobile number
                    </div>
                </div>
                <div class="text-success" style="display: none;" id="register_msg" >
                </div>
                <div class="btn-wrap">
                    <input type="submit" value="Sign up"  class="btn btn-primary mt-3">
                    
                   
                </div>
                    <p class="secondary-link">
                    Already registered User? <a href="login.php">Log in</a>
                    </p>
            </form>
        </div>

        <?php 
        echo '<script>var demo=document.getElementById("loginemail"); demo.value="'.$email.'";</script>';
        echo '<script>var demo=document.getElementById("fristname"); demo.value="'.$friname.'";</script>';
        echo '<script>var demo=document.getElementById("lastname"); demo.value="'.$lasname.'";</script>';
        echo '<script>var demo=document.getElementById("mobileNumberInput"); demo.value="'.$moblienumber.'";</script>';
        echo '<script>var demo=document.getElementById("repassword"); demo.value="'.$repassword.'";</script>';
        echo '<script>var demo=document.getElementById("password"); demo.value="'.$password.'";</script>';

        echo "name:  " ,$friname,"<br>l:  ",$lasname,"<br>email: ",$email;
        echo "<br><br>password:  ",$password,"<br>repass:  ",$repassword."o";
        echo "<br>moblienumber: ",$moblienumber;
        echo "<br><br><br>pa: " ,$passw,"<br><br>repa:  ",$repass,"jhg";
        $ver=password_verify("hello",$passw);
        if($ver){
            echo "correct and verified";
        }
        $ver=password_verify("hg",$passw);
        if($ver){
            echo "correct and verified";
        }
?>          
        
        </main>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        
</body>
</html>