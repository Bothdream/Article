<?php
 require("../config.php");
 include '../system.class.inc.php';
 $selectSql="select * from aboutus where id=1";
 $db=new DB("localhost", "root","", "test");
 $db->createLink();
 $result=$db->exectSql($selectSql);
 $smarty->assign("item",$result[0]);
 $smarty->display("admin/aboutus_manage.html");
?>
