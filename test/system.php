<?php
header('Content-Type:text/html;charset=utf-8');
$html = <<<HTML
<h1>进制转换</h1>
<form method="post">
<input type='text' name="value" size="5">
<select name="system">
<option value="10to2">10-->2</option>
<option value="2to10">2-->10</option>
<option value="2to8">2-->8</option>
<option value="8to2">8-->2</option>
<option value="16to2">16-->2</option>
<option value="2to16">2-->16</option>
</select>
<input type="submit"  value="提交">
</form>
HTML;

echo $html;

if(isset($_POST['system'])){

	echo "YES",$_POST['system'];

	$val = $_POST['value'];
	$sys = $_POST['system'];

	if($sys =='10to2'){
		$res = decbin($val);
	}elseif ($sys == '2to10') {
		$res = bindec($val);
	}elseif ($sys == '2to8') {
		$res = bindec($val);
		$res = decoct($res);
	}elseif ($sys == '16to2') {
		$res = hexdec($val);
		$res = decbin($val);
	}elseif ($sys== '2to16') {
		$res = bin2hex($val);
	}

	echo '<hr />';
	echo "$val--->","$sys",','.$res;
}