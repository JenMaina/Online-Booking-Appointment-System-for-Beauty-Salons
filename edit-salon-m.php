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


<?php
//index.php
include 'dbconfig.php';
function make_query($conn)
{
  $sid = $_SESSION['sid'];
 $query = "SELECT * FROM baner WHERE sid = $sid ORDER BY bid DESC";
 $result = mysqli_query($conn, $query);
 return $result;
}

function make_slide_indicators($conn)
{
 $output = ''; 
 $count = 0;
 $result = make_query($conn);
 while($row = mysqli_fetch_array($result))

 {
  if($count == 0)
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>
   ';
  }
  else
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>
   ';
  }

  $count = $count + 1;
 }
 return $output;

}

function make_slides($conn)
{
 $output = '';
 $count = 0;
 $result = make_query($conn);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '<div class="item active">';
  }
  else
  {
   $output .= '<div class="item">';
  }
  $output .= '

   <img src="uploads/'.$row["image"].'" alt="'.$row["title"].'" />
   <div class="carousel-caption">

   <h5 class="text-white">'.$row["msg"].'</h5>
    <h4 class="text-white">'.$row["title"].'</h4>
                                            <h3 class="text-center">          
                                                  

                                                    <a href="edit-salon-m.php?delete='. $row['bid'] .'" title="Delete" data-toggle="tooltip" onclick="return confirm(\'Are you sure to delete this?\');"><span class="glyphicon glyphicon-trash text-danger"></span></a>
                                            </h3>

   </div>
</div>

  ';
  $count = $count + 1;
 }
 return $output;
}
?> 


<!-- delete banner -->
 <?php
  include('dbconfig.php');

  if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $sql = "SELECT * FROM baner WHERE bid = ".$id;
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $sql = "DELETE FROM baner WHERE bid=".$id;
            if(mysqli_query($conn, $sql)){
                 echo ("<script>location.href = 'edit-salon-m.php?id=". $_SESSION['sid']."';</script>");
            }
            else
                {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
        }
    }
?>

      <!-- <a href="modal-view-edit-baner.php?edit='. $row['bid'] .'" title="Edit" data-toggle="modal" data-target="#con-close-modal"><span class="glyphicon glyphicon-edit text-success"></span></a> -->



      <!-- remove fservice -->
        <?php
  include('dbconfig.php');

  if(isset($_GET['remove'])){
        $id = $_GET['remove'];
        $sql = "SELECT * FROM fservice WHERE serid = ".$id;
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $sql = "DELETE FROM fservice WHERE serid=".$id;
            if(mysqli_query($conn, $sql)){
                 echo ("<script>location.href = 'edit-salon-m.php?id=". $_SESSION['sid'] ."';</script>");
            }
            else
                {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
        }
    }
?>

<!-- delete service -->
<?php
  include('dbconfig.php');

  if(isset($_GET['deleteser'])){
        $id = $_GET['deleteser'];
        $sql = "SELECT * FROM service1 WHERE serid = ".$id;
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $sql = "DELETE FROM service1 WHERE serid=".$id;
            if(mysqli_query($conn, $sql)){
                 echo ("<script>location.href = 'edit-salon-m.php?id=". $_SESSION['sid']."';</script>");
            }
            else
                {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
        }
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
<?php
  require_once('dbconfig.php');
  $upload_dir = 'uploads/';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM salon WHERE sid=".$id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['sid']=$row['sid'];
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }

