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
require("conn.php");	//准备跟数据库打打交道了，所以引入该文件
$sql = "select * from liuyanbiao order by id desc;";
$result = mysql_query($sql);	//执行select：执行的结果：
								//如果失败，则返回false
								//如果成功，则返回的结果是一个“数据集合”，即所谓的“资源类型”
								//此数据集合就是那条select所能查询出的所有数据。
								//此结果集的数据，我们需要“一行一行”取出。
$len = mysql_num_rows( $result );	//获得留言条数：即mysql_num_rows()函数用于获得一个数据集合有多少行
for($i = 0; $i < $len; $i++)
{
	$oneLine = mysql_fetch_array( $result );//mysql_fetch_array()函数用于取到$result结果集中的“下一行”
											//（当第一次取的时候，就是第一行）
											//取出的结果是一个 php数组，
											//该数组的键名就是select语句中的字段名
	//即 $oneLine是类似这样的一个数组：
	/*   $oneLine = array( 
						'id' => 1, 
						'xingming'=>'姓名1', 
						'biaoti'=>'标题1', 
						'fabushijian'=>'2013-08-04 11:08:10', 
						'neirong'=>'内容1', 
						'huifu'=>null 
						);
	*/
?>
                <!-- 留言区域开始 -->
                <div class="mes">

                    <div class="title">
                        <ul>
                            <li>序号：<?php echo $oneLine['id']; ?></li>
                            <li>时间：<?php echo $oneLine['fabushijian']; ?></li>
                            <li>姓名：<?php echo $oneLine['xingming']; ?></li>
                            <li>标题：<?php echo $oneLine['biaoti']; ?></li>
                        </ul>
                    </div>
                    <div class="txt">
                        <span>内容：</span><p><?php echo $oneLine['neirong']; ?></p>
                    </div>
                    <div class="rep">
                        <span style="font-weight:bold">管理员回复：</span><p><?php echo $oneLine['huifu']; ?></p>
                    </div>
                </div>
                <!-- 留言区域止 -->
			<?php
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