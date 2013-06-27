<?php
/***********************************************
-=Ms Site=-

Автор: Миропольский Михаил <ms@ensk.ru>
Описание: Объект модуля
***********************************************/
	require_once('inc/init.php');
    $page = new Page('item');	
	
	$item_id = $item->EntityId('item_id', $module->TABLE_ITEMS);
	if (!$item_id) $site->SiteGoTo($module->URL);
		
	$item->FieldsRead($item_id, $module->TABLE_ITEMS);
	
	if ( isset($module->CONFIG['database']['comment']) )
		$comments = $sql->SqlGetRows('SELECT * FROM ' . $module->NAME . '_' . $module->CONFIG['database']['comment'] . ' ORDER BY id;');

	require_once($site->PATH_TPL . '/main.tpl');
?>