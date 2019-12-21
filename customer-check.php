<?php
session_start();
if(isset($_SESSION['crid'])){
}else{
    echo ("<script>location.href = 'customer-login.php';</script>");
    exit;
}
?>