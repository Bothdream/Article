<?php
 require("../config.php");
 require("../connect.php");
 //使用get请求动态修改文章
 $id=$_GET['id'];
 $selectSql="select * from article where id=$id";
 $resultSet=mysql_query($selectSql,$link);
 $result=mysql_fetch_assoc($resultSet);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="name" content="content">
	<title>修改文章</title>
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
      	    <h3>文章发布</h3>
            <form action="./article_modify_handle.php" method="post" accept-charset="utf-8">
            <input type="hidden" value="<?php echo $result['id']?>" name="id" id="id"/>
            <table style="width:100%;">
            	<tr >
				  <th class="col">标题</th>
				  <th ><input type="text" value="<?php echo $result['title']?>" name="title" id="title"/></th>
				</tr>
				<tr >
				  <th  class="col">作者</th>
				  <th ><input type="text" value="<?php echo $result['author']?> " name="author" id="author"/></th>
				</tr>
				<tr >
				  <th  class="col">简介</th>
				  <th ><textarea name="description" rows="10" cols="30" id="description"><?php echo $result['description']?></textarea></th>
				</tr>
				<tr >
				  <th  class="col">内容</th>
				  <th ><textarea name="content" id="content" rows="10" cols="30"><?php echo $result['content']?></textarea></th>
				</tr>
				<tr>
				  <td colspan="2"><input type="submit" name="submit" value="提交" id="submit"/></td>
				</tr>
            </table>
           </form>
        </div>
        <div class="clear"></div><!--重要:给左浮动的子元素的下一个兄弟元素清除浮动，没有就添加一个空元素来清除浮动，或者是给父元素 添加overflow: hidden属性。-->
   	 </div>  
   </div>
</body>
</html>