?>
                    <div class="row">
                            <div class="col-sm-12">
                                <div class="btn-group pull-right m-t-15">
                                    <a href="manager-page.php" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" title="back">BACK <span class="m-l-5"><i class="md md-backspace"></i></span></a>
                                   
                                </div>

                                <h4 class="page-title">Edit Salon</h4>
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="manager-page.php" data-toggle="tooltip" title="Home">Manager Home</a>
                                    </li>
                                    <li class="active">
                                        <?php echo  $row['sname'] ?>

                                    </li>
                                   
                                </ol>
                            </div>
                        </div>



                             <div class="row">
                            <div class="col-md-12 col-lg-12">
                              
                                
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            
                                            <!-- START carousel-->
                                            <h3 class="text-center"><a href="" title="Add" data-toggle="modal"  data-target="#con-close-modal1"><span class="glyphicon glyphicon-plus text-custom"></span></a><h3>
                                            <div id="dynamic_slide_show" data-ride="carousel" class="carousel slide">
                                                <ol class="carousel-indicators">
                                                <?php echo make_slide_indicators($conn); ?>

                                                </ol>
                                                <div role="listbox" class="carousel-inner">
                                                    <?php echo make_slides($conn); ?>
                                    
                                                </div>
                                                <a href="#dynamic_slide_show" role="button" data-slide="prev" class="left carousel-control"> <span aria-hidden="true" class="fa fa-angle-left"></span> <span class="sr-only">Previous</span> </a>
                                                <a href="#dynamic_slide_show" role="button" data-slide="next" class="right carousel-control"> <span aria-hidden="true" class="fa fa-angle-right"></span> <span class="sr-only">Next</span> </a>


                                            </div>
                                             
                                           
                                            <!-- END carousel-->
                                        </div>

                                       
                                    </div>
                                    <br>
                                    <div class="card-box">
                                    <h3 class="pull-right"><a href="edit-salon-info.php?id=<?php echo $row['sid'] ?>" title="Edit Info" data-toggle="tooltip"><span class="glyphicon glyphicon-edit text-success"></span></a></h3>
                                    <div class="row">
                                    <div class="col-sm-12">

                                    <div class="text-center">
                                    <ul class="list-inline status-list m-t-20">

                                            <li>
                                                <h3 class="text-primary m-b-5">WELCOME</h3>
                                                <p class="m-t-10"><em><?php echo $row['welcome'] ?></em></p>
                                            </li>

                                        </ul>
                                    </div>    
                                    </div>


                                     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        
                                            <div class=" col-sm-3 col-md-3 col-lg-3">
                                                <img src="<?php echo $upload_dir.$row['image'] ?>" class="img-responsive img-rounded">
                                                
                                            </div>

                                            <div class="col-sm-9 col-md-9 col-lg-9">
                               
                                          <div class="text-center m-t-30">
                                         
                                            <h3 class='title'><?php echo  $row['sname'] ?></h3><br>
                                             <h4><i class='md md-info'></i><b></b> <?php echo  $row['quotes'] ?> <i class='md md-info'></i></h4>
                                            

                                           

                                            </div>
                                            </div>  
                                           
                                                   
                                     </div>
                                    </div>
                                    </div>
                            
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                <h3 class="text-center"><a href="" title="Add" data-toggle="modal" data-target="#con-close-modalfs"><span class="glyphicon glyphicon-plus text-custom"></span></a><h3>
                                    
                                    <h4 class=" m-t-0 header-title"><b>Featured Services offered</b></h4><br>
                                    <div class="owl-carousel owl-theme" id="owl-multi">
                                    <?php
                                   include 'dbconfig.php';
                                    $upload_dir = 'uploads/';
                                    $sid = $_SESSION['sid'];
                                   $sql="SELECT t1.*, t2.* FROM service1 t1 JOIN fservice t2 ON t1.sid = $sid WHERE t1.serid = t2.serid";
                                    $result = mysqli_query($conn,$sql);
                                    if (mysqli_num_rows($result)>0) {
                                    while($row = mysqli_fetch_array($result)) {    
                                            ?>                            
                                        <div class="item">
                                            <img src="<?php echo $upload_dir.$row['image'] ?>">
                                            <h3 class="text-center">          
                                                    <a href="edit-salon-m.php?remove=<?php echo $row['serid'] ?>" title="Remove" data-toggle="tooltip" onclick="return confirm('Are you sure to remove this?');"><span class="glyphicon glyphicon-remove text-danger"></span></a>
                                            </h3>
                                            <h5 class='title text-center'><?php echo  $row['sername'] ?></h5>
                                           
                                        </div>
                                        


                                    <?php
                                    }
                                    }
                                    else {
                                        echo "<div class='wrapper-page'>
                                                                    <div class='ex-page-content text-center'>
                                                                    
                                                                        <h5>NO RESULTS FOUND</h5>
                                                                    </div>
                                                                </div>";
                                    }
                                    mysqli_close($conn);
                                    ?>
                                        </div>
                                               </div>
                                                    </div>
                                                            </div>


        <div class="row">
                            <div class="m-b-15">
                                

                                        <?php
                                      include 'dbconfig.php';
                                        $id = $_GET['id'];
                                        $upload_dir = 'uploads/';
                                        $sql="SELECT * FROM service1 WHERE sid=$id order by sername ASC";
                                        $result = mysqli_query($conn,$sql);
                                        if (mysqli_num_rows($result)>0) {
                                     
                                        while($row = mysqli_fetch_array($result)) {
                                        ?>
                                          

                                          <div class="col-sm-6 col-lg-3 col-md-3 mobiles">
                                    <div class="product-list-box thumb">
                                        <a href="serviceedit.php?id=<?php echo  $row['serid'] ?>" class="image-popup" title="<?php echo  $row['sername'] ?>" data-toggle="tooltip">
                                            <img src="<?php echo $upload_dir.$row['image'] ?>" class="thumb-img thumbnail" alt="thumbnail">
                                        </a>

                                          <div class="product-action">
                                            <a href="serviceedit.php?id=<?php echo  $row['serid'] ?>" title="edit" data-toggle="tooltip"  class="btn btn-success btn-sm"><i class="md md-mode-edit"></i></a>
                                            <a href="edit-salon-m.php?deleteser=<?php echo $row['serid'] ?>" title="delete" data-toggle="tooltip" onclick="return confirm('Are you sure to delete this?');" class="btn btn-danger btn-sm"><i class="md md-close"></i></a>
                                        </div>

                                       

                                        <div class="price-tag">
                                           &#8369;<?php echo  $row['rate'] ?>
                                        </div>
                                        <div class="detail">
                                            <h4 class="m-t-0"><a href="serviceedit.php?id=<?php echo  $row['serid'] ?>" class="text-dark"><?php echo  $row['sername'] ?></a> </h4>
                                            <div class="rating">
                                                <ul class="list-inline">
                                                      <a href="show-rating-guest.php?id=<?php echo $row['serid'] ?>" data-toggle="tooltip" title="Ratings"  target="_blank">
  <?php
  require_once('dbconfig.php');
  $serid = $row['serid'];
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
                                            
                                        </div>
                                        <h4 class="m-0"> <span class="text-muted">Duration: <?php echo  date('h:i', strtotime($row['duration'])); ?></span></h4>
                                    </div>
                                       </div>
        

                                        <?php
                                        }
                                        }
                                        else {
                                            ?>
                                            <div class="col-sm-6 col-lg-3 col-md-3 mobiles">
                                    <div class="product-list-box thumb">
                                        <a href="javascript:void(0);" class="image-popup" title="service">
                                            <img src="assets/empty.jpg" class="thumb-img" alt="thumbnail">
                                        </a>

                                     

                                        <div class="price-tag">
                                            0.00
                                        </div>
                                        <div class="detail">
                                            <h4 class="m-t-0"><a href="" class="text-dark">empty</a> </h4>
                                            <div class="rating">
                                                <ul class="list-inline">
                                                    <li><a class="fa fa-star" href=""></a></li>
                                                    <li><a class="fa fa-star" href=""></a></li>
                                                    <li><a class="fa fa-star" href=""></a></li>
                                                    <li><a class="fa fa-star" href=""></a></li>
                                                    <li><a class="fa fa-star-o" href=""></a></li>
                                                </ul>
                                            </div>
                                            <h5 class="m-0"> <span class="text-muted">Duration: 0</span></h5>
                                        </div>
                                    </div>
                                       </div>
                                            <?php
                                        }
                                     
                                        mysqli_close($conn);
                                        ?>



                               
                            </div>
         </div> <!-- End row -->
                            <?php
  include 'dbconfig.php';
  $upload_dir = 'uploads/';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM salon WHERE sid=".$id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['sid']=$row['sid'];
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }

