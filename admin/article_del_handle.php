<?php
 include '../system.class.inc.php';
 $db=new DB("localhost", "root","", "test");
 $db->createLink();
 // 采用请求动态删除指定的文章
 $id=$_GET['id'];
 $delSql="delete from article where id=$id";
 if($result=$db->exectSql($delSql)){
    echo "<script>alert('文章删除成功！');window.location.href='./article_manage.php'</script>";
 }else{
    echo "<script>alert('文章删除失败！');window.location.href='./article_manage.php'</script>";
 }
?>