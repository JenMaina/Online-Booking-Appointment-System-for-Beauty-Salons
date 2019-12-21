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
                                <h5 class="page-title"></h5>
                                <ol class="breadcrumb">
                                    <li><a href="admin-page.php" data-toggle="tooltip" title="Home">Admin Home</a></li>
                                 
                                </ol>
                               
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-sm-6">
                                <a href="revenue-salon-admin.php" data-toggle="tooltip" title="Revenue">
                                <div class="widget-panel widget-style-2 bg-white">
                                    <i class="text-primary waves-effect waves-light">&#8369;</i>
                                     <?php
                                   include 'dbconfig.php';
                                    $sql="SELECT tenpercent, (SUM(tenpercent)) AS Totaltenpercent FROM revenue_salon";
                                    $result = mysqli_query($conn,$sql);
                                    if (mysqli_num_rows($result)>0) {
                                        $rowss = mysqli_fetch_assoc($result);
                                        $total = $rowss['Totaltenpercent'];
                                    ?>
                                        <h2 class="m-0 text-dark counter font-600"><?php echo $total; ?></h2>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <h2 class="m-0 text-dark counter font-600">0.00</h2>
                                        <?php
                                    }
                                    mysqli_close($conn);
                                    ?>
                                    <div class="text-muted m-t-5">Total Revenue</div>
                                </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <a href="show-appointments-admin.php" data-toggle="tooltip" title="Appointments">
                                <div class="widget-panel widget-style-2 bg-white">
                                    <i class="glyphicon glyphicon-calendar text-custom waves-effect waves-light"></i>
                                    <?php
                                   include 'dbconfig.php';
                                    $sql="SELECT * FROM book";
                                    $result = mysqli_query($conn,$sql);
                                    $numofrows = mysqli_num_rows($result);
                                    if (mysqli_num_rows($result)>0) {
                                    ?>
                                        <h2 class="m-0 text-dark counter font-600"><?php echo  $numofrows; ?></h2>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <h2 class="m-0 text-dark counter font-600"><?php echo  $numofrows; ?></h2>
                                        <?php
                                    }
                                    mysqli_close($conn);
                                    ?>
                                    <div class="text-muted m-t-5">Appointments</div>
                                </div>
                                </a>
                            </div>
                             <div class="col-lg-4 col-sm-6">
                                <a href="show-salon.php" data-toggle="tooltip" title="Salons">
                                <div class="widget-panel widget-style-2 bg-white">
                                    <i class="md md-store-mall-directory text-pink waves-effect waves-light"></i>
                                    <?php
                                   include 'dbconfig.php';
                                    $sql="SELECT * FROM salon";
                                    $result = mysqli_query($conn,$sql);
                                    $numofrows = mysqli_num_rows($result);
                                    if (mysqli_num_rows($result)>0) {
                                    ?>
                                        <h2 class="m-0 text-dark counter font-600"><?php echo  $numofrows; ?></h2>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <h2 class="m-0 text-dark counter font-600"><?php echo  $numofrows; ?></h2>
                                        <?php
                                    }
                                    mysqli_close($conn);
                                    ?>
                                    <div class="text-muted m-t-5">Salons</div>
                                </div>
                                </a>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <a href="show-manager.php" data-toggle="tooltip" title="Managers">
                                <div class="widget-panel widget-style-2 bg-white">
                                    <i class="md md-account-child text-info waves-effect waves-light"></i>
                                    <?php
                                   include 'dbconfig.php';
                                    $sql="SELECT * FROM manager";
                                    $result = mysqli_query($conn,$sql);
                                    $numofrows = mysqli_num_rows($result);
                                    if (mysqli_num_rows($result)>0) {
                                    ?>
                                        <h2 class="m-0 text-dark counter font-600"><?php echo  $numofrows; ?></h2>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <h2 class="m-0 text-dark counter font-600"><?php echo  $numofrows; ?></h2>
                                        <?php
                                    }
                                    mysqli_close($conn);
                                    ?>
                                    <div class="text-muted m-t-5">Managers</div>
                                </div>
                                </a>
                            </div>
                           
                            <div class="col-lg-6 col-sm-12">
                                <a href="show-customer.php" data-toggle="tooltip" title="Customers">
                                <div class="widget-panel widget-style-2 bg-white">
                                    <i class="md md-account-child text-custom waves-effect waves-light"></i>
                                    <?php
                                   include 'dbconfig.php';
                                    $sql="SELECT * FROM customer";
                                    $result = mysqli_query($conn,$sql);
                                    $numofrows = mysqli_num_rows($result);
                                    if (mysqli_num_rows($result)>0) {
                                    ?>
                                        <h2 class="m-0 text-dark counter font-600"><?php echo  $numofrows; ?></h2>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <h2 class="m-0 text-dark counter font-600"><?php echo  $numofrows; ?></h2>
                                        <?php
                                    }
                                    mysqli_close($conn);
                                    ?>
                                    <div class="text-muted m-t-5">Customers</div>
                                </div>
                                </a>
                            </div>
                        </div>
                        
                        
                    </div> <!-- container -->
                               
                </div> <!-- content -->

<br><br><br><br>
<?php include 'inc/adminfooter.php'; ?>