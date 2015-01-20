<?
function m($n1,$n2){
	if($n1 > $n2){
		return $n1;
	}else{
		return $n2;
	}
}

$res = m(10,68);
var_dump($res);