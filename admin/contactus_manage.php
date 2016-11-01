<?php
require '../config.php';
include '../system.class.inc.php';
$selectSql="select * from contactus where id=1";
$db=new DB("localhost", "root", "","test");
$db->createLink();
$result=$db->exectSql($selectSql);
$smarty->assign("result",$result[0]);
$smarty->display("admin/contactus_manage.html");
?>
