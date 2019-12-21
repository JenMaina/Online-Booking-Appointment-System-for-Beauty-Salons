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
                                                include 'dbconfig.php';
                                                $mid=$_SESSION['mgrid'];
                                                $sql="SELECT * FROM salon WHERE sid IN(SELECT sid FROM manager_salon WHERE mid=$mid);";
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                  $row = mysqli_fetch_assoc($result);
                                                  $_SESSION['sidd'] = $row['sid'];
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
                                <h5 class="page-title"><img src="<?php echo $upload_dir.$row['image'] ?>" class="img-rounded thumb-sm"> <?php echo  $row['sname']  ?></h5><?php                              
  require_once('dbconfig.php');
  $sid = $row['sid'];
  $ratingDetails = "SELECT * FROM rating WHERE sid = '$sid'";
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
        <h6 class="bold pull-right">(<?php printf('%.1f', $average); ?> <small>/ 5</small>)       
        <?php
        $averageRating = round($average, 0);
        for ($i = 1; $i <= 5; $i++) {
          $ratingClass = "btn-inverse btn-grey";
          if($i <= $averageRating) {
            $ratingClass = "btn-warning";
          }
        ?>
        <button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align">
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        </button> 
        <?php } ?> </h6> 
                                <ol class="breadcrumb">
                                    <li><a href="manager-page.php" data-toggle="tooltip" title="Home">Manager Home</a></li>
                                </ol>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <a href="revenue-salon-manager.php" data-toggle="tooltip" title="Revenue">
                                <div class="panel panel-border panel-pink">
                                    <div class="panel-heading">
                                    Revenue     
                                    </div>
                                    <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-pink pull-left waves-effect waves-light">
                                        <i class="text-pink">&#8369;</i>
                                    </div>
                                    <div class="text-right">
                                  
                                        <?php
                                   include 'dbconfig.php';
                                   $sid = $_SESSION['sidd'];
                                    $sql="SELECT rate, (SUM(rate)) AS Total FROM revenue_salon WHERE sid = '$sid'";
                                    $result = mysqli_query($conn,$sql);
                                    if (mysqli_num_rows($result)>0) {
                                        $rowss = mysqli_fetch_assoc($result);
                                        $total = $rowss['Total'];
                                    ?>
                                        <h3 class="text-dark"><b class="counter"><?php echo $total; ?></b></h3>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <h3 class="text-dark"><b class="counter">0.00</b></h3>
                                        <?php
                                    }
                                    mysqli_close($conn);
                                    ?>
                                  
                                        <p class="text-muted">Total Revenue</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                </div>
                                </a>
                            </div>


                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <a href="show-appointments-manager.php" data-toggle="tooltip" title="Appointments">
                                <div class="panel panel-border panel-custom">
                                    <div class="panel-heading">
                                    Appointments     
                                    </div>
                                    <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-custom pull-left waves-effect waves-light">
                                        <i class="glyphicon glyphicon-calendar text-custom"></i>
                                    </div>
                                    <div class="text-right">
                                    <?php
                                   include 'dbconfig.php';
                                    $sql="SELECT * FROM book WHERE sid = '$sid'";
                                    $result = mysqli_query($conn,$sql);
                                    $numofrows = mysqli_num_rows($result);
                                    if (mysqli_num_rows($result)>0) {
                                    ?>
                                        <h3 class="text-dark"><b class="counter"><?php echo  $numofrows; ?></b></h3>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <h3 class="text-dark"><b class="counter"><?php echo  $numofrows; ?></b></h3>
                                        <?php
                                    }
                                    mysqli_close($conn);
                                    ?>
                                        <p class="text-muted">Total Appointments</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                </div>
                                </a>
                            </div>
                            
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <a href="show-service.php" data-toggle="tooltip" title="Service">
                                <div class="panel panel-border panel-info">
                                    <div class="panel-heading">
                                    Service     
                                    </div>
                                    <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-info pull-left waves-effect waves-light">
                                        <i class="glyphicon glyphicon-th-large text-info"></i>
                                    </div>
                                    <div class="text-right">
                                   <?php
                                   include 'dbconfig.php';
                                    $sid = $_SESSION['sidd'];
                                    $sql="SELECT * FROM service1 WHERE sid = '$sid'";
                                    $result = mysqli_query($conn,$sql);
                                    $numofrows = mysqli_num_rows($result);
                                    if (mysqli_num_rows($result)>0) {
                                    ?>
                                        <h3 class="text-dark"><b class="counter"><?php echo  $numofrows; ?></b></h3>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <h3 class="text-dark"><b class="counter"><?php echo  $numofrows; ?></b></h3>
                                        <?php
                                    }
                                    mysqli_close($conn);
                                    ?>
                                        <p class="text-muted">Total Services</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <a href="show-staff.php" data-toggle="tooltip" title="Staff">
                                <div class="panel panel-border panel-danger">
                                    <div class="panel-heading">
                                    Staff     
                                    </div>
                                    <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-danger pull-left waves-effect waves-light">
                                        <i class="glyphicon glyphicon-user text-danger"></i>
                                    </div>
                                    <div class="text-right">
                                        <?php
                                   include 'dbconfig.php';
                                    $sid = $_SESSION['sidd'];
                                    $sql="SELECT * FROM staff WHERE sid = '$sid'";
                                    $result = mysqli_query($conn,$sql);
                                    $numofrows = mysqli_num_rows($result);
                                    if (mysqli_num_rows($result)>0) {
                                    ?>
                                        <h3 class="text-dark"><b class="counter"><?php echo  $numofrows; ?></b></h3>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <h3 class="text-dark"><b class="counter"><?php echo  $numofrows; ?></b></h3>
                                        <?php
                                    }
                                    mysqli_close($conn);
                                    ?>
                                        <p class="text-muted">Total Staffs</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                </div>
                                </a>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <a href="edit-salon-m.php?id=<?php echo $row['sid'] ?>" data-toggle="tooltip" title="Edit Salon">
                                <div class="panel panel-border panel-success">
                                    <div class="panel-heading">
                                    Salon     
                                    </div>
                                    <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-success pull-left waves-effect waves-light">
                                        <i class="glyphicon glyphicon-edit text-success"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class=""><img src="<?php echo $upload_dir.$row['image'] ?>" class="img-rounded thumb-sm"><span class="text-muted"> <?php echo $row['sname'] ?></span></b></h3>
                                        <p class="text-muted">Edit Salon</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                </div>
                                </a>
                            </div>
       
                        </div> <!-- end row -->

                        <div class="row">
                          <div class="col-lg-12"> 
                                <ul class="nav nav-tabs tabs">
                                    <li class="active tab">
                                        <a href="#home-2" data-toggle="tab" aria-expanded="false"> 
                                            <span class=""><i class="fa fa-bookmark"></i></span> 
                                            <span class="hidden-xs">Books</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#profile-2" data-toggle="tab" aria-expanded="false"> 
                                            <span class=""><i class="fa fa-calendar-check-o"></i></span> 
                                            <span class="hidden-xs">CONFIRMED</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#messages-2" data-toggle="tab" aria-expanded="true"> 
                                            <span class=""><i class="fa fa-star"></i></span> 
                                            <span class="hidden-xs">DONE</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#settings-2" data-toggle="tab" aria-expanded="false"> 
                                            <span class=""><i class="fa fa-times"></i></span> 
                                            <span class="hidden-xs">CANCELLED</span> 
                                        </a> 
                                    </li> 
                                </ul>
                                <?php  
                                
                                function time_ago($timestamp)  
                                {  
                                     $time_ago = strtotime($timestamp);  
                                     $current_time = time();  
                                     $time_difference = $current_time - $time_ago;  
                                     $seconds = $time_difference;  
                                     $minutes      = round($seconds / 60 );           // value 60 is seconds  
                                     $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
                                     $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
                                     $weeks          = round($seconds / 604800);          // 7*24*60*60;  
                                     $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
                                     $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
                                     if($seconds <= 60)  
                                     {  
                                    return "Just Now";  
                                  }  
                                     else if($minutes <=60)  
                                     {  
                                    if($minutes==1)  
                                          {  
                                      return "one minute ago";  
                                    }  
                                    else  
                                          {  
                                      return "$minutes minutes ago";  
                                    }  
                                  }  
                                     else if($hours <=24)  
                                     {  
                                    if($hours==1)  
                                          {  
                                      return "an hour ago";  
                                    }  
                                          else  
                                          {  
                                      return "$hours hrs ago";  
                                    }  
                                  }  
                                     else if($days <= 7)  
                                     {  
                                    if($days==1)  
                                          {  
                                      return "yesterday";  
                                    }  
                                          else  
                                          {  
                                      return "$days days ago";  
                                    }  
                                  }  
                                     else if($weeks <= 4.3) //4.3 == 52/12  
                                     {  
                                    if($weeks==1)  
                                          {  
                                      return "a week ago";  
                                    }  
                                          else  
                                          {  
                                      return "$weeks weeks ago";  
                                    }  
                                  }  
                                      else if($months <=12)  
                                     {  
                                    if($months==1)  
                                          {  
                                      return "a month ago";  
                                    }  
                                          else  
                                          {  
                                      return "$months months ago";  
                                    }  
                                  }  
                                     else  
                                     {  
                                    if($years==1)  
                                          {  
                                      return "one year ago";  
                                    }  
                                          else  
                                          {  
                                      return "$years years ago";  
                                    }  
                                  }  
                                }  
                                ?>  

                                <div class="tab-content"> 
                                    <div class="tab-pane active" id="home-2">
                                     <?php
                                     include "dbconfig.php";
                                     $sid= $_SESSION['sidd'];
                                     $sql="SELECT * FROM book LEFT JOIN salon ON book.sid = salon.sid LEFT JOIN staff ON book.stfid = staff.stfid WHERE salon.sid = '$sid' AND book.status = 'Booked, waiting the for update...' ORDER BY datecreated DESC";
                                      $result = mysqli_query($conn,$sql);
                                      if (mysqli_num_rows($result)>0) {
                                      while($row= mysqli_fetch_array($result))
                                          {
                                                    ?>
                                        <div class="card-box">
                                    <div class="contact-card">
                                      <p class="text-muted small"><i class="glyphicon glyphicon-calendar m-r-10"></i><b>Date Created:</b> <?php echo date('Y/M/d h:i A', strtotime($row['datecreated'])); ?></p>
                                        <p class="pull-left" href="#">
                                            <img class="img-rounded" src="<?php echo $upload_dir.$row['simage'] ?>" alt="">
                                        </p>
                                        <div class="member-info">
                                            <h4 class="m-t-0 m-b-5 header-title text-custom"><b><?php echo $row['sername'] ?></b></h4>
                                            <p class="text-muted"><i class="fa fa-user m-r-10"></i><b>Customer:</b> <?php echo $row['username'] ?></p>
                                            <p class="text-muted"><i class="md md-assignment m-r-10"></i><b>Rate:</b> &#8369; <?php echo $row['rate'] ?></p>
                                            <p class="text-muted"><i class="fa fa-hourglass-1 m-r-10"></i><b>Duration:</b> <?php echo  date('h:i', strtotime($row['duration'])); ?></p>
                                            <p class="text-muted"><i class="fa fa-warning m-r-10"></i><b>Status:</b> <?php echo $row['status'] ?></p>
                                            <img class="img-circle" src="<?php echo $upload_dir.$row['image'] ?>" alt="">
                                            <p class="text-muted"><i class="fa fa-user m-r-10"></i><b>Staff:</b> <?php echo $row['name'] ?></p>

                                            <ul class="list-inline m-0 small text-success">
                                            <li>
                                                <p class=""><i class="md md-format-list-numbered m-r-10"></i><b>AID:</b> <?php echo $row['aid'] ?></p>
                                            </li>
                                            <li>
                                              <p class=""><i class="wi wi-sunrise m-r-10"></i><b>Date of Visit:</b> <?php echo $row['dov'] ?></p>
                                            </li>
                                            <li>
                                                <p class=""><i class="md md-schedule m-r-10"></i><b>Time:</b> <?php echo date('h:i A', strtotime($row['tym'])) ?></p>
                                            </li>
                                            </ul>
                                             <?php 
                                               date_default_timezone_set('America/Los_Angeles'); 
                                               echo time_ago($row['datecreated']); 
                                             ?>
                                          

                                            <div class="pull-right">
                                            <a href="manager-page.php?cancel=<?php echo $row['aid'] ?>" onclick="return confirm('Are you sure to cancel this appointment?')"><button type="button" class="btn btn-danger btn-custom btn-rounded waves-effect waves-light" data-toggle="tooltip" title="Cancel">Cancel</button></a>
                                            <a href="manager-page.php?confirm=<?php echo $row['aid'] ?>" onclick="return confirm('Are you sure to confirm this appointment?')"><button type="button" class="btn btn-success btn-custom btn-rounded waves-effect waves-light" data-toggle="tooltip" title="Confim">Confirm</button></a>
                                            </div>
                                        </div>

                                    </div>
                                    </div>
                                     <?php      
                                          }
                                      }else{
                                          echo "NO BOOKS YET";
                                            }
                                            mysqli_close($conn);
                                        ?>

                                
                                    </div> 

                                    <div class="tab-pane" id="profile-2">
                                      <div class="tab-pane active" id="home-2">

                                        <?php
                                     include "dbconfig.php";
                                     $sql="SELECT * FROM book LEFT JOIN salon ON book.sid = salon.sid LEFT JOIN staff ON book.stfid = staff.stfid WHERE salon.sid = '$sid' AND book.status = 'CONFIRMED' ORDER BY datecreated DESC";
                                      $result = mysqli_query($conn,$sql);
                                      if (mysqli_num_rows($result)>0) {
                                      while($row= mysqli_fetch_array($result))
                                          {
                                                    ?>
                                        <div class="card-box">
                                    <div class="contact-card">
                                      <p class="text-muted small"><i class="glyphicon glyphicon-calendar m-r-10"></i><b>Date Created:</b> <?php echo date('Y/M/d h:i A', strtotime($row['datecreated'])); ?></p>
                                        <p class="pull-left" href="#">
                                            <img class="img-rounded" src="<?php echo $upload_dir.$row['simage'] ?>" alt="">
                                        </p>
                                        <div class="member-info">
                                            <h4 class="m-t-0 m-b-5 header-title text-custom"><b><?php echo $row['sername'] ?></b></h4>
                                            <p class="text-muted"><i class="fa fa-user m-r-10"></i><b>Customer:</b> <?php echo $row['username'] ?></p>
                                            <p class="text-muted"><i class="md md-assignment m-r-10"></i><b>Rate:</b> &#8369; <?php echo $row['rate'] ?></p>
                                            <p class="text-muted"><i class="fa fa-hourglass-1 m-r-10"></i><b>Duration:</b> <?php echo  date('h:i', strtotime($row['duration'])); ?></p>
                                            <p class="text-muted"><i class="fa fa-warning m-r-10"></i><b>Status:</b> <?php echo $row['status'] ?></p>

<img class="img-circle" src="<?php echo $upload_dir.$row['image'] ?>" alt="">
                                            <p class="text-muted"><i class="fa fa-user m-r-10"></i><b>Staff:</b> <?php echo $row['name'] ?></p>
                                            <ul class="list-inline m-0 small text-success">
                                            <li>
                                                <p class=""><i class="md md-format-list-numbered m-r-10"></i><b>AID:</b> <?php echo $row['aid'] ?></p>
                                            </li>
                                            <li>
                                              <p class=""><i class="wi wi-sunrise m-r-10"></i><b>Date of Visit:</b> <?php echo $row['dov'] ?></p>
                                            </li>
                                            <li>
                                                <p class=""><i class="md md-schedule m-r-10"></i><b>Time:</b> <?php echo date('h:i A', strtotime($row['tym'])) ?></p>
                                            </li>
                                            </ul>
                                             <div class="pull-right">
                                            <a href="manager-page.php?done=<?php echo $row['aid'] ?>" onclick="return confirm('Are you sure this appointment is done?')"><button type="button" class="btn btn-success btn-custom btn-rounded waves-effect waves-light" data-toggle="tooltip" title="Done">Done</button></a>
                                            </div>           
                                        </div>

                                    </div>
                                    </div>
                                     <?php      
                                          }
                                      }else{
                                          echo "NO BOOKS YET";
                                            }
                                            mysqli_close($conn);
                                        ?>   
                                                      
                                
                                    </div> 
                                        
                                    </div> 
                                    <div class="tab-pane" id="messages-2">

                                      <?php
                                     include "dbconfig.php";
                                      $sid= $_SESSION['sidd'];
                                      $sql="SELECT * FROM book LEFT JOIN salon ON book.sid = salon.sid LEFT JOIN staff ON book.stfid = staff.stfid WHERE salon.sid = '$sid' AND book.status = 'DONE' ORDER BY datecreated DESC";
                                      $result = mysqli_query($conn,$sql);
                                      if (mysqli_num_rows($result)>0) {
                                      while($row= mysqli_fetch_array($result))
                                          {
                                                    ?>
                                        <div class="card-box">
                                    <div class="contact-card">
                                      <p class="text-muted small"><i class="glyphicon glyphicon-calendar m-r-10"></i><b>Date Created:</b> <?php echo date('Y/M/d h:i A', strtotime($row['datecreated'])); ?></p>
                                        <p class="pull-left" href="#">
                                            <img class="img-rounded" src="<?php echo $upload_dir.$row['simage'] ?>" alt="">
                                        </p>
                                        <div class="member-info">
                                            <h4 class="m-t-0 m-b-5 header-title text-custom"><b><?php echo $row['sername'] ?></b></h4>
                                            <p class="text-muted"><i class="fa fa-user m-r-10"></i><b>Customer:</b> <?php echo $row['username'] ?></p>
                                            <p class="text-muted"><i class="md md-assignment m-r-10"></i><b>Rate:</b> &#8369; <?php echo $row['rate'] ?></p>
                                            <p class="text-muted"><i class="fa fa-hourglass-1 m-r-10"></i><b>Duration:</b> <?php echo  date('h:i', strtotime($row['duration'])); ?></p>
                                            <p class="text-muted"><i class="fa fa-warning m-r-10"></i><b>Status:</b> <?php echo $row['status'] ?></p>

<img class="img-circle" src="<?php echo $upload_dir.$row['image'] ?>" alt="">
                                            <p class="text-muted"><i class="fa fa-user m-r-10"></i><b>Staff:</b> <?php echo $row['name'] ?></p>
                                            <ul class="list-inline m-0 small text-success">
                                            <li>
                                                <p class=""><i class="md md-format-list-numbered m-r-10"></i><b>AID:</b> <?php echo $row['aid'] ?></p>
                                            </li>
                                            <li>
                                              <p class=""><i class="wi wi-sunrise m-r-10"></i><b>Date of Visit:</b> <?php echo $row['dov'] ?></p>
                                            </li>
                                            <li>
                                                <p class=""><i class="md md-schedule m-r-10"></i><b>Time:</b> <?php echo date('h:i A', strtotime($row['tym'])) ?></p>
                                            </li>
                                            </ul>

                                            <a href="show-rating-guest.php?id=<?php echo $row['serid'] ?>"  target="_blank"><button type="button" class="btn btn-success btn-custom btn-rounded waves-effect waves-light pull-right" data-toggle="tooltip" title="View Rating">View Rating</button></a><br>            
                                        </div>

                                    </div>
                                    </div>
                                     <?php      
                                          }
                                      }else{
                                          echo "NO BOOKS YET";
                                            }
                                            mysqli_close($conn);
                                        ?>   
                                       
                                    </div> 
                                    <div class="tab-pane" id="settings-2">
                                      <?php
                                     include "dbconfig.php";
                                     $sid= $_SESSION['sidd'];
                                   $sql3="SELECT * FROM book LEFT JOIN salon ON book.sid = salon.sid LEFT JOIN staff ON book.stfid = staff.stfid WHERE salon.sid = '$sid' AND book.status = 'CANCELLED' ORDER BY datecreated DESC";
                                      $result3 = mysqli_query($conn,$sql3);
                                      if (mysqli_num_rows($result3)>0) {
                                      while($row3= mysqli_fetch_array($result3))
                                          {
                                                    ?>
                                        <div class="card-box">
                                    <div class="contact-card">
                                      <p class="text-muted small"><i class="glyphicon glyphicon-calendar m-r-10"></i><b>Date Created:</b> <?php echo date('Y/M/d h:i A', strtotime($row3['datecreated'])); ?></p>
                                        <p class="pull-left" href="#">
                                            <img class="img-rounded" src="<?php echo $upload_dir.$row3['simage'] ?>" alt="">
                                        </p>
                                        <div class="member-info">
                                            <h4 class="m-t-0 m-b-5 header-title text-custom"><b><?php echo $row3['sername'] ?></b></h4>
                                            <p class="text-muted"><i class="fa fa-user m-r-10"></i><b>Customer:</b> <?php echo $row3['username'] ?></p>
                                            <p class="text-muted"><i class="md md-assignment m-r-10"></i><b>Rate:</b> &#8369; <?php echo $row3['rate'] ?></p>
                                            <p class="text-muted"><i class="fa fa-hourglass-1 m-r-10"></i><b>Duration:</b> <?php echo  date('h:i', strtotime($row3['duration'])); ?></p>
                                            <p class="text-muted"><i class="fa fa-warning m-r-10"></i><b>Status:</b> <?php echo $row3['status'] ?></p>
                                            <img class="img-circle" src="<?php echo $upload_dir.$row3['image'] ?>" alt="">
                                            <p class="text-muted"><i class="fa fa-user m-r-10"></i><b>Staff:</b> <?php echo $row3['name'] ?></p>

                                            <ul class="list-inline m-0 small text-success">
                                            <li>
                                                <p class=""><i class="md md-format-list-numbered m-r-10"></i><b>AID:</b> <?php echo $row3['aid'] ?></p>
                                            </li>
                                            <li>
                                              <p class=""><i class="wi wi-sunrise m-r-10"></i><b>Date of Visit:</b> <?php echo $row3['dov'] ?></p>
                                            </li>
                                            <li>
                                                <p class=""><i class="md md-schedule m-r-10"></i><b>Time:</b> <?php echo date('h:i A', strtotime($row3['tym'])) ?></p>
                                            </li>
                                            </ul>      
                                            <div class="pull-right">
                                            <button type="button" class="btn btn-inverse btn-custom btn-rounded waves-effect waves-light" data-toggle="tooltip" title="Cancelled">Cancelled</button>
                                            
                                            </div>   
                                        </div>

                                    </div>
                                    </div>
                                     <?php      
                                          }
                                      }else{
                                          echo "NO BOOKS CANCELLED YET";
                                            }
                                            mysqli_close($conn);
                                        ?>  
                                        
                                    </div> 
                                </div> 
                            </div> 
                          
                        </div>

                    </div> <!-- container -->
                    <br><br><br><br>
                     <footer class="footer">
                    © 2019. All rights reserved.
                </footer>
                               
                </div> <!-- content -->

               

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
                                                  <?php
                                                }else {
                                                  ?>

                  <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content" style="padding-top: 70px;">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                    <div class="row">
                    <div class="card-box">
                        <center>
                        <h1>WELCOME TO ONLINE APPOINTMENT SYSTEM</h1>
                        <h2>BEAUTY SALONS</h2>
                        <h4>Lingayen, Pangasinan</h4>
                        <br>
                        <h2>Confidence is a choice!</h2>
                        <h4>
                            An Online Appointment System for Beauty Salon in Lingayen, Pangasinan is a centre of excellence in Online Booking System, we provide high quality and classic feature to your incoming Online Appointment for Beauty Salon. Our dedicated team are all IT's Graduate and easthetically trained programmer guaranteering the highest quality system.
                        </h4>
                        <h3>Become a Salon Manager</h3>
                        <h4>Today is the day so what are you waiting for?</h4>

                        <a href="" data-toggle="modal" data-target="#con-close-modal"> <button type="button" class="btn-lg btn-success btn-custom btn-rounded waves-effect waves-light" data-toggle="tooltip" title="Fill Up"><i class="glyphicon glyphicon-arrow-right"></i><span class="m-l-5"></span>Fill Up!</button></a>
                        </center>
                    </div>
                    </div>  
    

                      

                    </div> <!-- container -->
                    <br><br><br><br>
                     <footer class="footer">
                    © 2019. All rights reserved.
                    </footer>
                               
                </div> <!-- content -->

               

            </div>
                                                  <?php
                                                }
                                                ?>
            <!-- ========== Left Sidebar Start ========== -->

     
            <!-- Left Sidebar End --> 





