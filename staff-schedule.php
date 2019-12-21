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
                                    <li class="active">Staff Schedule</li>
                                </ol>
                            </div>
                        </div>
                                         <?php
                                              include 'dbconfig.php';
                                              $upload_dir = 'uploads/';

                                              if (isset($_GET['id'])) {
                                                $id = $_GET['id'];
                                                $sql = "SELECT * FROM staff WHERE stfid='$id'";
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                  $row1 = mysqli_fetch_assoc($result);
                                                  $_SESSION['stfid']=$row1['stfid'];
                                                }else {
                                                  $errorMsg = 'Could not Find Any Record';
                                                }
                                              }

                                            ?>

                        <div class="card-box">
                        <div class="table-responsive">
                            <h4>Time Schedule for <img src="<?php echo $upload_dir.$row1['image'] ?>" class="img-circle thumb-sm"> <b class="text-danger"><?php echo  $row1['name']  ?></b></h4>
                        
                        <?php
include 'dbconfig.php';
$upload_dir = 'uploads/';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
$sql="SELECT t1.*, t2.name, t2.image FROM staff_availability t1 LEFT JOIN staff t2 ON t1.stfid = t2.stfid  WHERE t1.stfid = '$id' ORDER BY fro ASC";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0) {
echo '<table class="table table-striped">
<tr>
<th><i class="glyphicon glyphicon-arrow-left"></i> From</th>
<th><i class="glyphicon glyphicon-arrow-right"></i> To</th>


<th><i class="md md-settings"></i> Actions</th>

</tr>';
while($row = mysqli_fetch_array($result)) {
?>
    <tr>    
    <td><?php echo date('h:i A', strtotime($row['fro'])) ?></td>
    <td><?php echo date('h:i A', strtotime($row['fro']) + 60*60) ?></td>
    <td>
     <a href="staff-schedule.php?delete=<?php echo $row['timeid'] ?>" title="Remove Schedule" data-toggle="tooltip" onclick="return confirm('Are you sure to delete this record?')"><span class="glyphicon glyphicon-trash text-danger" style="font-size: 150%;"></span></a>
     </td>
    </tr>

<?php
}
}
else {
    echo "<td>No Results Found</td>";
}
}
echo '</table>';
mysqli_close($conn);
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
    <br><br><br><br>
        <script>
            var resizefunc = [];
        </script>

        <?php
  include('dbconfig.php');

  if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $sql = "SELECT * FROM staff_availability WHERE timeid = '$id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $sql = "DELETE FROM staff_availability WHERE timeid='$id'";
            if(mysqli_query($conn, $sql)){
                 echo ("<script>location.href = 'staff-schedule.php?id=". $_SESSION['stfid']."';</script>");
            }
        }
    }
?>

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
        
        <script src="assets/plugins/moment/moment.js"></script>
        <script src="assets/plugins/timepicker/bootstrap-timepicker.js"></script>
        <script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
        <script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        
        <script src="assets/pages/jquery.form-pickers.init.js"></script>
        <script type="text/javascript" src="assets/plugins/parsleyjs/parsley.min.js"></script>
        
        
        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
            });
        </script>
	</body>
</html>