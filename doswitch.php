<?php
$year = $_POST['year'];
$month = $_POST['month'];

switch ($month) {
	case '1':
	case '3':
	case '5':
	case '7':
	case '8':
	case '10':
	case '12':
		echo "31天";
		break;
	case '4':
	case '6':
	case '9':
	case '11':
		echo "30天";
		break;
	case ' 2':
		if ($year % 4 == 0 && $year % 100 != 0 || $year % 400 ==0 ) {
			echo  "29天";
		}else{
			echo  "28天";
		}
		break;
}

?>