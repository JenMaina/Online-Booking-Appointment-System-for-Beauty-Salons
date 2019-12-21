<?php
include 'dbconfig.php';
include 'customer-check.php';
$upload_dir = 'uploads/';
$cid=$_SESSION['crid'];
    $sql = "SELECT * FROM customer WHERE cid=$cid";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
?>


<?php
function make_query($conn)
{
 $sid = $_SESSION['sid'];
 $query = "SELECT * FROM baner WHERE sid = $sid ORDER BY bid DESC";
 $result = mysqli_query($conn, $query);
 return $result;
}

function make_slide_indicators($conn)
{
 $output = ''; 
 $count = 0;
 $result = make_query($conn);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>
   ';
  }
  else
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>
   ';
  }
  $count = $count + 1;
 }
 return $output;
}

function make_slides($conn)
{
 $output = '';
 $count = 0;
 $result = make_query($conn);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '<div class="item active">';
  }
  else
  {
   $output .= '<div class="item">';
  }
  $output .= '
   <img src="uploads/'.$row["image"].'" alt="'.$row["title"].'" />
   <div class="carousel-caption">
   <h5 class="text-white">'.$row["msg"].'</h5>
    <h4 class="text-white">'.$row["title"].'</h4>
   </div>
  </div>
  ';
  $count = $count + 1;
 }
 return $output;
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

        <link href="assets/plugins/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet" type="text/css" />

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
        <style>
    .google-maps {
        position: relative;
        padding-bottom: 75%;
        height: 0;
        overflow: hidden;
    }
    .google-maps iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
    }
</style>
        
    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include 'inc/customertopbar.php'; ?>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                        	<li class="text-muted menu-title">Navigation</li>

                            <li class="has_sub">
                                <a href="customer-page.php" class="waves-effect"><i class="ti-home"></i> <span> Beauty Salons </span></a>    
                            </li>
                            
                            
                         

                            <li class="has_sub">
                                <a href="cancel-app.php" class="waves-effect"><i class="fa fa-eye m-r-10"></i><span> Show Appointments </span></a>
                                
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
<?php
  require_once('dbconfig.php');
  $upload_dir = 'uploads/';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM salon WHERE sid=".$id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['sid']=$row['sid'];
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }

