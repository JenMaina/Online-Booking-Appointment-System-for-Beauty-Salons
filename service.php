<?php
include 'customer-check.php';
include 'dbconfig.php';
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
<?php include 'inc/customerheader.php'; ?>


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
    $sql = "SELECT * FROM service1 WHERE serid=".$id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['seridser'] = $row['serid'];
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }

?>


 <?php
  require_once('dbconfig.php');
  $upload_dir = 'uploads/';

    $sid = $_SESSION['sid'];
    $sql1 = "SELECT * FROM salon WHERE sid= $sid";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) > 0) {
      $row1 = mysqli_fetch_assoc($result1);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }


?>



                    <div class="row">
                            <div class="col-sm-12">
                                <div class="btn-group pull-right m-t-15">
                                    <a href="javascript:history.back()" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" title="back">BACK <span class="m-l-5"><i class="md md-backspace"></i></span></a>
                                   
                                </div>

                                <h4 class="page-title"><?php echo  $row['sername'] ?></h4>
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="customer-page.php" data-toggle="tooltip" title="Home">Home</a>
                                    </li>
                                    <li>
                                        <a href="salons.php?id=<?php echo  $row1['sid'] ?>" data-toggle="tooltip" title="<?php echo  $row1['sname'] ?>" ><?php echo  $row1['sname'] ?></a>

                                    </li>
                                    <li class="active">
                                        Service Detail
                                    </li>
                                </ol>
                            </div>
                        </div>

                    <div class="row">
                           <div class="col-xs-12">
                               <div class="card-box product-detail-box">
                                   <div class="row">
                                       <div class="col-sm-4">
                                           <div class="sp-loading"><img src="assets/images/sp-loading.gif" alt=""><br>LOADING
                                               IMAGES
                                           </div>
                                           <div class="sp-wrap">
                                               <a href="<?php echo $upload_dir.$row['image'] ?>"><img src="<?php echo $upload_dir.$row['image'] ?>" alt=""></a>
                                           </div>
                                       </div>

                                       <div class="col-sm-8">
                                           <div class="product-right-info">
                                               <h3><b><?php echo  $row['sername'] ?></b></h3>
                                               <div class="rating">
                                                    <ul class="list-inline">
                                                      <a href="show-rating.php?id=<?php echo $row['serid'] ?>">
  <?php
  require_once('dbconfig.php');
  $serid = $_SESSION['seridser'];
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
        <button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align">
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        </button> 
        <?php } ?>  
                                                        </a>
                                                    </ul>
                                                </div>

                                               <h2 class="text-success"> <b>&#8369; <?php echo  $row['rate'] ?></b></b></h2>

                                               <h5 class="m-t-20"><b>Duration: </b> <?php echo  date('h:i', strtotime($row['duration'])); ?></h5>

                                               <hr/>

                                               <h5 class="font-600">Service Description</h5>

                                               <p class="text-muted"><?php echo  $row['descrip'] ?></p>

                                               <div class="m-t-30">
                                                


                                                   <a href="" type="button" class="btn btn-danger waves-effect waves-light m-l-10" title="Book Now" data-toggle="modal" data-target="#con-close-modal">
                                                     <span class="btn-label"><i class="md md-event-note"></i>
                                                   </span>Book Now</a>

                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <!-- end row -->

                                 

                               </div> <!-- end card-box/Product detai box -->
                           </div> <!-- end col -->
                       </div> <!-- end row -->




                         <div class="card-box">
                        <div class="row">
                         <a href="salons.php?id=<?php echo  $row1['sid'] ?>" data-toggle="tooltip" title="<?php echo  $row1['sname'] ?>"><h3 class='title text-center'><img src="<?php echo $upload_dir.$row1['image'] ?>" class="img-rounded thumb-sm"> <?php echo  $row1['sname'] ?></h3></a><br>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <h4 class='title'>Contact Us</h4>
                             <div class="m-t-30">
                                            <p class="text-muted font-14"><i class="md md-email"></i><strong> Email :</strong><span class="m-l-15"><?php echo  $row1['email'] ?></span></p>
                                            <p class="text-muted font-14 m-t-20"><i class="md md-smartphone"></i><strong> Phone :</strong><span class="m-l-15"><?php echo  $row1['contact'] ?></span></p>
                                            <p class="text-muted font-14 m-t-20"><i class="md md-room"></i><strong> Address :</strong> <span class="m-l-15"><?php echo  $row1['address'] ?></span></p>

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


    $sid = $_SESSION['sid'];
    $sql = "SELECT * FROM workingtime WHERE sid='$sid' ORDER by nod ASC";
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

