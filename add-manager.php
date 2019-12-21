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
                                     <li>Show Manager</li>
                                     <li>Add Manager</li>
                                </ol>
                            </div>
                        </div>
                        
                        
                        <div class="col-lg-12">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Add Manager </b></h4>
									<p class="text-muted font-13 m-b-30">
	                                    Please fill up the required fields!
	                                </p>
		                                        
									<form data-parsley-validate="" novalidate="" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
										<div class="form-group">
											<label for="mid">Manager ID <span class="text-danger">*</span></label>
											<input type="number" name="mid" parsley-trigger="change" required="" placeholder="Enter Manager's ID" class="form-control" id="mid">
										</div>
										<div class="form-group">
											<label for="nom">Name of Manager <span class="text-danger">*</span></label>
											<input type="text" name="name" parsley-trigger="change" required="" placeholder="Enter Manager's name" class="form-control" id="nom">
                                        </div>

                                        <h5 class="text-left"><b>Date of Birth <span class="text-danger">*</span></b> </h5>
                                                 <div class="form-group">
			                                				<div class="input-group">
                                                          
																<input type="text" name="dob" class="form-control" required="" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                                                                <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span> 
                                                          </div>
			                                			
                                                    </div>
                                                    
                                                    <h5 class="text-left"><strong>Sex <span class="text-danger">*</span></strong> </h5>
                      
                        <div class="radio radio-custom radio-inline">
                                <input type="radio" name="gender" id="radio1" value="male" required="">
                                <label for="radio1">
                                    Male
                                </label>
                            </div>
                        
                            <div class="radio radio-custom radio-inline">
                                    <input type="radio" name="gender" id="radio2" value="female" required="">
                                    <label for="radio2">
                                        Female
                                    </label>
                                </div>

                               

                                    <br>                                  
                                    <br>
                                        <div class="form-group">
											<label for="addr">Address of Manager <span class="text-danger">*</span></label>
											<input type="text" parsley-trigger="change" name="address" required="" placeholder="Enter Manager's address" class="form-control" id="addr">
                                        </div>
                                        <div class="form-group">
											<label for="citym">City of Manager <span class="text-danger">*</span></label>
											<input type="text"  parsley-trigger="change" name="city" required="" placeholder="Enter City address" class="form-control" id="city">
                                        </div>
                                        <div class="form-group">
											<label for="con">Contact No <span class="text-danger">*</span></label>
											<input type="text" data-parsley-type="number" name="contact" data-parsley-maxlength="11" parsley-trigger="change" required="" placeholder="Enter Manager's Contact No." class="form-control" id="con">
										</div>
                                        <div class="form-group">
											<label for="usr">Username <span class="text-danger">*</span></label>
											<input type="text" name="username" parsley-trigger="change" required="" placeholder="Enter Manager's Username" class="form-control" id="usr">
										</div>
                                        <div class="form-group">
                                            <label for="email">Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" parsley-trigger="change" required="" placeholder="Enter Manager's Email" class="form-control" id="email">
                                        </div>
                                        <div class="form-group">
											<label for="pass">Password <span class="text-danger">*</span></label>
											<input type="password" name="pwd" parsley-trigger="change" required="" placeholder="Enter Manager's Password" class="form-control" id="p1">
										</div>
                                        <div class="form-group">
											<label for="pass1">Re-enter Passowrd <span class="text-danger">*</span></label>
											<input type="password"  parsley-trigger="change" required="" data-parsley-equalto="#p1" placeholder="Re-Type Password" class="form-control" id="pass1">
										</div>
										
										

										<div class="form-group text-right m-b-0">
											<button class="btn btn-primary waves-effect waves-light" name="Submit" type="submit" data-toggle="tooltip" title="Add">
												Add
											</button>
											
										</div>
										
									</form>
								</div>
							</div>
 <?php
function newUser()
{
    include 'dbconfig.php';
        $mid=$_POST['mid'];
        $name=$_POST['name'];
        $gender=$_POST['gender'];
        $dob=$_POST['dob'];
        $contact=$_POST['contact'];
        $address=$_POST['address'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['pwd'];
        $city=$_POST['city'];
        $sql = "INSERT INTO manager (MID, Name, Gender, DOB,Contact, Address, Username, email, Password, city) VALUES ('$mid','$name','$gender','$dob','$contact','$address','$username', '$email', '$password','$city') ";

    if (mysqli_query($conn, $sql)) 
    {
        echo "<h4>Record created successfully!</h4>";
        echo ("<script>location.href = 'show-manager.php';</script>");

    } 
    else
    {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
function checkmid()
{
    include 'dbconfig.php';
    $mid=$_POST['mid'];
    $sql= "SELECT * FROM manager WHERE MID = '$mid'";

    $result=mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)!=0)
       {
            echo"<b><br>MID already exists!!";
       }
    else 
        if(isset($_POST['Submit']))
    { 
        newUser();
    }

    
}
function checkusername()
{
    include 'dbconfig.php';
    $usn=$_POST['username'];
    $email=$_POST['email'];
    $sql= "SELECT * FROM manager WHERE Username = '$usn'";
    $sql1= "SELECT * FROM manager WHERE email = '$email'";
    $result=mysqli_query($conn,$sql);
    $result1=mysqli_query($conn,$sql1);

        if(mysqli_num_rows($result)!=0)
       {
            echo"<b><br>Username already exists!!";
            
       }
       else if (mysqli_num_rows($result1)!=0)
       {
            echo"<b><br>Email already exists!!";
       }
    else if(isset($_POST['Submit']))
    { 
        checkmid();
    }

    
}
if(isset($_POST['Submit']))
{
    if(!empty($_POST['mid'])&& !empty($_POST['city']) && !empty($_POST['username']) && !empty($_POST['pwd']) &&!empty($_POST['name']) &&!empty($_POST['dob'])&& !empty($_POST['gender']) &&!empty($_POST['address']) && !empty($_POST['contact']))
        checkusername();
    else
        echo "EMPTY VALUES NOT ALLOWED";
}

?>

                    </div> <!-- container -->
                               
                </div> <!-- content -->
               
<br><br><br><br>
<?php include 'inc/adminfooter.php'; ?>