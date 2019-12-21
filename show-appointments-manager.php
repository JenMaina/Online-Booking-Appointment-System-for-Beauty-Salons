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

<?php include 'inc/headerdatatable.php'; ?>


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
       
            <!-- Left Sidebar End --> 



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
                                    <li class="active">Appointments</li>
                                </ol>
                            </div>
                        </div>
                        
                        


                        <div class="col-lg-12">
                                <div class="card-box">
                                                <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                                
                                      <div class="table-responsive">
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
 <?php     
        include 'dbconfig.php';
        $upload_dir = 'uploads/';
        $sid=$_SESSION['sidd'];
        $sql1 = "SELECT * FROM book LEFT JOIN staff ON book.stfid = staff.stfid WHERE book.sid= '$sid'";
         $results1=$conn->query($sql1); 
            
?>       

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                <th class="text-custom"><i class="md md-format-list-numbered"></i> AID</th>
                                <th class="text-custom"><i class="md md-person"></i> Full Name</th>
                                <th class="text-custom"><i class="md md-account-circle"></i> User Name</th>
                                <th class="text-custom"><i class="glyphicon glyphicon-calendar"></i> Date Created</th>
                                <th class="text-custom"><i class="wi wi-sunrise"></i> Date of Visit</th>
                                <th class="text-custom"><i class="md md-schedule"></i> Time</th>
                                <th class="text-custom"><i class="md md-account-circle"></i> Staff</th>
                                <th class="text-custom"><i class="md md-assignment"></i> Service</th>
                                <th class="text-custom"><i class=""></i>&#8369; Rate</th>
                                <th class="text-custom"><i class="md md-edit"></i> Status</th>
                                <th class="text-custom"><i class="md md-settings"></i> Actions</th>
                                </tr>
                                </thead>


                                <tbody>
                                    <?php
            while($rs1=$results1->fetch_assoc())
            {
                 $_SESSION['usn'] = $rs1['username'];


                                                $username=$_SESSION['usn'];
                                                $sql="SELECT * FROM customer WHERE username = '$username'";
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                  $row = mysqli_fetch_assoc($result);
                                                }else {
                                                  $errorMsg = 'Could not Find Any Record';
                                                }
                ?>

                     <tr>
                     <td><?php echo $rs1['aid'] ?></td>
                     <td><img src="<?php echo $upload_dir.$row['image'] ?>" class="img-circle thumb-sm"> <?php echo $rs1['fname'] ?></td>                    
                     <td><?php echo $rs1['username'] ?></td>
                     <td><?php echo date('Y/m/d h:i A', strtotime($rs1['datecreated'])); ?></td>
                     <td><?php echo $rs1['dov'] ?></td>
                     <td><?php echo date('h:i A', strtotime($rs1['tym']));  ?></td>
                     <td><img src="<?php echo $upload_dir.$rs1['image'] ?>" class="img-circle thumb-sm"> <?php echo $rs1['name'] ?></td>
                     <td><img src="<?php echo $upload_dir.$rs1['simage'] ?>" class="img-rounded thumb-sm"> <?php echo $rs1['sername'] ?></td>
                     <td>&#8369;<?php echo $rs1['rate'] ?></td>
                     <td><?php echo $rs1["status"]; ?></td>
                   <td><a href="show-appointments-manager.php?delete=<?php echo $rs1['aid'] ?>" title="Delete Appointment" data-toggle="tooltip" onclick="return confirm('Are you sure to delete this Appointment?')"><span class="glyphicon glyphicon-trash text-danger" style="font-size: 150%;"></span></a></td>
                    </tr>
                                              <?php
            }
?>
                            
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                                   
    </form>
    </div>
    </div>

    

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
        $sql = "SELECT * FROM book WHERE aid = ".$id;
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $sql = "DELETE FROM book WHERE aid=".$id;
            if(mysqli_query($conn, $sql)){
                 $sql = "DELETE FROM revenue_salon WHERE aid=".$id;
                    if(mysqli_query($conn, $sql)){
                 echo ("<script>location.href = 'show-appointments-manager.php';</script>");
            }
            }
        }
    }
?>
    
<?php include 'inc/footerdatatable.php'; ?>