<?php
session_start();
if(isset($_SESSION['mgrid'])){
}else{
    echo ("<script>location.href = 'manager-login.php';</script>");
    exit;
}
?>