?>
               

                        <div class="card-box m-t-20">
                        <div class="row">
                          <h3 class='title text-center'><img src="<?php echo $upload_dir.$row['image'] ?>" class="img-rounded thumb-sm"> <?php echo  $row['sname'] ?></h3><br>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <h4 class='title'>Contact Us <a href="edit-salon-info.php?id=<?php echo $row['sid'] ?>" title="update" data-toggle="tooltip"  class="btn btn-success btn-sm"><i class="md md-mode-edit"></i></a></h4>
                             <div class="m-t-30">
                                            <p class="text-muted font-14"><i class="md md-email"></i><strong> Email :</strong><span class="m-l-15"><?php echo  $row['email'] ?></span></p>
                                            <p class="text-muted font-14 m-t-20"><i class="md md-smartphone"></i><strong> Phone :</strong><span class="m-l-15"><?php echo  $row['contact'] ?></span></p>
                                            <p class="text-muted font-14 m-t-20"><i class="md md-room"></i><strong> Address :</strong> <span class="m-l-15"><?php echo  $row['address'] ?></span></p>

                                             <div class="button-list m-t-20 text-center">
                                                 <h4 class='title'>Follow Us</h4>
                                            <button type="button" class="btn btn-facebook waves-effect waves-light">
                                               <i class="fa fa-facebook"></i>
                                            </button>

                                            <button type="button" class="btn btn-twitter waves-effect waves-light">
                                               <i class="fa fa-twitter"></i>
                                            </button>

                                            <button type="button" class="btn btn-instagram waves-effect waves-light">
                                               <i class="fa fa-instagram"></i>
                                            </button>
                                    

                                        </div>
                                </div>
                            </div>


                            <!-- <div class="col-sm-3 col-md-3 col-lg-3">
                                             <div class="text-center">

                                                 <h4 class='title'>Opening Hours <a href="modal-view-update-workingtime.php" title="Update" data-toggle="modal" data-target="#con-close-modal" class="btn btn-success btn-sm"><i class="md md-mode-edit"></i></i></a></h4>
                                                  </div>
                                             </div> -->


