<?php 
session_start();
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

        

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

        <style type="text/css">
            label { color: green; } 
            input[type="radio"]:disabled+label {
                color: red!important
            } 
        </style>

        <script src="assets/js/modernizr.min.js"></script>
</head>

<script type="text/javascript"></script>
<body>
                                       

<?php
include 'dbconfig.php';
$upload_dir = 'uploads/';
$stfid = $_SESSION['stfidsched'];
$sql="SELECT * FROM book  WHERE dov = '". $_POST['dov'] ."' AND stfid = '$stfid' AND status <> 'DONE' AND status <> 'CANCELLED' ORDER BY tym";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0) {
while($rows = mysqli_fetch_array($result)) {
    $timelists[] = $rows['tym'];
}
}
else {
    $timelists[] = '';
}

?>

                                            <?php
                                              include 'dbconfig.php';
                                              $upload_dir = 'uploads/';
                                              $stfid = $_SESSION['stfidsched'];
                                                $sql = "SELECT * FROM staff WHERE stfid = '$stfid'";
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                  $row1 = mysqli_fetch_assoc($result);
                                                }else {
                                                  $errorMsg = 'Could not Find Any Record';
                                                }
                                          

                                            ?>
                                          <!--    <h5 class="text-left"><b>Date to Visit <span class="text-danger">*</span></b> </h5>
                                             <div class="input-group" required="">
                                              <input type="text" name="dov" class="form-control" required="" placeholder="mm/dd/yyyy" id="datepicker-autoclose" class="datepicker" data-date-start-date="+1d" onChange="getStaffSchedbook(this.value);">
                                             <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span> 
                                            </div> -->
                                            <h5 class="small">Time Schedule for <img src="<?php echo $upload_dir.$row1['image'] ?>" class="img-circle thumb-sm"> <b class="text-danger"><?php echo  $row1['name']  ?></b></h5>
<?php
include "dbconfig.php";
$stfid = $_SESSION['stfidsched'];
    $query ="SELECT * FROM staff_availability WHERE stfid = '$stfid' ORDER BY fro ASC";
    $result = $conn->query($query);
    while($row = mysqli_fetch_array($result)) {
        ?>
        <div class="radio radio-success" >
        <input type="radio" value="<?php echo $row['fro'] ?>" name="tym" required="" <?php echo (in_array($row['fro'], $timelists)?"disabled='disabled'":"") ?>>
        <label for="radio4">
       <?php echo date('h:i A', strtotime($row['fro'])) ?><span> - </span><span><?php echo date('h:i A', strtotime($row['fro']) + 60*60) ?></span>
        </label>
        </div> 
        <?php

}
?>

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

	
</body>
</html>