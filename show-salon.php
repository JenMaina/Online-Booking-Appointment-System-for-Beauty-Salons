<?php
include "dbconfig.php";
include 'admin-check.php';
$upload_dir = 'uploads/';
    $sql = "SELECT * FROM admin";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
?>
<?php include 'inc/adminheader.php'; ?>
    


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include 'inc/admintopbar.php'; ?>
            <!-- Top Bar End -->

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

                                <h5 class="page-title"><img src="assets/logotsis.png" style="width: 150px; height: 50px;"></h5>
                                <ol class="breadcrumb">
                                    <li><a href="admin-page.php" data-toggle="tooltip" title="Home">Admin Home</a></li>
                                    <li class="active">Show Salons</li>
                                </ol>
                            </div>
                        </div>
                        
                        <div class="row">
                            <?php
include 'dbconfig.php';
$upload_dir = 'uploads/';
$sql="SELECT * FROM salon ORDER BY sid ASC";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0) {
while($row = mysqli_fetch_array($result)) {
?>
                            <div class="col-sm-6 col-md-6 col-lg-6">
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
                                            <h4 class="m-t-0 m-b-5 header-title text-pink"><b><?php echo  $row['sname']  ?></b></h4>
                                            <p class="text-muted"><i class="md md-local-phone m-r-10"></i><?php echo  $row['contact']  ?></p>
                                            <p class="text-muted"><i class="md md-mail m-r-10"></i><?php echo  $row['email']  ?></p>
                                            <p class="text-muted"><i class="md md-location-on m-r-10"></i><?php echo  $row['address']  ?></p>
                                       
                                            <div class="contact-action">
                                            <?php
                                                if ($row['status_salon']==0) {
                                                    ?>
                                                    <a href="show-salon.php?approve=<?php echo $row['sid'] ?>" title="Approve Salon" data-toggle="tooltip"  onclick="return confirm('Are you sure you want to approve this salon?');" class="btn btn-pink btn-sm"><i class="glyphicon glyphicon-check"></i></a>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <a href="show-salon.php?disable=<?php echo $row['sid'] ?>" title="Disable Salon" data-toggle="tooltip"  onclick="return confirm('Are you sure you want to disable this salon?');" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-ban-circle"></i></a>
                                                    <?php
                                                }
                                                ?>              
                                                <a href="edit-salon.php?id=<?php echo $row['sid'] ?>" title="edit" data-toggle="tooltip" class="btn btn-success btn-sm"><i class="md md-mode-edit"></i></a>
                                                <a href="salonss.php?id=<?php echo $row['sid'] ?>"  target="_blank" title="Preview" data-toggle="tooltip" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
                                                <a href="show-salon.php?delete=<?php echo $row['sid'] ?>" title="delete" data-toggle="tooltip" onclick="return confirm('Are you sure to delete this?');" class="btn btn-danger btn-sm"><i class="md md-close"></i></a>
                                            </div>
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
                                
                            </div> <!-- end col -->
   
<?php
}
?>
                            
                            <div class="col-xs-7 col-sm-2 col-md-2 col-lg-2">
                                <a href="add-salon.php" data-toggle="tooltip" title="Add Salon">
                                    <div class="widget-bg-color-icon card-box text-center">
                                    <div class="bg-icon bg-icon-success waves-effect waves-light">
                                        <i class="glyphicon glyphicon-plus-sign text-success"></i>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                    <div class="text-center">
                                        <br>
                                        <b class="text-muted">Add Salon</b>
                                    </div>
                                </div>
                                </a>
                            </div>
                           
<?php
}
else {
    ?>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="card-box">
                                    <div class="contact-card">
                                        <p class="pull-left" href="#">
                                            <img class="img-circle" src="assets\images\users\avatar-11.png" alt="">
                                        </p>
                                        <div class="member-info">
                                            <h4 class="m-t-0 m-b-5 header-title"><b>EMPTY NO SALON</b></h4>
                                           <p class="text-muted"><i class="md md-local-phone m-r-10"></i>nAn</p>
                                            <p class="text-muted"><i class="md md-mail m-r-10"></i>nAn</p>
                                            <p class="text-muted"><i class="md md-location-on m-r-10"></i>nAn</p>
                                         <p class="text-dark"><i class="md md-store m-r-10"></i><b>nAn</b></p>
                         
                                           
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
                                
                            </div> <!-- end col -->

                             <div class="col-xs-7 col-sm-2 col-md-2 col-lg-2">
                                <a href="add-salon.php" data-toggle="tooltip" title="Add Salon">
                                    <div class="widget-bg-color-icon card-box text-center">
                                    <div class="bg-icon bg-icon-success waves-effect waves-light">
                                        <i class="glyphicon glyphicon-plus-sign text-success"></i>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                    <div class="text-center">
                                        <br>
                                        <b class="text-muted">Add Salon</b>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <?php
}
mysqli_close($conn);
?>


                        </div> <!-- end row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->
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

        <?php
  include('dbconfig.php');

  if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $sql = "SELECT * FROM salon WHERE sid = ".$id;
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $sql = "DELETE FROM salon WHERE sid=".$id;
            $sql1 = "DELETE FROM manager_salon WHERE sid=".$id;
            if(mysqli_query($conn, $sql)){
                 echo ("<script>location.href = 'show-salon.php';</script>");
            }
            if(mysqli_query($conn, $sql1)){
                 echo ("<script>location.href = 'show-salon.php';</script>");
            }
        }
    }
?>

        <?php
  include('dbconfig.php');

  if(isset($_GET['approve'])){
        $id = $_GET['approve'];
        $sql = "SELECT * FROM salon WHERE sid = ".$id;
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $sql = "UPDATE salon SET status_salon = 1 WHERE sid=".$id;
            if(mysqli_query($conn, $sql)){
                 echo ("<script>location.href = 'show-salon.php';</script>");
            } 
        }
    }
?>

        <?php
  include('dbconfig.php');

  if(isset($_GET['disable'])){
        $id = $_GET['disable'];
        $sql = "SELECT * FROM salon WHERE sid = ".$id;
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $sql = "UPDATE salon SET status_salon = 0 WHERE sid=".$id;
            if(mysqli_query($conn, $sql)){
                 echo ("<script>location.href = 'show-salon.php';</script>");
            } 
        }
    }
?>

<?php include 'inc/adminfooter.php'; ?>