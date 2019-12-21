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
<?php include 'inc/managerheaderdis.php'; ?>

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
                                    <li class="active">Assign Staff</li>
                                </ol>
                            </div>
                        </div>
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





                   
                        
                        <div class="col-lg-12">
                        <div class="card-box">
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
                                            
                        <form method="post" action="assign-staff.php?id=<?php echo $row1['stfid'] ?>"> 
                                            <h4 class="m-t-0 m-b-30 header-title"><b>Assign Staff to Salon</b></h4>
                                             
                                            <h5><b>Select Time Schedule for <img src="<?php echo $upload_dir.$row1['image'] ?>" class="img-circle thumb-sm"> <b class="text-danger"><?php echo  $row1['name']  ?></b></b></h5><br>


                                                <?php
include 'dbconfig.php';
$upload_dir = 'uploads/';
 $id = $_SESSION['stfid'];
$sql="SELECT * FROM staff_availability  WHERE stfid = '$id' ORDER BY fro";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0) {
while($row = mysqli_fetch_array($result)) {
    $timelists[] = $row['fro'];
}
}
else {
    $timelists[] = '';
}
mysqli_close($conn);
?>
                                            <div class="checkbox checkbox-success checkbox-info">
                                                    <input id="checkbox-15" type="checkbox" name="timelist[]"value="09:00:00" <?php echo (in_array("09:00:00", $timelists)?"disabled='disabled'":"") ?>>
                                                    <label for="checkbox-15">
                                                        09:00 AM - 10:00 AM 
                                                    </label>
                                            </div>
                                            <div class="checkbox checkbox-success checkbox-info">
                                                    <input id="checkbox-15" type="checkbox" name="timelist[]"value="10:00:00" <?php echo (in_array("10:00:00", $timelists)?"disabled='disabled'":"") ?>>
                                                    <label for="checkbox-15">
                                                        10:00 AM - 11:00 AM
                                                    </label>
                                            </div>
                                            <div class="checkbox checkbox-success checkbox-info">
                                                    <input id="checkbox-15" type="checkbox" name="timelist[]"value="11:00:00" <?php echo (in_array("11:00:00", $timelists)?"disabled='disabled'":"") ?>>
                                                    <label for="checkbox-15">
                                                        11:00 AM - 12:00 PM
                                                    </label>
                                            </div>
                                            <div class="checkbox checkbox-success checkbox-info">
                                                    <input id="checkbox-15" type="checkbox" name="timelist[]"value="12:00:00" <?php echo (in_array("12:00:00", $timelists)?"disabled='disabled'":"") ?>>
                                                    <label for="checkbox-15">
                                                        12:00 PM - 01:00 PM
                                                    </label>
                                            </div>
                                            <div class="checkbox checkbox-success checkbox-info">
                                                    <input id="checkbox-15" type="checkbox" name="timelist[]"value="13:00:00" <?php echo (in_array("13:00:00", $timelists)?"disabled='disabled'":"") ?>>
                                                    <label for="checkbox-15">
                                                        01:00 PM - 02:00 PM
                                                    </label>
                                            </div>
                                            <div class="checkbox checkbox-success checkbox-info">
                                                    <input id="checkbox-15" type="checkbox" name="timelist[]"value="14:00:00" <?php echo (in_array("14:00:00", $timelists)?"disabled='disabled'":"") ?>>
                                                    <label for="checkbox-15">
                                                        02:00 PM - 03:00 PM
                                                    </label>
                                            </div>
                                            <div class="checkbox checkbox-success checkbox-info">
                                                    <input id="checkbox-15" type="checkbox" name="timelist[]"value="15:00:00" <?php echo (in_array("15:00:00", $timelists)?"disabled='disabled'":"") ?>>
                                                    <label for="checkbox-15">
                                                        03:00 PM - 04:00 PM
                                                    </label>
                                            </div>
                                            <div class="checkbox checkbox-success checkbox-info">
                                                    <input id="checkbox-15" type="checkbox" name="timelist[]"value="16:00:00" <?php echo (in_array("16:00:00", $timelists)?"disabled='disabled'":"") ?>>
                                                    <label for="checkbox-15">
                                                        04:00 PM - 05:00 PM
                                                    </label>
                                            </div>
                                            <div class="checkbox checkbox-success checkbox-info">
                                                    <input id="checkbox-15" type="checkbox" name="timelist[]"value="17:00:00" <?php echo (in_array("17:00:00", $timelists)?"disabled='disabled'":"") ?>>
                                                    <label for="checkbox-15">
                                                        05:00 PM - 06:00 PM
                                                    </label>
                                            </div>
                                            

                                            <div class="form-group text-right m-b-0">
                                                <a href="staff-schedule.php?id=<?php echo $_SESSION['stfid']?>" class="btn btn-warning waves-effect waves-light" data-toggle="tooltip" title="View Schedule">View Schedule <span class="m-l-5"><i class="md md-backspace"></i></span></a>
                                            <button class="btn btn-default waves-effect waves-light" name="Submit" type="submit" data-toggle="tooltip" title="Assign">
                                                Assign
                                            </button>
                                            </form>
<?php
 function newtime()
{
        include 'dbconfig.php';
        $sid=$_SESSION['sidd'];
        $stfid=$_SESSION['stfid'];
        foreach($_POST['timelist'] as $fro)
        {
                $sql = "INSERT INTO staff_availability (sid, stfid, fro) VALUES ('$sid','$stfid','$fro')";
                if (mysqli_query($conn, $sql)) 
                {
                     echo "<h3>Record created successfully!!</h3>";
                     echo ("<script>location.href = 'staff-schedule.php?id=". $_SESSION['stfid']."';</script>");
                } 
                else
                {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
        }
       
}

?>

<?php
function checktime()
{
    include 'dbconfig.php';
    $stfid=$_SESSION['stfid'];
     foreach($_POST['timelist'] as $fro)
        {
    $sql= "SELECT stfid, fro FROM staff_availability WHERE stfid = '$stfid' AND fro = '$fro'";
    $result=mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)!=0)
        {
            echo"<b><br>".date('h:i A', strtotime($fro)). ' - ' . date('h:i A', strtotime($fro) + 60*60)." is Already in schedule!!";
            echo ("<script>setTimeout(function(){location.href = 'assign-staff.php?id=".$_SESSION['stfid']."'}, 2000);</script>");
        }
        else
        { 
            newtime();
        }
}
    
}


if(isset($_POST['Submit']))
{
            if(!empty($_SESSION['stfid']) && !empty($_POST['timelist'])){
            checktime();
            }
        else {
            echo ("<script>location.href = 'assign-staff.php?id=". $_SESSION['stfid']."';</script>");
        }
}
?>
                                        </div>
                                          

        </div>
                        
                          

                    </div> <!-- container -->
                               
                </div> <!-- content -->


                                               
<br><br><br><br>
<?php include 'inc/managerfooterdis.php'; ?>