<?php 
   //����������ľ���·��
   define('BATH_PATH', $_SERVER['DOCUMENT_ROOT']);
   //����Smarty��Ŀ¼�ľ���·��
   define('SMARTY_PATH', '/articleDeliver/libs/');
   //�������ļ�
   require BATH_PATH.SMARTY_PATH.'Smarty.class.php';
   //��ʼ��һ��smarty����
   $smarty=new Smarty;
   //�������Ŀ¼��·��
   $smarty->template_dir= BATH_PATH.SMARTY_PATH."templates/";
   $smarty->cache_dir= BATH_PATH.SMARTY_PATH."cache/";
   $smarty->config_dir= BATH_PATH.SMARTY_PATH."configs/";
   $smarty->compile_dir= BATH_PATH.SMARTY_PATH."templates_c/";
   // ��������
   //$smarty->caching=true;
   //$smarty->cache_lifetime=60;
?>
