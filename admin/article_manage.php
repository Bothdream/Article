<?php
 session_start(); 
 require("../config.php");
 include '../system.class.inc.php';
 if(isset($_SESSION['password'])){
	 $db=new SepPage("localhost", "root","", "test", "article", 5);
	 $result=$db->pageData();
	 $sepPage=$db->showPage();
	 $smarty->assign("result",$result);
	 $smarty->assign("sepPage",$sepPage);
	 $smarty->display("admin/article_manage.html");
 }else{
 	echo "<script>alert('请先登录');</script>";
 	$smarty->display("admin/login.html");
 }
?>
