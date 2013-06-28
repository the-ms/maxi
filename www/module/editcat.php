<?php
/***********************************************
-=Ms Site=-

Автор: Миропольский Михаил <ms@ensk.ru>
Описание: Редактирование рубрики
***********************************************/

	require_once('inc/init.php');
    $page = new Page('editcat', 'Редактировать рубрику');
	
	$cat_id = $cat->EntityId('cat_id', $module->TABLE_CATS);
	if (!$cat_id) $site->SiteGoTo($module->URL);
	
	$cat->FieldsRead($cat_id, $module->TABLE_CATS);
	
	if ($site->AUTH < 2) $site->SiteGoTo($module->URL);
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$cat->FieldsSet($_POST);
		$result = $cat->FieldsValidate();
						
		//process
		if ($result === TRUE)
		{		
			$cat->FieldsUpdate($cat_id, $module->TABLE_CATS);			
			require_once('inc/save_cat_files.php');
			$site->SiteOk($module->URL);
		}
	}

	require_once($site->PATH_TPL . '/main.tpl');
?>