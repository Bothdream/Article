<?php 
require("../configs.php");
require("../connect.php");
// 获取相关的文章信息
$content=$_POST['content'];
// 判断是否为空
if(!isset($content)||empty($content)){
   echo "<script>alert('不能为空！');window.location.href='./aboutus_manage.php'</script>";
}else{
  //拼接sql语句
  $updateSql="update aboutus set content='$content' where id=1"; 
  // 执行sql语句获得结果集
  if($result=mysql_query($updateSql,$link)){
    echo "<script>alert('修改成功！');window.location.href='./aboutus_manage.php';</script>";
  }else{
    echo "<script>alert('修改失败！');window.location.href='./aboutus_manage.php'</script>";
  }
}
?>
