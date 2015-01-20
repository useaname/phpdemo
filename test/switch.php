<?php
$code = 9;
switch ($code) {
	case '1':
		echo 'one';
	break;
	case '2':
		echo 'two';
	break;
	case '3':
		echo "three";
	break;
	case '4':
		echo 'big';
	break;
	case '5':
		echo "big";
	break;
	case ' 6':
		echo "big";
	break;		
	default:
		echo "other";
	break;	
}
?>