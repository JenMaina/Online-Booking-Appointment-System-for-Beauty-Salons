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
<?php include 'inc/defheader.php'; ?>
<?php include "dbconfig.php"; ?>
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
                                     <li>Show Salon</li>
                                     <li>Add Salon</li>
                                 
                                </ol>
                               
                            </div>
                        </div>
                        
                        
                        
                        <div class="col-lg-12">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Add Salon</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                    Please fill up all the required fields.
	                                </p>
		                                        
									<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" data-parsley-validate="" novalidate="">
										<div class="form-group">
											<label for="sid">Salon ID <span class="text-danger">*</span></label>
											<input type="number" data-parsley-type="number" name="sid"  parsley-trigger="change" required="" placeholder="Enter Salon's ID" class="form-control" id="sid">
										</div>
										<div class="form-group">
											<label for="nos">Name of Salon <span class="text-danger">*</span></label>
											<input type="text" name="name" parsley-trigger="change" required="" placeholder="Enter Salon's name" class="form-control" id="nos">
                                        </div>
                                        <div class="form-group">
											<label for="addr">Address of Salon <span class="text-danger">*</span></label>
											<input type="text" name="address" parsley-trigger="change" required="" placeholder="Enter Salon's address" class="form-control" id="addr">
                                        </div>
                                        <div class="form-group">
											<label for="city">City of Salon <span class="text-danger">*</span></label>
											<input type="text" name="city" parsley-trigger="change" required="" placeholder="Enter Salon's City" class="form-control" id="city">
                                        </div>
                                        <div class="form-group">
											<label for="con">Contact No <span class="text-danger">*</span></label>
											<input type="text" name="contact" data-parsley-maxlength="11" data-parsley-type="number" parsley-trigger="change" required="" placeholder="Enter Salon's Contact No." class="form-control" id="con">
										</div>
										
										

										<div class="form-group text-right m-b-0">
											<button class="btn btn-primary waves-effect waves-light" type="submit" name="Submit" data-toggle="tooltip" title="Add">
												Add
											</button>
											
										</div>
										
                                    </form>
                                    <?php
function newsalon()
{
	include 'dbconfig.php';
		$sid=$_POST['sid'];
        $name=$_POST['name'];
        $address=$_POST['address'];
		$city=$_POST['city'];
		$contact=$_POST['contact'];
		
		$sql = "INSERT INTO salon (SID, sname, address, City, Contact, notif_status) VALUES ('$sid','$name','$address','$city','$contact', 2)";

	if (mysqli_query($conn, $sql)) 
	{
		echo "<h4>Salon created successfully!</h4>";
        echo ("<script>location.href = 'show-salon.php';</script>");
	} 
	else
	{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
function checkcid()
{
	include 'dbconfig.php';
	$sid=$_POST['sid'];
	$sql= "SELECT * FROM salon WHERE sid = '$sid'";

	$result=mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)!=0)
       {
			echo"<b><br>sid already exists!!";
       }
	else 
		if(isset($_POST['Submit']))
	{ 
		newsalon();
	}

	
}
if(isset($_POST['Submit']))
{
	if(!empty($_POST['sid'])&&!empty($_POST['name'])&&!empty($_POST['address'])&&!empty($_POST['city']) && !empty($_POST['contact']))
			checkcid();
	else
		echo "EMPTY VALUES NOT ALLOWED";
}

?>
								</div>
							</div>


                    </div> <!-- container -->
                               
                </div> <!-- content -->
<br><br><br><br>
<?php include 'inc/adminfooter.php'; ?>