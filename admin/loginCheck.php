<?php
   // 建立会话：用于临时存储随机产生的数字
   session_start();
   // 设置Session的失效时间:1分钟后失效
   $time=60*1;
   setcookie(session_name(),session_id(),time()+$time,"/");
   // 产生一个四位的随机数
   // mt_rand()产生随机数的函数
   // dechex()将十进制数转换为十六进制数
   $new_number=null;
   for($i=0;$i<4;$i++){
   	 $new_number.=mt_rand(0,9);
   }
   // 将随机数存储在$_SESSION['rand']中去。
   $_SESSION['rand']=$new_number;
   // 设置图片的宽度和高度
   $img_width=70;
   $img_height=24;
   // 建立一个画布
   $num_img=imagecreate($img_width,$img_height);
   // 设置画布的颜色
   imagecolorallocate($num_img,255,255,255);
   // 在画布上显示字符:strlen — 获取字符串长度
   for($i=0;$i<strlen($_SESSION['rand']);$i++){
      $font=mt_rand(3,10);
      $x=mt_rand(1,8)+$img_width*$i/4;
      $y=mt_rand(1,$img_height/4);
      $color=imagecolorallocate($num_img,mt_rand(0,180),mt_rand(0,160),mt_rand(0,200));
      imagestring($num_img,$font,$x,$y,$_SESSION['rand'][$i],$color);
   }
   //产生图片
   header('content-type:image/png');
   imagepng($num_img);
   echo imagepng($num_img);
   // 释放资源
   imagedestroy($num_img);
?>