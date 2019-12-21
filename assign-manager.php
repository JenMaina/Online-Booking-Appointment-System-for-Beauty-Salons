<?php
include "dbconfig.php";
session_start();
$upload_dir = 'uploads/';
    $sql = "SELECT * FROM admin";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
?>
<?php include 'inc/adminheader.php'; ?>


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
                                    <li class="active">Show Manager</li>
                                    <li class="active">Assing Manager</li>
                                </ol>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                        <div class="card-box">

                            <?php
                                              include 'dbconfig.php';
                                              $upload_dir = 'uploads/';

                                              if (isset($_GET['id'])) {
                                                $id = $_GET['id'];
                                                $sql = "SELECT * FROM manager WHERE mid='$id'";
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                  $row1 = mysqli_fetch_assoc($result);
                                                  $_SESSION['mid'] = $row1['mid'];
                                                }else {
                                                  $errorMsg = 'Could not Find Any Record';
                                                }
                                              }

                                            ?>
                        <form method="post" action="assign-manager.php?id=<?php echo $row1['mid'] ?>"> 
                                            <h4 class="m-t-0 m-b-30 header-title"><b>Assign Manager to Salon</b></h4>

                                            <h5><b>Select Salon for <img src="<?php echo $upload_dir.$row1['image'] ?>" class="img-circle thumb-sm"> <b class="text-danger"><?php echo  $row1['name']  ?></b></b></h5>

                                            <select class="form-control select2" required="" name="salon" id="" class="demoInputBox">
                                                <option>Select</option>
                                                <optgroup label="Salons">
                                                <?php
                                                include 'dbconfig.php';
                                                $sql1="SELECT * FROM salon WHERE mid = 0 ORDER BY sname ASC";
                                                $results=$conn->query($sql1); 
                                                while($rs=$results->fetch_assoc()) { 
                                                ?>
                                                <option value="<?php echo $rs["sid"]; ?>"><?php echo $rs["sname"]; ?></option>
                                                <?php
                                                }
                                                ?>
        
                                                    
                                                </optgroup>
                                            </select>
                                            
                                          
                                            <br>
                                            <div class="form-group text-right m-b-0">
                                            <button class="btn btn-default waves-effect waves-light" name="Submit" type="submit" data-toggle="tooltip" title="Assign">
                                                Assign
                                            </button>
                                            </form>
                                        </div>
                                          

        </div>
                       

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                 <?php
if(isset($_POST['Submit']))
{
        include 'dbconfig.php';
        $sid = $_POST['salon'];
        $mid = $_SESSION['mid'];
                $sql = "INSERT INTO manager_salon (sid, mid) VALUES ('$sid','$mid')";
               
                if (mysqli_query($conn, $sql)) 
                {
                     $sql1="UPDATE salon SET mid=$mid WHERE sid=$sid";
                      if (mysqli_query($conn, $sql1)) 
                        { 
                                    echo "<h4>Record created successfully!( sid=$sid mid=$mid )</h4>";
                                    echo ("<script>location.href = 'show-manager.php';</script>");
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

?>
                <br><br><br><br>
<?php include 'inc/adminfooter2.php'; ?>