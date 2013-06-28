<?php
/***********************************************
-=Ms Site=-

Автор: Миропольский Михаил <ms@ensk.ru>
Описание: Добавление рубрики
***********************************************/
	require_once('inc/init.php');			
    $page = new Page('addcat', 'Добавить рубрику');
	
	if ($site->AUTH < 2) $site->SiteGoTo($module->URL);
	
	if ($_SERVER['REQUEST_METHOD'] == 'GET') $cat->FieldsSetFromUser();
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$cat->FieldsSet($_POST);
		$result = $cat->FieldsValidate();		
			
		//process
		if ($result === TRUE)
		{
			$cat->FieldsSave($module->NAME . '_' . $module->CONFIG['database']['cat']);
			$cat_id =  mysql_insert_id();
			
			require_once('inc/save_cat_files.php');
		
			$site->SiteOk($module->URL);
		}
	}

	require_once($site->PATH_TPL . '/main.tpl');
?>