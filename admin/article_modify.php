<?php
 require("../config.php");
 include '../system.class.inc.php';
 $db=new DB("localhost", "root","", "test");
 $db->createLink();
 //使用get请求动态修改文章
 $id=$_GET['id'];
 $selectSql="select * from article where id=$id";
 $result=$db->exectSql($selectSql);
 $smarty->assign("item",$result[0]);
 $smarty->display("admin/article_modify.html");
?>
