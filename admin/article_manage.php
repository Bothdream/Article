<?php
 require("../config.php");
 include '../system.class.inc.php';
 $db=new SepPage("localhost", "root","", "test", "article", 5);
 $result=$db->pageData();
 $sepPage=$db->showPage();
 $smarty->assign("result",$result);
 $smarty->assign("sepPage",$sepPage);
 $smarty->display("admin/article_manage.html");
?>