<?php
  require_once('dbconfig.php');
  $upload_dir = 'uploads/';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM workingtime WHERE sid='$id' ORDER by nod ASC";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        ?>
                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                <div class="text-center">
                                                 <h4 class='title'>Opening Hours 
                                                        <?php if (mysqli_num_rows($result) != 7) {
                                                        ?>
                                                        <a href="" title="Add" data-toggle="modal" data-target="#con-close-modal2" class="btn btn-success btn-sm"><i class="md md-add"></i></i></a><?php
                                                        }
                                                        ?>
                                                    &nbsp;<a href="" title="Add" data-toggle="modal" data-target="#con-close-modal3" class="btn btn-success btn-sm"><i class="md md-mode-edit"></i></i></a></h4><br>
     <?php
    while($row = mysqli_fetch_array($result)) { 
         $_SESSION['sid']=$row['sid'];
      ?>
                                                  <p class="text-muted font-14 m-t-30"><strong> <?php echo  $row['weekdays'] ?> :</strong> <span class="m-l-15"><?php echo date('h:i A', strtotime($row['fro']));  ?> - <?php echo date('h:i A', strtotime($row['tto']));  ?></span></p>                                              
    <?php
    }
    ?>
                                                 </div>
                                                </div>
    <?php
    }else {
        ?>

                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                             <div class="text-center">

                                                 <h4 class='title'>Opening Hours <a href="" title="Add" data-toggle="modal" data-target="#con-close-modal2" class="btn btn-success btn-sm"><i class="md md-add"></i></i></a></h4>

                                                  <p class="text-muted font-14 m-t-30"><strong> Monday :</strong> <span class="m-l-15">00:00am - 00:00pm</span></p>
                                                  <p class="text-muted font-14"><strong> Tuesday :</strong> <span class="m-l-15">00:00am - 00:00pm</span></p>
                                                  <p class="text-muted font-14"><strong> Wednesday :</strong> <span class="m-l-15">00:00am - 00:00pm</span></p>
                                                  <p class="text-muted font-14"><strong> Thursday :</strong> <span class="m-l-15">00:00am - 00:00pm</span></p>
                                                  <p class="text-muted font-14"><strong> Friday :</strong> <span class="m-l-15">00:00am - 00:00pm</span></p>
                                                  <p class="text-muted font-14"><strong> Saturday :</strong> <span class="m-l-15">00:00am - 00:00pm</span></p>
                                                  <p class="text-muted font-14"><strong> Sunday :</strong> <span class="m-l-15">00:00am - 00:00pm</span></p>

                                                
                                             </div>
                                             </div>
      <?php
    }
  }

