<?php 
 include '../system.class.inc.php';
 $db=new DB("localhost", "root","", "test");
 $db->createLink();
 // 获取相关的文章信息
 $id=$_POST['id'];
 $title=$_POST['title'];
 $author=$_POST['author'];
 $description=$_POST['description'];
 $content=$_POST['content'];
 $dateline=time();
// 判断标题和内容是否为空
if(!isset($title)||empty($title)||!isset($content)||empty($content)){
   echo "<script>alert('标题或内容不能为空！');window.location.href='./article_modify.php?id=".$id."'</script>";
}else{
  //拼接sql语句
  $updateSql="update article set title='$title',author='$author',description='$description',content='$content',dateline=$dateline where id=$id"; 
  // 执行sql语句获得结果集
  if($result=$db->exectSql($updateSql)){
    echo "<script>alert('文章修改成功！');window.location.href='./article_manage.php';</script>";
  }else{
    echo "<script>alert('文章修改失败！');window.location.href='./article_manage.php'</script>";
  }
}
?>
