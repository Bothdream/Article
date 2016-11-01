<?php
 session_start();
 require("../config.php");
 include '../system.class.inc.php';
 if(isset($_SESSION['password'])){
   $smarty->display("admin/article_add.html");
 }else{
 	echo "<script>alert('请先登录');</script>";
 	$smarty->display("admin/login.html");
 }
?>
