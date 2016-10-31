<?php
 require("../config.php");
 require("../connect.php");
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
	<title>管理文章</title>
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
      	    <h3>文章管理</h3>
            <form action="./article_modify_handle.php" method="post" accept-charset="utf-8">
            <table style="width:100%;" border="1">         	
<?php
    $resultSet=mysql_query($selectSql,$link);
    if($resultSet&&mysql_num_rows($resultSet)){
		while($result=mysql_fetch_assoc($resultSet)){
			 echo "<tr ><td>".$result['title']."</td>";	
			 echo " <td >".$result['description']."</td>";  
			 echo " <td ><a href='./article_modify.php?id=".$result['id']."'>修改</a></td>";	
			 echo " <td ><a href='./article_del_handle.php?id=".$result['id']."'>删除</a></td></tr>";
		}
    }else{
        
    }			 
?>		
          <tr><td colspan="4">
<?php
   //如果总的信息条数大于一页显示的条数就进行分页
   if($totalSet>$pageSize){
?>    
<div class="coverPage" style="text-align: center;"> 
     <?php if($curPage==1){?>
        <a id="prePage " href="#" onclick="alert('首页不能再点击！')">上一页</a>
     <?php }else{?>
        <a id="prePage " href="./article_manage.php?page=<?php echo $curPage-1;?>">上一页</a>
     <?php }?>
     <?php if($curPage==$totalPage){?>
      <a id="nextPage" href="#" onclick="alert('尾页不能再点击！')">下一页</a>
      <?php }else{?>
       <a id="nextPage" href="./article_manage.php?page=<?php echo $curPage+1;?>">下一页</a>
      <?php }?>
      <span>总页数：<?php echo $totalPage;?></span>
</div>          
<?php     
   }
?>       
            </tr></td>
            </table>
           </form>
        </div>
        <div class="clear"></div>
   	 </div>   
   </div>
</body>
</html>