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
<?php include 'inc/headerdatatable.php'; ?>


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
                                    <li class="active">Revenue</li>
                                </ol>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                                <div class="card-box">
                                                <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                                
<div class="table-responsive">                      
 <?php     
        include 'dbconfig.php';
        $upload_dir = 'uploads/';
        $sid=$_SESSION['sidd'];
        $sql1="SELECT t1.*, t2.sname FROM revenue_salon t1 LEFT JOIN salon t2 ON t1.sid = t2.sid ORDER BY sid ASC";
         $results1=$conn->query($sql1); 
            
?>       

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                <th class="text-custom"><i class="md md-format-list-numbered"></i> RIV</th> 
                                <th class="text-custom"><i class="md md-format-list-numbered"></i> AID</th>
                                <th class="text-custom"><i class="md md-assignment"></i> Service</th>
                                
                                <th class="text-custom"><i class="glyphicon glyphicon-calendar"></i> Date Done</th>
                                <th class="text-custom"><i class="md md-store-mall-directory"></i> Salon</th>
                                <?php
                                   include 'dbconfig.php';
                                   $sid = $_SESSION['sidd'];
                                    $sql="SELECT rate, (SUM(rate)) AS Total FROM revenue_salon WHERE sid = '$sid'";
                                    $result = mysqli_query($conn,$sql);
                                    if (mysqli_num_rows($result)>0) {
                                        $rowss = mysqli_fetch_assoc($result);
                                        $total = $rowss['Total'];
                                    ?>
                                        <th class="text-custom"><i class=""></i> Total: &#8369; <?php echo $total; ?></th>
                                        <?php
                                    }
                                    else {
                                        ?>
                                       <th class="text-custom"><i class=""></i> Total: &#8369; 0.00 ?></th>
                                        <?php
                                    }
                                    mysqli_close($conn);
                                    ?>

                                    <?php
                                   include 'dbconfig.php';
                                    $sql="SELECT tenpercent, (SUM(tenpercent)) AS Totaltenpercent FROM revenue_salon";
                                    $result = mysqli_query($conn,$sql);
                                    if (mysqli_num_rows($result)>0) {
                                        $rowss = mysqli_fetch_assoc($result);
                                        $total = $rowss['Totaltenpercent'];
                                    ?>
                                        <th class="text-custom"><i class=""></i>10%: &#8369; <?php echo $total; ?></th>
                                        
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <th class="text-custom"><i class=""></i>10%: &#8369; 0.00</th>
                                        <?php
                                    }
                                    mysqli_close($conn);
                                    ?>

                                   

                                </tr>
                                </thead>


                                <tbody>
                                    <?php
            while($rs1=$results1->fetch_assoc())
            {
                ?>

                     <tr>
                     <td><?php echo $rs1['riv'] ?></td>
                     <td><?php echo $rs1['aid'] ?></td>
                     <td><img src="<?php echo $upload_dir.$rs1['image'] ?>" class="img-rounded thumb-sm"> <?php echo $rs1['sername'] ?></td>
                     
                     <td><?php echo date('Y/m/d h:i A', strtotime($rs1['datedone'])); ?></td>
                     <td><?php echo $rs1["sname"]; ?></td>
                     <td>&#8369;<?php echo $rs1['rate'] ?></td>
                     <td>&#8369;<?php echo $rs1["tenpercent"]; ?></td>
                    </tr>
                                              <?php
            }
?>
                            
                                </tbody>
                                 
                                
                            </table>
                         
                        </div>
                    </div>
                </div>
                                   
    </form>
    </div>
    </div>

                    </div> <!-- container -->
                               
                </div> <!-- content -->
                <br><br><br><br>
<?php include 'inc/footerdatatable.php'; ?>