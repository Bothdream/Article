<?php
 require("../config.php");
 require("../connect.php");
 $selectSql="select * from contactus where id=1";
 $resultSet=mysql_query($selectSql,$link);
 $result=mysql_fetch_assoc($resultSet);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="name" content="content">
	<title>联系我们</title>
	<style type="text/css">
	</style>
  <link rel="stylesheet" type="text/css" href="../css/default.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
   <div class="admin">
     <div class="webBack_wrap"><img src="../img/info.jpg" class="adminInfo"><h2 class="webBack">网站后台管理</h2></div>
   	 <div class="admin_manage">
   	    <div class="manage_nav">
   	  	   <h3 class="manage_nav_title">文章管理</h3>
   	  	   <a href="./article_add.php" class="deliver_article">发布文章</a>
   	  	   <a href="./article_manage.php" class="manage_article">管理文章</a>
           <a href="./aboutus_manage.php" class="manage_article">关于我们</a>
           <a href="./contactus_manage.php" class="manage_article">联系我们</a>
   	    </div>
        <div class="manage_deliverArticle">
      	    <h3>联系我们</h3>
 <form action="./contactus_modify_handle.php" method="post" accept-charset="utf-8">
            <table style="width:100%;" border="1">         	
<tr ><td>公司</td><td>
   <input name="company" value="<?php echo $result['company']?>"/>
</td><tr/>
<tr ><td>地址</td><td>
<input name="address" value="<?php echo $result['address']?>"/>
</td><tr/>
<tr ><td>电话</td><td>
<input name="phone" value="<?php echo $result['phone'] ?>" />
</td><tr/> 
<tr ><td>电子邮件</td><td>
<input name="email" value="<?php echo $result['email']?>" />
</td><tr/>
<tr ><td>网址</td><td>
<input name="website" value="<?php echo $result['website']?>"/></td><tr/>
<tr ><td colspan="2" ><input type="submit" name="submit" value="修改"/></td><tr/> 
            </table>
</form>            
        </div>
        <div class="clear"></div>
   	 </div>  
   </div>
</body>
</html>