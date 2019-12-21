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
                                    <li class="active">Assign Service Skill</li>
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
                                            
                        <form method="post" action="assign-service.php?id=<?php echo $row1['stfid'] ?>"> 
                                            <h4 class="m-t-0 m-b-30 header-title"><b>Assign Staff's Service Skill</b></h4>
                                             
                                            <h5><b>Select Serviec for <img src="<?php echo $upload_dir.$row1['image'] ?>" class="img-circle thumb-sm"> <b class="text-danger"><?php echo  $row1['name']  ?></b></b></h5><br>


                                                <?php
include 'dbconfig.php';
$upload_dir = 'uploads/';
$id = $_SESSION['stfid'];
$sql="SELECT * FROM staff_service  WHERE stfid = '$id' ORDER BY serid";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0) {
while($row = mysqli_fetch_array($result)) {
    $serid[] = $row['serid'];
}
}
else {
    $serid[] = '';
}
mysqli_close($conn);
?>



<?php 
include 'dbconfig.php';
$upload_dir = 'uploads/';
$sid = $_SESSION['sidd'];
$sql="SELECT * FROM service1  WHERE sid = '$sid' ORDER BY sername";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0) {
while($row = mysqli_fetch_array($result)) {
    ?>
    <div class="checkbox checkbox-success checkbox-info">
            <input id="checkbox-15" type="checkbox" name="serid[]"value="<?php echo $row['serid']; ?>" <?php echo (in_array($row['serid'], $serid)?"disabled='disabled'":"") ?>>
            <label for="checkbox-15">
               <img src="<?php echo $upload_dir.$row['image'] ?>" class="img-rounded thumb-sm">  <?php echo $row['sername']; ?>
            </label>
    </div>

    <?php

}
}else {
   
}
mysqli_close($conn);
?>


                                          
                                            
                                            

                                            <div class="form-group text-right m-b-0">
                                                <a href="staff-service.php?id=<?php echo $_SESSION['stfid']?>" class="btn btn-warning waves-effect waves-light" data-toggle="tooltip" title="View Service Skill">View Service Skill <span class="m-l-5"><i class="md md-backspace"></i></span></a>
                                            <button class="btn btn-default waves-effect waves-light" name="Submit" type="submit" data-toggle="tooltip" title="Assign">
                                                Assign
                                            </button>
                                            </form>
<?php
if(isset($_POST['Submit']))
{
        include 'dbconfig.php';
        $sid=$_SESSION['sidd'];
        $stfid=$_SESSION['stfid'];
        foreach($_POST['serid'] as $serid)
        {
                $sql = "INSERT INTO staff_service (sid, stfid, serid) VALUES ('$sid','$stfid','$serid')";
                if (mysqli_query($conn, $sql)) 
                {
                     echo "<h3>Record created successfully!!</h3>";
                     echo ("<script>location.href = 'staff-service.php?id=". $_SESSION['stfid']."';</script>");
                } 
                else
                {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
        }
       
}

?>

                                        </div>
                                          

        </div>
                        
                          

                    </div> <!-- container -->
                               
                </div> <!-- content -->


                                               
<br><br><br><br>
<?php include 'inc/managerfooterdis.php'; ?>