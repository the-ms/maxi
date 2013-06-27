<?php
/***********************************************
-=Ms Site=-

Автор: Миропольский Михаил <ms@ensk.ru>
Описание: Добавление объекта модуля
***********************************************/
	require_once('inc/init.php');
	
    $page = new Page('add', 'Добавить');
	
	if ( isset($module->CONFIG['database']['cat']) )
		$cats = $sql->SqlGetRows('SELECT * FROM ' . $module->NAME . '_' . $module->CONFIG['database']['cat'] . ' ORDER BY id;');
	
	if ($_SERVER['REQUEST_METHOD'] == 'GET') $item->FieldsSetFromUser();
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$item->FieldsSet($_POST);
		$result = $item->FieldsValidate();
		
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
			$item->FieldsSave($module->NAME . '_' . $module->CONFIG['database']['item']);
			$item_id =  mysql_insert_id();
			
			require_once('inc/save_files.php');
		
			if ( isset($module->CONFIG['general']['mail']) && $module->CONFIG['general']['mail'] == 1 )
				$item->FieldsMail($site->EMAIL_OWNER, $site->TITLE . ' :: ' . $module->TITLE);
			$site->SiteOk($module->URL);
		}
	}

	require_once($site->PATH_TPL . '/main.tpl');
?>