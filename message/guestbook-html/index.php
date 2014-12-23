<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>瑞曼-留言本</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="./style/skin.css">
<script type="text/javascript">
    function lev() {
        var lev_mes = document.getElementById('lev');
        lev_mes.style.display = 'block';
        location.href = '#form';
    }
</script>

<style type="text/css">

</style>
</head>

    <body>
        <div id="body">
            <h3>RainMan-留言本</h3>
            <div id="nav">
                <ul>
                    <li><a href="index.html">首页</a></li>
                    <li><a href="javascript:void(0)"onclick="lev();">发表留言</a></li>
                    <li><a href="./admin/index.html">留言管理</a></li>
                    <li><a href="#">联系我们</a></li>
                </ul>
            </div>
            <div id="cont">
	       <?php
                    require("conn.php");
                    $sql = "select * from liuyanbiao order by id desc";
                    $result = mysql_query($sql);//执行查询
                    $len = mysql_num_rows($result);
                    for($i=0;$i<$len;$i++){
                        $mes = mysql_fetch_array($result);
                ?>   
              
                
                <!-- 留言区域开始 -->
                <div class="mes">
                    <a href="del.php?id=<?php echo $mes["id"];?>">删除此条</a>
                    <div class="title">
                        <ul>
                            <li>序号：<?php echo $mes["id"];?></li>
                            <li>时间：<?php echo $mes["fabushijian"];?></li>
                            <li>姓名：<?php echo $mes["xingming"];?></li>
                            <li>标题：<?php echo $mes["biaoti"];?></li>
                        </ul>
                    </div>
                    <div class="txt">
                        <span>内容：</span><p><?php echo $mes["neirong"]?></p>
                    </div>
                    <div class="rep">
                        <span style="font-weight:bold">管理员回复：</span><p></p>
                    </div>
                </div>
                <!-- 留言区域止 -->
                <?
                }
                ?>
                <div id="page">
                    <span><a href="#">首页</a></span>
                    <ul>
                        <li><a href="#">上一页</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">下一页</a></li>
                        <li>总共有:0页</li>
                        <li>当前是第:0页</li>
                    </ul>
                </div>


                <a name="form">
                <div id="lev" style="display:block;">
                    <form action="insertLiuyan.php" method="POST">
                        昵称：<input type="text" value="" name="n1" /><br />
                        标题：<input type="text" value="" name="n2" /><br />
                        内容：(囧,-_-||不能写作文哦)<br />
                        <textarea  name="n3"></textarea><br />
						<input class="c1" type="submit" value="提交" />
						<input class="c1" type="reset" value="重填" />
                    </form>
                </div>
            </div>
            <div id="foot">
                <p>RainMan-留言本 e-mail:zyc521008@sina.com</p>
                <p>Powered by 瑞曼留言本 V1.0 瑞曼科技 www.rain-man.cn</p>
            </div>
        </div>
    </body>
</html>