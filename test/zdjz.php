<?php
function __autoload($name){
	echo $name;
}
var_dump(new Book);