?>

<?php
  require_once('dbconfig.php');
  $upload_dir = 'uploads/';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM maps WHERE sid=".$id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['sid']=$row['sid'];

      ?>
                                             <div class="col-sm-5 col-md-5 col-lg-5">
                                             <div class="text-center">
                                                 <h4 class='title'>Where are we located? <a href="" title="Update" data-toggle="modal" data-target="#con-close-modal5" class="btn btn-success btn-sm"><i class="md md-mode-edit"></i></i></a></h4>
                                                 <div class="google-maps">
                                                    <?php echo  $row['url'] ?>
                                                </div>
                                                
                                             </div>
                                             </div>   
    <?php 
    }else {
        ?>
                                            <div class="col-sm-5 col-md-5 col-lg-5">
                                             <div class="text-center">
                                                 <h4 class='title'>Where are we located? <a href="" title="Add" data-toggle="modal" data-target="#con-close-modal4" class="btn btn-success btn-sm"><i class="md md-add"></i></i></a></h4>
                                                 <div class="google-maps">
                                                    
                                                </div>
                                                
                                             </div>
                                             </div> 
      <?php
    }
  }

?>

                            
                        </div>
                            
                        </div>
                        


                        



                 
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


            <!-- add baner -->

                        <div id="con-close-modal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog"> 

                                            <div class="modal-content">
  <?php
  require_once('dbconfig.php');
  $upload_dir = 'uploads/';

  if (isset($_POST['Submit'])) {
    $ttl = $_POST['ttl'];
    $msg = $_POST['msg'];
    $sid =  $_SESSION['sid'];

        $imgName = $_FILES['image']['name'];
        $imgTmp = $_FILES['image']['tmp_name'];
        $imgSize = $_FILES['image']['size'];

    if(empty($ttl)){
            $errorMsg = 'Please input Title';
        }elseif(empty($msg)){
            $errorMsg = 'Please input Message';
        }else{

            $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

            $allowExt  = array('jpeg', 'jpg', 'png', 'gif');

            $userPic = time().'_'.rand(1000,9999).'.'.$imgExt;

            if(in_array($imgExt, $allowExt)){

                if($imgSize < 5000000){
                    move_uploaded_file($imgTmp ,$upload_dir.$userPic);
                }else{
                    $errorMsg = 'Image too large';
                }
            }else{
                $errorMsg = 'Please select a valid image';
            }
        }


        if(!isset($errorMsg)){
            $sql = "INSERT INTO baner(title, msg, image, sid)
                    VALUES('".$ttl."', '".$msg."', '".$userPic."', '".$sid."')";
            $result = mysqli_query($conn, $sql);
            if($result){
                $successMsg = 'New record added successfully';
                echo ("<script>location.href = 'edit-salon-m.php?id=". $_SESSION['sid']."';</script>");
            }else{
                $errorMsg = 'Error '.mysqli_error($conn);
            }
        }
  }
?>

    <body class="fixed-left">

        <!-- Begin page -->

            <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="card-header">
            <a href="" type="button" class="close">×</a>
                 <h4 class="title">Add Banner</h4>
              </div>
              <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
             
              <div class="row">
                <div class="col-md-12">
                <div class="card-box">
                    <div class="form-group">

                      <label for="ttl">Title <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="ttl" required="" placeholder="Enter Banner Title">
                    </div>
                    <div class="form-group">
                      <label for="msg">Message <span class="text-danger">*</span></label>
                      <textarea type="text" class="form-control" name="msg" required="" placeholder="Enter Banner Message"></textarea>
                    </div>
                    <div class="form-group">
                    <label for="ttl">Image <span class="text-danger">*</span></label>
                     <input type="file" class="filestyle" data-iconname="fa fa-cloud-upload" name="image" required="">
                    </div>
                    <button onclick="return confirm('Are you sure to edit this record?')" type="submit" name="Submit" class="btn btn-success waves-effect waves-light pull-right">Add</button>
                    </div>
                    
                </div>
                     
                      
              </div>
           
                                                   
                                                    
                                    
                     
                                                
                
          </form>
          
         
          </div>
        </div>
      </div> 
                                            </div> 
                                        </div>
                                    </div><!-- /.modal -->

                                    <!-- add f service -->

                                    <div id="con-close-modalfs" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog"> 

                                            <div class="modal-content">
     <?php
