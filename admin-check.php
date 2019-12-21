<?php
session_start();
if(isset($_SESSION['username'])){
}else{
    echo ("<script>location.href = 'admin-login.php';</script>");
    exit;
}
?>