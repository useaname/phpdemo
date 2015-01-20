<?php
header('Content-Type:text/html;charser=utf-8');
$lines = isset($_GET['lines'])?$_GET['lines']:5;


for ($line=1; $line <= $lines ; $line++) { 
	for ($space=1; $space <= $lines - $line; $space++) { 
		//var_dump(9-$i);
		echo '&nbsp';
	}
	for ($star=1; $star <= 2*$line-1 ; $star++) { 
		echo '*';			
	}

	echo '<br />';		
}
echo '<hr />';
for ($line=1; $line <=$lines  ; $line++) { 
	for ($space=1; $space <= $lines - $line; $space++) { 
		echo '&nbsp;';
	}
	for ($star=1; $star <= 2*$line-1 ; $star++) { 
		if ($star == 1 || $star == 2*$line-1) {
			echo '*';				
		}else{
			echo '&nbsp;';
		}
	}
		echo '<br />';		

}
echo '<hr />';
for ($i=1; $i <= 5 ; $i++) { 
	for ($k=1; $k <= 5 - $i; $k++) { 
		echo '&nbsp;';
	}
	for ($j=1; $j <= 2*$i-1 ; $j++) { 
		//var_dump($i == 5);
		if ($j == 1 || $j == 2*$i-1 || $i == 5) {
			echo '*';				
		}else{
			echo '&nbsp;';
		}
		// elseif ($i == 5) {
		// 	echo '*';			
		// }
	}
		echo '<br />';		

}
echo "<hr>";
for($line=1; $line<=$lines; ++$line) {
	//先输出前导空格，控制空格的数量
	for($space=1; $space<=$lines-$line; ++$space) {
		echo '&nbsp;';
	}
	//再输出星星，控制星星的数量
	for($star=1; $star<=2*$line-1; ++$star) {
		//判断应该输出星星还是空格
		if($star==1 || $star==2*$line-1) {
			echo '*';
		} else {
			echo '&nbsp;';
		}
	}
	//输出换行
	echo "<br />";
}
for($line=$lines-1; $line>=1; --$line) {
	//先输出前导空格，控制空格的数量
	for($space=1; $space<=$lines-$line; ++$space) {
		echo '&nbsp;';
	}
	//再输出星星，控制星星的数量
	for($star=1; $star<=2*$line-1; ++$star) {
		//判断应该输出星星还是空格
		if($star==1 || $star==2*$line-1) {
			echo '*';
		} else {
			echo '&nbsp;';
		}
	}
	//输出换行
	echo "<br />";
}
echo '<hr>';?>