if(isset($_POST['Submit']))
{
        include 'dbconfig.php';
        $sid = $_SESSION['sid'];
        $serid=$_POST['serid'];
        
                $sql = "INSERT INTO fservice (sid, serid) VALUES ('$sid','$serid')";

                if (mysqli_query($conn, $sql)) 
                {
                      $sql1="UPDATE service1 SET fs=1 WHERE serid=$serid";
                      if (mysqli_query($conn, $sql1)) 
                        { 
                            echo "<h4>Successfully Added!</h4>";
                            echo ("<script>location.href = 'edit-salon-m.php?id=". $_SESSION['sid']."';</script>");
                        } 
                        else
                        {
                            echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
                        }  
                        
                            

                } 
                else
                {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    echo "<h4>Already Added!</h4>";
                    echo ("<script>location.href = 'edit-salon-m.php?id=". $_SESSION['sid']."';</script>");
                }
                
}

?>  

    <body class="fixed-left">

        <!-- Begin page -->

            <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="card-header">
            <a href="" type="button" class="close">×</a>
                 <h4 class="title">Add Featured Service</h4>
              </div>
              <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
             
              <div class="row">
                <div class="col-md-12">
                                             <select class="form-control select2" required="" name="serid" id="salon-list" class="demoInputBox">
                                                <option>Select Service</option>
                                                <optgroup label="Services">
                                                <?php
                                                $sid = $_SESSION['sid'];
                                                $sql1="SELECT * FROM service1 WHERE sid=$sid AND fs = 0 order by sername ASC";
                                                $results=$conn->query($sql1); 
                                                while($rs=$results->fetch_assoc()) { 
                                                ?>
                                                <option value="<?php echo $rs["serid"]; ?>"><?php echo $rs["sername"]; ?></option>
                                                <?php
                                                }
                                                ?>
        
                                                    
                                                </optgroup>
                                            </select><br><br>
                                            <button class="btn btn-default waves-effect waves-light pull-right" name="Submit" type="submit">
                                                Add
                                            </button>
                    
                </div>
                     
                      
              </div>
           
                                                   
                                                    
                                    
                     
                                                
                
          </form>
          
         
          </div>
        </div>
      </div>  
                                            </div> 
                                        </div>
                                    </div><!-- /.modal -->


                         <!--            add working time -->
                     <div id="con-close-modal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog"> 

                                                                <div class="modal-content">
                                                                  <?php

