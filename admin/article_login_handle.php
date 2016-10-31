<?php
  require("../config.php");
  require("../connect.php");
  // 剔除空格
  $userName=trim($_POST['userName']);
  // 剔除空格
  $pwds=trim($_POST['userPwd']);
  // php加密技术:crypt(),md5(),sha1()
  $pwd=md5($pwds);
  $sql="select * from member";
  $resultSet=mysql_query($sql,$link);
  session_start();
  // 判断验证码是否正确
  $checkCode=$_POST['checkCode'];
  if($checkCode==$_SESSION['rand']){
      //标志位：判断密码和用户名是否在数据库中存在
      $flag=false;
      if($resultSet&&mysql_num_rows($resultSet)){
      	while($result=mysql_fetch_array($resultSet)){
      	  if(($userName==$result['userName'])&&($pwd==$result['pwd'])){
    	      $flag=true;break;
    	  }
      	}
        // 判断密码和用户名是否正确
        if($flag){
          echo "<script>window.location.href='./article_manage.php'</script>";
        }else{
      	  echo "<script>alert('密码或用户名错误！');window.location.href='./index.html'</script>";
        }
      }else{
      	echo "<script>alert('登录失败！');window.location.href='./index.html'</script>";
      }
}else{
       echo "<script>alert('验证码输入错误，请重新输入！');window.location.href='./index.html'</script>";
}
session_destroy($_SESSION['rand']);
?>