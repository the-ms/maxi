<?php
/***********************************************
-=Ms Site=-

Автор: Миропольский Михаил <ms@ensk.ru>
Описание: Удаление рубрики
***********************************************/
	//site
	require_once('../lib/site.class');
    $site = new Site;
	
	//sql
	require_once('../lib/sql.class');
	$sql = new Sql;
	
	//validation
	if (
		!isset($_GET['id']) ||
		!isset($_GET['module']) ||
		!isset($_GET['entity']) ||
		!preg_match('/^\d+$/', $_GET['id']) ||
		!preg_match('/^\w+$/', $_GET['module']) ||
		($_GET['entity'] != 'comment' && $_GET['entity'] != 'item' && $_GET['entity'] != 'cat') ||
		!isset($_GET['module']) ||
		!isset($_SESSION['current_user']['id'])
		) exit;	
		
	//init
	$id = $_GET['id'];
	$module_name = $_GET['module'];
	$entity = $_GET['entity'];
	
	//module
	require_once('../lib/module.class');
    $module = new Module($module_name);
	$table = ($entity == 'cat') ? $module->TABLE_CATS : $module->TABLE_ITEMS;
	$path = ($entity == 'cat') ? $module->PATH_DATA_CATS : $module->PATH_DATA_ITEMS;
	
	$info = $sql->SqlGetRow('SELECT * FROM ' . $table . ' WHERE id = ' . $id . ';');
	
	//validation
	if (!$info) exit;
	if ($entity == 'cat' && $_SESSION['current_user']['access'] < 2) exit;
	if ( isset($info['user']) && $info['user'] != $_SESSION['current_user']['id'] && $_SESSION['current_user']['access'] < 2) exit;
	
	if ($entity == 'cat')
	{
		//delete items
		$items_info = $sql->SqlGetRows('SELECT * FROM ' . $module->TABLE_ITEMS . ' WHERE cat = ' . $id . ';');
		
		if ($items_info)
			foreach ($items_info as $item_params)
			{
				if ( isset($item_params['image']) && $item_params['image'] != '')
				{
					unlink($module->PATH_DATA_ITEMS . '/' . $item_params['image']);
					unlink($module->PATH_DATA_ITEMS . '/s_' . $item_params['image']);
				}
				if ( isset($item_params['file']) && $item_params['file'] != '')
					unlink($module->PATH_DATA_ITEMS . '/' . $item_params['file']);
				$sql->SqlExecute('DELETE FROM ' . $module->TABLE_ITEMS . ' WHERE id = ' . $item_params['id'] . ';');
			}
	}	
	
	if ( $info['image'] != '')
	{
		unlink($path . '/' . $info['image']);
		unlink($path . '/s_' . $info['image']);
	}	
	if ( $info['file'] != '')
		unlink($path . '/' . $info['file']);
		
	$sql->SqlExecute('DELETE FROM `' . $table . '` WHERE id = ' . $id . ';');

	echo TRUE;
?>