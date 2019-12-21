<?php 
if(!isset($_SESSION)){
    session_start();
}
?>
<?php include "inc/defheader.php" ?>
<?php include "dbconfig.php"; ?>
<body>
<div class="account-pages"></div>
    <div class="clearfix"></div>
        <div class="wrapper-page">
        	<div class=" card-box">
             <?php
$error=''; 
if (isset($_POST['login'])) {
if (empty($_POST['uname']) || empty($_POST['psw'])) {
$error = "Username or Password is invalid";
}
else
{
    include 'dbconfig.php';
    $username=$_POST['uname'];
    $password=$_POST['psw'];

    $query = mysqli_query($conn,"SELECT * FROM customer WHERE password='$password' AND username='$username'");
    $rows = mysqli_fetch_assoc($query);
    $num=mysqli_num_rows($query);
    if ($num == 1) {
        $_SESSION['usernamec']=$rows['username'];
        $_SESSION['user']=$rows['name'];
        $_SESSION['crid']=$rows['cid'];
        echo "Logging you in..";
       echo '<script type="text/javascript">setTimeout(function(){window.top.location="customer-page.php"} , 1000);</script>';
    } 
    else 
    {
        echo  "Username or Password is invalid";
    }
    mysqli_close($conn); 
}
}
?>
<a href="javascript:history.back()">
 <button class="btn btn-icon waves-effect waves-light btn-danger pull-right" data-toggle="tooltip" title="Close"> <i class="fa fa-remove"></i> </button>
</a>
            <div class="panel-heading">
                <br> 
                <h3 class="text-center"> Sign In as <strong class="text-custom">Costumer</strong> </h3>
            </div> 


            <div class="panel-body">
            <form class="form-horizontal m-t-20" action="customer-login.php" method="post">
                
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" name="uname" required="" placeholder="Username">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="psw" required="" placeholder="Password">
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
                        <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light ladda-button btn btn-primary" data-style="expand-left" name="login" type="submit" data-toggle="tooltip" title="Log In">Log In</button>
                    </div>
                </div>

               
            </form> 
            
            </div>   
            </div>                              
                <div class="row">
            	<div class="col-sm-12 text-center">
            		<p>Don't have an account? <a href="page-register.php" class="text-primary m-l-5" data-toggle="tooltip" title="Sign Up"><b>Sign Up</b></a></p>
                        
                    </div>
            </div>
            
        </div>
<?php include 'inc/loginfooter.php'; ?>