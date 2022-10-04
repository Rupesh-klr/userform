<script src='/php_programes/guvi/javas.js'></script>
<?php  $val=1;
function phpfun()
        {
            
            echo "called",$val;
            // $total = count($_FILES['upload']['name']);
            // for( $i=0 ; $i < $total ; $i++ ) {
            // $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
            // if ($tmpFilePath != ""){
            //     $newFilePath = "./uploadFiles/" . $_FILES['upload']['name'][$i];
            //     echo $newFilePath;
            //     // if(move_uploaded_file($tmpFilePath, $newFilePath)) {
            //     // }
            //     }
            // }
            $val=1;
        };
        $val=78;
        echo '<script>
            function fun1(){
                console.log("saved");
                console.log( "<?php echo '.$val.' ?>");
                phpfun();
                //document.write('.phpfun().');
                var f2= "<?php phpfun(); ?>";
            }
    </script>';?>
<header class="header-nav">
        <div class="d-flex ">
            <?php 
            include 'header.php';
            $val=1;

            require 'redis/Autoload.php';
        Predis\Autoloader::register();
        $redis = new Predis\Client();
        if ( $redis->get('fristname')=="Y") {
        echo "user login","<script>checked();</script>";}
        else{
            echo "noooo";
        }$val=1;
        ?>
    </header>
    <form action="upload.php" method="post" multipart="" enctype="multipart/form-data">
        <input type="file" name="img[]" multiple>
        <input type="submit">
    </form>
    
<?php

// function reArrayFiles(&$file_post) {
//     echo "fghj";
//     $file_ary = array();
//     $file_count = count($file_post['name']);
//     $file_keys = array_keys($file_post);

//     for ($i=0; $i<$file_count; $i++) {
//         foreach ($file_keys as $key) {
//             $file_ary[$i][$key] = $file_post[$key][$i];
//         }
//     }

//     return $file_ary;
// }

?>
    <?php

        
        // function reArrayFiles($file)
        // {
        //     $file_ary = array();
        //     $file_count = count($file['name']);
        //     $file_key = array_keys($file);
        
        //     for($i=0;$i<$file_count;$i++)
        //     {
        //         foreach($file_key as $val)
        //         {
        //             $file_ary[$i][$val] = $file[$val][$i];
        //         }
        //     }
        //     return $file_ary;
        // }
        function uploadmul()
        {
            include "db_conn.php";
            $dd2=0;
                echo "<pre>";
                print_r($_FILES['my_image']);
                $error = count($_FILES['my_image']['error']);
                echo $error,"---------------------";
                foreach ($error as $file) {
                    print '<br>File Name: ' . $file['name'];}
                if ($error > 0){
                $file_ary = array();
                $file_count = count($_FILES['my_image']['name']);
                $file_keys = array_keys($_FILES['my_image']);
                $file_count = count($_FILES['my_image']['name']);
                foreach ($file_keys as $key) {
                   echo $key . "<br>";
                }
                echo "</pre>";
                for ($i=0; $i<$file_count; $i++) {
                    
                        echo "cgvhbj";
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
                                // Insert into Database
                                echo "<br><br><br>",$dd2++;
                                $sql = "INSERT INTO images(image_url) 
                                        VALUES('$new_img_name')";
                                mysqli_query($conn, $sql);
                                //header("Location: index.php");
                            }else {
                                $em = "You can't upload files of this type";
                                //header("Location: index.php?error=$em");
                            }
                        }


                    foreach ($file_keys as $key) {
                        $file_ary[$i][$key] = $_FILES['my_image'][$key][$i];
                         print '<br> '.$i . $file_ary[$i][$key]."--------".$img_name;
                    }   
                }
                foreach ($file_ary as $file) {
                    print '<br>File Name: ' . $file['name'];
                    print 'File Type: ' . $file['type'];
                    print 'File Size: ' . $file['size'];
                }
            }
            //echo $file_count,"<br>";
        }
        
        ?>

    
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"   class="col-sm-9 col-md-8 border border-dark p-4 m-5"
           method="post"
           enctype="multipart/form-data">

           <input type="file" multiple
                  name="my_image[]" style=" max-width: 75%;">

           <input type="submit" 
           class="   justify-content-center"
                  name="submit"
                  value="Upload">
     	
        </form> <h1>index ups</h1> <?php 
        if (isset($_GET['error'])): ?>
            <p><?php echo $_GET['error']; ?></p>
        <?php endif ?><?php
        if($_SERVER["REQUEST_METHOD"] == "POST" )
        {
            if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
                uploadmul();
                $img_name = $_FILES['my_image']['name'];
                $img_size = $_FILES['my_image']['size'];
                $tmp_name = $_FILES['my_image']['tmp_name'];
                $error = $_FILES['my_image']['error'];
            
                if ($error === 0) {
                    if ($img_size > 12500000) {
                        $em = "Sorry, your file is too large. 1111111111111111";
                       // header("Location: #?error=$em");
                    }else {
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                        $img_ex_lc = strtolower($img_ex);
            
                        $allowed_exs = array("jpg", "jpeg", "png"); 
            
                        if (in_array($img_ex_lc, $allowed_exs)) {
                            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                            $img_upload_path = 'uploads/'.$new_img_name;
                            move_uploaded_file($tmp_name, $img_upload_path);
            
                            // Insert into Database
                            $sql = "INSERT INTO images(image_url) 
                                    VALUES('$new_img_name')";
                            mysqli_query($conn, $sql);
                           
                        }else {
                            $em = "You can't upload files of this type 22222222222222222";
                           // header("Location:#?error=$em");
                        }
                    }
                }else {
                    $em = "unknown error occurred! 55555555555";
                    //header("Location: #?error=$em");
                }
            
            }else {
               
            }
            echo "funttiojn is called <br>",$em;
        }
        echo '<script>
        function fun1(){
            console.log("saved");
            <?php phpfun();?>
        }
</script>';
        
    echo "<h1>php proragerm codes</h1>"; $val=1;
    ?>
<?php
$abc = "Abc";
$number = 052;
$mydata = array("val1","val2","val3");
// pShpfun();
?>
<script type="text/javascript">
var abc = '<?php echo $abc?>';
var number = '<?php echo $number ?>';
var mydata = <?php echo json_encode($mydata); ?>;
</script>