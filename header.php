<?php
        function headershow(){
            // require 'redis/Autoload.php';
            Predis\Autoloader::register();
             $redis = new Predis\Client();
            if ( $redis->get('fristname')!="Yes") {
                echo "user login","<script>checked();</script>";
                echo '
                    <div class="col d-flex align-items-end" >
                        
                        <div class="d-flex head-user-profile " id="userlogoutbtn2" >
                            <ul class="account-links-group d-flex ">
                                <li class="nav-link  login-btn">
                                    <a class="nav-link   text-primary text-center px-4" href="login.php">Login</a>
                                </li>
                                <li class="nav-link  signup-btn">
                                    <a class="nav-link btn btn-primary text-white px-4" href="sign up.php">Sign up</a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>';
                                                }
                else{
                echo '<div class="d-flex " id="userloginbtns" >
                <div class="dropdown">
                    <button class="dropbtn btn-secondary  btn-lg  dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="img-fluid rounded rounded-circle img-thumbnail" src="user folder/profile.jpg" alt="pro" width=35px height=35px >'.$redis->get('useremailid').'
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="dropdownMenu2">
                        <li><a class="dropdown-item active " href="profile.php">My profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="gallery.php">Gallery</a></li>
                        <li><a class="dropdown-item" href="multipleuploued.php">uploed muliple image</a></li>
                        <li><a class="dropdown-item" href="logedout.php">log out</a></li>
                    </ul>
                </div>
            </div>';
                        }
                }
        ?>