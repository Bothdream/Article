<?php
 require("./config.php");
 require("./connect.php");
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
	<title>文章详情</title>
	<link rel="stylesheet" type="text/css" href="./css/default.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body class="bodyBg">
  <div class="article_item">
  	<h3 class="article_title"><?php echo $result['title']?></h3>
  	<p class="article_content"><?php echo $result['content']?></p>
  </div>
</body>
</html>