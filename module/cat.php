<?php
/***********************************************
-=Ms Site=-

Автор: Миропольский Михаил <ms@ensk.ru>
Описание: Список объектов рубрики
***********************************************/
	require_once('inc/init.php');
    $page = new Page('cat', 'Объекты рубрики');
	
	$cat_id = $cat->EntityId('cat_id', $module->TABLE_CATS);
	if (!$cat_id) $site->SiteGoTo($module->URL);
	
	$items = $sql->SqlGetRows('SELECT * FROM ' . $module->NAME . '_' . $module->CONFIG['database']['item'] . ' WHERE cat = "' . $cat_id . '" ORDER BY id;');

	require_once($site->PATH_TPL . '/main.tpl');
?>