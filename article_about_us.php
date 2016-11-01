<?php
require './config.php';
include './system.class.inc.php';
$db=new DB("localhost", "root", "", "test");
$db->createLink();
$selectSql="select * from aboutus where id=1";
$aboutMsg=$db->exectSql($selectSql);
$smarty->assign("result",$aboutMsg);
$smarty->display("public/article_about_us.html");
?>