?>
                    <div class="row">
                            <div class="col-sm-12">
                                <div class="btn-group pull-right m-t-15">
                                    <a href="javascript:history.back()" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" title="back">BACK <span class="m-l-5"><i class="md md-backspace"></i></span></a>
                                   
                                </div>

                                <h4 class="page-title"><?php echo  $row['sname'] ?></h4>
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="customer-page.php" data-toggle="tooltip" title="Home">Home</a>
                                    </li>
                                    <li class="active">
                                        <?php echo  $row['sname'] ?>

                                    </li>
                                   
                                </ol>
                            </div>
                        </div>



                             <div class="row">
                            <div class="col-md-12 col-lg-12">
                              
                                
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            
                                            <!-- START carousel-->
                                            <div id="dynamic_slide_show" data-ride="carousel" class="carousel slide">
                                                <ol class="carousel-indicators">
                                                <?php echo make_slide_indicators($conn); ?>
                                                </ol>
                                                <div role="listbox" class="carousel-inner">
                                                    <?php echo make_slides($conn); ?>
                                                </div>
                                                <a href="#dynamic_slide_show" role="button" data-slide="prev" class="left carousel-control"> <span aria-hidden="true" class="fa fa-angle-left"></span> <span class="sr-only">Previous</span> </a>
                                                <a href="#dynamic_slide_show" role="button" data-slide="next" class="right carousel-control"> <span aria-hidden="true" class="fa fa-angle-right"></span> <span class="sr-only">Next</span> </a>
                                            </div>
                                            <!-- END carousel-->
                                        </div>
                                       
                                    </div>
                                    <br>
                                    <div class="card-box">
                                    <div class="row">
                                    <div class="col-sm-12">
                                    <div class="text-center">
                                    <ul class="list-inline status-list m-t-20">
                                            <li>
                                                <h3 class="text-primary m-b-5">WELCOME</h3>
                                                <p class="m-t-10"><em><?php echo  $row['welcome'] ?></em></p>
                                            </li>

                                        </ul>
                                    </div>    
                                    </div>


                                     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        
                                            <div class=" col-sm-3 col-md-3 col-lg-3">
                                                <img src="<?php echo $upload_dir.$row['image'] ?>" class="img-responsive img-rounded">
                                                
                                            </div>

                                            <div class="col-sm-9 col-md-9 col-lg-9">
                               
                                          <div class="text-center m-t-30">
                                         
                                            <h3 class='title'><?php echo  $row['sname'] ?></h3><br>
                                             <h4><i class='md md-info'></i><b></b> <?php echo  $row['quotes'] ?> <i class='md md-info'></i></h4>
                                            

                                           

                                            </div>
                                            </div>  
                                           
                                                   
                                     </div>
                                    </div>
                                    </div>
                            
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    
                                    <h4 class=" m-t-0 header-title"><b>Featured Services offered</b></h4><br>
                                    <div class="owl-carousel owl-theme" id="owl-multi">
                                    <?php
                                    include 'dbconfig.php';
                                    $upload_dir = 'uploads/';
                                    $sid = $_SESSION['sid'];
                                   $sql="SELECT t1.*, t2.* FROM service1 t1 JOIN fservice t2 ON t1.sid = $sid WHERE t1.serid = t2.serid";
                                    $result = mysqli_query($conn,$sql);
                                    if (mysqli_num_rows($result)>0) {
                                    while($row = mysqli_fetch_array($result)) {    
                                            ?>                            
                                        <div class="item"><a href="service.php?id=<?php echo  $row['serid'] ?>" data-toggle="tooltip" title="<?php echo  $row['sername'] ?>">
                                            <img src="<?php echo $upload_dir.$row['image'] ?>">
                                            <h5 class='title text-center'><?php echo  $row['sername'] ?></h5>
                                            </a>
                                        </div>
                                        


                                    <?php
                                    }
                                    }
                                    else {
                                        echo "<div class='wrapper-page'>
                                                                    <div class='ex-page-content text-center'>
                                                                    
                                                                        <h5>NO RESULTS FOUND</h5>
                                                                    </div>
                                                                </div>";
                                    }
                                    mysqli_close($conn);
                                    ?>
                                        </div>
                                               </div>
                                                    </div>
                                                            </div>


        <div class="row">
                            <div class="m-b-15">
                                

                                        <?php
                                        include 'dbconfig.php';
                                        $upload_dir = 'uploads/';
                                        $sql="SELECT * FROM service1 WHERE sid=$id order by sername ASC";
                                        $result = mysqli_query($conn,$sql);
                                        if (mysqli_num_rows($result)>0) {
                                     
                                        while($row = mysqli_fetch_array($result)) {
                                        ?>

                                <div class="col-sm-6 col-lg-3 col-md-3 mobiles">
                                    <div class="product-list-box thumb">
                                    <a href="service.php?id=<?php echo  $row['serid'] ?>" class="image-popup" title="<?php echo  $row['sername'] ?>" data-toggle="tooltip">
                                            <img src="<?php echo $upload_dir.$row['image'] ?>" class="thumb-img thumbnail" alt="thumbnail">
                                        </a>

                                        <div class="price-tag">
                                           &#8369;<?php echo  $row['rate'] ?>
                                        </div>
                                        <div class="detail">
                                            <h4 class="m-t-0"><a href="service.php?id=<?php echo  $row['serid'] ?>" class="text-dark" data-toggle="tooltip" title="<?php echo  $row['sername'] ?>"><?php echo  $row['sername'] ?></a> </h4>
                                            <div class="rating">
                                                <ul class="list-inline">
                                                    <a href="show-rating.php?id=<?php echo $row['serid'] ?>">
  <?php
  require_once('dbconfig.php');
  $serid = $row['serid'];
  $ratingDetails = "SELECT * FROM rating WHERE serid = '$serid'";
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
        <h5 class="bold padding-bottom-7"><?php printf('%.1f', $average); ?> <small>/ 5</small></h5>        
        <?php
        $averageRating = round($average, 0);
        for ($i = 1; $i <= 5; $i++) {
          $ratingClass = "btn-inverse btn-grey";
          if($i <= $averageRating) {
            $ratingClass = "btn-warning";
          }
        ?>
        <button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align" style="font-size: 8px;">
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        </button> 
        <?php } ?>  
                                                        </a>
                                                </ul>
                                            </div>
                                            <h5 class="m-0"> <span class="text-muted">Duration: <?php echo  date('h:i', strtotime($row['duration'])); ?></span></h5>
                                        </div>
                                    </div>
                                </div>
                                        <?php
                                        }
                                        }
                                        else {
                                            ?>
                                            <div class="col-sm-6 col-lg-3 col-md-3 mobiles">
                                    <div class="product-list-box thumb">
                                        <a href="javascript:void(0);" class="image-popup" title="service">
                                            <img src="assets/empty.jpg" class="thumb-img" alt="thumbnail">
                                        </a>

                                       

                                        <div class="price-tag">
                                            0.00
                                        </div>
                                        <div class="detail">
                                            <h5 class="m-t-0"><a href="" class="text-dark">empty</a> </h5>
                                            <div class="rating">
                                                <ul class="list-inline">
                                                    <li><a class="fa fa-star" href=""></a></li>
                                                    <li><a class="fa fa-star" href=""></a></li>
                                                    <li><a class="fa fa-star" href=""></a></li>
                                                    <li><a class="fa fa-star" href=""></a></li>
                                                    <li><a class="fa fa-star-o" href=""></a></li>
                                                </ul>
                                            </div>
                                            <h5 class="m-0"> <span class="text-muted">Duration: 0</span></h5>
                                        </div>
                                    </div>
                                       </div>
                                            <?php
                                        }
                                     
                                       
                                        ?>



                               
                            </div>
         </div> <!-- End row -->
                            <?php
  require_once('dbconfig.php');
  $upload_dir = 'uploads/';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM salon WHERE sid=".$id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['sid']=$row['sid'];
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }

