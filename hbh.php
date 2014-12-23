<?php
//案例： 有红、白、黑三种球若干个，其中红、白球共25个，白、黑球共31个，红、黑球共28个，
//求这三种球各多少个？
//请同时计算出使用了多少次循环——找出最少的循环次数
//用于记录循环了多少次（才找出答案）

$count = 0;

for ($hong=1;$hong<=25;$hong++) { 
	for ($bai=1; $bai <= 25; $bai++) { 
		for ($hei=1; $hei <= 28 ; $hei++) { 
			$count ++ ;
			if($hong+$bai == 25 && $bai + $hei == 31 && $hong + $hei == 28){
				echo "$hong,$bai,$hei";
			}
		}
	}
}

echo "循环$count";

echo "<h3>优化1</h3>";

$count=0;

for ($hong=1;$hong<=25;$hong++) { 
	for ($bai=1; $bai <= 25; $bai++) { 
		for ($hei=1; $hei <= 28 ; $hei++) { 
			$count ++ ;
			if($hong+$bai == 25 && $bai + $hei == 31 && $hong + $hei == 28){
				echo "$hong,$bai,$hei";
				break 3;
			}
		}
	}
}
echo "循环$count";

echo "<h3>优化2</h3>";
$count = 0;
for ($hong=1; $hong  <= 25; $hong++) { 
	$bai = 25 - $hong;
	$hei = 28 - $hong;
	$count ++ ;
	if($bai + $hei == 31){
		echo "红球$hong ，白球$bai, 黑球$hei";
		break;
	}
}
echo "循环$count";
?> 