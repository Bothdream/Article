<?php
require("./config.php");
require("./connect.php");
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
	<title>鑱旂郴鎴戜滑</title>
	<link rel="stylesheet" type="text/css" href="./css/default.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
<div class="wrap">
    <div class="art_nav">
     <h2 class="nav_title">鍏充簬M&H</h2>
     <div class="nav">
        <a href="./article_list.php" class="art">鏂囩珷</a>
        <a href="./article_about_us.php" class="about_us">鍏充簬鎴戜滑</a>
        <a href="./article_contact_us.php" class="contact_us">鑱旂郴鎴戜滑</a>
     </div>
     <div class="clear"></div>
    </div>
    <div class="art_list">
    <div class="art_left">
       <div class="art_content">
             <div class="title_wrap">鑱旂郴鎴戜滑</div>
             <div class="art_item">
             	<div class="company"><?php echo $result['company'];?></div>
             	<div class="adrr">鍦板潃锛�?php echo $result['address'];?></div>
             	<div class="phone">鐢佃瘽锛�?php echo $result['phone'];?></div>
             	<div class="email">鐢靛瓙閭欢锛�?php echo $result['email'];?></div>
             	<div class="website">缃戝潃锛�?php echo $result['website'];?></div>
             </div>   
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