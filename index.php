<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="An Online Booking Salon System in Lingayen Pangasinan.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/icon.png">

        <title>Online Appointment Beauty Salons System</title>

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
<body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.php" class="logo "><img src="assets/logo.png" style="width: 50px; height: 50px;"><span><img src="assets/logotsis.png" style="width: 150px; height: 50px;"></span></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left waves-effect waves-light">
                                        <i class="icon-list"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                    <li class="hidden-xs">
                                        <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                    </li>
                                </ul>
                            <ul class="nav navbar-nav pull-right">
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user m-r-10"></i>Login as<span
                                            class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="admin-login.php">Admin</a></li>
                                        <li class="divider"></li>
                                        <li><a href="customer-login.php">Customer</a></li>
                                        <li class="divider"></li>
                                        <li><a href="manager-login.php">Manager</a></li>
                                    
                                    </ul>
                                </li>
                            </ul>


                            
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                        	<li class="text-muted menu-title">Navigation</li>

                            <li class="has_sub">
                                <a href="index.php" class="waves-effect"><i class="ti-home"></i> <span> Beauty Salons </span></a>    
                            </li>
                            
                            
                          

                            <li class="has_sub">
                                <a href="customer-login.php" class="waves-effect"><i class="fa fa-eye m-r-10"></i><span> Show Appointments </span></a>
                                
                            </li>

                        

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
             <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                     <div class="row">
                         <div class="col-sm-12">
                                <h4 class="page-title">Beauty Salons</h4>
                                <ol class="breadcrumb">
                                    <li><a href="index.php" data-toggle="tooltip" title="Home">Home</a></li>
                                 
                                </ol>

                            </div>
                             </div>

                        <!-- Page-Title -->
                            
                      
<div class="row">
<?php
include 'dbconfig.php';
$upload_dir = 'uploads/';
$sql="SELECT * FROM salon WHERE status_salon = 1 ORDER BY sid ASC";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0) {
while($row = mysqli_fetch_array($result)) {
?>

                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <a href="salonss.php?id=<?php echo $row['sid'] ?>" data-toggle="tooltip" title="<?php echo  $row['sname']  ?>">
                                <div class="panel panel-border panel-pink">
                                    <div class="panel-heading">
                                    
                                    </div>
                                    <div class="card-box">
                                    <div class="contact-card">
                                        <p class="pull-left" href="#">
                                            <img class="img-rounded" src="<?php echo $upload_dir.$row['image'] ?>" alt="">
                                        </p>
                                        <div class="member-info">
  <?php                              
  require_once('dbconfig.php');
  $sid = $row['sid'];
  $ratingDetails = "SELECT * FROM rating WHERE sid = '$sid'";
  $rateResult = mysqli_query($conn, $ratingDetails) or die("database error:". mysqli_error($conn));
  $ratingNumber = 0;
  $count = 0;
  $fiveStarRating = 0;
  $fourStarRating = 0;
  $threeStarRating = 0;
  $twoStarRating = 0;
  $oneStarRating = 0;
  while($rate = mysqli_fetch_assoc($rateResult)) {
    $ratingNumber+= $rate['rating'];
    $count += 1;
    if($rate['rating'] == 5) {
      $fiveStarRating +=1;
    } else if($rate['rating'] == 4) {
      $fourStarRating +=1;
    } else if($rate['rating'] == 3) {
      $threeStarRating +=1;
    } else if($rate['rating'] == 2) {
      $twoStarRating +=1;
    } else if($rate['rating'] == 1) {
      $oneStarRating +=1;
    }
  }
  $average = 0;
  if($ratingNumber && $count) {
    $average = $ratingNumber/$count;
  } 
  ?>         
        <h6 class="bold pull-right">(<?php printf('%.1f', $average); ?> <small>/ 5</small>)       
        <?php
        $averageRating = round($average, 0);
        for ($i = 1; $i <= 5; $i++) {
          $ratingClass = "btn-inverse btn-grey";
          if($i <= $averageRating) {
            $ratingClass = "btn-warning";
          }
        ?>
        <button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align" style="font-size: 5px;">
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        </button> 
        <?php } ?> </h6> 
                                            <h4 class="m-t-0 m-b-5 header-title text-custom"><b><?php echo  $row['sname']  ?></b></h4>
                                            <p class="text-muted"><i class="md md-sms m-r-10"></i><?php echo  $row['quotes']  ?></p>
                                            <p class="text-muted"><i class="md md-local-phone m-r-10"></i><?php echo  $row['contact']  ?></p>
                                            <p class="text-muted"><i class="md md-mail m-r-10"></i><?php echo  $row['email']  ?></p>
                                            <p class="text-muted"><i class="md md-location-on m-r-10"></i><?php echo  $row['address']  ?></p>

                                  
                                        </div>
                                        
                                        <ul class="social-links list-inline m-0">
                                            <li>
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                            <li>
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a>
                                            </li>
                                            <li>
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Message"><i class="fa fa-envelope-o"></i></a>
                                            </li>
                                          


                                        </ul>

                                    </div>
                                </div>
                                </div>
                                </a>
                            </div> <!-- end col -->
   
<?php
}
?>
                           
<?php
}
else {
    ?>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <a href="#" data-toggle="tooltip" title="EMPTY SALON">
                                <div class="panel panel-border panel-inverse">
                                    <div class="panel-heading">
                                    
                                    </div>
                                    <div class="card-box">
                                    <div class="contact-card">
                                        <p class="pull-left" href="#">
                                            <img class="img-rounded" src="" alt="">
                                        </p>
                                        <div class="member-info">
                                            <h4 class="m-t-0 m-b-5 header-title text-custom"><b>EMPTY NO SALON</b></h4>
                                            <p class="text-muted"><i class="md md-sms m-r-10"></i>nAn</p>
                                            <p class="text-muted"><i class="md md-local-phone m-r-10"></i>nAn</p>
                                            <p class="text-muted"><i class="md md-mail m-r-10"></i>nAn</p>
                                            <p class="text-muted"><i class="md md-location-on m-r-10"></i>nAn</p>
                                  
                                        </div>
                                        
                                        <ul class="social-links list-inline m-0">
                                            <li>
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                            <li>
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a>
                                            </li>
                                            <li>
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Message"><i class="fa fa-envelope-o"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                </div>
                                </a>
                            </div> <!-- end col -->

                      
                            <?php
}
mysqli_close($conn);
?>


                        </div> <!-- end row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->
                <footer class="footer">
                    © 2019. All rights reserved.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->         

        </div>
        <!-- END wrapper -->
    
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
    
    </body>
</html>