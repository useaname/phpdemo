<?
header('Content-Type:text/html;charset=utf-8');

$html = <<<HTML
<form method="post">
<input type='text' name="value" size="5">
<select name="system">
<option value="decbin">10-->2</option>
<option value="decoct">10-->8</option>
<option value="dechex">10-->16</option>
<option value="bindec">2-->10</option>
<option value="hexdec">16-->10</option>
<option value="octdec">8-->10</option>

</select>
<input type="submit"  value="提交">
</form>
HTML;

echo $html;


if(isset($_POST['system'])){
	$op = $_POST['system'];
	echo $op($_POST['value']);
}