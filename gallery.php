<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <style>"
            .thumbnail { 
            top:-50px; 
            left:-35px; 
            display:block; 
            z-index:999; 
            cursor: pointer; 
            -webkit-transition-property: all; 
            -webkit-transition-duration: 0.3s; 
            -webkit-transition-timing-function: ease; 
            } 

            .thumbnail:hover { 
            transform: scale(1.3); 

            }
            body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;
			min-height: 100vh;
		}
		.album {
			width: 45%;
			height: 200px;
			padding: 5px;
		}
		.album img {
			width: 100%;
			height: 100%;
		}"
</style>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='styles.css'>
    <script src='main.js'></script>
    <script >
        function galleryfun(imgname) {
            pathlo="uploads/"+imgname
            console.log(pathlo);
            <img class="flex-shrink-1 rounded float-none " src="pathlo">
            
        }
    </script>
    <title>gallery</title>
	<style>
		
		/* a {
			text-decoration: none;
			color: black;
		} */
	</style>
<header class="header-nav">
    <div class="container">
            
        <div class="d-flex col-3 col-md-12">
            <div class="col-12  mr-6">
                <a href="index.php" class="mr-6 mas">
                    <h1 width="90px">HOME</h1>
                </a>
            </div>

            <div class="col d-flex align-items-end" >
                
                <div class="d-flex head-user-profile " >
                    <ul class="account-links-group d-flex ">
                        <li class="nav-link  login-btn">
                            <a class="." href="login.php">.</a>
                        </li>
                        <li class="nav-link  signup-btn">
                            <a class="hidden" href="sign up.php">.</a>
                        </li>
                    </ul>
                </div>
                
            </div>
            <div class="d-flex " id="userloginbtn" >
                <div class="dropdown">
                    <button class="dropbtn btn-secondary  btn-lg  dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="" alt=" "> 
                    <!-- <?php echo $username;?> -->
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="dropdownMenu2">
                        <li><a class="dropdown-item " href="profile.php">My profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item active" href="#">Gallery</a></li>
                        <li><a class="dropdown-item" href="#" onclick=unlogout()>log out</a></li>
                    </ul>
                </div>
            </div>  
        </div>
        </div>
        </div>
    </div>
    </div>
</header>
    <hr>

</head>
<body class="container">

    <?php include "db_conn.php"; ?>
    
    <main class="col-12">
        <div class="container">
            <div class="col-12">
            <div class="d-flex bd-highlight">
            
            <div class="d-flex align-content-around flex-wrap">
                <a href="index.php">&#8592;</a>
     <?php 
          $sql = "SELECT * FROM images ORDER BY id DESC";
          $res = mysqli_query($conn,  $sql);

          if (mysqli_num_rows($res) > 0) {
          	while ($images = mysqli_fetch_assoc($res)) {  ?>
             
             <div class="p-2 flex-shrink-0 album">
            <a href="uploads/<?=$images['image_url']?>"><button class="btn" >
             	<img class="flex-shrink-1 rounded float-none thumbnail" src="uploads/<?=$images['image_url']?>">
            </button> </a>
            </div>
          		
    <?php } }?>
            </div>
        </div>
    </div>
    </main>
</body>
</html>