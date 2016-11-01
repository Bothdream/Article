<?php
session_start();
require '../config.php';
include '../system.class.inc.php';
if(isset($_SESSION['password'])){
	$selectSql="select * from contactus where id=1";
	$db=new DB("localhost", "root", "","test");
	$db->createLink();
	$result=$db->exectSql($selectSql);
	$smarty->assign("result",$result[0]);
	$smarty->display("admin/contactus_manage.html");
}else{
	echo "<script>alert('请先登录');</script>";
	$smarty->display("admin/login.html");
}
?>
