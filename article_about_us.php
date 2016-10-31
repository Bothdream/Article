<?php
require("./config.php");
require("./connect.php");
$selectSql="select * from aboutus where id=1"; 
$resultSet=mysql_query($selectSql,$link);
$result=mysql_fetch_assoc($resultSet);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="name" content="content">
	<title>关于我们</title>
	<link rel="stylesheet" type="text/css" href="./css/default.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
<div class="wrap">
    <div class="art_nav">
     <h2 class="nav_title">关于M&H</h2>
     <div class="nav">
        <a href="./article_list.php" class="art">文章</a>
        <a href="./article_about_us.php" class="about_us">关于我们</a>
        <a href="./article_contact_us.php" class="contact_us">联系我们</a>
     </div>
     <div class="clear"></div>
    </div>
    <div class="art_list">
    <div class="art_left">
       <div class="art_content">
             <div class="title_wrap">关于我们</div>
             <div class="art_item"> <?php echo $result['content'];?></div>   
       </div>
    </div>
    <div class="art_right">
    		<div class="art_search">
    		   <h2>Search</h2>
              <form action="./admin/article_search_handle.php" method="post" accept-charset="utf-8">
    			<div class="search_wrap">
    			  <input type="text" name="search_content" id="search_content"/>
    			  <input type="submit" name="search_btn" id="search_btn" value="search"/>
    			</div>
	    	   </form>
    		</div>
    </div>
    	<div class="clear"></div>
    </div>
</div>
</body>
</html>