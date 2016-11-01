<?php
include '../system.class.inc.php';
$db=new DB("localhost", "root","", "test");
$db->createLink();
// 对接收到的数据进行入库处理
$title=$_POST['title'];
$author=$_POST['author'];
$description=$_POST['description'];
$content=$_POST['content'];
$dateline=time();
$insertSql='insert into article(title,author,description,content,dateline) values("'.$title.'","'.$author.'","'.$description.'","'.$content.'",'.$dateline.')';
 // 判断标题和内容是否为空，为空提示；不为空，发布完成后，返回文章发布页面
if(!isset($title)||empty($title)||!isset($content
	)||empty($content)){
   echo "<script type='text/javascript' charset='utf-8'>
   alert('标题或内容不能为空！');window.location.href='./article_add.php';
   </script>";
}else{
	if($result=$db->exectSql($insertSql)){
       echo "<script type='text/javascript' charset='utf-8'>alert('文章发布成功！');window.location.href='./article_add.php'; </script>";
	}else{
       echo "<script type='text/javascript' charset='utf-8'>alert('文章发布失败！');window.location.href='./article_add.php';</script>";
	}
}
?>