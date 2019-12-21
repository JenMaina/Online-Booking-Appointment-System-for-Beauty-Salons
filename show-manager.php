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
                                    <li class="active">Show Manager</li>
                                </ol>
                            </div>
                        </div>
                        
                        <div class="row">
                            <?php
include 'dbconfig.php';
$upload_dir = 'uploads/';
$sql="SELECT t1.*, t2.sname FROM manager t1 LEFT JOIN salon t2 ON t1.mid = t2.mid ORDER BY mid ASC";
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
                                            <h4 class="m-t-0 m-b-5 header-title text-info"><b><?php echo  $row['name']  ?></b></h4>
                                            <p class="text-muted"><i class="md md-local-phone m-r-10"></i><?php echo  $row['contact']  ?></p>
                                            <p class="text-muted"><i class="md md-mail m-r-10"></i><?php echo  $row['email']  ?></p>
                                            <p class="text-muted"><i class="md md-location-on m-r-10"></i><?php echo  $row['address']  ?></p>
                                                <?php
                                                if ($row['sname']!=null) {
                                                ?>
                                         <p class="text-muted"><i class="md md-store m-r-10"></i><b class="text-success"><?php echo  $row['sname']  ?></b></p>
                                                <?php
                                                }else{
                                                    ?>
                                          <p class="text-muted"><i class="md md-store m-r-10"></i><b class="text-danger">Not Assign Yet</b></p>      
                                                    <?php
                                                }
                                                ?>
                                            <div class="contact-action">
                                                <?php
                                                if ($row['sname']!=null) {
                                                    ?>
                                                    <a href="show-manager.php?remove=<?php echo $row['mid'] ?>" title="remove manager to salon" data-toggle="tooltip"  onclick="return confirm('Are you sure you want to remove manager to that salon?');" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-export"></i></a>
                                                    <?php
                                                }
                                                else{
                                                   ?>
                                                    <a href="assign-manager.php?id=<?php echo $row['mid'] ?>" title="assign" data-toggle="tooltip" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-import"></i></a>
                                                   <?php
                                                }
                                                ?>
                                               
                                                
                                                <a href="edit-manager.php?id=<?php echo $row['mid'] ?>" title="edit" data-toggle="tooltip" class="btn btn-success btn-sm"><i class="md md-mode-edit"></i></a>
                                                <a href="show-manager.php?delete=<?php echo $row['mid'] ?>" title="delete" data-toggle="tooltip" onclick="return confirm('Are you sure to delete this?');" class="btn btn-danger btn-sm"><i class="md md-close"></i></a>
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
                                <a href="add-manager.php" data-toggle="tooltip" title="Add Manager">
                                    <div class="widget-bg-color-icon card-box text-center">
                                    <div class="bg-icon bg-icon-success waves-effect waves-light">
                                        <i class="glyphicon glyphicon-plus-sign text-success"></i>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                    <div class="text-center">
                                        <br>
                                        <b class="text-muted">Add Manager</b>
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
                                            <h4 class="m-t-0 m-b-5 header-title"><b>EMPTY NO MANAGER</b></h4>
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
                                <a href="add-manager.php" data-toggle="tooltip" title="Add Manager">
                                    <div class="widget-bg-color-icon card-box text-center">
                                    <div class="bg-icon bg-icon-success waves-effect waves-light">
                                        <i class="glyphicon glyphicon-plus-sign text-success"></i>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                    <div class="text-center">
                                        <br>
                                        <b class="text-muted">Add Manager</b>
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
        $sql = "SELECT * FROM manager WHERE mid = ".$id;
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $sql = "DELETE FROM manager WHERE mid=".$id;
            $sql1 = "DELETE FROM manager_salon WHERE mid=".$id;
            if(mysqli_query($conn, $sql)){
                 echo ("<script>location.href = 'show-manager.php';</script>");
            }
            if(mysqli_query($conn, $sql1)){
                 echo ("<script>location.href = 'show-manager.php';</script>");
            }
        }
    }
?>


      <?php
  include('dbconfig.php');

  if(isset($_GET['remove'])){
        $id = $_GET['remove'];
        $sql = "SELECT * FROM manager WHERE mid = ".$id;
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $sql = "UPDATE salon SET mid = 0 WHERE mid=".$id;
            $sql1 = "DELETE FROM manager_salon WHERE mid=".$id;
            if(mysqli_query($conn, $sql)){
                 echo ("<script>location.href = 'show-manager.php';</script>");
            }
            if(mysqli_query($conn, $sql1)){
                 echo ("<script>location.href = 'show-manager.php';</script>");
            }
        }
    }
?>
    
<?php include 'inc/adminfooter.php'; ?>