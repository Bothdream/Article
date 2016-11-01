<?php 
 require("../config.php");
 include '../system.class.inc.php';
 $db=new DB("localhost", "root","", "test");
 $db->createLink();
 $search_content=$_POST['search_content'];
 $searchSql="select * from article where content like '%$search_content%'";
 $result=$db->exectSql($searchSql);
 $smarty->assign("result",$result);
 $smarty->display("admin/article_search_handle.html");
 ?>


