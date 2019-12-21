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
  require_once('dbconfig.php');
  $upload_dir = 'uploads/';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM staff WHERE stfid=".$id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }

  if(isset($_POST['Submit'])){
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $contact = $_POST['contact'];
       
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
            $sql = "update staff
                    set name = '".$name."',
                    dob = '".$dob."',
                    address = '".$address."',
                    city = '".$city."',
                    contact = '".$contact."',
                    image = '".$userPic."'
                    where stfid=".$id;
            $result = mysqli_query($conn, $sql);
            if($result){
                $successMsg = 'New record updated successfully';
                echo ("<script>location.href = 'show-staff.php';</script>");
            }else{
                $errorMsg = 'Error '.mysqli_error($conn);
            }
        }

    }

?>
<?php
                                                include 'dbconfig.php';
                                                $mid=$_SESSION['mgrid'];
                                                $sql="SELECT * FROM salon WHERE sid IN(SELECT sid FROM manager_salon WHERE mid=$mid);";
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                  $row1 = mysqli_fetch_assoc($result);
                                                  $_SESSION['sidd'] = $row1['sid'];
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
                                    <a href="javascript:history.back()" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" >BACK <span class="m-l-5"><i class="md md-backspace"></i></span></a>    
                                </div>

                                <h5 class="page-title"><img src="<?php echo $upload_dir.$row1['image'] ?>" class="img-rounded thumb-sm"> <?php echo  $row1['sname']  ?></h5>
                                <ol class="breadcrumb">
                                    <li><a href="manager-page.php" data-toggle="tooltip" title="Home">Manager Home</a></li>
                                    <li class="active">Show Staff</li>
                                    <li class="active">Edit Staff</li>
                                </ol>
                            </div>
                        </div>

                        <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="card-header">
                 <h4 class="text-danger"><i class="md md-account-circle m-r-10"></i><?php echo $row['name']; ?></h4>
              </div>
              <form class="" action="" method="post" enctype="multipart/form-data">
             
              <div class="row">
                <div class="col-md-8">
                <div class="card-box">
                    <div class="form-group">

                      <label for="sname">Staff Name</label>
                      <input type="text" class="form-control" name="name" required="" placeholder="Enter Staff Name" value="<?php echo $row['name']; ?>">
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
                                                    <a href="javascript:history.back()" class="btn btn-danger waves-effect" data-toggle="tooltip">Close</a>
                                                    <button onclick="return confirm('Are you sure to edit this record?')" type="submit" name="Submit" class="btn btn-success waves-effect waves-light" data-toggle="tooltip" >Save changes</button>
                                                </div>
              
                     
                                                
                
          </form>

         
          </div>
        </div>
      </div>  
                        
                        
                        
                          

                    </div> <!-- container -->
                               
                </div> <!-- content -->


                                               
<br><br><br><br>
<?php include 'inc/managerfooter.php'; ?>