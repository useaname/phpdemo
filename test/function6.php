<?php
//传值
$param1 = 1;                             //定义变量1
function add(&$param2)                   //传参数
{
    $param2=3;                          //把3赋值给变量2
//    return $param2;                   //返回变量2
}
echo  '<br>$param1=='.$param1.'<br>';   //显示为$param1==1  没对变量1进行操作
$param3=add($param1);                   //调用方法add，并将变量1的引用传给变量2
echo  '<br>$param1=='.$param1.'<br>';   //显示为$param1==3  调用变量过程中，$param2的改变影响变量1，虽然没有return
echo  '<br>$param2=='.$param2.'<br>';   //显示为$param2==   因为$param2局部变量，所以不能影响全局
echo  '<br>$param3=='.$param3.'<br>';   //显示为$param3==   如果把方法里面的return注释去掉的话就为$param3==3
?>