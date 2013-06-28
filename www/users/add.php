<?php
/***********************************************
-=Ms Site=-

Автор: Миропольский Михаил <ms@ensk.ru>
Описание: Добавление объекта модуля
***********************************************/
	require_once('inc/init.php');
	
    $page = new Page('add', 'Регистрация');
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$item->FieldsSet($_POST);
		$result = $item->FieldsValidate();
		
		if (
			$result &&
			$sql->SqlGetRow('SELECT * FROM ' . $module->TABLE_ITEMS . ' WHERE title = "' . $item->FIELDS['title']['value'] . '";')
			)
		{
			$result = FALSE;
			$item->FIELDS['title']['error'] = 'Пользователь с таким логином уже существует.';
		}
		
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
			
			if ($site->AUTH < 1)
			{
				$_SESSION['current_user']['id'] = $item_id;
				$_SESSION['current_user']['title'] = $item->FIELDS['title']['value'];
				$_SESSION['current_user']['access'] = $item->FIELDS['access']['value'];
			}
			
			$site->SiteOk($module->URL);
		}
	}

	require_once($site->PATH_TPL . '/main.tpl');
?>