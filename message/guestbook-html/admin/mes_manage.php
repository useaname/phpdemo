<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>瑞曼-留言本</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="../style/skin.css" />
<script type="text/javascript">
    function deal(arg,n) {
        //var det = document.getElementsByClassName('detail')[n];
        if(arg == 'cha') {
			var det = document.getElementById('detail'+n)
            det.style.display = 'block';	//显示
        }
        if(arg == 'close') {
			var det = document.getElementById('detail'+n)
            det.style.display = 'none';		//隐藏
        }
        if(arg == 'del') {
            var s = window.confirm('您确定要删除吗？');	//确认对话框,返回true/false
			if(s == true)
			{
				//此时才真正去做删除工作。。。。。
				location.href = "deleteLiuyan.php?id=" + n;	//这里就是传说中的使用get方式传数据到另一个页面
			}
        }
    }
    function logout() {
        window.confirm('您确定要退出吗?');
        window.location.href = './login.html';
    }
</script>

<style type="text/css">

</style>
</head>
    <body>
        <div id="body">
            <h3>RainMan-留言本 后台管理</h3>
            <div id="nav">
                <ul>
                    <li><a href="index.html">管理首页</a></li>
                    <li><a href="mes_manage.html">留言管理</a></li>
                    <li><a href="mes_config.html">参数设置</a></li>
                    <li><a href="mes_admin.html">账号管理</a></li>
                    <li><a href="../index.php">前台首页</a></li>
                    <li><a href="javascript:void();" onclick="logout();">退出管理</a></li>
                </ul>
            </div>
            <div id="cont" style="padding-bottom:0px;">
                <div class="mes">
                    <span id="del"><a href="#">!删除全部</a></span>
				<?php
				
				require("../conn.php");
				$sql = "select id, xingming, biaoti, neirong, fabushijian from liuyanbiao;";
				$result = mysql_query($sql);	//获得一个结果集

				$len = mysql_num_rows( $result );
				for($i = 0; $i < $len; $i++)
				{
					$rec = mysql_fetch_array( $result );	//取得结果集中的“下一行”并作为数组返回
															//数组的键名就是select语句的字段名
				?>
					<!-- 留言区域开始 -->
                    <div class="contr">
                        <div class="list">
                            <ul>
                                <li>编号：<?php echo $rec['id']; ?></li>
                                <li>时间：<?php echo $rec['fabushijian']; ?></li>
                                <li>姓名：<?php echo $rec['xingming']; ?></li>
                                <li>标题：<?php echo $rec['biaoti']; ?></li>
                            </ul>
                        </div>
                        <ul>
                            <li><a href="javascript:void(0)" onclick="deal('cha',<?php echo $rec['id']; ?>);">查看内容</a></li>
                            <li><a href="mes_reply.html">回复</a></li>
                            <li><a href="mes_modify.html">修改</a></li>
                            <li><a href="javascript:void(0)" onclick="deal('del',0);">删除</a></li>
                        </ul>
                        <div class="detail" id="detail<?php echo $rec['id']; ?>">
                            <span onclick="deal('close',<?php echo $rec['id']; ?>);">X关闭</span>
                            <p><?php echo $rec['neirong']; ?></p>
                        </div>
                    </div>
					<!-- 留言区域止 -->
				<?php
				}
				?>



                </div>
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
            </div>
            <div id="foot">
                <p>RainMan-留言本 e-mail:zyc521008@sina.com</p>
                <p>Powered by 瑞曼留言本 V1.0 瑞曼科技 www.rain-man.cn</p>
            </div>
        </div>
    </body>
</html>