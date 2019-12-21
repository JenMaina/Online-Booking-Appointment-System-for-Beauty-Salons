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
                                    <li class="active">Show Staff</li>
                                </ol>
                            </div>
                        </div>
                        
                        <div class="row">
                            <?php
include 'dbconfig.php';
$upload_dir = 'uploads/';
$sid=$_SESSION['sidd'];
$sql="SELECT * FROM staff WHERE sid = '$sid' order by stfid ASC";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0) {
while($row = mysqli_fetch_array($result)) {
?>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="card-box">
                                    <div class="contact-card">
                                        <p class="pull-left" href="#">
                                            <img class="img-circle" src="<?php echo $upload_dir.$row['image'] ?>" alt="">
                                        </p>
                                        <div class="member-info">
                                            <h4 class="m-t-0 m-b-5 header-title text-danger"><b><?php echo  $row['name']  ?></b></h4>
                                            <p class="text-muted"><i class="md md-local-phone m-r-10"></i><?php echo  $row['contact']  ?></p>
                                            <p class="text-dark"><i class="md md-location-on m-r-10"></i><small><?php echo  $row['address']  ?></small></p>
                                            <div class="contact-action">
                                                <a href="assign-staff.php?id=<?php echo $row['stfid'] ?>" title="assign time" data-toggle="tooltip" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-import"></i></a>
                                                <a href="staff-schedule.php?id=<?php echo $row['stfid'] ?>" title="view schedule" data-toggle="tooltip" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-calendar"></i></a><br><br>
                                                <a href="assign-service.php?id=<?php echo $row['stfid'] ?>" title="assign service" data-toggle="tooltip" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-share-alt"></i></a>
                                                <a href="staff-service.php?id=<?php echo $row['stfid'] ?>" title="view service skill" data-toggle="tooltip" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-th"></i></a><br><br>
                                                <a href="edit-staff.php?id=<?php echo $row['stfid'] ?>" title="edit" data-toggle="tooltip" class="btn btn-success btn-sm"><i class="md md-mode-edit"></i></a>
                                                <a href="show-staff.php?delete=<?php echo $row['stfid'] ?>" title="delete" data-toggle="tooltip" onclick="return confirm('Are you sure to delete this?');" class="btn btn-danger btn-sm"><i class="md md-close"></i></a>
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
                                <a href="add-staff.php" data-toggle="tooltip" title="Add Staff">
                                    <div class="widget-bg-color-icon card-box text-center">
                                    <div class="bg-icon bg-icon-success waves-effect waves-light">
                                        <i class="glyphicon glyphicon-plus-sign text-success"></i>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                    <div class="text-center">
                                        <br>
                                        <b class="text-muted">Add Staff</b>
                                    </div>
                                </div>
                                </a>
                            </div>
                           
<?php
}
else {
    ?>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="card-box">
                                    <div class="contact-card">
                                        <p class="pull-left" href="#">
                                            <img class="img-circle" src="assets\images\users\avatar-11.png" alt="">
                                        </p>
                                        <div class="member-info">
                                            <h4 class="m-t-0 m-b-5 header-title"><b>EMPTY NO STAFF</b></h4>
                                            <p class="text-muted">nAn</p>
                                            <p class="text-dark"><i class="md md-business m-r-10"></i><small>nAn</small></p>
                         
                                           
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
                                <a href="add-staff.php" data-toggle="tooltip" title="Add Staff">
                                    <div class="widget-bg-color-icon card-box text-center">
                                    <div class="bg-icon bg-icon-success waves-effect waves-light">
                                        <i class="glyphicon glyphicon-plus-sign text-success"></i>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                    <div class="text-center">
                                        <br>
                                        <b class="text-muted">Add Staff</b>
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