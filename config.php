<?php 
   //定义服务器的绝对路径
   define('BATH_PATH', $_SERVER['DOCUMENT_ROOT']);
   //定义Smarty的目录的绝对路径
   define('SMARTY_PATH', '/articleDeliver/libs/');
   //加载类文件
   require BATH_PATH.SMARTY_PATH.'Smarty.class.php';
   //初始化一个smarty对象
   $smarty=new Smarty;
   //定义各个目录的路径
   $smarty->template_dir= BATH_PATH.SMARTY_PATH."templates/";
   $smarty->cache_dir= BATH_PATH.SMARTY_PATH."cache/";
   $smarty->config_dir= BATH_PATH.SMARTY_PATH."configs/";
   $smarty->compile_dir= BATH_PATH.SMARTY_PATH."templates_c/";
   // 开启缓存
   //$smarty->caching=true;
   //$smarty->cache_lifetime=60;
?>
