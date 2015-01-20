<?php

header("Content-Type:text/html;charset=utf-8");
 $isNice = isset($_POST['nice'])?$_POST['nice']:0;
 $isNew  = isset($_POST['new'])?$_POST['new']:0;
 $isHot = isset($_POST['hot'])?$_POST['hot']:0;
$isOther = isset($_POST['other'])?$_POST['other']:0;
echo 'other:'.var_dump($isOther);
echo '<hr/>';

$sate = $isHot|$isNew|$isNice|$isOther;
echo $isHot,$isNew,$isNice,$isOther;
echo '<hr />';
echo var_dump($sate);
echo '选择是:'.$sate;
echo '<hr/>';


 echo '精品:',$sate & $isNice?'Y':'N','--',var_dump($sate & $isNice),'--',decbin($sate),'--',decbin($isNice),'--',var_dump($sate);
 echo '<hr/>';

 echo '新品:',$sate & $isNew?'Y':'N','--','--',var_dump($sate & $isNew);
 echo '<hr/>';

 echo '热销:',$sate & $isHot?'Y':'N','--','--',var_dump($sate & $isHot);
echo '<hr/>';

  echo '其他:',$sate & $isOther?'Y':'N','--',var_dump($sate & $isOther);
 echo '<hr/>';
 echo 8|4|2|1;
?>
</html>
