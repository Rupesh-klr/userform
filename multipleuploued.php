
<!DOCTYPE html>
<html lang="en">
<head>  
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='styles.css'>
    <script src='main.js'></script>
    <title>Document</title>
    <script src='/php_programes/guvi/javas.js'></script>
</head>
<body>
 <?php
        function uploadmul(){
                include "db_conn.php";
                $dd2=0;
                $error =count($_FILES['my_image']['error']);
                   
                    if ( $error > 0){
                    $file_ary = array();
                    $file_count = count($_FILES['my_image']['name']);
                    $file_keys = array_keys($_FILES['my_image']);
                    $file_count = count($_FILES['my_image']['name']);
                    foreach ($file_keys as $key) {
                    }
                    echo "<h1>No.of files lastly uploed : ",$file_count,"</h1>";
                    for ($i=0; $i<$file_count; $i++) {
                            $img_name = $_FILES['my_image']['name'][$i];
                            $img_size = $_FILES['my_image']['size'][$i];
                            $tmp_name = $_FILES['my_image']['tmp_name'][$i];
                            if ($img_size > 12500000) {
                                $em = "Sorry, your file is too large.";
                                //header("Location: index.php?error=$em");
                            }
                            else{
                                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                                $img_ex_lc = strtolower($img_ex);
                                $allowed_exs = array("jpg", "jpeg", "png"); 
                                if (in_array($img_ex_lc, $allowed_exs)) {
                                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                                    $img_upload_path = 'uploads/'.$new_img_name;
                                    move_uploaded_file($tmp_name, $img_upload_path);
                                    
                                    $sql = "INSERT INTO images(image_url) 
                                            VALUES('$new_img_name')";
                                    mysqli_query($conn, $sql);
                                    //header("Location: index.php");
                                }else {
                                    $em = "You can't upload files of this type";
                                    //header("Location: index.php?error=$em");
                                }
                            }
                        // foreach ($file_keys as $key) {
                        //     $file_ary[$i][$key] = $_FILES['my_image'][$key][$i];
                        //     print '<br> '.$i . $file_ary[$i][$key]."--------".$img_name;
                        // }   
                    }
                    // foreach ($file_ary as $file) {
                    //     print '<br>File Name: ' . $file['name'];
                    //     print 'File Type: ' . $file['type'];
                    //     print 'File Size: ' . $file['size'];
                    // }
                }
                header("Location: index.php");
            }
        
?>

<h1>Multiple image uploeding to database ups</h1> 
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"   class="col-sm-9 col-md-8 border border-dark p-4 m-5"
        method="post"
        enctype="multipart/form-data">

        <input type="file" multiple
                name="my_image[]" style=" max-width: 75%;">

        <input type="submit" 
        class="   justify-content-center"
                name="submit"
                value="Upload">
    
</form> 
    
<?php 
    if (isset($_GET['error'])): ?>
        <p><?php echo $_GET['error']; ?></p>
    <?php endif ?><?php
    if($_SERVER["REQUEST_METHOD"] == "POST" )
    {
        if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
            uploadmul();
    }
    }
?>   
</body>
</html>


