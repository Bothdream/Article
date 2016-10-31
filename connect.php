<?php
  // 抑制警告
  error_reporting(E_ALL^E_DEPRECATED); 
  // 引入配置文件
  // require("./config.php");
  // 1.连接数据库的操作
  $link=mysql_connect($url,$username,$pwd);
  if(!$link){
  	echo "数据库连接失败！";
  }
  //2.选择数据库
  $select_db=mysql_query("use test",$link);
  if(!$select_db){
  	echo "数据库选择失败！";
  } 
  // 3.设置编码集为utf8
  mysql_query("set names utf8");
 ?>