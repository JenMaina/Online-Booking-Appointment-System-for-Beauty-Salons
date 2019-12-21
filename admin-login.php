<?php 
if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/icon.png">

        <title>Online Appointment Beauty Salons System</title>

         <link href="assets/plugins/ladda-buttons/css/ladda-themeless.min.css" rel="stylesheet" type="text/css" />

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>
        
    </head>
        <?php include "dbconfig.php"; ?>

    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
        	<div class=" card-box">
               <?php
$error=''; 
if (isset($_POST['submit'])) {
if (empty($_POST['uname']) || empty($_POST['pass'])) {
$error = "Username or Password is invalid";
}
else
{
    include 'dbconfig.php';
    $username=$_POST['uname'];
    $password=$_POST['pass'];

    $query = mysqli_query($conn,"SELECT * FROM admin WHERE password='$password' AND username='$username'");
    $rows = mysqli_fetch_assoc($query);
    $num=mysqli_num_rows($query);
    if ($num == 1) {
        $_SESSION['username']=$rows['username'];
        echo "Logging you in..";
        echo '<script type="text/javascript">setTimeout(function(){window.top.location="admin-page.php"} , 1000);</script>';
    } 
    else 
    {
        echo  "Username or Password is invalid";
    }
    mysqli_close($conn); 
}
}
?>
                    <a href="index.php">
                    <button class="btn btn-icon waves-effect waves-light btn-danger pull-right"data-toggle="tooltip" title="Close"> <i class="fa fa-remove" ></i> </button>
                    </a>
            <div class="panel-heading">
                <br> 
                <h3 class="text-center"> Sign In as <strong class="text-custom">Admin</strong> </h3>
            </div> 


            <div class="panel-body">
            <form class="form-horizontal m-t-20" action="admin-login.php" method="post">
                
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" name="uname" required="" placeholder="Username">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="pass" required="" placeholder="Password">
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup">
                                Remember me
                            </label>
                        </div>
                        
                    </div>
                </div>
                
                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light ladda-button btn btn-primary" data-style="expand-left" name="submit" type="submit" data-toggle="tooltip" title="Log In">Log In</button>    
                    </div>
                </div>
            </form> 
            
            </div>   
            </div>                              
               
            
        </div>
     
        

        
    	<script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>


        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript" src="assets/plugins/parsleyjs/parsley.min.js"></script>
        
        
        <script type="text/javascript">
			$(document).ready(function() {
				$('form').parsley();
			});
		</script>

        <script src="assets/plugins/ladda-buttons/js/spin.min.js"></script>
        <script src="assets/plugins/ladda-buttons/js/ladda.min.js"></script>
        <script src="assets/plugins/ladda-buttons/js/ladda.jquery.min.js"></script>

        <script>

            $(document).ready(function () {

                // Bind normal buttons
                $('.ladda-button').ladda('bind', {timeout: 2000});

                // Bind progress buttons and simulate loading progress
                Ladda.bind('.progress-demo .ladda-button', {
                    callback: function (instance) {
                        var progress = 0;
                        var interval = setInterval(function () {
                            progress = Math.min(progress + Math.random() * 0.1, 1);
                            instance.setProgress(progress);

                            if (progress === 1) {
                                instance.stop();
                                clearInterval(interval);
                            }
                        }, 200);
                    }
                });


                var l = $('.ladda-button-demo').ladda();

                l.click(function () {
                    // Start loading
                    l.ladda('start');

                    // Timeout example
                    // Do something in backend and then stop ladda
                    setTimeout(function () {
                        l.ladda('stop');
                    }, 12000)


                });

            });

        </script>
	
	</body>
</html>