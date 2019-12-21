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
  $update_query = "UPDATE salon SET notif_status=1 WHERE notif_status=0";
  mysqli_query($conn, $update_query);
 }
 $query = "SELECT t1.*, t2.image, t2.name, t2.mid FROM salon t1 LEFT JOIN manager t2 ON t1.mid = t2.mid WHERE notif_status = 1 ORDER BY sid DESC";
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
    <a href="show-salon.php">
    <img src=" '.$upload_dir.$row["image"].' " class="img-circle thumb-sm">
    <strong class="text-custom">'.$row["name"].'</strong><br>
    <small><strong class="text-dark">'.$row["sname"].'</strong></small><br>
    <small><em class="text-muted">'.time_ago($row['datecreated1']).'</em></small>
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
 
 $query_1 = "SELECT * FROM salon WHERE notif_status=0";
 $result_1 = mysqli_query($conn, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>