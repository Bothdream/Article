<?php
  require './config.php';
  include 'system.class.inc.php';
  $sepPage=new SepPage("localhost", "root", "","test", "article", 5);
  $db=$sepPage->pageData();
  $pageData=$smarty->assign("value",$db);
  $smarty->assign("sepPage",$sepPage->showPage());
  $smarty->display("public/article_list.html");
  ?>