<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">

		<link rel="shortcut icon" href="assets/icon.png">

		<title>Online Appointment Beauty Salons System</title>

		<link href="assets/plugins/ladda-buttons/css/ladda-themeless.min.css" rel="stylesheet" type="text/css" />

        <link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
		<link href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
		<link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
		<link href="assets/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
		<link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

		<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>

	</head>
	<?php include "dbconfig.php"; ?>
    <?php 
if(!isset($_SESSION)){
    session_start();
}

    ?>
    <?php
function newUser()
{
		include 'dbconfig.php';
		$name=$_POST['fname'];
		$gender=$_POST['gender'];
		$address=$_POST['address'];
		$dob=$_POST['dob'];
		$contact=$_POST['contact'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['pwd'];
		$prepeat=$_POST['pwdr'];
		$sql = "INSERT INTO manager (name, gender, address, dob, contact, email, username, password) VALUES ('$name','$gender', '$address', '$dob','$contact','$email','$username','$password') ";

	if (mysqli_query($conn, $sql)) 
	{
		echo "<h4>Record created successfully! Loading...</h4>";
		echo ("<script>location.href = 'manager-login.php';</script>");
		// exit;

	} 
	else
	{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
function checkusername()
{
	include 'dbconfig.php';
	$username=$_POST['username'];
	$email=$_POST['email'];
	$sql= "SELECT * FROM manager WHERE username = '$username'";
	$sql1= "SELECT * FROM manager WHERE email = '$email'";
	$result=mysqli_query($conn,$sql);
	$result1=mysqli_query($conn,$sql1);

		if(mysqli_num_rows($result)!=0)
		{
			echo"<b><br>Username already exists!!";
		}
		else if(mysqli_num_rows($result1)!=0)
		{
			echo"<b><br>Email already exists!!";
		}
		else if($_POST['pwd']!=$_POST['pwdr'])
		{
			echo"Passwords dont match";
		}
		else if(isset($_POST['signup']))
		{ 
			newUser();
		}

	
}

if(isset($_POST['signup']))
{
	if(!empty($_POST['username']) && !empty($_POST['pwd']) &&!empty($_POST['fname']) &&!empty($_POST['dob'])&& !empty($_POST['gender']) &&!empty($_POST['email']) && !empty($_POST['contact']))
			checkusername();
}
?>
	<body>

		<div class="account-pages"></div>
		<div class="clearfix"></div>
		<div class="wrapper-page">
			<div class=" card-box">
                    <a href="javascript:history.back()">
                            <button class="btn btn-icon waves-effect waves-light btn-danger pull-right"> <i class="fa fa-remove"></i> </button>
                           </a>
				<div class="panel-heading">
                    <br>
					<h3 class="text-center"> Sign Up as <strong class="text-custom">Manager</strong> </h3>
				</div>

				<div class="panel-body">
					<!-- <form class="form-horizontal m-t-20" action="index.php"> -->
                            <form class="form-horizontal m-t-20" action="page-register-manager.php" method="post">
                        <h5 class="text-left"><strong class="text-custom">Full Name <span class="text-danger">*</span></strong> </h5>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="fname" required="" placeholder="Enter Full Name">
                            </div>
                        </div>
                        
                        <h5 class="text-left"><strong class="text-custom">Date of Birth <span class="text-danger">*</span></strong> </h5>
                        <div class="form-group">
			                                	
			                                			<div class="col-xs-12">
			                                				<div class="input-group">
																<input type="text" name="dob" class="form-control" required="" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                                                                <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span> 
															</div><!-- input-group -->
			                                			</div>
			                                		</div>
                                                   
										
                            <h5 class="text-left"><strong class="text-custom">Contact No. <span class="text-danger">*</span></strong> </h5>
                            <div class="form-group ">
                            <div class="col-xs-12">
                                    <input type="text" class="form-control" name="contact" required="" data-parsley-maxlength="11" data-parsley-type="number" placeholder="e.g. 09123456789">
                                </div>
                            </div>
                        <h5 class="text-left"><strong class="text-custom">Gender <span class="text-danger">*</span></strong> </h5>
                      
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
                         <h5 class="text-left"><strong class="text-custom">Address <span class="text-danger">*</span></strong> </h5>
						<div class="form-group ">
							<div class="col-xs-12">
								<input class="form-control" type="text" name="address" required="" placeholder="Address">
							</div>
						</div>
                        <h5 class="text-left"><strong class="text-custom">Email <span class="text-danger">*</span></strong> </h5>
						<div class="form-group ">
							<div class="col-xs-12">
								<input class="form-control" type="email" name="email" parsley-type="email" required="" placeholder="Email">
							</div>
						</div>
                        <h5 class="text-left"><strong class="text-custom">Username <span class="text-danger">*</span></strong> </h5>
						<div class="form-group ">
							<div class="col-xs-12">
								<input class="form-control" type="text" name="username" required="" placeholder="Username">
							</div>
						</div>
                     
							<h5 class="text-left"><strong class="text-custom">Password <span class="text-danger">*</span></strong> </h5>
							<div class="form-group">

													<div class="col-xs-12">
														<input type="password" id="p1" name="pwd" class="form-control" required="" placeholder="Password">
													</div>
													<h5 class="text-left"><strong class="text-custom">Re-enter Password <span class="text-danger">*</span></strong> </h5>
													<div class="col-xs-12">
														<input type="password" id="p2" name="pwdr" class="form-control" required="" data-parsley-equalto="#p1" placeholder="Re-Type Password">
													</div>
												</div>
						<div class="form-group">
							<div class="col-xs-12">
								<div class="checkbox checkbox-primary">
									<input id="checkbox-signup" type="checkbox" checked="checked">
									<label for="checkbox-signup">I accept <a href="modal-view-tac.php" data-toggle="modal" data-target="#con-close-modal">Terms and Conditions</a></label>
								</div>
							</div>
						</div>

						<div class="form-group text-center m-t-40">
							<div class="col-xs-12">
								<button class="btn btn-pink btn-block text-uppercase waves-effect waves-light ladda-button btn btn-primary" data-style="expand-left" name="signup" type="submit">
									Register
								</button>
							</div>
						</div>

					</form>

				</div>
			</div>

			<div class="row">
				<div class="col-sm-12 text-center">
					<p>
						Already have account?<a href="manager-login.php" class="text-primary m-l-5"><b>Sign In</b></a>
					</p>
				</div>
			</div>

		</div>


		<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog"> 

                                            <div class="modal-content">
                                            	<a href="" type="button" class="close" data-toggle="tooltip" title="Close">×</a>
<h1>Terms and Conditions ("Terms")</h1>
<p>Last updated: November 17, 2019</p>


<p>Please read these Terms and Conditions ("Terms", "Terms and Conditions") carefully before using the https://onlinebeautysalonslingayen.000webhostapp.com/ website (the "Service") operated by Online Appointment Beauty Salons System ("us", "we", or "our").</p>

<p>Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.</p>

<p>By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service.</p>


<h2>Accounts</h2>

<p>When you create an account with us, you must provide us information that is accurate, complete, and current at all times. Failure to do so constitutes a breach of the Terms, which may result in immediate termination of your account on our Service.</p>

<p>You are responsible for safeguarding the password that you use to access the Service and for any activities or actions under your password, whether your password is with our Service or a third-party service.</p>

<p>You agree not to disclose your password to any third party. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.</p>


<h2>Links To Other Web Sites</h2>

<p>Our Service may contain links to third-party web sites or services that are not owned or controlled by Online Appointment Beauty Salons System.</p>

<p>Online Appointment Beauty Salons System has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that Online Appointment Beauty Salons System shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</p>

<p>We strongly advise you to read the terms and conditions and privacy policies of any third-party web sites or services that you visit.</p>


<h2>Termination</h2>

<p>We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>

<p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>

<p>We may terminate or suspend your account immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>

<p>Upon termination, your right to use the Service will immediately cease. If you wish to terminate your account, you may simply discontinue using the Service.</p>

<p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>


<h2>Governing Law</h2>

<p>These Terms shall be governed and construed in accordance with the laws of Philippines, without regard to its conflict of law provisions.</p>

<p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.</p>


<h2>Changes</h2>

<p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>

<p>By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.</p>


<h2>Contact Us</h2>

<p>If you have any questions about these Terms, please contact us.</p>
                                            </div> 
                                        </div>
                                    </div><!-- /.modal -->


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

		<script src="assets/plugins/ladda-buttons/js/spin.min.js"></script>
        <script src="assets/plugins/ladda-buttons/js/ladda.min.js"></script>
        <script src="assets/plugins/ladda-buttons/js/ladda.jquery.min.js"></script>

        <script>

            $(document).ready(function () {

                // Bind normal buttons
                $('.ladda-button').ladda('bind', {timeout: 2000});

                // Bind progress buttons and simulate loading progress
                Ladda.bind('.progress-demo .ladda-button', {
                    callback: function (instance) {
                        var progress = 0;
                        var interval = setInterval(function () {
                            progress = Math.min(progress + Math.random() * 0.1, 1);
                            instance.setProgress(progress);

                            if (progress === 1) {
                                instance.stop();
                                clearInterval(interval);
                            }
                        }, 200);
                    }
                });


                var l = $('.ladda-button-demo').ladda();

                l.click(function () {
                    // Start loading
                    l.ladda('start');

                    // Timeout example
                    // Do something in backend and then stop ladda
                    setTimeout(function () {
                        l.ladda('stop');
                    }, 12000)


                });

            });

        </script>
	</body>
</html>