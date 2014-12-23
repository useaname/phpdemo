<?php
	$id = $_GET["id"];
	$sql = "delete from liuyanbiao where id='$id'";
	 require("conn.php");
	$result = mysql_query($sql);
	if($result){
			echo "删除成功!";
			header("location:index.php");
	}else{
		echo "删除失败!".mysql_error();
	}
?>