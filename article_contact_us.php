<?php
require("./config.php");
include './system.class.inc.php';
$selectSql="select * from contactus where id=1";
$db=new DB("localhost", "root", "", "test");
$db->createLink();
$contactUsMsg=$db->exectSql($selectSql);
$smarty->assign("result",$contactUsMsg);
$smarty->display("public/article_contact_us.html");
?>
