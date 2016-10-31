<?php
 require("./config.php");
 require("./connect.php");
 // 每页显示5条信息
 // limit ($page-1)*$pageSize,$pageSize
 $pageSize=5;
 // 确定总页数
 $sqlPage="select * from article";
 $pageResult=mysql_query($sqlPage,$link);
 // 向上取整
 $totalPage=ceil(mysql_num_rows($pageResult)/$pageSize);
 // 当前页
 if(!isset($_GET['page'])){
    $_GET['page']=1;
 }
 $curPage=$_GET['page'];
 // 起始查询的索引
 $starPage=($curPage-1)*$pageSize;
 $selectSql=null;
 // 数据库总的信息条数
 $totalSet=mysql_num_rows($pageResult);
 // 判断数据库总的信息条数与每页显示信息的条数的大小
 if($totalSet<$pageSize){
   $starPage=0;
   $selectSql="select * from article limit $starPage,$totalSet";
 }else{
   $selectSql="select * from article limit $starPage,$pageSize";
 }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="name" content="content">
	<title>文章列表</title>
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
<?php
      $resultSet=mysql_query($selectSql,$link);
      if($resultSet&&mysql_num_rows($resultSet)){
      	while($result=mysql_fetch_assoc($resultSet)){
	?>
     <div class="art_content">
    <div class="title_wrap"><sapn class="art_title"><?php echo $result['title']?></span><span class="art_author" >作者：<?php echo $result['author']?></span></div>
                <div class="art_item"><?php echo $result['description']?></div>
                <div class="art_plus"><a href="./article_show?id=<?php echo $result['id'];?>">详细内容</a></div>
    </div>
<?php 	
}
  }
    ?>
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
<?php
   //如果总的信息条数大于一页显示的条数就进行分页
   if($totalSet>$pageSize){
?>    
<div class="coverPage" style="text-align: center;"> 
     <?php if($curPage==1){?>
        <a id="prePage " href="#" onclick="alert('首页不能再点击！')">上一页</a>
     <?php }else{?>
        <a id="prePage " href="./article_list?page=<?php echo $curPage-1;?>">上一页</a>
     <?php }?>
     <?php if($curPage==$totalPage){?>
      <a id="nextPage" href="#" onclick="alert('尾页不能再点击！')">下一页</a>
      <?php }else{?>
       <a id="nextPage" href="./article_list?page=<?php echo $curPage+1;?>">下一页</a>
      <?php }?>
      <span>总页数：<?php echo $totalPage;?></span>
</div>          
<?php     
   }
?>    
</div>
</body>
</html>