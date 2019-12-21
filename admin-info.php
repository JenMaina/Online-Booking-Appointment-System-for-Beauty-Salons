<?php 
include 'admin-check.php';
?>
<?php
  require_once('dbconfig.php');
  $upload_dir = 'uploads/';

    $sql = "SELECT * FROM admin";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }

  if(isset($_POST['Submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
        $name = $_POST['name'];
        $dob = $_POST['dob'];
         $address = $_POST['address'];
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
            $sql = "update admin
                    set username = '".$username."',
                    password = '".$password."',
                    name = '".$name."',
                    dob = '".$dob."',
                   address = '".$address."',
                    contact = '".$contact."',
                    email = '".$email."',
                    image = '".$userPic."'";
             
            $result = mysqli_query($conn, $sql);
            if($result){
                $successMsg = 'New record updated successfully';
                echo ("<script>location.href = 'admin-page.php';</script>");
            }else{
                $errorMsg = 'Error '.mysqli_error($conn);
            }
        }

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
                                     <li>Account Settings</li>
                                 
                                </ol>
                               
                            </div>
                        </div>
                        
                        
                       <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="card-header">
                 <h4 class="text-custom"><i class="md md-account-circle m-r-10"></i><?php echo $row['name']; ?></h4>
              </div>
              <form class="" action="" method="post" enctype="multipart/form-data">
             
              <div class="row">
                <div class="col-md-8">
                <div class="card-box">

                    <div class="form-group">

                      <label for="name"> Username</label>
                      <input type="text" class="form-control" name="username" required="" placeholder="Enter Admin Username" value="<?php echo $row['username']; ?>">
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

                      <label for="name"> Full Name</label>
                      <input type="text" class="form-control" name="name" required="" placeholder="Enter Admin Full Name" value="<?php echo $row['name']; ?>">
                    </div>
                    <div class="form-group">

                      <label for="address"> Address</label>
                      <input type="text" class="form-control" name="address" required="" placeholder="Enter Admin Name" value="<?php echo $row['address']; ?>">
                    </div>
                                                 <div class="form-group">
                                                        <label for="dob"> Date of Birth</label>
                                                            <div class="input-group">
                                                                <input type="text" name="dob" class="form-control" required="" placeholder="mm/dd/yyyy" id="datepicker-autoclose" value="<?php echo $row['dob']; ?>">
                                                                <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span> 
                                                          </div>
                                                        
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
                                                    <a href="javascript:history.back()" class="btn btn-danger waves-effect" data-toggle="tooltip" title="Close">Close</a>
                                                    <button onclick="return confirm('Are you sure to edit this record?')" type="submit" name="Submit" class="btn btn-success waves-effect waves-light" data-toggle="tooltip" title="Save Changes">Save changes</button>
                                                </div>
              
                     
                                                
                
          </form>
         
          </div>
        </div>
      </div>   

                    </div> <!-- container -->
                               
                </div> <!-- content -->


<br><br><br><br>
<?php include 'inc/adminfooter.php'; ?>