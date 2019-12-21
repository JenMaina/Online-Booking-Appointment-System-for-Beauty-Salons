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
<?php include "inc/defheader.php"; ?>

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
                                    <li class="active">Add Service</li>
                                </ol>
                            </div>
                        </div>
                        
                        
                       <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Add Service</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                        Please fill up all the required fields.
                                    </p>
                                                <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                      <div class="form-group">
                                                    <label for="sername">Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="sername" class="form-control" required="" id="sername" placeholder="Enter Service Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="rate">&#8369; Rate <span class="text-danger">*</span></label>
                                                    <input type="number" name="rate" class="form-control" required="" id="rate" placeholder="Enter Service Rate (e.g. '199.00')">
                                                </div>

                                                <label>Duration Hrs/Mins<span class="text-danger">*</span></label>
                                                <div class="input-group m-b-15">

                                                    <div class="bootstrap-timepicker">
                                                        <input id="timepicker2" type="text" class="form-control" name="duration" value="00:00 ">
                                                    </div>
                                                    <span class="input-group-addon bg-custom b-0 text-white"><i class="glyphicon glyphicon-time"></i></span>
                                                </div>
              
                                <div class="form-group m-t-20">
                                                        <label>Description <span class="text-danger">*</span></label>
                                                        <textarea class="form-control" required="" rows="5" placeholder="Please enter description" name="descrip"></textarea>
                                                    </div><br><br>
                                <button type="submit" name="Submit" class="btn btn-default waves-effect waves-light btn-md pull-right" data-toggle="tooltip" title="Add"> 
                                                    Add
                                                </button>
                                </div>

                                                
                                      
                                                                            
                                           
    </form>

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
function newservice()
{
    include 'dbconfig.php';
        $sername=$_POST['sername'];
        $rate=$_POST['rate'];
        $duration=$_POST['duration'];
        $descrip=$_POST['descrip'];
        $sid=$_SESSION['sidd'];
        
        $sql = "INSERT INTO service1 (sername, rate, duration, descrip, sid) VALUES ('$sername','$rate','$duration', '$descrip', '$sid')";

    if (mysqli_query($conn, $sql)) 
    {
        echo "<h4>Service created successfully!</h4>";

    } 
    else
    {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

if(isset($_POST['Submit']))
{
    if(!empty($_POST['sername'])&&!empty($_POST['rate'])&&!empty($_POST['duration']))
           newservice();
    else
        echo "EMPTY VALUES NOT ALLOWED";
}

?>
    


                    </div> <!-- container -->
                               
                </div> <!-- content -->
<br><br><br><br>
<?php include 'inc/managerfooter.php'; ?>