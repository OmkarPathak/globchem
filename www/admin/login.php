<?php
// call the login() function if register_btn is clicked
if (isset($_POST['btn_login'])) {
  login();
}

function login()
{
    require 'config.php';  
    session_start();

 
    $username = $_POST['username'];
    $password = $_POST['password'];

    // echo $password;

    $password = MD5($password);

    // echo $password;
    
    $query =    "SELECT user_id, username
                FROM user_credentials 
                WHERE username = '$username' AND password = '$password' LIMIT 1";


    $results = mysqli_query($conn, $query);

    if(mysqli_num_rows($results)>=1)
    { 

        
        $user_info = array();
        // $user_name = array();
        while ($row = mysqli_fetch_array($results))
        {
           array_push($user_info, $row['user_id']);
           array_push($user_info, $row['username']);
        }  
        // print_r($user_info);
        
        $_SESSION['user_id'] = $user_info[0]; 
        $_SESSION['username'] = $user_info[1]; 

        header('location: index.php');  
    }    
}   
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Globechem </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <!-- <a class="hiddenanchor" id="signin"></a> -->

            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <form method="post">
                            <h1>Login</h1>
                            <div>
                                <input type="text" class="form-control" name="username" placeholder="Username" required="" />
                            </div>
                            <div>
                                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
                            </div>
                            <div>
                                <button class="btn btn-primary submit"  type="submit" name="btn_login">Log in</button>
                                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                                <!-- <p class="change_link">New to site?
                                    <a href="#signup" class="to_register"> Create Account </a>
                                </p> -->

                                <div class="clearfix"></div>
                                <br />

                                <div>
                                    <h1><img src="images/logo.png" style="width: 50px !important; ">  Globechem pvt. ltd.</h1>
                                    <p>©2020 All Rights Reserved by Globechem. Privacy and Terms</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>

                <div id="register" class="animate form registration_form">
                    <section class="login_content">
                        <form>
                            <h1>Create an Account</h1>
                            <div>
                                <input type="text" class="form-control" placeholder="Username" required="" />
                            </div>
                            <div>
                                <input type="email" class="form-control" placeholder="Email" required="" />
                            </div>
                            <div>
                                <input type="password" class="form-control" placeholder="Password" required="" />
                            </div>
                            <div>
                                <a class="btn btn-default submit" id="btn_register" name="btn_register">Submit</a>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                                <p class="change_link">Already a member ?
                                    <a href="#signin" class="to_register"> Log in </a>
                                </p>

                                <div class="clearfix"></div>
                                <br />

                                <div>
                                    <h1><img src="images/logo.png" style="width: 50px !important; ">  Globechem pvt. ltd.</h1>
                                    <p>©2020 All Rights Reserved by Globechem. Privacy and Terms</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>

<!-- 
Your Hash: 49935469ff5fde2d562439b238172a89
Your String: admin@globechem-->


  