?>
               

                        <div class="card-box m-t-20">
                        <div class="row">
                          <h3 class='title text-center'><img src="<?php echo $upload_dir.$row['image'] ?>" class="img-rounded thumb-sm"> <?php echo  $row['sname'] ?></h3><br>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <h4 class='title'>Contact Us</h4>
                             <div class="m-t-30">
                                            <p class="text-muted font-14"><i class="md md-email"></i><strong> Email :</strong><span class="m-l-15"><?php echo  $row['email'] ?></span></p>
                                            <p class="text-muted font-14 m-t-20"><i class="md md-smartphone"></i><strong> Phone :</strong><span class="m-l-15"><?php echo  $row['contact'] ?></span></p>
                                            <p class="text-muted font-14 m-t-20"><i class="md md-room"></i><strong> Address :</strong> <span class="m-l-15"><?php echo  $row['address'] ?></span></p>

                                             <div class="button-list m-t-20 text-center">
                                                 <h4 class='title'>Follow Us</h4>
                                            <button type="button" class="btn btn-facebook waves-effect waves-light" data-toggle="tooltip" title="Facebook">
                                               <i class="fa fa-facebook"></i>
                                            </button>

                                            <button type="button" class="btn btn-twitter waves-effect waves-light" data-toggle="tooltip" title="Twitter">
                                               <i class="fa fa-twitter"></i>
                                            </button>

                                            <button type="button" class="btn btn-instagram waves-effect waves-light" data-toggle="tooltip" title="Instagram">
                                               <i class="fa fa-instagram"></i>
                                            </button>
                                    

                                        </div>
                                </div>
                            </div>

                         <?php
  require_once('dbconfig.php');
  $upload_dir = 'uploads/';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM workingtime WHERE sid='$id' ORDER by nod ASC";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        ?>
                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                <div class="text-center">
                                                 <h4 class='title'>Opening Hours</h4><br>
     <?php
    while($row = mysqli_fetch_array($result)) { 
         $_SESSION['sid']=$row['sid'];
      ?>
                                                  <p class="text-muted font-14 m-t-30"><strong> <?php echo  $row['weekdays'] ?> :</strong> <span class="m-l-15"><?php echo date('h:i A', strtotime($row['fro']));  ?> - <?php echo date('h:i A', strtotime($row['tto']));  ?></span></p>                                              
    <?php
    }
    ?>
                                                 </div>
                                                </div>
    <?php
    }else {
        ?>

                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                             <div class="text-center">

                                                 <h4 class='title'>Opening Hours</h4>

                                                  <p class="text-muted font-14 m-t-30"><strong> Monday :</strong> <span class="m-l-15">00:00am - 00:00pm</span></p>
                                                  <p class="text-muted font-14"><strong> Tuesday :</strong> <span class="m-l-15">00:00am - 00:00pm</span></p>
                                                  <p class="text-muted font-14"><strong> Wednesday :</strong> <span class="m-l-15">00:00am - 00:00pm</span></p>
                                                  <p class="text-muted font-14"><strong> Thursday :</strong> <span class="m-l-15">00:00am - 00:00pm</span></p>
                                                  <p class="text-muted font-14"><strong> Friday :</strong> <span class="m-l-15">00:00am - 00:00pm</span></p>
                                                  <p class="text-muted font-14"><strong> Saturday :</strong> <span class="m-l-15">00:00am - 00:00pm</span></p>
                                                  <p class="text-muted font-14"><strong> Sunday :</strong> <span class="m-l-15">00:00am - 00:00pm</span></p>

                                                
                                             </div>
                                             </div>
      <?php
    }
  }

