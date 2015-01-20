<?php
$name = Array('hongzi','hanfeizi','laozi','sunzi','zhuangzi','memgzi');

for($i = 0,$len = count($name);$i < $len;++$i){
	echo $name[$i];
	echo '<br />';
}
echo '<hr />';
echo 'value:',current($name);
echo '<hr />';
echo 'value:',next($name);
echo '<hr />';
echo 'value:',next($name);echo '<br />';
echo 'value:',next($name);echo '<br />';
echo 'value:',current($name);echo '<br />';
echo '<hr />';
echo 'key:',key($name);

