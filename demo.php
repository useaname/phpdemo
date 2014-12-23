<?php
if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) {
	
?>
<h3>True</h3>
<?php
}else{
?>
<h3>False</h3>
<?php
}
?>

<form name="f1" action="do.php" method="post">
	<input name="name" />
	<input name="age" />
	<input type="submit" />
</form>

<?php
$array = array(
	"foo" => "bar" ,
	"bar" => "foo" );

echo "-------------------"."<br/>";

$array1 = [
	'foo' => 'bar',
	'bar' => 'foo' 
];

var_dump($array1);
?>
<br/>
<?php
var_dump($array);
?>

<?php
$array2 = array(
	'foo' => 'bar',
	'bar' => 'foo',
	100 => -100,
	-100 => 100 );
echo "<br/>";
var_dump($array2);
?>
<br/>
<?php
$array3 = array('foo','bar','hello','world');
var_dump($array3);
?>
<br/>
<?php
$arr = array(
	'foor' => 'bar',
	42 => 24,
	"multi" => array(
		'dimensional' => array(
			'array' => foo
			)
		));



?>