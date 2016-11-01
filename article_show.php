<?php
require './config.php';
include './system.class.inc.php';
$db=new DB("localhost", "root","", "test");
$id=$_GET['id'];
$selectSql="select * from article where id=$id";
$db->createLink();
$result=$db->exectSql($selectSql);
$smarty->assign("result",$result[0]);
$smarty->display("public/article_show.html");
?>
