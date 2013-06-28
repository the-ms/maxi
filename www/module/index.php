<?php
/***********************************************
-=Ms Site=-

Автор: Миропольский Михаил <ms@ensk.ru>
Описание: Главная страница модуля
***********************************************/

	$config = parse_ini_file ($_SERVER["DOCUMENT_ROOT"] . '/module/module.ini', true);
	
	if ( isset($config['database']['cat']) ) require_once('cats.php');
	else require_once('items.php');
?>