?>


                                              <?php

  require_once('dbconfig.php');
  $upload_dir = 'uploads/';

    $sid = $_SESSION['sid'];
    $sql1 = "SELECT * FROM maps WHERE sid= $sid";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) > 0) {
      $row1 = mysqli_fetch_assoc($result1);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }


?>

                                             <div class="col-sm-5 col-md-5 col-lg-5">
                                             <div class="text-center">
                                                 <h4 class='title'>Where are we located?</h4>
                                                 <div class="google-maps">
                                                    <?php echo  $row1['url'] ?>
                                                </div>
                                                
                                             </div>
                                             </div>  
                            
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

         <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog"> 

                                            <div class="modal-content">

                                              <?php
include 'dbconfig.php';
  $upload_dir = 'uploads/';

    $sid = $_SESSION['sid'];
    $sql1 = "SELECT * FROM salon WHERE sid= $sid";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) > 0) {
      $row1 = mysqli_fetch_assoc($result1);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }


?>

 <?php
  require_once('dbconfig.php');
  $upload_dir = 'uploads/';
  if (isset($_GET['id'])) {
    $serid = $_GET['id'];
    $sql2 = "SELECT * FROM service1 WHERE serid= $serid";
    $result2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result2) > 0) {
      $row2 = mysqli_fetch_assoc($result2);
      $_SESSION['sidb'] = $row2['sid'];
      $_SESSION['seridb'] = $row2['serid'];
      $_SESSION['simageb'] = $row2['image'];
      $_SESSION['sernameb'] = $row2['sername'];
      $_SESSION['rateb'] = $row2['rate'];
      $_SESSION['durationb'] = $row2['duration'];
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
}
?>

