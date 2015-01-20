<?php 
 header("Content-Type:text/html;charset=utf-8");
 ?>
<form action="do.php" method="post" >

加入推荐：
<input type="checkbox"  name="nice" value="1"> 精品
<input type="checkbox" name="new" value="2"> 新品
<input type="checkbox"  name="hot" value="4"> 热销
<input type="checkbox"  name="other" value="8"> 其他
<br>
<input type="submit" value="提交">
</form>