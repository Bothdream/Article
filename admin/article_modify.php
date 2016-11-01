<?php
 session_start();
 require("../config.php");
 include '../system.class.inc.php';
 if(isset($_SESSION['password'])){
	 $db=new DB("localhost", "root","", "test");
	 $db->createLink();
	 //使用get请求动态修改文章
	 $id=$_GET['id'];
	 $selectSql="select * from article where id=$id";
	 $result=$db->exectSql($selectSql);
	 $smarty->assign("item",$result[0]);
	 $smarty->display("admin/article_modify.html");
 }else{
 	echo "<script>alert('请先登录');</script>";
 	$smarty->display("admin/login.html");
 }
?>
