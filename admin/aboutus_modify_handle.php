<?php 
include '../system.class.inc.php';
$db=new DB("localhost", "root", "", "test");
$db->createLink();
// 获取相关的文章信息
$content=$_POST['content'];
// 判断是否为空
if(!isset($content)||empty($content)){
   echo "<script>alert('不能为空！');window.location.href='./aboutus_manage.php'</script>";
}else{
  //拼接sql语句
  $updateSql="update aboutus set content='$content' where id=1"; 
  // 执行sql语句获得结果集
  if($result=$db->exectSql($updateSql)){
    echo "<script>alert('修改成功！');window.location.href='./aboutus_manage.php';</script>";
  }else{
    echo "<script>alert('修改失败！');window.location.href='./aboutus_manage.php'</script>";
  }
}
?>