?>

                                             <?php
  require_once('dbconfig.php');
  $upload_dir = 'uploads/';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM maps WHERE sid=".$id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['sid']=$row['sid'];
      ?>
       <div class="col-sm-5 col-md-5 col-lg-5">
                                             <div class="text-center">
                                                 <h4 class='title'>Where are we located?</h4>
                                                 <div class="google-maps">
                                                    <?php echo  $row['url'] ?>
                                                </div>
                                                
                                             </div>
                                             </div> 
                                             <?php
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }

?>

                                             
                            
                        </div>
                            
                        </div>
                        


                        



                 
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

        <script src="assets/plugins/owl.carousel/dist/owl.carousel.min.js"></script>
        
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                //owl carousel
                $("#owl-slider").owlCarousel({
                    loop:true,
                    nav:false,
                    autoplay:true,
                    autoplayTimeout:4000,
                    autoplayHoverPause:true,
                    animateOut: 'fadeOut',
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:1
                        },
                        1000:{
                            items:1
                        }
                    }
                });
                
                $("#owl-slider-2").owlCarousel({
                    loop:false,
                    nav:false,
                    autoplay:true,
                    autoplayTimeout:4000,
                    autoplayHoverPause:true,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:1
                        },
                        1000:{
                            items:1
                        }
                    }
                });
                
                //Owl-Multi
                $('#owl-multi').owlCarousel({
                    loop:true,
                    margin:20,
                    nav:false,
                    autoplay:true,
                    responsive:{
                        0:{
                            items:1
                        },
                        480:{
                            items:2
                        },
                        700:{
                            items:4
                        },
                        1000:{
                            items:3
                        },
                        1100:{
                            items:5
                        }
                    }
                })
            });
            
        </script>
  
  </body>
</html>