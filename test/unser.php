<?php
$data = file_get_contents('./data.txt');
echo '	读取到的数据：';
var_dump($data);
echo '转换后的数据<br />';
var_dump($undata = unserialize($data));