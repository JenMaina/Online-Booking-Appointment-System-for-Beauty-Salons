<?php
include 'dbconfig.php';
include 'manager-check.php';
$upload_dir = 'uploads/';
$mid=$_SESSION['mgrid'];
    $sql = "SELECT * FROM manager WHERE mid=$mid";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
?>

<?php include 'inc/managerheader.php'; ?>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include 'inc/managertopbar.php'; ?>
            <!-- Top Bar End -->

                                                 <?php
                                                include 'dbconfig.php';
                                                $mid=$_SESSION['mgrid'];
                                                $sql="SELECT * FROM salon WHERE sid IN(SELECT sid FROM manager_salon WHERE mid=$mid);";
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                  $row = mysqli_fetch_assoc($result);
                                                  $_SESSION['sidd'] = $row['sid'];
                                                }else {
                                                  $errorMsg = 'Could not Find Any Record';
                                                }
                                                ?>
           


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
           <div class="content" style="padding-top: 70px;">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                       <div class="row">
                            <div class="col-sm-12">
                                <div class="btn-group pull-right m-t-15">
                                    <a href="javascript:history.back()" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" title="back">BACK <span class="m-l-5"><i class="md md-backspace"></i></span></a>    
                                </div>

                                <h5 class="page-title"><img src="<?php echo $upload_dir.$row['image'] ?>" class="img-rounded thumb-sm"> <?php echo  $row['sname']  ?></h5>
                                <ol class="breadcrumb">
                                    <li><a href="manager-page.php" data-toggle="tooltip" title="Home">Manager Home</a></li>
                                    <li class="active">Show Service</li>
                                </ol>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="m-b-15">
                            
                                        <?php
                                      include 'dbconfig.php';
                                        
                                        $upload_dir = 'uploads/';
                                        $sid=$_SESSION['sidd'];
                                        $sql="SELECT * FROM service1 WHERE sid='$sid' ORDER BY sername ASC";
                                        $result = mysqli_query($conn,$sql);
                                        if (mysqli_num_rows($result)>0) {
                                     
                                        while($row = mysqli_fetch_array($result)) {
                                        ?>
                                          

                                          <div class="col-sm-4 col-md-3 col-lg-3 mobiles">
                                            <div class="product-list-box thumb">
                                             <a href="serviceedit.php?id=<?php echo  $row['serid'] ?>" class="image-popup" title="<?php echo  $row['sername'] ?> " data-toggle="tooltip">
                                                <img src="<?php echo $upload_dir.$row['image'] ?>" class="thumb-img thumbnail" alt="thumbnail">
                                             </a>

                                          <div class="product-action">
                                            <a href="serviceedit.php?id=<?php echo  $row['serid'] ?>" title="edit" data-toggle="tooltip"  class="btn btn-success btn-sm"><i class="md md-mode-edit"></i></a>
                                            <a href="edit-salon-m.php?deleteser=<?php echo $row['serid'] ?>" title="delete" data-toggle="tooltip" onclick="return confirm('Are you sure to delete this?');" class="btn btn-danger btn-sm"><i class="md md-close"></i></a>
                                        </div>

                                       

                                        <div class="price-tag">
                                           &#8369;<?php echo  $row['rate'] ?>
                                        </div>
                                        <div class="detail">
                                            <h4 class="m-t-0"><a href="serviceedit.php?id=<?php echo  $row['serid'] ?>" class="text-dark" title="<?php echo  $row['sername'] ?> " data-toggle="tooltip"><?php echo  $row['sername'] ?></a> </h4>
                                            <div class="rating">
                                                <ul class="list-inline">
                                                     <a href="show-rating-guest.php?id=<?php echo $row['serid'] ?>" target="_blank">
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
        <button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align" >
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        </button> 
        <?php } ?>  
                                                        </a>
                                                </ul>
                                            </div>
                                            
                                        </div>
                                        <h4 class="m-0"> <span class="text-muted">Duration: <?php echo  date('h:i', strtotime($row['duration'])); ?></span></h4>
                                    </div>
                                       </div>
        

                                        <?php
                                        }
                                        ?>
                                       <div class="col-sm-4 col-md-3 col-lg-3 mobiles">
                                    <div class="product-list-box thumb">
                                        <a href="add-service.php" data-toggle="tooltip" title="Add Service">
                                    <div class="widget-bg-color-icon card-box text-center">
                                    <div class="bg-icon bg-icon-success waves-effect waves-light">
                                        <i class="glyphicon glyphicon-plus-sign text-success"></i>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                    <div class="text-center">
                                        <br>
                                        <h3 class="text-muted">Add Service</h3>
                                    </div>
                                </div>
                                </a>

                                    </div>
                                       </div>
                            <?php
                                        }
                                        else {
                                            ?>
                                            <div class="col-sm-4 col-md-3 col-lg-3 mobiles">
                                    <div class="product-list-box thumb">
                                        <a href="javascript:void(0);" class="image-popup" title="service">
                                            <img src="assets/empty.jpg" class="thumb-img" alt="thumbnail">
                                        </a>

                                     

                                        <div class="price-tag">
                                            0.00
                                        </div>
                                        <div class="detail">
                                            <h4 class="m-t-0"><a href="" class="text-dark">empty</a> </h4>
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


                                       <div class="col-sm-4 col-md-3 col-lg-3 mobiles">
                                    <div class="product-list-box thumb">
                                        <a href="add-service.php" data-toggle="tooltip" title="Add Service">
                                    <div class="widget-bg-color-icon card-box text-center">
                                    <div class="bg-icon bg-icon-success waves-effect waves-light">
                                        <i class="glyphicon glyphicon-plus-sign text-success"></i>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                    <div class="text-center">
                                        <br>
                                        <h3 class="text-muted">Add Service</h3>
                                    </div>
                                </div>
                                </a>

                                    </div>
                                       </div>
                                            <?php
                                        }
                                     
                                        mysqli_close($conn);
                                        ?>



                               
                            </div>
         </div> <!-- End row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->
                        <?php
  include('dbconfig.php');

  if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $sql = "SELECT * FROM staff WHERE stfid = ".$id;
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $sql = "DELETE FROM staff WHERE stfid=".$id;
            $sql1 = "DELETE FROM staff_availability WHERE stfid=".$id;
            if(mysqli_query($conn, $sql)){
                 echo ("<script>location.href = 'show-staff.php';</script>");
            }
            if(mysqli_query($conn, $sql1)){
                 echo ("<script>location.href = 'show-staff.php';</script>");
            }
        }
    }
?>
<br><br><br><br>
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

        <script src="assets/plugins/peity/jquery.peity.min.js"></script>

        <!-- jQuery  -->
        <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>

        <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>



        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

            });
        </script>
	</body>
</html>