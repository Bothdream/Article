<?php
 require("../config.php");
 require("../connect.php");
 // 采用请求动态删除指定的文章
 $id=$_GET['id'];
 $delSql="delete from article where id=$id";
 if($result=mysql_query($delSql,$link)){
    echo "<script>alert('文章删除成功！');window.location.href='./article_manage.php'</script>";
 }else{
    echo "<script>alert('文章删除失败！');window.location.href='./article_manage.php'</script>";
 }
?>