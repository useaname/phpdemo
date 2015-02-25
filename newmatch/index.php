<?php

$c = isset($_GET['c'])?$_GET['c']:'Match';
$controllerName = $c.'Controller';

require('./'.$controllerName.'.class.php');

$controller = new $controllerName;

$a = isset($_GET['a'])?$_GET['a']:'list';
$action_name = $a.'Action';
$controller->$action_name();


