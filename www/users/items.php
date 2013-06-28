<?php
/***********************************************
-=Ms Site=-

Автор: Миропольский Михаил <ms@ensk.ru>
Описание: Список объектов модуля
***********************************************/
	require_once('inc/init.php');
    $page = new Page('items', 'Объекты');
	
	$items = $sql->SqlGetRows('SELECT * FROM ' . $module->NAME . '_' . $module->CONFIG['database']['item'] . ' ORDER BY id;');

	require_once($site->PATH_TPL . '/main.tpl');
?>