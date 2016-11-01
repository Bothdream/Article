<?php
 session_start();
 require("../config.php");
 include '../system.class.inc.php';
 if (isset($_SESSION['password'])){
	 $selectSql="select * from aboutus where id=1";
	 $db=new DB("localhost", "root","", "test");
	 $db->createLink();
	 $result=$db->exectSql($selectSql);
	 $smarty->assign("item",$result[0]);
	 $smarty->display("admin/aboutus_manage.html");
 }else{
 	 echo "<script>alert('请先登录账号');</script>";
 	 $smarty->display("admin/login.html");
 }
?>