require_once("dbconfig.php");
            if(isset($_POST['Submit']))
        {
            
            $sid=$_SESSION['sid'];
            $nod=$_POST['weekdays'];
            $fro=$_POST['fro'];
            $tto=$_POST['tto'];


            $sql = "SELECT * FROM weekdays WHERE nod=".$nod;
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
              $days=$row['days'];
            }else {
              $errorMsg = 'Could not Find Any Record';
            }
            
                
                $updatequery="INSERT INTO workingtime (sid, nod, weekdays, fro, tto) VALUES ('$sid', '$nod', '$days', '$fro', '$tto')";
                if (mysqli_query($conn, $updatequery)) 
                {
                        echo ("<script>location.href = 'edit-salon-m.php?id=". $_SESSION['sid']."';</script>");

                } 
                else
                {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
    
?>


    <body class="fixed-left">

        <!-- Begin page -->

            <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="card-header">
            <a href="" type="button" class="close">×</a>
                 <h4 class="title">Add Working Time</h4>
              </div>
              <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
             
              <div class="row">
                <div class="col-md-12">
                <div class="card-box">
                    
                    <select class="form-control select2" required="" name="weekdays" id="days-list" class="demoInputBox">
                                             
                                                <optgroup label="Week Days">
                                                <?php
                                              ;
                                                $sql1="SELECT * FROM weekdays ORDER BY nod ASC";
                                                $results=$conn->query($sql1); 
                                                while($rs=$results->fetch_assoc()) {
                                                 
                                                ?>
                                                <option value="<?php echo $rs["nod"]; ?>" required=""><?php echo $rs["days"]; ?></option>
                                                <?php
                                                }
                                                ?>
        
                                                    
                                                </optgroup>
                                            </select>
                                            <br><br>
                                            <div class="col-md-6">
                                            <label>FROM</label>
                                                <div class="input-group m-b-15">

                                                    <div class="bootstrap-timepicker">
                                                        <input id="timepicker2" type="text" class="form-control" name="fro" required="">
                                                    </div>
                                                    <span class="input-group-addon bg-custom b-0 text-white"><i class="glyphicon glyphicon-time"></i></span>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                            <label>TO</label>
                                                <div class="input-group m-b-0">

                                                    <div class="bootstrap-timepicker">
                                                        <input id="timepicker2" type="text" name="tto" class="form-control" required="">
                                                    </div>
                                                    <span class="input-group-addon bg-custom b-0 text-white"><i class="glyphicon glyphicon-time"></i></span>
                                                </div><!-- input-group -->
                                                </div>
                    <br><br><br><br>
                    <button onclick="return confirm('Are you sure to edit this record?')" type="submit" name="Submit" class="btn btn-success waves-effect waves-light pull-right">Add</button>
                    </div>
                    
                </div>
                     
                      
              </div>
           
                                                   
                                                    
                                    
                     
                                                
                
          </form>

     
          
         
          </div>
        </div>
      </div>

                                                                    
                                                                </div> 
                                                            </div>
                                                        </div><!-- /.modal -->

                                                          <!-- update wotking time -->

                      <div id="con-close-modal3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                      <div class="modal-dialog">


                                          <div class="modal-content">
                                            <?php include "dbconfig.php"; ?>
<script>
    function getFrom(val) {
    $.ajax({
    type: "POST",
    url: "get_from.php",
    data:'weekdays='+val,
    success: function(data){
        $("#from-list").html(data);
    }
    });
}

function getTo(val) {
    $.ajax({
    type: "POST",
    url: "get_to.php",
    data:'weekdays='+val,
    success: function(data){
        $("#to-list").html(data);
    }
    });
}
</script>
    <?php 
if(!isset($_SESSION)){
    session_start();
}
    ?>
         <?php

require_once("dbconfig.php");
            if(isset($_POST['Submit']))
        {
            
            $sid=$_SESSION['sid'];
            $weekdays=$_POST['weekdays'];
            $fro=$_POST['fro'];
            $tto=$_POST['tto'];
            
                
                $updatequery="UPDATE workingtime SET fro='".$fro."', tto='".$tto."' WHERE weekdays='".$weekdays."'";
                if (mysqli_query($conn, $updatequery)) 
                {
                        echo ("<script>location.href = 'edit-salon-m.php?id=". $_SESSION['sid']."';</script>");

                } 
                else
                {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
    
?>


    <body class="fixed-left">

        <!-- Begin page -->

            <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="card-header">
            <a href="" type="button" class="close">×</a>
                 <h4 class="title">Update Working Time</h4>
              </div>
              <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
             
              <div class="row">
                <div class="col-md-12">
                <div class="card-box">
                    
                    <select class="form-control select2" required="" name="weekdays" id="days-list" class="demoInputBox" onChange="getFrom(this.value); getTo(this.value);">
                                                <option>Select Day</option>
                                                <optgroup label="Week Days">
                                                <?php
                                              ;

                                                $sid=$_SESSION['sid'];
                                                $sql1="SELECT distinct sid, weekdays FROM workingtime WHERE sid='$sid' ORDER BY nod ASC";
                                                $results=$conn->query($sql1); 
                                                while($rs=$results->fetch_assoc()) {
                                                 
                                                ?>
                                                <option value="<?php echo $rs["weekdays"]; ?>"><?php echo $rs["weekdays"]; ?></option>
                                                <?php
                                                }
                                                ?>
        
                                                    
                                                </optgroup>
                                            </select>


                                            

                                            <br><br>
                                            <div class="col-md-6">
                                            <label>FROM</label>
                                                <div class="input-group m-b-15">

                                                    <div class="bootstrap-timepicker" id="from-list" name="fro">
                                                       
                                                    </div>
                                                    <span class="input-group-addon bg-custom b-0 text-white"><i class="glyphicon glyphicon-time"></i></span>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                            <label>TO</label>
                                                <div class="input-group m-b-0">

                                                    <div class="bootstrap-timepicker" id="to-list" name="tto">
                                                       
                                                    </div>
                                                    <span class="input-group-addon bg-custom b-0 text-white"><i class="glyphicon glyphicon-time"></i></span>
                                                </div><!-- input-group -->
                                                </div>
                    <br><br><br><br>
                    <button onclick="return confirm('Are you sure to edit this record?')" type="submit" name="Submit" class="btn btn-success waves-effect waves-light pull-right">Update</button>
                    </div>
                    
                </div>
                     
                      
              </div>
           
                                                   
                                                    
                                    
                     
                                                
                
          </form>

     
          
         
          </div>
        </div>
      </div>    
                                              
                                          </div> 
                                      </div>
                                  </div><!-- /.modal -->

                                  <!-- add map -->
                                  <div id="con-close-modal4" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog"> 

                                                                <div class="modal-content">
                                                                   <?php

require_once("dbconfig.php");
            if(isset($_POST['Submit']))
        {
            $emd=$_POST["emb"];
            $sid=$_SESSION['sid'];
            
                $updatequery="INSERT INTO maps (sid, url) VALUES ('$sid', '$emd')";
                if (mysqli_query($conn, $updatequery)) 
                {
                        echo ("<script>location.href = 'edit-salon-m.php?id=". $_SESSION['sid']."';</script>");

                } 
                else
                {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
    
?>


    <body class="fixed-left">

        <!-- Begin page -->

            <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="card-header">
            <a href="" type="button" class="close">×</a>
                 <h4 class="title">Add Google map Location</h4>
              </div>
              <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
             
              <div class="row">
                <div class="col-md-12">
                <div class="card-box">
                    <div class="form-group">

                      <label for="ttl">Enter Embeded code <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="emb" required="" placeholder="Enter Embeded Code Here">
                    </div>
                    
                    <button onclick="return confirm('Are you sure to edit this record?')" type="submit" name="Submit" class="btn btn-success waves-effect waves-light pull-right">Add</button>
                    </div>
                    
                </div>
                     
                      
              </div>
           
                                                   
                                                    
                                    
                     
                                                
                
          </form>

     
          
         
          </div>
        </div>
      </div>   

                                                                    
                                                                </div> 
                                                            </div>
                                                        </div><!-- /.modal -->


                                                        <!-- update map -->
                                                        <div id="con-close-modal5" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog"> 

                                                                <div class="modal-content">

                                                                  <?php

require_once("dbconfig.php");
            if(isset($_POST['Submit']))
        {
            $emd=$_POST["emb"];
            $sid=$_SESSION['sid'];
            
                $updatequery="UPDATE maps SET url='$emd' WHERE sid='$sid'";
                if (mysqli_query($conn, $updatequery)) 
                {
                        echo ("<script>location.href = 'edit-salon-m.php?id=". $_SESSION['sid']."';</script>");

                } 
                else
                {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
    
?>


    <body class="fixed-left">

        <!-- Begin page -->

            <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="card-header">
            <a href="" type="button" class="close">×</a>
                 <h4 class="title">Update Google map Location</h4>
              </div>
              <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
             
              <div class="row">
                <div class="col-md-12">
                <div class="card-box">
                    <div class="form-group">

                      <label for="ttl">Enter Embeded code <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="emb" required="" placeholder="Enter Embeded Code Here">
                    </div>
                    
                    <button onclick="return confirm('Are you sure to edit this record?')" type="submit" name="Submit" class="btn btn-success waves-effect waves-light pull-right">Update</button>
                    </div>
                    
                </div>
                     
                      
              </div>
           
                                                   
                                                    
                                    
                     
                                                
                
          </form>

     
          
         
          </div>
        </div>
      </div>    

                                                                    
                                                                </div> 
                                                            </div>
                                                        </div><!-- /.modal -->                                    
           


        </div>
        <!-- END wrapper -->
<?php include 'inc/managerfootermod.php'; ?>