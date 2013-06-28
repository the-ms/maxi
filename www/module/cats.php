<?php
/***********************************************
-=Ms Site=-

Автор: Миропольский Михаил <ms@ensk.ru>
Описание: Список рубрик модуля
***********************************************/
	require_once('inc/init.php');
    $page = new Page('cats', 'Рубрики');
	
	$cats = $sql->SqlGetRows('SELECT * FROM ' . $module->NAME . '_' . $module->CONFIG['database']['cat'] . ' ORDER BY id;');

	require_once($site->PATH_TPL . '/main.tpl');
?>