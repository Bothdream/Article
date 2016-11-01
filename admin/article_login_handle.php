<?php
  //设置$_SESSION['password']的值
  session_start();
  // 设置Session的失效时间:10s后失效
  $time=60*30;
  setcookie(session_name(),session_id(),time()+$time,"/");
  require '../system.class.inc.php';
  // 剔除空格
  $userName=trim($_POST['userName']);
  // 剔除空格
  $pwds=trim($_POST['userPwd']);
  // php加密技术:crypt(),md5(),sha1()
  $pwd=md5($pwds);
  $_SESSION['password']=$pwd;
  $sql="select * from member";
  $db=new DB("localhost","root","","test");
  $db->createLink();
  $result=$db->exectSql($sql);
  // 判断验证码是否正确
  $checkCode=$_POST['checkCode'];
  if(!isset($_SESSION['rand'])){
  	echo "<script>alert('验证码已过期！');</script>";
  	echo "<script>window.location.href='./login.php'</script>";
  }
  if($checkCode==$_SESSION['rand']){
      //标志位：判断密码和用户名是否在数据库中存在
      $flag=false;
      if($result){
       foreach ($result as $value) {
      	  if(($userName==$value['userName'])&&($pwd==$value['pwd'])){
    	      $flag=true;break;
    	  }
      	}
        // 判断密码和用户名是否正确
        if($flag){
          echo "<script>window.location.href='./article_manage.php'</script>";
        }else{
      	  echo "<script>alert('密码或用户名错误！');window.location.href='./login.php'</script>";
        }
      }else{
      	echo "<script>alert('登录失败！');window.location.href='./login.php'</script>";
      }
}else{
       echo "<script>alert('验证码输入错误，请重新输入！');window.location.href='./login.php'</script>";
}

?>