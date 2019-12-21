<?php
session_start();
include("dbconfig.php");
$mid=$_SESSION['mgrid'];
$sql="SELECT * FROM salon WHERE sid IN(SELECT sid FROM manager_salon WHERE mid=$mid);";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  $rowe = mysqli_fetch_assoc($result);
  $_SESSION['sidnotif'] = $rowe['sid'];
}else{
  echo "No Books Yet";
}
?>
 <?php
date_default_timezone_set('America/Los_Angeles');
 
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
 

<?php
//fetch.php;
if(isset($_POST["view"]))
{
 include("dbconfig.php");
 $upload_dir = 'uploads/';
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE book SET notif_status=1 WHERE notif_status=0";
  mysqli_query($conn, $update_query);
 }
 $sid = $_SESSION['sidnotif'];
 $query = "SELECT t1.*, t2.image, t2.name FROM book t1 LEFT JOIN customer t2 ON t1.username = t2.username WHERE t1.sid = $sid ORDER BY aid DESC";
 $result = mysqli_query($conn, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '<li class=""><i class="m-r-10"></i><strong class="text-inverse">Notifications</strong></li>
  <li class="divider"></li>';
  while($row = mysqli_fetch_array($result))
  {


   $output .= '
   <li>
    <a href="manager-page.php">
    <img src=" '.$upload_dir.$row["image"].' " class="img-circle thumb-sm">
     <strong class="text-custom">'.$row["name"].'</strong><br>
     <b class="text-dark">'.$row["sername"].'</b><br>
     <small>Date of Visit: <em class="text-muted">'.$row["dov"].'</em></small><br>
     <small>Time: <em class="text-muted">'. date('h:i A', strtotime($row['tym'])).'</em></small><br>
     <small><em class="text-muted">'.time_ago($row['datecreated']).'</em></small>
    </a>
   </li>
   <li class="divider"></li>
   ';
  }

 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
 
 $query_1 = "SELECT * FROM book WHERE notif_status=0";
 $result_1 = mysqli_query($conn, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>