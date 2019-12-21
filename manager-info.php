<?php 
include 'manager-check.php';
?>
 <?php
  require_once('dbconfig.php');
  $upload_dir = 'uploads/';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM manager WHERE mid=".$id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }

  if(isset($_POST['Submit'])){
        $name = $_POST['name'];
        $password = $_POST['password'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
       
       $imgName = $_FILES['image']['name'];
        $imgTmp = $_FILES['image']['tmp_name'];
        $imgSize = $_FILES['image']['size'];

        if($imgName){

            $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

            $allowExt  = array('jpeg', 'jpg', 'png', 'gif');

            $userPic = time().'_'.rand(1000,9999).'.'.$imgExt;

            if(in_array($imgExt, $allowExt)){

                if($imgSize < 5000000){
                    unlink($upload_dir.$row['image']);
                    move_uploaded_file($imgTmp ,$upload_dir.$userPic);
                }else{
                    $errorMsg = 'Image too large';
                }
            }else{
                $errorMsg = 'Please select a valid image';
            }
        }else{

            $userPic = $row['image'];
        }


        if(!isset($errorMsg)){
            $sql = "update manager
                    set name = '".$name."',
                    password = '".$password."',
                    dob = '".$dob."',
                    address = '".$address."',
                    city = '".$city."',
                    contact = '".$contact."',
                    email = '".$email."',
                    image = '".$userPic."'
                    where mid=".$id;
            $result = mysqli_query($conn, $sql);
            if($result){
                $successMsg = 'New record updated successfully';
                header('Location:manager-page.php');
            }else{
                $errorMsg = 'Error '.mysqli_error($conn);
            }
        }

    }

?>
<?php include 'inc/managerheader.php'; ?>
    <?php include "dbconfig.php"; ?>


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
                                                  $rows = mysqli_fetch_assoc($result);
                                                  $_SESSION['sidd'] = $rows['sid'];
                                                  ?>
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

                                <h4 class="page-title">Account Settings</h4>
                                <ol class="breadcrumb">
                                    <li><a href="manager-page.php" data-toggle="tooltip" title="Home">Manager Home</a></li>
                                    <li>Account Settings</li>
                                 
                                </ol>
                               <h5 class="page-title"><img src="<?php echo $upload_dir.$rows['image'] ?>" class="img-rounded thumb-sm"> <?php echo  $rows['sname']  ?></h5><br>
                            </div>
                        </div>
                        
                        
                        <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
           
              <form class="" action="" method="post" enctype="multipart/form-data">
             
              <div class="row">
                <div class="col-md-8">
                <div class="card-box">
                    <div class="form-group">

                      <label for="sname">Manager Name</label>
                      <input type="text" class="form-control" name="name" required="" placeholder="Enter Manager Name" value="<?php echo $row['name']; ?>">
                    </div>
                    <div class="form-group">
                    <label for="name"> Password</label>
                    <div class="col-xs-12">
                      <input type="password" id="p1" name="password" class="form-control" required="" placeholder="Password" value="<?php echo $row['password']; ?>">
                    </div>
                    <br><br><br>             
                    <div class="col-xs-12">
                      <input type="password" id="p2" name="passwordr" class="form-control" required="" data-parsley-equalto="#p1" placeholder="Re-Type Password" value="<?php echo $row['password']; ?>">
                    </div>
                    </div>
                    <br><br>
                                                 <div class="form-group">
                                                        <label for="dob">Date of Birth</label>
                                                            <div class="input-group">
                                                                <input type="text" name="dob" class="form-control" required="" placeholder="mm/dd/yyyy" id="datepicker-autoclose" value="<?php echo $row['dob']; ?>">
                                                                <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span> 
                                                          </div>
                                                        
                                                    </div>
                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" name="address" required="" placeholder="Enter Address" value="<?php echo $row['address']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="city">City</label>
                      <input type="text" class="form-control" name="city" required="" placeholder="Enter City" value="<?php echo $row['city']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="Contact"> Contact</label>
                        <input type="text" class="form-control" name="contact" required="" data-parsley-maxlength="11" data-parsley-type="number" placeholder="Enter Contact" value="<?php echo $row['contact']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="email"> Email</label>
                        <input type="email" class="form-control" name="email" required="" placeholder="Enter Email" value="<?php echo $row['email']; ?>">
                    </div>
                    </div>
                                     
                    </div>
                     <div class="col-md-4">
                     <div class="card-box">
                    <div class="form-group">

                        <img src="<?php echo $upload_dir.$row['image'] ?>" class="img-responsive img-rounded"><br>
                       <input type="file" class="filestyle" data-iconname="fa fa-cloud-upload" name="image">
                     
                    </div>

                    </div>

                      </div>


              </div>
              <div class="modal-footer">
                                                    <a href="manager-page.php" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" title="Close">Close</a>
                                                    <button onclick="return confirm('Are you sure to edit this record?')" type="submit" name="Submit" class="btn btn-success waves-effect waves-light" data-toggle="tooltip" title="Save">Save changes</button>
                                                </div>
              
                     
                                                
                
          </form>
         
          </div>
        </div>
      </div>    
        
               
                    </div> <!-- container -->
                               
                </div> <!-- content -->
<br><br><br><br>
                <footer class="footer">
                    © 2019. All rights reserved.
                </footer>

            </div>
                                                  <?php
                                                }else {
                                                  ?>
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

                                <h4 class="page-title">Account Settings</h4>
                                <ol class="breadcrumb">
                                    <li><a href="manager-page.php" data-toggle="tooltip" title="Home">Manager Home</a></li>
                                    <li>Account Settings</li>
                                 
                                </ol>
                            
                            </div>
                        </div>
                        
                        
                        <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
           
              <form class="" action="" method="post" enctype="multipart/form-data">
             
              <div class="row">
                <div class="col-md-8">
                <div class="card-box">
                    <div class="form-group">

                      <label for="sname">Manager Name</label>
                      <input type="text" class="form-control" name="name" required="" placeholder="Enter Manager Name" value="<?php echo $row['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="name"> Password</label>
                    <div class="col-xs-12">
                        <input type="password" id="p1" name="password" class="form-control" required="" placeholder="Password" value="<?php echo $row['password']; ?>">
                    </div>
                    <br><br><br>             
                    <div class="col-xs-12">
                        <input type="password" id="p2" name="passwordr" class="form-control" required="" data-parsley-equalto="#p1" placeholder="Re-Type Password" value="<?php echo $row['password']; ?>">
                    </div>
                    </div>



                                                 <div class="form-group">
                                                        <label for="dob">Date of Birth</label>
                                                            <div class="input-group">
                                                                <input type="text" name="dob" class="form-control" required="" placeholder="mm/dd/yyyy" id="datepicker-autoclose" value="<?php echo $row['dob']; ?>">
                                                                <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span> 
                                                          </div>
                                                        
                                                    </div>
                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" name="address" required="" placeholder="Enter Address" value="<?php echo $row['address']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="city">City</label>
                      <input type="text" class="form-control" name="city" required="" placeholder="Enter City" value="<?php echo $row['city']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="Contact"> Contact</label>
                        <input type="text" class="form-control" name="contact" required="" data-parsley-maxlength="11" data-parsley-type="number" placeholder="Enter Contact" value="<?php echo $row['contact']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="email"> Email</label>
                        <input type="email" class="form-control" name="email" required="" placeholder="Enter Email" value="<?php echo $row['email']; ?>">
                    </div>
                    </div>
                                     
                    </div>
                     <div class="col-md-4">
                     <div class="card-box">
                    <div class="form-group">

                        <img src="<?php echo $upload_dir.$row['image'] ?>" class="img-responsive img-rounded"><br>
                       <input type="file" class="filestyle" data-iconname="fa fa-cloud-upload" name="image">
                     
                    </div>

                    </div>

                      </div>


              </div>
              <div class="modal-footer">
                                                    <a href="manager-page.php" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" title="Close">Close</a>
                                                    <button onclick="return confirm('Are you sure to edit this record?')" type="submit" name="Submit" class="btn btn-success waves-effect waves-light" data-toggle="tooltip" title="Save">Save changes</button>
                                                </div>
              
                     
                                                
                
          </form>
         
          </div>
        </div>
      </div>    
        
               
                    </div> <!-- container -->
                               
                </div> <!-- content -->
<br><br><br><br>
                <footer class="footer">
                    © 2019. All rights reserved.
                </footer>

            </div>
                                                  <?php
                                                }
                                                ?>

           



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
      
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>

        <!-- END wrapper -->

       


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


        <script src="assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <script src="assets/plugins/switchery/js/switchery.min.js"></script>
        <script type="text/javascript" src="assets/plugins/multiselect/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script src="assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

        <script type="text/javascript" src="assets/pages/jquery.form-advanced.init.js"></script>

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