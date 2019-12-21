<?php
include 'dbconfig.php';
session_start();
$upload_dir = 'uploads/';
$cid=$_SESSION['crid'];
    $sql = "SELECT * FROM customer WHERE cid=$cid";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
?>

 <?php
  require_once('dbconfig.php');
  $upload_dir = 'uploads/';

    $sid = $_SESSION['sid'];
    $sql1 = "SELECT * FROM salon WHERE sid= $sid";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) > 0) {
      $row1 = mysqli_fetch_assoc($result1);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
?>

 <?php
  require_once('dbconfig.php');
  $upload_dir = 'uploads/';

  if (isset($_GET['aid'])) {
    $aid = $_GET['aid'];
    $sql = "SELECT * FROM book WHERE aid=".$aid;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['seridr'] = $row['serid'];
      $_SESSION['aidr'] = $row['aid'];
      $_SESSION['sidr'] = $row['sid'];
      // echo $row['aid'];
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }
  ?>

 <?php
  require_once('dbconfig.php');
  $upload_dir = 'uploads/';

    $serid = $_SESSION['seridr'];
    $sql2 = "SELECT * FROM service1 WHERE serid= $serid";
    $result2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result2) > 0) {
      $row2 = mysqli_fetch_assoc($result2);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }


?>



<?php
date_default_timezone_set('America/Los_Angeles');
include 'dbconfig.php';
if(!empty($_POST['rating'])){
       
        $sid=$_SESSION['sidr'];
        $cid=$_SESSION['crid'];
        $aid=$_SESSION['aidr'];
        $serid=$_SESSION['seridr'];
        $rating=$_POST['rating'];
        $title=$_POST['title'];
        $comment=$_POST['comment'];
        $timestamp=date('Y-m-d H:i:s');
        
        $sql = "INSERT INTO rating (cid, sid, aid, serid, rating, title, comment, datecreated) VALUES ('$cid', '$sid', '$aid', '$serid', '$rating', '$title', '$comment', '$timestamp') ";
    
                if (mysqli_query($conn, $sql)) 
                {
                        echo "<h4>Rate successful!</h4>";
                        echo ("<script>location.href = 'show-rating.php?id=".$_SESSION['seridr']."';</script>");
                        

                } 
                else
                {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
          
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

        <link href="assets/plugins/smoothproducts/css/smoothproducts.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="ratingassets/rating.js"></script>
        <link rel="stylesheet" href="ratingassets/style.css">

        <script src="assets/js/modernizr.min.js"></script>

        
    </head><?php include "dbconfig.php"; ?>

    

    <body class="fixed-left">

        <!-- Begin page -->

            <div class="container">
        <div class="row justify-content-center">
         <a href="cancel-app.php" type="button" class="close" data-toggle="tooltip" title="Close">×</a>

         <div class="col-lg-12">
                        <div class="">
                        
                        <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                            <h4 class='title text-center'><img src="<?php echo $upload_dir.$row1['image'] ?>" class="img-rounded thumb-sm"> <?php echo  $row1['sname'] ?></h4>
                        <div class="col-lg-7 col-md-7">
                            
                                            <div class="product-list-box thumb">
                                            <img src="<?php echo $upload_dir.$row2['image'] ?>" class="thumb-img thumbnail" alt="thumbnail" name="simage">
                                        <div class="price-tag" name="rate">
                                           &#8369;<?php echo  $row2['rate'] ?>
                                        </div>
                                        <div class="detail">
                                            <h4 class="m-t-0" name="sername"><?php echo  $row2['sername'] ?></h4>
                                            <div class="rating">
                                                <ul class="list-inline">
                                                   <a href="show-rating.php?id=<?php echo $_SESSION['seridr']; ?>">
  <?php
  require_once('dbconfig.php');
  $serid = $_SESSION['seridr'];
  $ratingDetails = "SELECT * FROM rating WHERE serid = '$serid'";
  $rateResult = mysqli_query($conn, $ratingDetails) or die("database error:". mysqli_error($conn));
  $ratingNumber = 0;
  $count = 0;
  $fiveStarRating = 0;
  $fourStarRating = 0;
  $threeStarRating = 0;
  $twoStarRating = 0;
  $oneStarRating = 0;
  while($rate = mysqli_fetch_assoc($rateResult)) {
    $ratingNumber+= $rate['rating'];
    $count += 1;
    if($rate['rating'] == 5) {
      $fiveStarRating +=1;
    } else if($rate['rating'] == 4) {
      $fourStarRating +=1;
    } else if($rate['rating'] == 3) {
      $threeStarRating +=1;
    } else if($rate['rating'] == 2) {
      $twoStarRating +=1;
    } else if($rate['rating'] == 1) {
      $oneStarRating +=1;
    }
  }
  $average = 0;
  if($ratingNumber && $count) {
    $average = $ratingNumber/$count;
  } 
  ?>           
        <h5 class="bold padding-bottom-7"><?php printf('%.1f', $average); ?> <small>/ 5</small></h5>        
        <?php
        $averageRating = round($average, 0);
        for ($i = 1; $i <= 5; $i++) {
          $ratingClass = "btn-inverse btn-grey";
          if($i <= $averageRating) {
            $ratingClass = "btn-warning";
          }
        ?>
        <button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align" style="font-size: 8px;">
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        </button> 
        <?php } ?>  
                                                        </a>
                                                </ul>
                                            </div>
                                            <h5 class="m-0"> <span class="text-muted" name="duration">Duration: <?php echo  date('h:i', strtotime($row2 ['duration'])); ?></span></h5>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5">
      <div id="ratingSection">
        <div class="row">
            <div class="col-sm-12">
                <form id="ratingForm" method="POST">                    
                    <div class="form-group">
                        <h4>Rate this product</h4>
                        <button type="button" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
                          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-inverse btn-grey btn-sm rateButton" aria-label="Left Align">
                          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-inverse btn-grey btn-sm rateButton" aria-label="Left Align">
                          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-inverse btn-grey btn-sm rateButton" aria-label="Left Align">
                          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-inverse btn-grey btn-sm rateButton" aria-label="Left Align">
                          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        </button>
                        <input type="hidden" class="form-control" id="rating" name="rating" value="1">
                      <!--   <input type="hidden" class="form-control" id="itemId" name="itemId" value="12345678"> -->
                    </div>      
                    <div class="form-group">
                    <label for="title">Title <span class="text-danger">*</span></label>
                      <select class="form-control" required="" name="title" id="title" class="demoInputBox" onChange="getStaffSched(this.value);" >
                          <option>Select</option>
                          <optgroup label="Title">
                          <option>Excelent Service</option>
                          <option>Very Good Service</option>
                          <option>Good Service</option>
                          <option>Fair Service</option>
                          <option>Poor Service</option>      
                          </optgroup>
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment <span class="text-danger">*</span></label>
                        <textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success pull-right" id="saveReview">Save Review</button> <!-- <button type="button" class="btn btn-info" id="cancelReview">Cancel</button> -->
                    </div>          
                </form>
            </div>
        </div>
    </div>  
                                              
                                     </div>               

                        </form>

        </div>
            </div> 



        </div>
      </div>    

    
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

        <script type="text/javascript" src="assets/plugins/autocomplete/jquery.mockjax.js"></script>
        <script type="text/javascript" src="assets/plugins/autocomplete/jquery.autocomplete.min.js"></script>
        <script type="text/javascript" src="assets/plugins/autocomplete/countries.js"></script>
        <script type="text/javascript" src="assets/pages/autocomplete.js"></script>

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