<?php
  include('dbconfig.php');

  if(isset($_GET['cancel'])){
        $id = $_GET['cancel'];
        $sql = "SELECT * FROM book WHERE aid = ".$id;
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $sql = "UPDATE book SET status='CANCELLED' WHERE aid='$id'";
            if(mysqli_query($conn, $sql)){
                 echo ("<script>location.href = 'manager-page.php';</script>");
            }
            else
                {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
        }
    }
?>

<?php
  include('dbconfig.php');

  if(isset($_GET['confirm'])){
        $id = $_GET['confirm'];
        $sql = "SELECT * FROM book WHERE aid = ".$id;
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $sql = "UPDATE book SET status='CONFIRMED' WHERE aid='$id'";
            if(mysqli_query($conn, $sql)){
                 echo ("<script>location.href = 'manager-page.php';</script>");
            }
            else
                {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
        }
    }
?>

<?php
  include('dbconfig.php');

  if(isset($_GET['done'])){
        $id = $_GET['done'];
        $sql = "SELECT * FROM book WHERE aid = ".$id;
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $sid = $row['sid'];
            $image = $row['simage'];
            $sername = $row['sername'];
            $rate = $row['rate'];
            $tenpercent = (10 / 100) * $rate;
            $datedone = date('Y-m-d H:i:s');
            $sql = "UPDATE book SET status='DONE' WHERE aid='$id'";
            if(mysqli_query($conn, $sql)){
                 $sql1 = "INSERT INTO revenue_salon (aid, sid, image, sername, rate, tenpercent, datedone) VALUES ('$id', '$sid', '$image', '$sername', '$rate', '$tenpercent', '$datedone')";
                        if(mysqli_query($conn, $sql1)){
                     echo ("<script>location.href = 'manager-page.php';</script>");
                }
                     else
                {
                    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
                }
            }
            else
                {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
        }
    }
