<?php
/***********************************************
-=Ms Site=-

Автор: Миропольский Михаил <ms@ensk.ru>
Описание: Редактирование объекта модуля
***********************************************/

	require_once('inc/init.php');
    $page = new Page('edit', 'Редактировать');
	
	if ($site->AUTH < 1) $site->SiteGoTo($module->URL); //вход только авторизованным
	$item_id = $item->EntityId('item_id', $module->TABLE_ITEMS);
	if (!$item_id) $item_id = $_SESSION['current_user']['id']; //по умолчанию редактируем самого себя
	elseif ($site->AUTH < 2 && $item_id != $_SESSION['current_user']['id']) $site->SiteGoTo($module->URL); //хакерам неадминам налево
	
	$item->FieldsRead($item_id, $module->TABLE_ITEMS);
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$item->FieldsSet($_POST);
		$result = $item->FieldsValidate();
		
		if (
			$result &&
			$site->AUTH < 2 && //todo
			$sql->SqlGetRow('SELECT * FROM ' . $module->TABLE_ITEMS . ' WHERE title = "' . $item->FIELDS['title']['value'] . '" and title != "' . $_SESSION['current_user']['title'] . '";')
			)
		{
			$result = FALSE;
			$item->FIELDS['title']['error'] = 'Пользователь с таким логином уже существует.';
		}
						
		//process
		if ($result === TRUE)
		{	
			if ($_SESSION['current_user']['access'] == 2 && $item->FIELDS['access']['value'] == 1) $item->FIELDS['access']['value'] = 2;
			$item->FieldsUpdate($item_id, $module->TABLE_ITEMS);
			require_once('inc/save_files.php');
			
			if ($site->AUTH < 2) $_SESSION['current_user']['title'] = $item->FIELDS['title']['value'];
			
			$site->SiteOk($module->URL);
		}
	}

	require_once($site->PATH_TPL . '/main.tpl');
?>