<?php
/***********************************************
-=Ms Site=-

Автор: Миропольский Михаил <ms@ensk.ru>
Описание: Добавление комментария
***********************************************/
	require_once('inc/init.php');
	
    $page = new Page('addcomment', 'Добавление комментария');
	
	$item_id = $item->EntityId('item_id', $module->TABLE_ITEMS);
	if (!$item_id) $site->SiteGoTo($module->URL);
	
	if ($_SERVER['REQUEST_METHOD'] == 'GET') $comment->FieldsSetFromUser();
	$comment->FIELDS['item']['value'] = $item_id;
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$comment->FieldsSet($_POST);
		$result = $comment->FieldsValidate();
		
		if (
			$result && 
			isset($module->CONFIG['general']['confirm']) && 
			$module->CONFIG['general']['confirm'] == 1 && 
			$site->AUTH < 2
			)
			$result = $confirm->ConfirmValidate();
			
		//process
		if ($result === TRUE)
		{
			$comment->FieldsSave($module->NAME . '_' . $module->CONFIG['database']['comment']);
			$comment_id =  mysql_insert_id();
			
			$site->SiteOk($module->URL);
		}
	}

	require_once($site->PATH_TPL . '/main.tpl');
?>