?>

                                    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog"> 
                                            <div class="modal-content">
                                                <div class="">
                                     <a href="manager-page.php">
                                     <button class="btn btn-icon waves-effect waves-light btn-danger pull-right" data-toggle="tooltip" title="" data-original-title="Close"> <i class="fa fa-remove"></i> </button>
                                    </a>
                                <div class="card-box">
                               
                                    <p class="text-muted font-13 m-b-30">
                                        Please fill up all the required fields.
                                    </p>
                                                
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" data-parsley-validate="" novalidate="">
                                        <div class="form-group">
                                            <label for="sid">Salon ID <span class="text-danger">*</span></label>
                                            <input type="number" data-parsley-type="number" name="sid"  parsley-trigger="change" required="" placeholder="Enter Salon's ID" class="form-control" id="sid">
                                        </div>
                                        <div class="form-group">
                                            <label for="nos">Name of Salon <span class="text-danger">*</span></label>
                                            <input type="text" name="name" parsley-trigger="change" required="" placeholder="Enter Salon's name" class="form-control" id="nos">
                                        </div>
                                        <div class="form-group">
                                            <label for="addr">Address of Salon <span class="text-danger">*</span></label>
                                            <input type="text" name="address" parsley-trigger="change" required="" placeholder="Enter Salon's address" class="form-control" id="addr">
                                        </div>
                                        <div class="form-group">
                                            <label for="city">City of Salon <span class="text-danger">*</span></label>
                                            <input type="text" name="city" parsley-trigger="change" required="" placeholder="Enter Salon's City" class="form-control" id="city">
                                        </div>
                                        <div class="form-group">
                                            <label for="con">Contact No <span class="text-danger">*</span></label>
                                            <input type="text" name="contact" data-parsley-maxlength="11" data-parsley-type="number" parsley-trigger="change" required="" placeholder="Enter Salon's Contact No." class="form-control" id="con">
                                        </div>
                                        
                                        

                                        <div class="form-group text-right m-b-0">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit" name="Submit" data-toggle="tooltip" title="Add">
                                                Submit
                                            </button>
                                            
                                        </div>
                                        
                                    </form>
                                    <?php
