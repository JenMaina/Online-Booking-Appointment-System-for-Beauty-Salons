<?php
include 'manager-check.php';
include 'dbconfig.php';
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

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/icon.png">

        <title>Online Appointment Beauty Salons System</title>

        <link href="assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" />
        <link href="assets/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

        <link href="assets/plugins/smoothproducts/css/smoothproducts.css" rel="stylesheet" type="text/css" />

        <link href="assets/plugins/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet" type="text/css" />

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" />
        <link href="assets/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

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

        <script src="assets/js/modernizr.min.js"></script>
        
    </head>


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
    $sql = "SELECT * FROM service1 WHERE serid=".$id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }

  if(isset($_POST['Submit'])){
        $sername = $_POST['sername'];
        $rate = $_POST['rate'];
        $duration = $_POST['duration'];
        $descrip = $_POST['descrip'];
      
       
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
            $sql = "update service1
                    set sername = '".$sername."',
                    rate = '".$rate."',
                    duration = '".$duration."',
                    descrip = '".$descrip."',
                    image = '".$userPic."'
                    where serid=".$id;
            $result = mysqli_query($conn, $sql);
            if($result){
                $successMsg = 'New record updated successfully';
                 echo ("<script>location.href = 'serviceedit.php?id=". $row['serid']. "';</script>");
            }else{
                $errorMsg = 'Error '.mysqli_error($conn);
            }
        }

    }

?>



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
     <div class="content" style="padding-top: 70px;">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

 
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



                   <div class="row">
                            <div class="col-sm-12">
                                <div class="btn-group pull-right m-t-15">
                                    <a href="javascript:history.back()" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" title="back">BACK <span class="m-l-5"><i class="md md-backspace"></i></span></a>    
                                </div>

                                <h5 class="page-title"><img src="<?php echo $upload_dir.$row1['image'] ?>" class="img-rounded thumb-sm"> <?php echo  $row1['sname']  ?></h5>
                                <ol class="breadcrumb">
                                    <li><a href="manager-page.php" data-toggle="tooltip" title="Home">Manager Home</a></li>
                                    <li class="active">Show Service</li>
                                    <li class="active">Edit Service</li>
                                </ol>
                            </div>
                        </div>

                    <div class="row">
                           <div class="col-xs-12">
                               <div class="card-box product-detail-box">
                                   <div class="row">
                                   <form class="" action="" method="post" enctype="multipart/form-data">
                                       <div class="col-sm-4">
                                           <div class="sp-loading"><img src="assets/images/sp-loading.gif" alt=""><br>LOADING
                                               IMAGES
                                           </div>
                                           <div class="sp-wrap">
                                               <a href="<?php echo $upload_dir.$row['image'] ?>"><img src="<?php echo $upload_dir.$row['image'] ?>" alt=""></a>

                                           </div>
                                           <div class="form-group">

                      
                       <input type="file" class="filestyle" data-iconname="fa fa-cloud-upload" name="image">
                     
                    </div>

                                       </div>

                                       <div class="col-sm-8">
                                           <div class="product-right-info">
                                                 <div class="form-group">
                                                  <label for="sername">Service Name</label>
                                                  <b><input style="font-size: 22px;" type="text" class="form-control" name="sername" required="" placeholder="Enter Salon Name" value="<?php echo $row['sername']; ?>"></b>
                                                </div>
                                                </div>

                                               <div class="form-group ">
                      <label for="rate">Rate &#8369;</label>
                      <b><input style="font-size: 30px; color: #7aae3d" type="number" class="form-control" name="rate" required="" placeholder="Enter Rate" value="<?php echo $row['rate']; ?>"></b>
                    </div>

                                  <label>Duration Hrs/Mins</label>
                                                <div class="input-group m-b-15">

                                                    <div class="bootstrap-timepicker">
                                                        <input id="timepicker2" type="text" class="form-control" name="duration" value="<?php echo $row["duration"]; ?>">
                                                    </div>
                                                    <span class="input-group-addon bg-custom b-0 text-white"><i class="glyphicon glyphicon-time"></i></span>
                                                </div>

                                           <div class="form-group m-t-20">
                                                        <label>Description</label>
                                                        <textarea class="form-control" required="" rows="5" placeholder="Please enter description" name="descrip"><?php echo $row["descrip"]; ?></textarea>
                                                    </div>

                                               
                                           </div>

                                       </div>
                                       <div class="modal-footer">
                                                  
                                                    <button onclick="return confirm('Are you sure to edit this record?')" type="submit" name="Submit" class="btn btn-success waves-effect waves-light" data-toggle="tooltip" title="Save">Save changes</button>
                                                </div>
                                                </form>
                                 
                                   <!-- end row -->
<!-- 
                                   <div class="row m-t-30">
                                       <div class="col-xs-12">
                                           <h4><b>Specifications:</b></h4>
                                           <div class="table-responsive m-t-20">
                                               <table class="table">
                                                   <tbody>
                                                       <tr>
                                                           <td width="400">Brand</td>
                                                           <td>
                                                               TheBrandStore
                                                           </td>
                                                       </tr>
                                                       <tr>
                                                           <td>Color</td>
                                                           <td>
                                                               Black
                                                           </td>
                                                       </tr>
                                                    
                                                   </tbody>
                                               </table>
                                           </div>
                                       </div>
                                   </div> -->


                               </div> <!-- end card-box/Product detai box -->
                           </div> <!-- end col -->
                       </div> <!-- end row -->




                       
                        
                 
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

        <script src="assets/pages/jquery.form-pickers.init.js"></script>
        <script type="text/javascript" src="assets/plugins/parsleyjs/parsley.min.js"></script>


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


        <script src="assets/plugins/smoothproducts/js/smoothproducts.min.js"></script>

        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            // wait for images to load
            $(window).load(function() {
                $('.sp-wrap').smoothproducts();
            });
        </script>

	
	</body>
</html>