<?php 
require("../config.php");
require("../connect.php");
// 获取相关的文章信息
$company=$_POST['company'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$website=$_POST['website'];
// 判断是否为空
if(!isset($company)||empty($company)||!isset($address)||empty($address)||!isset($phone)||empty($phone)||!isset($email)||empty($email)||!isset($website)||empty($website)){
   echo "<script>alert('不能为空！');window.location.href='./contactus_manage.php'</script>";
}else{
  //拼接sql语句
  $updateSql="update contactus set company='$company',address='$address',phone='$phone',email='$email',website='$website' where id=1"; 
  // 执行sql语句获得结果集
  if($result=mysql_query($updateSql,$link)){
    echo "<script>alert('修改成功！');window.location.href='./contactus_manage.php';</script>";
  }else{
    echo "<script>alert('修改失败！');window.location.href='./contactus_manage.php'</script>";
  }
}
?>
