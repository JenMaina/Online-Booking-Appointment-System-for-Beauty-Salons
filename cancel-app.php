<?php
include 'dbconfig.php';
include 'customer-check.php';
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
<?php include 'inc/defheader.php'; ?>
    <script>
    function getApp(val) {
	$.ajax({
	type: "POST",
	url: "get_appointment.php",
	data:'appid='+val,
	success: function(data){
		$("#appointment-list").html(data);
	}
	});
}

</script>

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include 'inc/customertopbar.php'; ?>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                        	<li class="text-muted menu-title">Navigation</li>

                            <li class="has_sub">
                                <a href="customer-page.php" class="waves-effect"><i class="ti-home"></i> <span> Beauty Salons </span></a>    
                            </li>
                            
                            
                         

                            <li class="has_sub">
                                <a href="cancel-app.php" class="waves-effect"><i class="fa fa-eye m-r-10"></i><span> Show Appointments </span></a>
                                
                            </li>

                        

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                   

                        <!-- Page-Title -->
                        <div class="row">
                          
                            <div class="col-sm-12">

                                <h4 class="page-title">Appointments</h4>
                                <ol class="breadcrumb">
                                <li><a href="customer-page.php" data-toggle="tooltip" title="Home">Home</a></li>
                                <li>Appointments</li>
                                 
                                </ol>
                               
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12"> 
                                <ul class="nav nav-tabs tabs">
                                    <li class="active tab">
                                        <a href="#home-2" data-toggle="tab" aria-expanded="false"> 
                                            <span class=""><i class="fa fa-bookmark"></i></span> 
                                            <span class="hidden-xs">Booked</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#profile-2" data-toggle="tab" aria-expanded="false"> 
                                            <span class=""><i class="fa fa-calendar-check-o"></i></span> 
                                            <span class="hidden-xs">To Visit</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#messages-2" data-toggle="tab" aria-expanded="true"> 
                                            <span class=""><i class="fa fa-star"></i></span> 
                                            <span class="hidden-xs">To Rate</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#settings-2" data-toggle="tab" aria-expanded="false"> 
                                            <span class=""><i class="fa fa-times"></i></span> 
                                            <span class="hidden-xs">Cancelled</span> 
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
                                      $username=$_SESSION['usernamec'];
                                        $sql="SELECT * FROM book LEFT JOIN salon ON book.sid = salon.sid LEFT JOIN staff ON book.stfid = staff.stfid WHERE book.username = '$username' AND book.status = 'Booked, waiting the for update...' ORDER BY datecreated DESC";
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
                                            <p class="text-muted"><i class="md md-store-mall-directory m-r-10"></i><b>Salon:</b> <?php echo $row['sname'] ?></p>
                                            <p class="text-muted"><i class="md md-assignment m-r-10"></i><b>Rate: &#8369; </b><?php echo $row['rate'] ?></p>
                                            <p class="text-muted"><i class="fa fa-hourglass-1 m-r-10"></i><b>Duration:</b> <?php echo date('h:i', strtotime($row['duration'])); ?></p>
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
                                            <a href="cancel-app.php?cancel=<?php echo $row['aid'] ?>" onclick="return confirm('Are you sure to cancel this appointment?')"><button type="button" class="btn btn-danger btn-custom btn-rounded waves-effect waves-light" data-toggle="tooltip" title="Cancel">Cancel</button></a>
                                            
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
                                      $username=$_SESSION['usernamec'];
                                      $sql="SELECT * FROM book LEFT JOIN salon ON book.sid = salon.sid LEFT JOIN staff ON book.stfid = staff.stfid WHERE book.username = '$username' AND book.status = 'CONFIRMED' ORDER BY datecreated DESC";
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
                                            <p class="text-muted"><i class="md md-store-mall-directory m-r-10"></i><b>Salon:</b> <?php echo $row['sname'] ?></p>

                                            <p class="text-muted"><i class="md md-assignment m-r-10"></i><b>Rate: &#8369; </b><?php echo $row['rate'] ?></p>
                                            <p class="text-muted"><i class="fa fa-hourglass-1 m-r-10"></i><b>Duration:</b> <?php echo date('h:i', strtotime($row['duration'])); ?></p>
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
                                            <button type="button" class="btn btn-warning btn-custom btn-rounded waves-effect waves-light" data-toggle="tooltip" title="Confirmed">Confirmed</button>
                                            
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
                                      $username=$_SESSION['usernamec'];
                                      $sql="SELECT * FROM book LEFT JOIN salon ON book.sid = salon.sid LEFT JOIN staff ON book.stfid = staff.stfid WHERE book.username = '$username' AND book.status = 'DONE' ORDER BY datecreated DESC";
                                      $result = mysqli_query($conn,$sql);
                                      if (mysqli_num_rows($result)>0) {
                                      while($row= mysqli_fetch_array($result))

                                          {
                                           
                                            $_SESSION['sid'] = $row['sid'];
                                            
                                                    ?>
                                        <div class="card-box">
                                    <div class="contact-card">
                                      <p class="text-muted small"><i class="glyphicon glyphicon-calendar m-r-10"></i><b>Date Created:</b> <?php echo date('Y/M/d h:i A', strtotime($row['datecreated'])); ?></p>
                                        <p class="pull-left" href="#">
                                            <img class="img-rounded" src="<?php echo $upload_dir.$row['simage'] ?>" alt="">
                                        </p>
                                        <div class="member-info">
                                            <h4 class="m-t-0 m-b-5 header-title text-custom"><b><?php echo $row['sername'] ?></b></h4>
                                            <p class="text-muted"><i class="md md-store-mall-directory m-r-10"></i><b>Salon:</b> <?php echo $row['sname'] ?></p>

                                            <p class="text-muted"><i class="md md-assignment m-r-10"></i><b>Rate: &#8369; </b><?php echo $row['rate'] ?></p>
                                            <p class="text-muted"><i class="fa fa-hourglass-1 m-r-10"></i><b>Duration:</b> <?php echo date('h:i', strtotime($row['duration'])); ?></p>
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
  require_once('dbconfig.php');
    $aid = $row['aid'];
    $sql1 = "SELECT * FROM rating WHERE aid= $aid";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) > 0) {
      $row1 = mysqli_fetch_assoc($result1);
      ?>
       <a href="show-rating.php?id=<?php echo $row['serid'] ?>"><button type="button" class="btn btn-success btn-custom btn-rounded waves-effect waves-light pull-right" data-toggle="tooltip" title="Rate">View Rating</button></a><br>
      <?php
    }else {
        ?>
        <a href="modal-view-rating.php?aid=<?php echo $row['aid'] ?>" data-toggle="modal" data-target="#con-close-modal"><button type="button" class="btn btn-success btn-custom btn-rounded waves-effect waves-light pull-right" data-toggle="tooltip" title="Rate">Rate</button></a><br>
        <?php
    }