date_default_timezone_set('America/Los_Angeles');
function newsalon()
{
    include 'dbconfig.php';
        $sid=$_POST['sid'];
        $mid=$_SESSION['mgrid'];
        $name=$_POST['name'];
        $address=$_POST['address'];
        $city=$_POST['city'];
        $contact=$_POST['contact'];
        $datecreated1=date('Y-m-d H:i:s');
        
        $sql = "INSERT INTO salon (sid, mid, sname, address, City, Contact, datecreated1) VALUES ('$sid', '$mid', '$name','$address','$city','$contact', '$datecreated1')";
        $sql1 = "INSERT INTO manager_salon (sid, mid) VALUES ('$sid','$mid')";

    if (mysqli_query($conn, $sql)) 
    {
        echo "<h4>Salon created successfully!</h4>";
        echo ("<script>location.href = 'manager-page.php';</script>");
    } 
    else
    {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
     if (mysqli_query($conn, $sql1)) 
    {
        echo "<h4>Salon created successfully!</h4>";
        echo ("<script>location.href = 'manager-page.php';</script>");
    } 
    else
    {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    }
}
function checkcid()
{
    include 'dbconfig.php';
    $sid=$_POST['sid'];
    $sql= "SELECT * FROM salon WHERE sid = '$sid'";

    $result=mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)!=0)
       {
            echo"<b><br>sid already exists!!";
       }
    else 
        if(isset($_POST['Submit']))
    { 
        newsalon();
    }

    
}
if(isset($_POST['Submit']))
{
    if(!empty($_POST['sid'])&&!empty($_POST['name'])&&!empty($_POST['address'])&&!empty($_POST['city']) && !empty($_POST['contact']))
            checkcid();
    else
        echo "EMPTY VALUES NOT ALLOWED";
}

?>
                                </div>
                            </div>


                                            </div> 
                                        </div>
                                    </div><!-- /.modal -->

           


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

        <script src="assets/plugins/peity/jquery.peity.min.js"></script>

        <!-- jQuery  -->
        <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>

        <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>


        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 500
                });

                $(".knob").knob();

            });
        </script>

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
	</body>
</html>