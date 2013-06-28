<?php
/***********************************************
-=Ms Site=-

Автор: Миропольский Михаил <ms@ensk.ru>
Описание: Редактирование объекта модуля
***********************************************/

	require_once('inc/init.php');
    $page = new Page('edit', 'Редактировать');
	
	$item_id = $item->EntityId('item_id', $module->TABLE_ITEMS);
	if (!$item_id) $site->SiteGoTo($module->URL);
	
	if ( isset($module->CONFIG['database']['cat']) )
		$cats = $sql->SqlGetRows('SELECT * FROM ' . $module->NAME . '_' . $module->CONFIG['database']['cat'] . ' ORDER BY id;');
		
	$item->FieldsRead($item_id, $module->TABLE_ITEMS);
	
	if ($site->AUTH < 2 && $item->FIELDS['user']['value'] != $_SESSION['current_user']['id'])
		$site->SiteGoTo($module->URL);
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$item->FieldsSet($_POST);
		$result = $item->FieldsValidate();
						
		//process
		if ($result === TRUE)
		{		
			$item->FieldsUpdate($item_id, $module->TABLE_ITEMS);			
			require_once('inc/save_files.php');
			$site->SiteOk($module->URL);
		}
	}

	require_once($site->PATH_TPL . '/main.tpl');
?>