?>


                                                      
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
                                      $username=$_SESSION['usernamec'];
                                   $sql3="SELECT * FROM book LEFT JOIN salon ON book.sid = salon.sid LEFT JOIN staff ON book.stfid = staff.stfid WHERE book.username = '$username' AND book.status = 'CANCELLED' ORDER BY datecreated DESC";
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
                                            <p class="text-muted"><i class="md md-store-mall-directory m-r-10"></i><b>Salon:</b> <?php echo $row3['sname'] ?></p>

                                            <p class="text-muted"><i class="md md-assignment m-r-10"></i><b>Rate: &#8369; </b><?php echo $row3['rate'] ?></p>
                                            <p class="text-muted"><i class="fa fa-hourglass-1 m-r-10"></i><b>Duration:</b> <?php echo date('h:i', strtotime($row3['duration'])); ?></p>
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
                </div> <!-- content -->

                <footer class="footer">
                    © 2019. All rights reserved.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

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
                 echo ("<script>location.href = 'cancel-app.php';</script>");
            }
            else
                {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
        }
    }
?>


        </div>
        <!-- END wrapper -->

<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog"> 

                                            <div class="modal-content">
                                                
                                            </div> 
                                        </div>
                                    </div><!-- /.modal -->


<?php include 'inc/customerfooternm.php'; ?>