<?php
date_default_timezone_set('America/Los_Angeles');
if(isset($_POST['Submit']))
{

        
        include 'dbconfig.php';
        $username=$_SESSION['usernamec'];
      
        $dov=$_POST['dov'];
        $tym=$_POST['tym'];
        $stfid=$_POST['staff'];
        $fname=$_SESSION['user'];
        $sid=$_SESSION['sidb'];
        $serid=$_SESSION['seridb'];
        $simage= $_SESSION['simageb'];
        $sername=$_SESSION['sernameb'];
        $rate=$_SESSION['rateb'];
        $duration=$_SESSION['durationb'];
        $status="Booked, waiting the for update...";
        $datecreated=date('Y-m-d H:i:s');
        
        $sql = "INSERT INTO book (username, dov, tym, stfid, fname, sid, serid, simage, sername, rate, duration, status, datecreated) VALUES ('$username', '$dov', '$tym', '$stfid', '$fname', '$sid', '$serid', '$simage', '$sername', '$rate', '$duration', '$status', '$datecreated') ";
    
                if (mysqli_query($conn, $sql)) 
                {
                        echo "<h4>Booking successful!</h4>";
                        echo ("<script>location.href = 'cancel-app.php';</script>");
                        

                } 
                else
                {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
          
        }
?>

<script>
function getStaffSched(val) {
    $.ajax({
    type: "POST",
    url: "get_staffsched.php",
    data:'staff='+val,
    success: function(data){
        $("#sched-list").html(data);
    }
    });
}

function getStaffSchedbook(val) {
    $.ajax({
    type: "POST",
    url: "get_staffsched_book.php",
    data:'dov='+val,
    success: function(data){
        $("#sched-list").html(data);
    }
    });
}

</script>
    

        <!-- Begin page -->

            <div class="container">
        <div class="row justify-content-center">
         <a href="" type="button" class="close" data-toggle="tooltip" title="Close">×</a>

         <div class="col-lg-12">
                        <div class="">
                        
                        <form class="" action="service.php?id=<?php echo  $row2['serid'] ?>" method="post" enctype="multipart/form-data">
                            <h4 class='title text-center'><img src="<?php echo $upload_dir.$row1['image'] ?>" class="img-rounded thumb-sm"> <?php echo  $row1['sname'] ?></h4>
                        <div class="col-lg-7 col-md-7">
                            
                                            <div class="product-list-box thumb">
                                            <img src="<?php echo $upload_dir.$row2['image'] ?>" class="thumb-img thumbnail" alt="thumbnail" name="simage">
                                        <div class="price-tag" name="rate">
                                           &#8369;<?php echo  $row2['rate'] ?>
                                        </div>
                                        <div class="detail">
                                            <h4 class="m-t-0" name="sername"><?php echo  $row2['sername'] ?></h4>
                                            <div class="rating">
                                                <ul class="list-inline">
                                                    <a href="show-rating.php?id=<?php echo $_SESSION['seridb']; ?>">
  <?php
  require_once('dbconfig.php');
  $serid = $_SESSION['seridb'];
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
                                            <h5 class="m-0"> <span class="text-muted" name="duration">Duration: <?php echo  date('h:i', strtotime($row2 ['duration'])); ?></span></h5>
                                        </div>
                                    </div>
                                    </div>



                                    <div class="col-lg-5 col-md-5">
                                          <h5 class="text-left"><b>Select Staff <span class="text-danger">*</span></b> </h5>

                                            <select class="form-control select2" required="" name="staff" id="staff-list" class="demoInputBox" onChange="getStaffSched(this.value);" >
                                                <option>Select</option>
                                                <optgroup label="Staffs">
                                                <?php
                                                include 'dbconfig.php';
                                                $sid=$_SESSION['sidb'];
                                                $serid = $_SESSION['seridb'];
                                                $sql1="SELECT * FROM staff LEFT JOIN staff_service ON staff.stfid = staff_service.stfid WHERE staff.sid = staff_service.sid AND staff_service.serid = '$serid' ORDER BY staff.name ASC";
                                                $results=$conn->query($sql1); 
                                                while($rs=$results->fetch_assoc()) {

                                                ?>
                                                <option value="<?php echo $rs["stfid"]; ?>"><?php echo $rs["name"]; ?></option>
                                                <?php
                                                }
                                                ?>
        
                                                    
                                                </optgroup>
                                            </select>
                                        
                                        
                                            <h5 class="text-left"><b>Date to Visit <span class="text-danger">*</span></b> </h5>
                                             <div class="input-group" required="">
                                              <input type="text" name="dov" class="form-control" required="" placeholder="mm/dd/yyyy" id="datepicker-autoclose" class="datepicker" data-date-start-date="+1d" onChange="getStaffSchedbook(this.value);" readonly="readonly">
                                             <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span> 
                                            </div>
                                                        
                                                        <div class="radio radio-success" id="sched-list" name="tym" >
                                                          
                                                        </div>
                                              
                                                    </div>
                      
                                                
                                              <br>
                                            <div class="form-group text-right m-b-0">
                                            <button class="btn btn-default waves-effect waves-light" name="Submit" type="submit" value="submit" data-toggle="tooltip" title="Book now">
                                                Book now
                                            </button>
                                        </div>

                        </form>

        </div>
            </div> 



        </div>
      </div>    


                                                
                                            </div> 
                                        </div>
                                    </div><!-- /.modal -->


        
    
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

        <script src="assets/plugins/custombox/js/custombox.min.js"></script>
        <script src="assets/plugins/custombox/js/legacy.min.js"></script>


        <script src="assets/plugins/smoothproducts/js/smoothproducts.min.js"></script>

        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            // wait for images to load
            $(window).load(function() {
                $('.sp-wrap').smoothproducts();
            });
        </script>

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